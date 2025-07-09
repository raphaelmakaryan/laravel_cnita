<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Middleware\Authenticate;

#region HOME
Route::get('/', [HomeController::class, "indexPage"]);
#endregion HOME

#region EXPLORE
Route::get(
    '/explore',
    [ProductController::class, "explorePage"]
);
#endregion EXPLORE

#region PERSO
Route::get(
    '/personalize',
    [PersonalizeController::class, "indexPage"]
);
#endregion PERSO

#region PRODUCT DETAIL
Route::get(
    '/product/{id}',
    [ProductController::class, "detailPage"]
);
#endregion PRODUCT DETAIL

#region CART
Route::get(
    '/cart',
    [CartController::class, "indexPage"]
);
#endregion CART

#region PAYMENT
Route::get(
    '/payment',
    function () {
        return view("payment");
    }
);
#endregion PAYMENT

#region DASHBOARD
Route::get(
    '/backoffice/products',
    [DashboardController::class, "indexPage"]
)->middleware('auth');

Route::get(
    '/backoffice/product/{id}/detail',
    [DashboardController::class, "detailPage"]
)->middleware('auth');;
#endregion DASHBOARD

#region MODIFY
Route::get(
    '/backoffice/product/{id}/edit',
    [DashboardController::class, "modifyPage"]
)->middleware('auth');;

Route::post(
    '/backoffice/modifyproduct',
    [DashboardController::class, "modifyProduct"]
)->middleware('auth');;
#endregion MODIFY

#region CREATE
Route::get(
    '/backoffice/product/new',
    [DashboardController::class, "createPage"]
)->middleware('auth');;

Route::post(
    '/backoffice/createproduct',
    [DashboardController::class, "addingProduct"]
)->middleware('auth');;
#endregion CREATE

#region DELETE
Route::get(
    '/backoffice/delete/{id}',
    [DashboardController::class, "deletePage"]
)->middleware('auth');;

Route::delete(
    '/backoffice/products/{id}/delete',
    [DashboardController::class, "deleteProduct"]
)->middleware('auth');;
#endregion DELETE