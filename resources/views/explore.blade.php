@extends('layouts.miromiro')
@section('title', "Explorer")
@section('content')


<section class="mt-5 mb-3" id="boutonFilter">
    <div class="container-fluid">
        <div class="row d-flex flex-column">
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="btn-group w-25">
                    <button type="button"
                        class="btn bouton_style bouton_noir bouton_fond_orange w-100 pe-none">FILTRER</button>
                    <button type="button"
                        class="btn bouton_style bouton_noir bouton_fond_orange dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" onclick="triNameExplore()">Triés par nom</a></li>
                        <li><a class="dropdown-item" onclick="triPrixCroissantExplore()">Triés par prix croissant</a></li>
                        <li><a class="dropdown-item" onclick="resetExploreOrder()">Aucun</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-2 mb-5" id="contentFilter">
    <div class="container-fluid">
        <div class="row" id="allProductExplore">
            @foreach ($produits as $produit)
                <div class="col-12 col-lg-3 d-flex flex-column align-items-center mb-2 mt-1 mt-lg-2">
                    <div class="card rounded" style="width: 18rem;">
                        <img src="{{ asset($produit->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $produit->prix }} €</h6>
                            <p class="card-text">
                                {{ $produit->description ?? 'Ces lunettes sont magnifique genre wahhhh suis jaloux de fou' }}
                            </p>
                            <div class="d-flex flex-row justify-content-end">
                                <a href="/product/{{ $produit->ID}}"
                                    class="btn bouton_style bouton_noir bouton_fond_orange w-25">VOIR</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@stop