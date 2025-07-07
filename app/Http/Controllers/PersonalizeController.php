<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalizeController extends Controller
{
    public function index()
    {
        return view("personalize");
    }
}
