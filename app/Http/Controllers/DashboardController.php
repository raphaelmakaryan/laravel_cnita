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
}
