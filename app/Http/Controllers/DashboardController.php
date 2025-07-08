<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $allProduct = Product::all();
        return view("dashboard.dashboard", data: ['produits' => $allProduct]);
    }

    public function create()
    {
        return view("dashboard.createProduct");
    }

    public function delete($id)
    {
        $productDelete = Product::where("ID", "=", $id)->get();

        return view("dashboard.deleteProduct", ["product" => $productDelete]);
    }

    public function modify($id)
    {
        $productModify = Product::where("ID", "=", $id)->get();

        return view("dashboard.modifyProduct", ["product" => $productModify]);
    }
}
