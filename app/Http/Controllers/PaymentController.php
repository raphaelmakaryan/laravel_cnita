<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function indexPage()
    {
        return view("payment");
    }

    public function addInformation(Request $request)
    {
        $idUser = Auth::id();
        $newInformations = [
            $request->input('firstSecondName'),
            $request->input('adressLivraison'),
            $request->input('cityLivraison'),
            $request->input('CPLivraison'),
            $request->input('countryLivraison')
        ];

        Informations::insert([
            "idUser" => $idUser,
            "firstname_lastname" => $newInformations[0],
            "address" => $newInformations[1],
            "city" => $newInformations[2],
            "postal_code" => $newInformations[3],
            "country" => $newInformations[4],
        ]);
    }

    public function haveInformation()
    {
        return view("payment");
    }
}
