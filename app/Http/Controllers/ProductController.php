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
        return view("product-details", ["product"=>$id]);
    }
}
