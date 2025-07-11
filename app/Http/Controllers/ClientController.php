<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\OrderTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->join('products', 'order_tracking.idProduct', '=', 'products.ID')
            ->select(
                'products.nom as nomProduit',
                'products.image as imageProduit',
                'order_tracking.prix as prixCommande',
                'order_tracking.date as dateCommande',
                'order_tracking.status as statutCommande'
            )
            ->orderBy('order_tracking.date', 'desc')
            ->get();

        return view("client.historic", ['historic' => $historic]);
    }
}
