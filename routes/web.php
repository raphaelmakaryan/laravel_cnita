<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonalizeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\APIController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\PaymentMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

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
Route::get(
    '/payment',
    [PaymentController::class, "indexPage"]
)->middleware(['auth', 'verified', PaymentMiddleware::class])->name('payment');
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
        '/account',
        [DashboardController::class, "indexPage"]
    )->name('account');

    Route::get(
        '/users',
        [DashboardController::class, "usersPage"]
    )->name('users');

    Route::post(
        '/users/update',
        [DashboardController::class, "usersUpdate"]
    );

    Route::get(
        '/graphs',
        [DashboardController::class, "graphPage"]
    )->name('graphs');

    Route::get(
        '/commands',
        [DashboardController::class, "commandsPage"]
    )->name('commands');


    Route::get(
        '/products/list',
        [DashboardController::class, "productsPage"]
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

    Route::post(
        '/updatecommand',
        [DashboardController::class, "commandsUpdate"]
    );
});
#endregion DASHBOARD ADMIN

#region CLIENT
Route::prefix('client')->middleware(['auth', 'verified', ClientMiddleware::class])->group(function () {
    Route::get(
        '/account',
        [ClientController::class, "indexPage"]
    )->middleware(['auth', 'verified', ClientMiddleware::class])->name('client.dashboard');

    Route::get(
        '/historic',
        [ClientController::class, "historicPage"]
    )->middleware(['auth', 'verified', ClientMiddleware::class])->name('client.historic');

    Route::get(
        '/details/{id}',
        [ClientController::class, "detailsPage"]
    )->middleware(['auth', 'verified', ClientMiddleware::class])->name('client.details');
});

#endregion CLIENT

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

#region API
Route::prefix('api')->group(function () {
    Route::get('/', [APIController::class, "indexPage"]);

    Route::get(
        '/product/all',
        [APIController::class, "allProduct"]
    );

    Route::get(
        '/product/{id}',
        [APIController::class, "oneProduct"]
    );

    Route::get(
        '/product/new/{nom}/{image}/{prix}',
        [APIController::class, "addProduct"]
    );

    Route::get(
        '/product/delete/{id}',
        [APIController::class, "deleteProduct"]
    );

    Route::get(
        '/product/edit/{id}/{nom}/{image}/{prix}',
        [APIController::class, "updateProduct"]
    );

    Route::post(
        '/payment/check',
        [PaymentController::class, "check"]
    )->middleware(['auth', 'verified', PaymentMiddleware::class]);


    Route::post(
        '/payment/add',
        [PaymentController::class, "addInformation"]
    )->middleware(['auth', 'verified', PaymentMiddleware::class]);

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

    Route::post(
        '/contact',
        function (Request $request) {
            Mail::to($request->input('emailUserContact'))->send(new Contact());
            return redirect("contact");
        }
    );
});
#endregion API

#region BACKUP
/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
#endregion BACKUP

require __DIR__ . '/auth.php';
