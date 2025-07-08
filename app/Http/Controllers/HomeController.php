<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index()
    {
        $allProduct = DB::select('select * from produits');

        return view("home", data: ['produits' => $allProduct]);
    }
}