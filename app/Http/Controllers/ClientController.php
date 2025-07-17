<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function indexPage()
    {
        return view("client.dashboard");
    }

    public function historicPage()
    {
        $userId = Auth::id();

        $historic = OrderTracking::where('idUser', $userId)
            ->select(
                'idOrder',
                'date',
                'status',
                "prix"
            )
            ->groupBy('idOrder', 'date', 'status', "prix")
            ->orderBy('date', 'asc')
            ->get();

        if ($historic) {
            return view("client.historic", ['historic' => $historic]);
        }
        return view("client.historic");
    }

    public function detailsPage($id)
    {
        $userId = Auth::id();

        $commandeExiste = OrderTracking::where('idOrder', $id)
            ->where('idUser', $userId)
            ->exists();

        if (!$commandeExiste) {
            return redirect()->route('client.dashboard');
        }

        $details = OrderTracking::with('product')
            ->where('idOrder', $id)
            ->orderBy('date', 'desc')
            ->get();

        return view("client.details", ['details' => $details]);
    }
}
