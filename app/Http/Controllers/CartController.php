<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function indexPage()
    {
        return view("cart");
    }

    public function addToCart()
    {
        return view("cart");
    }
}
