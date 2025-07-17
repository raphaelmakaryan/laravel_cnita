@extends('layouts.miromiro')
@section('content')
<?php
use App\Http\Controllers\CartController;

?>

<section class="mt-5 mb-5" id="detailProduct">
    <div class="container">
        @if ($product)
            @foreach ($product as $aProduct)
                <title>MiroMiro - "Détail de {{ $aProduct->nom }}"</title>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div id="carouselExample" class="carousel slide">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img id="imageProductDetail" src="{{ asset($aProduct->image) }}"
                                                    class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset($aProduct->image) }}" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset($aProduct->image) }}" class="d-block w-100">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <div class="row">
                            <div class="col-12 d-flex flex-column align-items-start mt-1 ms-1">
                                <p class="fs-5" id="nameProductDetail">{{ $aProduct->nom }}</p>
                                <p class="fs-6">{{ $aProduct->description}}</p>
                                <p class="fs-6"><span id="prixProductDetail">{{ $aProduct->prix}}</span> €</p>
                                <input type="hidden" id="idProductDetail" value="{{ $aProduct->ID }}">
                            </div>
                            <div class="col-12">
                                @if (Auth::check())
                                    <button onclick="addOnCart(true)" class="btn bouton_style bouton_noir bouton_fond_orange w-100"
                                        id="buttonAddCart">PANIER</button>
                                @else
                                    <button onclick="addOnCart(false)" class="btn bouton_style bouton_noir bouton_fond_orange w-100"
                                        id="buttonAddCart">PANIER</button>
                                @endif
                            </div>
                            <div class="col-12 mt-4 mb-2">
                                <hr>
                            </div>
                            <div class="col-12">
                                <p class="fs-6">Informations</p>
                            </div>
                            <div class="col-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="fs-6 fw-bold">Genre</p>
                                        </div>
                                        <div class="col-6" id="genderGlass">
                                            <p class="fs-6">{{ $aProduct->genre }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="fs-6 fw-bold">Taille</p>
                                        </div>
                                        <div class="col-6" id="tailleGlass">
                                            <p class="fs-6">{{ $aProduct->taille }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="fs-6 fw-bold">Forme</p>
                                        </div>
                                        <div class="col-6" id="formeGlass">
                                            <p class="fs-6">{{ $aProduct->forme }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
@stop