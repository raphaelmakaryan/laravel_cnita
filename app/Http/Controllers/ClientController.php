<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderTracking;
use App\Models\OrderTrackingPerso;
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

        $normalOrders = OrderTracking::where('idUser', $userId)->pluck('idOrder')->toArray();
        $persoOrders = OrderTrackingPerso::where('idUser', $userId)->pluck('idOrder')->toArray();

        $mergedOrderIds = collect(array_unique(array_merge($normalOrders, $persoOrders)));

        $alreadyHandled = [];

        $historic = collect();

        foreach ($mergedOrderIds as $idOrder) {
            if (in_array($idOrder, $alreadyHandled)) {
                continue;
            }

            $order = OrderTracking::where('idOrder', $idOrder)
                ->where('idUser', $userId)
                ->first();

            if ($order) {
                $prix = OrderTracking::where('idOrder', $idOrder)
                    ->where('idUser', $userId)
                    ->sum('prix');

                $historic->push([
                    'idOrder' => $idOrder,
                    'date'    => $order->date,
                    'status'  => $order->status,
                    'prix'    => $prix,
                ]);

                $alreadyHandled[] = $idOrder;
                continue;
            }

            $orderPerso = OrderTrackingPerso::where('idOrder', $idOrder)
                ->where('idUser', $userId)
                ->first();

            if ($orderPerso) {
                $prix = OrderTrackingPerso::where('idOrder', $idOrder)
                    ->where('idUser', $userId)
                    ->sum('prix');

                $historic->push([
                    'idOrder' => $idOrder,
                    'date'    => $orderPerso->date,
                    'status'  => $orderPerso->status,
                    'prix'    => $prix,
                ]);

                $alreadyHandled[] = $idOrder;
            }
        }

        $historic = $historic->sortBy('date')->values();

        return view("client.historic", ["historic" => $historic]);
    }

    public function detailsPage($id)
    {
        $userId = Auth::id();

        $commandeExiste = OrderTracking::where('idOrder', $id)
            ->where('idUser', $userId)
            ->exists();

        $commandePersoExiste = OrderTrackingPerso::where('idOrder', $id)
            ->where('idUser', $userId)
            ->exists();


        if (!$commandeExiste && !$commandePersoExiste) {
            return redirect()->route('client.dashboard');
        }

        $details = OrderTracking::with('product')
            ->where('idOrder', $id)
            ->orderBy('date', 'desc')
            ->get();

        $detailsPerso = OrderTrackingPerso::with('product')
            ->where('idOrder', $id)
            ->orderBy('date', 'desc')
            ->get();

        return view("client.details", [
            'details' => $details,
            'detailsPerso' => $detailsPerso
        ]);
    }
}
