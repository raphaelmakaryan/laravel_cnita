<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartPerso;
use App\Models\PersonalizedGlasses;
use App\Models\User;
use App\Models\Product;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function indexPage()
    {
        $userId = Auth::id();
        if ($userId) {
            $cartProduct = Cart::with(["verifUser", 'product'])->where('idUser', $userId)->get();
            $cartPerso = CartPerso::with(["verifUser", 'product'])->where('idUser', $userId)->get();

            return view('cart', [
                "cartUsers" => $cartProduct,
                'cartPerso' => $cartPerso
            ]);
        }
        return view("cart");
    }

    public function addToCart(Request $request)
    {
        $debug = true;
        // Meme nom que la variable qui contient les infos des produits
        $cartItems = $request->input('cartItems');
        $idUser = Auth::id();


        if (!is_array($cartItems) || empty($cartItems)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun produit reçu.'
            ], 400);
        }

        foreach ($cartItems as $item) {
            $productId = $item['id'] ?? null;
            $verification = Cart::where("idProduct", $productId)->where("idUser", $idUser)->get();
            if ($productId && $idUser && count($verification) >= 1) {
                $numberProductRequest = Cart::where("idProduct", $productId)
                    ->where("idUser", $idUser)
                    ->select("quantite")
                    ->first();

                $numberProduct = (int) $numberProductRequest->quantite + 1;
                if ($numberProduct <= 10) {
                    Cart::where("idProduct", $productId)->where("idUser", $idUser)->update([
                        "quantite" => $numberProduct
                    ]);
                }
            } else if ($productId && $idUser && count($verification) === 0) {
                Cart::insert([
                    "idUser" => $idUser,
                    "idProduct" => $productId
                ]);
            }
        }

        if ($debug) {
            return response()->json([
                'status' => 'success',
                'message' => 'Produits ajoutés au panier avec succès (debug)',
                'data' => $cartItems
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Produits ajoutés au panier avec succès'
            ]);
        }
    }

    public function deleteToCart(Request $request)
    {
        $debug = true;
        $dataRemove = $request->input('dataRemove');
        $idUser = Auth::id();

        if (empty($dataRemove)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun produit récupérer'
            ], 400);
        }

        if ($dataRemove && $idUser) {

            switch ($dataRemove["type"]) {
                case 'normal':
                    Cart::where("ID", $dataRemove)
                        ->where("idUser", $idUser)
                        ->delete();
                    break;

                case 'perso':
                    CartPerso::where("ID", $dataRemove["index"])
                        ->where("idUser", $idUser)
                        ->delete();

                    PersonalizedGlasses::where("ID", $dataRemove["index"])
                        ->where("idUser", $idUser)
                        ->delete();
                    break;
            }
        }

        if ($debug) {
            return response()->json([
                'status' => 'success',
                'message' => 'Produits supprimé au panier avec succès (debug)'
            ]);
        }
    }

    public function addLocalProducts(Request $request)
    {
        $debug = true;
        $cartItemsNormal = $request->input('cartItemsNormal');
        $cartItemsPerso = $request->input('cartItemsPerso');
        $idUser = Auth::id();
        if ($idUser && $cartItemsNormal) {
            if (!is_array($cartItemsNormal) || empty($cartItemsNormal)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Aucun produit reçu.'
                ], 400);
            }
            foreach ($cartItemsNormal as $item) {
                Cart::insert([
                    "idUser" => $idUser,
                    "idProduct" => $item['id'],
                    "quantite" => $item['quantity'],
                ]);
            }

            if ($debug) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produits ajoutés au panier avec succès (debug)',
                    'data' => $cartItemsNormal
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produits ajoutés au panier avec succès'
                ]);
            }
        }
        if ($idUser && $cartItemsPerso) {
            if (!is_array($cartItemsPerso) || empty($cartItemsPerso)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Aucun produit reçu.'
                ], 400);
            }

            foreach ($cartItemsPerso as $item) {
                PersonalizedGlasses::insert([
                    'idUser' => $idUser,
                    'monture' => $item['Monture'],
                    'couleurmonture' => $item['CouleurMonture'],
                    'verre' => $item['Verre'],
                    'couleurverre' => $item['CouleurVerre'],
                    'boite' => $item['Boîte'],
                    'couleurboite' => $item['CouleurBoîte']
                ]);

                $lastPersonalizedGlass = PersonalizedGlasses::where("idUser", $idUser)->first();
                CartPerso::insert([
                    "idUser" => $idUser,
                    "idProduct" => $lastPersonalizedGlass->ID,
                    'quantite' => $item['quantity'],
                ]);
            }

            if ($debug) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produits ajoutés au panier avec succès (debug)',
                    'data' => $cartItemsPerso
                ]);
            }
        }
    }

    public function updateQuantity(Request $request)
    {
        $debug = true;
        $informationsCart = [
            'id' => $request->input('idProduct'),
            'quantite'        => $request->input('quantityCart'),
            "type" => $request->input('whoCart'),
        ];

        $idUser = Auth::id();

        if ($idUser) {
            switch ($informationsCart["type"]) {
                case 'normal':
                    $verification = Cart::where("idProduct", $informationsCart["id"])->where("idUser", $idUser)->get();
                    $countVerif = count($verification) == 1;
                    if ($countVerif) {
                        if ($debug) {
                            response()->json([
                                'status' => 'success',
                                'message' => 'Mise a jour de la quantité',
                                "data" => [
                                    "userId" => $idUser,
                                    "idProduct" => $informationsCart['id'],
                                    "quantite" => $informationsCart['quantite'],
                                    "count" => $countVerif
                                ]
                            ]);
                        }

                        Cart::where("idProduct", (int) $informationsCart["id"])->where("idUser", $idUser)->update([
                            "quantite" => (int) $informationsCart["quantite"]
                        ]);
                    }
                    break;

                case 'perso':
                    $verification = CartPerso::where("idProduct", $informationsCart["id"])->where("idUser", $idUser)->get();
                    $countVerif = count($verification) == 1;
                    if ($countVerif) {
                        if ($debug) {
                            response()->json([
                                'status' => 'success',
                                'message' => 'Mise a jour de la quantité',
                                "data" => [
                                    "userId" => $idUser,
                                    "idProduct" => $informationsCart['id'],
                                    "quantite" => $informationsCart['quantite'],
                                    "count" => $countVerif
                                ]
                            ]);
                        }

                        CartPerso::where("idProduct", (int) $informationsCart["id"])->where("idUser", $idUser)->update([
                            "quantite" => (int) $informationsCart["quantite"]
                        ]);
                    }
                    break;
            }
        } else {
            response()->json([
                'status' => 'error',
                'message' => 'Mise a jour pas eu lieu'
            ]);
        }
        return redirect()->route('cart');
    }
}
