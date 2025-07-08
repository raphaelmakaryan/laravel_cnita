<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, "index"]);

Route::get(
    '/explore',
    [ProductController::class, "explore"]
);

Route::get(
    '/personalize',
    [PersonalizeController::class, "index"]
);

Route::get(
    '/product/{id}',
    [ProductController::class, "detail"]
);

Route::get(
    '/cart',
    [CartController::class, "index"]
);

Route::get(
    '/payment',
    function () {
        return view("payment");
    }
);

Route::get(
    '/dashboard',
    [DashboardController::class, "index"]
);

Route::get(
    '/modifyproduct/{id}',
    [DashboardController::class, "modify"]
);

Route::get(
    '/createproduct',
    [DashboardController::class, "create"]
);


Route::get(
    '/deleteproduct/{id}',
    [DashboardController::class, "delete"]
);
