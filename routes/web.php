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
    '/backoffice/products',
    [DashboardController::class, "indexPage"]
);
#endregion DASHBOARD

#region MODIFY
Route::get(
    '/backoffice/modify/{id}',
    [DashboardController::class, "modifyPage"]
);
#endregion MODIFY

#region CREATE
Route::get(
    '/backoffice/create',
    [DashboardController::class, "createPage"]
);

Route::post(
    '/backoffice/createproduct',
    [DashboardController::class, "addingProduct"]
);

Route::get(
    '/backoffice/errorcreate',
    [DashboardController::class, "errorCreatePage"]
);

Route::get(
    '/backoffice/successcreate',
    [DashboardController::class, "successCreatePage"]
);
#endregion CREATE

#region DELETE
Route::get(
    '/backoffice/delete/{id}',
    [DashboardController::class, "deletePage"]
);

Route::post(
    '/backoffice/deleteproduct/{id}',
    [DashboardController::class, "deleteProduct"]
);
#endregion DELETE