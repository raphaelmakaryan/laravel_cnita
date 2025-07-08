<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalizeController extends Controller
{
    public function indexPage()
    {
        return view("personalize");
    }
}
