<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return "Tout les produits";
});

Route::get('/product/{id}', function ($id) {
    return 'Fiche du produit ' .  $id;
});

Route::get('/cart', function () {
    return 'Le panier';
});