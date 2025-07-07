<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function explore()
    {
        return view("explore");
    }

    public function detail($id)
    {
        return view("product-details", ["product"=>$id]);
    }
}
