@extends('layouts.miromiro')
@section('title', "Suppresion d'un produit")
@section('content')

@if ($product)
    @foreach ($product as $produit)
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="fs-3 text-center"> Voulez-vous vraiment supprimer <span
                                class="fw-bold">{{$produit->nom}}</span> ?</p>
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-6">
                        <div class="mt-1 mb-1 container">
                            <div class="row border">
                                <div class="col-6 d-flex">
                                    <img src="{{ asset($produit->image) }}" class="img-fluid w-100" alt="...">
                                </div>
                                <div class="col-6 d-flex flex-column align-items-start">
                                    <p class="fs-5 mt-1">{{ $produit->nom }}</p>
                                    <p class="fs-6">{{ $produit->prix }} €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row mt-5 d-flex flex-row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-6 col-lg-3 d-flex flex-column align-items-center justify-content-center">
                        <a href="{{ route('backoffice.account') }}" class="btn bouton_style background_couleur_error w-75">NON</a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <form action="/backoffice/products/{{ $produit->ID }}/delete" method="POST"
                            class="w-100 p-0 m-0 d-flex flex-column align-items-center justify-content-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bouton_style background_couleur_succes w-75" id="">OUI</button>
                        </form>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif

@stop