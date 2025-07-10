<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function indexPage()
    {
        $userId = Auth::id();
        if ($userId) {
            $cartItems = Cart::where('idUser', $userId)->get();
            $products = Product::whereIn('ID', $cartItems->pluck('idProduct'))->get();

            return view('cart', [
                'products' => $products,
                'cartItems' => $cartItems
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
}
