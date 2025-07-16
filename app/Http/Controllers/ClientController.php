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
                DB::raw('SUM(prix) as totalPrix')
            )
            ->groupBy('idOrder', 'date', 'status')
            ->orderBy('date', 'asc')
            ->get();

        return view("client.historic", ['historic' => $historic]);
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

        $details = OrderTracking::where('order_tracking.idOrder', $id)
            ->join('products', 'order_tracking.idProduct', '=', 'products.ID')
            ->select(
                'order_tracking.idOrder',
                'products.nom as nomProduit',
                'products.image as imageProduit',
                'order_tracking.prix as prixCommande',
                'order_tracking.date as dateCommande',
                'order_tracking.status as statutCommande'
            )
            ->orderBy('order_tracking.date', 'desc')
            ->get();

        return view("client.details", ['details' => $details]);
    }
}
