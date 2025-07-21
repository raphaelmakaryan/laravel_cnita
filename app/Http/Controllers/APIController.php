<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class APIController extends Controller
{
    public function indexPage()
    {
        return [
            "sucess" => true,
            "message" => "Bienvenue sur l'API !"
        ];
    }

    public function allProduct()
    {
        $allProducts = Product::all();
        return [
            "success" => true,
            "message" => $allProducts
        ];
    }

    public function oneProduct($id)
    {
        if ($id) {
            $oneProduct = Product::where("ID", $id)->get();
            if (count($oneProduct) >= 1) {
                return [
                    "success" => true,
                    "message" => $oneProduct
                ];
            } else {
                return [
                    "success" => false,
                    "message" => "L'ID que vous avez demandé n'existe pas ou a été mal orthographié"
                ];
            }
        }
    }

    public function storeImage($image)
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/products');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        copy($image->getPathname(), $destinationPath . DIRECTORY_SEPARATOR . $filename);
        return 'assets/products/' . $filename;
    }
    public function addProduct(Request $request)
    {
        $user = Auth::user();

        if ($user->permission !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Vous n\'avez pas la permission d\'ajouter un produit.'
            ], 403);
        }

        $validatedData = $request->validate([
            "nom" => "required|string|max:255",
            "image" => "required|image|max:2048",
            "prix" => "required|numeric"
        ]);

        try {
            $product = Product::insert([
                "nom" => $validatedData["nom"],
                "image" => $this->storeImage($validatedData["image"]),
                "prix" => $validatedData["prix"]
            ]);

            return response()->json([
                "success" => true,
                "message" => "Votre produit a été ajouté avec succès !",
                "product" => $product
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Une erreur est survenue lors de l'ajout du produit.",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function deleteProduct($id)
    {
        if (!Auth::check()) {
            return [
                "success" => false,
                "message" => "Vous devez être connecté pour effectuer cette action."
            ];
        }

        if (Auth::user()->permission !== 1) {
            return [
                "success" => false,
                "message" => "Vous n'avez pas les permissions requises pour supprimer un produit."
            ];
        }

        try {
            Product::where("ID", $id)->delete();

            return [
                "success" => true,
                "message" => "Votre produit a été supprimé avec succès !"
            ];
        } catch (Exception $e) {
            return [
                "success" => false,
                "message" => "Une erreur est survenue lors de le la suppresion du produit.",
                "error" => $e->getMessage()
            ];
        }
    }
    public function updateProduct(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                "success" => false,
                "message" => "Vous devez être connecté pour effectuer cette action."
            ], 401);
        }

        $user = Auth::user();

        if ($user->permission !== 1) {
            return response()->json([
                "success" => false,
                "message" => "Vous n'avez pas la permission de modifier un produit."
            ], 403);
        }

        $validatedData = $request->validate([
            "nom" => "required|string|max:255",
            "image" => "required|image|max:2048",
            "prix" => "required|numeric"
        ]);

        try {
            $updateData = [];

            if ($request->filled('nom')) {
                $updateData['nom'] = $validatedData['nom'];
            }

            if ($request->hasFile('image')) {
                $updateData['image'] = $this->storeImage($request->file('image'));
            }

            if ($request->filled('prix')) {
                $updateData['prix'] = $validatedData['prix'];
            }

            if (empty($updateData)) {
                return response()->json([
                    "success" => false,
                    "message" => "Aucune donnée à mettre à jour."
                ], 400);
            }

            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    "success" => false,
                    "message" => "Produit introuvable."
                ], 404);
            }

            $product::where("ID", "=", $id)->update($updateData);

            return response()->json([
                "success" => true,
                "message" => "Produit mis à jour avec succès.",
                "product" => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Une erreur est survenue lors de la modification du produit.",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
