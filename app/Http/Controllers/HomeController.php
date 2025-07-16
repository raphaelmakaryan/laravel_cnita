<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;


class HomeController extends Controller
{
    public function indexPage()
    {
        $allProduct = Product::orderByDesc("ID")->limit(3)->get();

        return view("home", data: ['produits' => $allProduct]);
    }
}
