<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;

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
    '/dashboard',
    [DashboardController::class, "indexPage"]
);
#endregion DASHBOARD

#region MODIFY
Route::get(
    '/modify/{id}',
    [DashboardController::class, "modifyPage"]
);
#endregion MODIFY

#region CREATE
Route::get(
    '/create',
    [DashboardController::class, "createPage"]
);

Route::post(
    '/createproduct',
    [DashboardController::class, "addingProduct"]
);

Route::get(
    '/errorcreate',
    [DashboardController::class, "errorCreatePage"]
);

Route::get(
    '/successcreate',
    [DashboardController::class, "successCreatePage"]
);
#endregion CREATE

#region DELETE
Route::get(
    '/delete/{id}',
    [DashboardController::class, "deletePage"]
);

Route::post(
    '/deleteproduct/{id}',
    [DashboardController::class, "deleteProduct"]
);
#endregion DELETE