<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderTracking;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlacingOrder;

class PaymentController extends Controller
{
    public function indexPage()
    {
        $userId = Auth::id();
        if ($userId) {
            $cartItems = Cart::with('product')->where('idUser', $userId)->get();
            $alreadyLivraison = Informations::where('idUser', $userId)->get();
            if (count($cartItems) >= 1) {
                return view('payment', [
                    'cartItems' => $cartItems,
                    'alreadyLivraison' => $alreadyLivraison
                ]);
            } else {
                return redirect()->route('cart');
            }
        } else {
            return redirect()->route('cart');
        }
    }

    public function addInformation(Request $request)
    {
        $informationsUser = $request->input('informationsUser');
        $idUser = Auth::id();

        if (!is_array($informationsUser) || empty($informationsUser)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucune informations reçu.'
            ], 400);
        }

        foreach ($informationsUser as $item) {
            $firstSecondName = $item['firstSecondName'] ?? null;
            $adressLivraison = $item['adressLivraison'] ?? null;
            $cityLivraison = $item['cityLivraison'] ?? null;
            $CPLivraison = $item['CPLivraison'] ?? null;
            $countryLivraison = $item['countryLivraison'] ?? null;

            if ($idUser) {
                Informations::insert([
                    "idUser" => $idUser,
                    "firstname_lastname" => $firstSecondName,
                    "address" => $adressLivraison,
                    "city" => $cityLivraison,
                    "postal_code" => $CPLivraison,
                    "country" => $countryLivraison,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Informations ajouté.'
                ]);
            }
        }
    }

    public function check(Request $request)
    {
        $payload = $request->input('payload');
        $idUser = Auth::id();

        if (!is_array($payload) || empty($payload)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun produit sélectionné.'
            ], 400);
        }

        $productIds = collect($payload)->pluck('idForFinalArray')->flatten()->toArray();
        $price = $payload[0]['price'];
        $date = $payload[0]['date'];

        $cartItems = Cart::where('idUser', $idUser)
            ->whereIn('idProduct', $productIds)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun produit du panier ne correspond à la sélection.'
            ], 400);
        }

        $lastOrderId = OrderTracking::max('idOrder');
        $newOrderId = $lastOrderId ? $lastOrderId + 1 : 1;

        foreach ($cartItems as $cartItem) {
            $productId = $cartItem->idProduct;
            $quantite = $cartItem->quantite;

            Cart::where("idProduct", $productId)
                ->where("idUser", $idUser)
                ->delete();

            OrderTracking::insert([
                'idUser'    => $idUser,
                'idOrder'   => $newOrderId,
                'idProduct' => $productId,
                'status'    => 0,
                'prix'      => $price,
                "quantite" => $quantite,
                'date'      => $date
            ]);
        }

        Mail::to(Auth::user()->email)->send(new PlacingOrder($price));

        return response()->json([
            'status' => 'success',
            'message' => 'Commande validée et panier vidé pour les produits sélectionnés.'
        ]);
    }
}
