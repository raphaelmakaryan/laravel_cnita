<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addProduct($nom, $image, $prix)
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
                "message" => "Vous n'avez pas les permissions requises pour ajouter un produit."
            ];
        }

        try {
            Product::insert([
                "nom" => $nom,
                "image" => $image,
                "prix" => $prix
            ]);

            return [
                "success" => true,
                "message" => "Votre produit a été ajouté avec succès !"
            ];
        } catch (Exception $e) {
            return [
                "success" => false,
                "message" => "Une erreur est survenue lors de l'ajout du produit.",
                "error" => $e->getMessage()
            ];
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

    public function updateProduct($id, $nom, $image, $prix)
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
                "message" => "Vous n'avez pas les permissions requises pour modifier un produit."
            ];
        }

        try {
            $updateData = [];

            if ($nom !== "null") {
                $updateData['nom'] = $nom;
            }

            if ($image !== "null") {
                $updateData['image'] = $image;
            }

            if ($prix != 0) {
                $updateData['prix'] = (int) $prix;
            }

            if (empty($updateData)) {
                return [
                    "success" => false,
                    "message" => "Aucune donnée à mettre à jour."
                ];
            }

            Product::where("ID", "=", $id)->update($updateData);

            return [
                "success" => true,
                "message" => "Produit mis à jour avec succès."
            ];
        } catch (Exception $e) {
            return [
                "success" => false,
                "message" => "Une erreur est survenue lors de la modification du produit.",
                "error" => $e->getMessage(),
                "result" => $updateData
            ];
        }
    }
}
