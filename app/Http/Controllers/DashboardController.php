<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UsersMiroMiro;
use App\Models\Permissions;
use App\Models\Status;
use App\Exceptions\InvalidOrderException;
use App\Models\OrderTracking;
use Illuminate\Support\Facades\Auth;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class DashboardController extends Controller
{
    public function indexPage()
    {
        return view("backoffice.account");
    }

    public function productsPage()
    {
        $allProduct = Product::all();
        return view("backoffice.products", data: ['produits' => $allProduct]);
    }

    public function detailPage($id)
    {
        $detailProduct = Product::where("ID", "=", $id)->get();

        return view("backoffice.detail", data: ['produits' => $detailProduct]);
    }

    public function createPage()
    {
        return view("backoffice.createProduct");
    }

    public function addingProduct(Request $request)
    {
        try {

            $validated = $request->validate([
                'nameProduct' => 'required|max:20|min:5',
                'imageProduct'      => 'required',
                'priceProduct'       => 'required|min:1',
            ]);

            if ($validated) {
                $newProduct = [
                    'nom'        => $request->input('nameProduct'),
                    'description' => $request->input('descProduct'),
                    'genre'      => $request->input('genreProduct'),
                    'taille'     => $request->input('sizeProduct'),
                    'forme'      => $request->input('formProduct'),
                    'image'      => $request->input('imageProduct'),
                    'prix'       => $request->input('priceProduct'),
                ];

                if ($newProduct['genre'] === "Genre") {
                    unset($newProduct['genre']);
                }
                if ($newProduct['taille'] === "Taille") {
                    unset($newProduct['taille']);
                }
                if ($newProduct['forme'] === "Forme") {
                    unset($newProduct['forme']);
                }
                if (empty($newProduct['description'])) {
                    unset($newProduct['description']);
                }

                Product::insert($newProduct);

                return view("responses.success", ["texte" => "Création du produit a fonctionner !"]);
            }
        } catch (Exception $e) {
            return view("responses.error", ["texte" => " L'ajout du produit n'a pas pu marcher, une erreur est survenue !"]);
        }
    }

    public function deletePage($id)
    {
        $productDelete = Product::where("ID", "=", $id)->get();

        return view("backoffice.deleteProduct", ["product" => $productDelete]);
    }

    public function deleteProduct($id)
    {
        Product::where("ID", $id)->delete();
        try {
            return view("responses.success", ["texte" => "Suppresion du produit a marcher !"]);
        } catch (Exception $e) {
            return view("responses.error", ["texte" => "Suppresion du produit n'a pas pu marcher, une erreur est survenue !"]);
        }
    }

    public function modifyPage($id)
    {
        $productModify = Product::where("ID", "=", $id)->get();

        return view("backoffice.modifyProduct", ["product" => $productModify]);
    }

    public function modifyProduct(Request $request)
    {
        try {
            $idProduct = $request->input('idProduct');
            $modifyProduct = [
                'nom'        => $request->input('nameProduct'),
                'description' => $request->input('descProduct'),
                'genre'      => $request->input('genreProduct'),
                'taille'     => $request->input('sizeProduct'),
                'forme'      => $request->input('formProduct'),
                'image'      => $request->input('imageProduct'),
                'prix'       => $request->input('priceProduct'),
            ];

            Product::where("ID", "=", $idProduct)->update($modifyProduct);
            return view("responses.success", ["texte" => "Mise a jour du produit a marcher !"]);
        } catch (Exception) {
            return view("responses.error", ["texte" => "Mise a jour du produit n'a pas pu marcher, une erreur est survenue !"]);
        }
    }

    public function usersPage()
    {
        $userId = Auth::id();
        $allUsers = UsersMiroMiro::where("id", "!=", $userId)->get();
        $allPermission = Permissions::all();

        return view("backoffice.users", ["allUsers" => $allUsers, "permissions" => $allPermission]);
    }

    public function usersUpdate(Request $request)
    {
        $modifyPerm = [
            $request->input("selectPerm"),
            $request->input("userId"),
        ];

        $verification = UsersMiroMiro::where("permission", '!=', $modifyPerm[0])
            ->where("id", "=", $modifyPerm[1])
            ->exists();

        if ($verification === true) {
            UsersMiroMiro::where("id", $modifyPerm[1])
                ->update([
                    "permission" => $modifyPerm[0],
                ]);
        }
        return redirect()->route('backoffice.users');
    }

    public function graphPage()
    {
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(6);

        // Nombre de commandes par jour
        $commandesParJour = OrderTracking::select(
            DB::raw('DATE(`date`) as jour'),
            DB::raw('COUNT(DISTINCT idOrder) as total')
        )
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('jour')
            ->pluck('total', 'jour')
            ->toArray();

        // Total des prix par jour
        $prixParJour = OrderTracking::select(DB::raw('DATE(`date`) as jour'), DB::raw('SUM(prix) as total'))
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('jour')
            ->pluck('total', 'jour')
            ->toArray();

        // Génère les 7 jours avec 0 si aucune donnée
        $jours = [];
        for ($i = 0; $i < 7; $i++) {
            $jour = $startDate->copy()->addDays($i)->format('Y-m-d');
            $jours[$jour] = [
                'commandes' => $commandesParJour[$jour] ?? 0,
                'prix' => $prixParJour[$jour] ?? 0,
            ];
        }

        return view("backoffice.graphs", [
            "graphLabels" => array_keys($jours),
            "graphDataCommandes" => array_column($jours, 'commandes'),
            "graphDataPrix" => array_column($jours, 'prix')
        ]);
    }

    public function commandsPage()
    {
        $commandes = OrderTracking::with('user')
            ->select('idOrder', 'date', DB::raw('SUM(prix) as prix'), 'idUser')
            ->groupBy('idOrder', 'date', 'idUser')
            ->orderBy('date', 'desc')
            ->get();

        return view('backoffice.commands.commands', [
            'commandes' => $commandes,
        ]);
    }

    public function detailsCommandsPage()
    {
        $commandes = OrderTracking::with(['user', 'product'])
            ->orderBy('date', 'desc')
            ->get();

        $allStatus = Status::all();

        return view('backoffice.commands.details', [
            'commandes' => $commandes,
            "allStatus" => $allStatus
        ]);
    }


    public function commandsUpdate(Request $request)
    {
        $modifyStatus = [
            $request->input("selectStatus"),
            $request->input("userId"),
        ];

        $verification = OrderTracking::where("status", '!=', $modifyStatus[0])
            ->where("idUser", "=", $modifyStatus[1])
            ->exists();

        if ($verification === true) {
            OrderTracking::where("idUser", $modifyStatus[1])
                ->update([
                    "status" => $modifyStatus[0],
                ]);
        }
        return redirect()->route('backoffice.commands');
    }
}
