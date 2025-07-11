<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\PaymentMiddleware;
use Illuminate\Http\Request;

#region HOME
Route::get('/', [HomeController::class, "indexPage"])->name('home');
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
)->name('cart');
#endregion CART

#region PAYMENT
Route::prefix('payment')->name('payment.')->middleware(['auth', 'verified', PaymentMiddleware::class])->group(function () {
    Route::get(
        '/payment',
        [PaymentController::class, "indexPage"]
    )->name('payment');


    Route::post(
        '/check',
        [PaymentController::class, "check"]
    );


    Route::post(
        '/add',
        [PaymentController::class, "addInformation"]
    );
});
#endregion PAYMENT

#region AUTHENTICATION
Route::get(
    '/authentication',
    function () {
        return view("authentication");
    }
)->name('authentication');
#endregion AUTHENTICATION

#region DASHBOARD ADMIN
Route::prefix('backoffice')->name('backoffice.')->middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get(
        '/products',
        [DashboardController::class, "indexPage"]
    )->name('products');

    Route::get(
        '/product/{id}/detail',
        [DashboardController::class, "detailPage"]
    );

    Route::get(
        '/product/{id}/edit',
        [DashboardController::class, "modifyPage"]
    );

    Route::post(
        '/modifyproduct',
        [DashboardController::class, "modifyProduct"]
    );

    Route::get(
        '/product/new',
        [DashboardController::class, "createPage"]
    );

    Route::post(
        '/createproduct',
        [DashboardController::class, "addingProduct"]
    );

    Route::get(
        '/delete/{id}',
        [DashboardController::class, "deletePage"]
    );

    Route::delete(
        '/products/{id}/delete',
        [DashboardController::class, "deleteProduct"]
    );
});
#endregion DASHBOARD ADMIN

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

#region CONTACT
Route::get('/contact', function () {
    return view("contact");
});

#endregion CONTACT

#region CREDITS
Route::get('/compliance', function () {
    return view("credits.compliance");
});

Route::get('/generalconditions', function () {
    return view("credits.generalconditions");
});

Route::get('/legalmentions', function () {
    return view("credits.legalmentions");
});

Route::get('/privacypolicy', function () {
    return view("credits.privacypolicy");
});
#endregion CREDITS

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