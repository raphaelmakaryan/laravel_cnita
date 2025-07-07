<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        echo "Tout les produits";
        return view("product-list");
    }

    public function detail($id)
    {
        echo  'Fiche du produit ' .  $id;
        return view("product-details");
    }
}
