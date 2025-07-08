<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Exceptions\InvalidOrderException;
use Exception;

class DashboardController extends Controller
{
    public function indexPage()
    {
        $allProduct = Product::all();
        return view("dashboard.dashboard", data: ['produits' => $allProduct]);
    }

    public function createPage()
    {
        return view("dashboard.create.createProduct");
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

            return view("dashboard.create.successCreate");
        } catch (Exception $e) {
            return view("dashboard.create.errorCreate");
        }
    }

    public function errorCreatePage()
    {
        return view("dashboard.create.errorCreate");
    }

    public function successCreatePage()
    {
        return view("dashboard.create.successCreate");
    }

    public function deletePage($id)
    {
        $productDelete = Product::where("ID", "=", $id)->get();

        return view("dashboard.delete.deleteProduct", ["product" => $productDelete]);
    }

    public function deleteProduct($id)
    {
        try {
            $productDelete = Product::find($id);
            $productDelete->delete();
            return view("dashboard.delete.successDelete");
        } catch (Exception $e) {
            return view("dashboard.delete.errorDelete");
        }
    }

    public function errorDeletePage()
    {
        return view("dashboard.delete.errorDelete");
    }

    public function successDeletePage()
    {
        return view("dashboard.delete.successDelete");
    }

    public function modifyPage($id)
    {
        $productModify = Product::where("ID", "=", $id)->get();

        return view("dashboard.modifyProduct", ["product" => $productModify]);
    }
}
