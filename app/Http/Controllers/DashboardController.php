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
        return view("backoffice.create.createProduct");
    }

    public function addingProduct(Request $request)
    {
        try {
            $newProduct = [
                $request->input('nameProduct'),
                $request->input('imageProduct'),
                $request->input('priceProduct')
            ];

            Product::insert([
                "nom" => $newProduct[0],
                "image" => $newProduct[1],
                "prix" => $newProduct[2],
            ]);

            return view("backoffice.create.successCreate");
        } catch (Exception $e) {
            return view("backoffice.create.errorCreate");
        }
    }

    public function errorCreatePage()
    {
        return view("backoffice.create.errorCreate");
    }

    public function successCreatePage()
    {
        return view("backoffice.create.successCreate");
    }

    public function deletePage($id)
    {
        $productDelete = Product::where("ID", "=", $id)->get();

        return view("backoffice.delete.deleteProduct", ["product" => $productDelete]);
    }

    public function deleteProduct($id)
    {
        Product::where("ID", $id)->delete();
        try {
            return view("backoffice.delete.successDelete");
        } catch (Exception $e) {
            return view("backoffice.delete.errorDelete");
        }
    }

    public function errorDeletePage()
    {
        return view("backoffice.delete.errorDelete");
    }

    public function successDeletePage()
    {
        return view("backoffice.delete.successDelete");
    }

    public function modifyPage($id)
    {
        $productModify = Product::where("ID", "=", $id)->get();

        return view("backoffice.modify.modifyProduct", ["product" => $productModify]);
    }

    public function modifyProduct(Request $request)
    {
        try {
            $modifyProduct = [
                $request->input('idProduct'),
                $request->input('nameProduct'),
                $request->input('imageProduct'),
                $request->input('priceProduct')
            ];

            Product::where("ID", "=", $modifyProduct[0])->update([
                "nom" => $modifyProduct[1],
                "image" => $modifyProduct[2],
                "prix" => $modifyProduct[3],
            ]);

            return view("backoffice.modify.successModify");
        } catch (Exception) {
            return view("backoffice.modify.errorModify");
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
        $commandes = OrderTracking::join('users', 'order_tracking.idUser', '=', 'users.id')
            ->select(
                'order_tracking.idOrder',
                'order_tracking.date',
                DB::raw('SUM(order_tracking.prix) as prix'),
                'users.name as nomUtilisateur',
                'users.id as idUser'
            )
            ->groupBy('order_tracking.idOrder', 'order_tracking.date', 'users.name', 'users.id')
            ->orderBy('order_tracking.date', 'desc')
            ->get();

        return view('backoffice.commands.commands', [
            'commandes' => $commandes,
        ]);
    }

    public function detailsCommandsPage($id)
    {
        $commandes = OrderTracking::join('users', 'order_tracking.idUser', '=', 'users.id')
            ->join('products', 'order_tracking.idProduct', '=', 'products.ID')
            ->select(
                'order_tracking.id as idCommande',
                'order_tracking.date',
                'order_tracking.status',
                'order_tracking.prix',
                'users.name as nomUtilisateur',
                'users.id as idUser',
                'products.image',
                'products.nom as nomProduit'
            )
            ->orderBy('order_tracking.date', 'desc')
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
