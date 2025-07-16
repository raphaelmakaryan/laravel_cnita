<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            $cartUsers = Cart::with(["verifUser", 'product'])->where('idUser', $userId)->get();

            return view('cart', [
                "cartUsers" => $cartUsers
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
        $debug = false;
        $index = $request->input('index');
        $idUser = Auth::id();

        if (empty($index)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucun produit récupérer'
            ], 400);
        }

        if ($index && $idUser) {
            Cart::where("idProduct", $index)
                ->where("idUser", $idUser)
                ->delete();
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
        $cartItems = $request->input('cartItems');
        $idUser = Auth::id();
        if ($idUser && $cartItems) {
            if (!is_array($cartItems) || empty($cartItems)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Aucun produit reçu.'
                ], 400);
            }
            foreach ($cartItems as $item) {
                $productId = $item['id'] ?? null;

                if ($productId && $idUser) {
                    Cart::insert([
                        "idUser" => $idUser,
                        "idProduct" => $productId,
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
    }

    public function updateQuantity(Request $request)
    {
        $debug = true;
        $informationsCart = [
            'id' => $request->input('idProduct'),
            'quantite'        => $request->input('quantityCart'),
        ];

        $idUser = Auth::id();

        if ($idUser) {
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
        } else {
            response()->json([
                'status' => 'error',
                'message' => 'Mise a jour pas eu lieu'
            ]);
        }
        return redirect()->route('cart');
    }
}
