<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function explore()
    {
        $allProduct = Product::all();

        return view("explore", data: ['produits' => $allProduct]);
    }

    public function detail($id)
    {
        $productDetail = Product::where("ID", "=", $id)->get();

        return view("product-details", ["product"=> $productDetail]);
    }
}
