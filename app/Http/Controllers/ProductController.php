<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function explore()
    {
        $allProduct = DB::select('select * from produits');

        return view("explore", data: ['produits' => $allProduct]);
    }

    public function detail($id)
    {
        $productDetail = DB::select('select * from produits WHERE ID = ' . $id . '');

        return view("product-details", ["product"=> $productDetail]);
    }
}
