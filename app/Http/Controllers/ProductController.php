<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{

    public function indexPage()
    {
        $allProduct = Product::orderByDesc("ID")->limit(3)->get();

        return view("home", data: ['produits' => $allProduct]);
    }

    public function explorePage()
    {
        $allProduct = Product::all();

        return view("explore", data: ['produits' => $allProduct]);
    }

    public function detailPage($id)
    {
        $productDetail = Product::where("ID", "=", $id)->get();

        return view("product-details", ["product" => $productDetail]);
    }
}
