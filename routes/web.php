<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Http\Request;

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
)->middleware(['auth', 'verified', ClientMiddleware::class])->name('payment');
#endregion PAYMENT

#region AUTHENTICATION
Route::get(
    '/authentication',
    function () {
        return view("authentication");
    }
)->name('authentication');;
#endregion AUTHENTICATION

#region DASHBOARD ADMIN
Route::get(
    '/backoffice/products',
    [DashboardController::class, "indexPage"]
)->middleware(['auth', 'verified', AdminMiddleware::class])->name('backoffice.products');

Route::get(
    '/backoffice/product/{id}/detail',
    [DashboardController::class, "detailPage"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);
#endregion DASHBOARD ADMIN

#region MODIFY
Route::get(
    '/backoffice/product/{id}/edit',
    [DashboardController::class, "modifyPage"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);

Route::post(
    '/backoffice/modifyproduct',
    [DashboardController::class, "modifyProduct"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);
#endregion MODIFY

#region CREATE
Route::get(
    '/backoffice/product/new',
    [DashboardController::class, "createPage"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);

Route::post(
    '/backoffice/createproduct',
    [DashboardController::class, "addingProduct"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);
#endregion CREATE

#region DELETE
Route::get(
    '/backoffice/delete/{id}',
    [DashboardController::class, "deletePage"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);

Route::delete(
    '/backoffice/products/{id}/delete',
    [DashboardController::class, "deleteProduct"]
)->middleware(['auth', 'verified', AdminMiddleware::class]);
#endregion DELETE

#region CLIENT
Route::get(
    '/account',
    [ClientController::class, "indexPage"]
)->middleware(['auth', 'verified', ClientMiddleware::class])->name('client.dashboard');
#endregion CLIENT

#region CART CONNECTED
Route::post(
    '/product/addoncart',
    [CartController::class, "addToCart"]
);

Route::post(
    '/product/deleteoncart',
    [CartController::class, "deleteToCart"]
);

Route::post(
    '/product/verificationcart',
    [CartController::class, "addLocalProducts"]
);
#endregion CART CONNECTED

#region BACKUP
/*

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
#endregion BACKUP

require __DIR__ . '/auth.php';
