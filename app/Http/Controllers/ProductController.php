<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function explore()
    {
        echo "Tout les produits";
        return view("explore");
    }

    public function detail($id)
    {
        return view("product-details", ["product"=>$id]);
    }
}
