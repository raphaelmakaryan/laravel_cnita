<?php

namespace App\Http\Controllers;

use App\Models\OrderTracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PersonalizedGlasses;
use App\Models\OrderTrackingPerso;
use App\Models\CartPerso;

class PersonalizeController extends Controller
{
    public function indexPage()
    {
        return view("personalize");
    }

    public function createPersonnalized(Request $request)
    {
        $idUser = Auth::id();
        $isInsert = false;
        $dataPerso = $request->input('dataPerso');

        if (!is_array($dataPerso) || empty($dataPerso)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucune informations reçu.'
            ], 400);
        }

        if ($idUser && $dataPerso && !$isInsert) {
            foreach ($dataPerso as $data) {
                $monture = $data['Monture'];
                $couleurMonture = $data['CouleurMonture'];
                $verre = $data['Verre'];
                $couleurVerre = $data['CouleurVerre'];
                $boite = $data['Boîte'];
                $couleurBoite = $data['CouleurBoîte'];

                PersonalizedGlasses::insert([
                    'idUser' => $idUser,
                    'monture' => $monture,
                    'couleurmonture' => $couleurMonture,
                    'verre' => $verre,
                    'couleurverre' => $couleurVerre,
                    'boite' => $boite,
                    'couleurboite' => $couleurBoite,
                ]);

                $lastPersonalizedGlass = PersonalizedGlasses::where("idUser", $idUser)->first();
                CartPerso::insert([
                    "idUser" => $idUser,
                    "idProduct" => $lastPersonalizedGlass->ID
                ]);

                $isInsert = true;
            }
            
            if($isInsert){   
                return response()->json([
                    'status' => 'success',
                    'message' => 'Lunettes personnalisées enregistrées avec succès',
                    "redirect" => "/cart"
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Lunettes personnalisées non enregistrées avec succès'
                ]);
            }
        }
    }
}

/*

{
    "dataPerso": [
        {
            "Monture": "Carbone",
            "CouleurMonture": "Bleu",
            "Verre": "Minéraux",
            "CouleurVerre": "Bleu",
            "Boîte": "Pliable",
            "CouleurBoîte": "Bleu"
        }
    ]
}
*/
