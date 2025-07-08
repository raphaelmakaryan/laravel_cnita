<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PersonalizeController;

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
