@extends('layouts.miromiro')
<title>MiroMiro - Modification d'un produit</title>
@section('content')

@if ($product)
    @foreach ($product as $produit)
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="fs-4 text-center">Modifier <span class="tw-bold">{{$produit->nom}}</span></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <form action="/backoffice/modifyproduct" method="post"
                        class="d-flex flex-row flex-wrap align-content-center align-items-center">
                        @csrf
                        <div class="col-lg-3"></div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="nameProduct" class="form-label required">Nouveau nom du produit</label>
                            <input type="text" class="form-control" id="nameProduct" minlength="5" maxlength="20"
                                placeholder="Nom du produit" required name="nameProduct" value="{{ $produit->nom }}">
                        </div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="priceProduct" class="form-label required">Nouveau prix du produit</label>
                            <input name="priceProduct" type="number" class="form-control" id="priceProduct" required
                                placeholder="1" minlength="1" min="1" value="{{ $produit->prix }}">
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="imageProduct" class="form-label required">Nouveau lien image du produit</label>
                            <input name="imageProduct" type="url" class="form-control" id="imageProduct" required
                                pattern="^(http|https)://.*" placeholder="URL" value="{{ $produit->image }}">
                        </div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="sizeProduct" class="form-label">Nouvelle taille du produit</label>
                            <select class="form-select" id="sizeProduct" name="sizeProduct">
                                <option disabled {{ !$produit->taille ? 'selected' : '' }}>Taille</option>
                                <option value="Petit" {{ $produit->taille === 'Petit' ? 'selected' : '' }}>Petit</option>
                                <option value="Moyen" {{ $produit->taille === 'Moyen' ? 'selected' : '' }}>Moyen</option>
                                <option value="Grand" {{ $produit->taille === 'Grand' ? 'selected' : '' }}>Grand</option>
                            </select>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="genreProduct" class="form-label">Nouveau genre du produit</label>
                            <select class="form-select" id="genreProduct" name="genreProduct">
                                <option disabled {{ !$produit->genre ? 'selected' : '' }}>Genre</option>
                                <option value="Homme" {{ $produit->genre === 'Homme' ? 'selected' : '' }}>Homme</option>
                                <option value="Femme" {{ $produit->genre === 'Femme' ? 'selected' : '' }}>Femme</option>
                                <option value="Unisexe" {{ $produit->genre === 'Unisexe' ? 'selected' : '' }}>Unisexe</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                            <label for="formProduct" class="form-label">Nouvelle forme du produit</label>
                            <select class="form-select" id="formProduct" name="formProduct">
                                <option disabled {{ !$produit->forme ? 'selected' : '' }}>Forme</option>
                                <option value="Rondes" {{ $produit->forme === 'Rondes' ? 'selected' : '' }}>Rondes</option>
                                <option value="Carré" {{ $produit->forme === 'Carré' ? 'selected' : '' }}>Carré</option>
                                <option value="Papillon" {{ $produit->forme === 'Papillon' ? 'selected' : '' }}>Papillon</option>
                            </select>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-12 col-lg-6 m-1">
                            <label for="descProduct" class="form-label">Nouvelle description du produit</label>
                            <input type="text" class="form-control" id="descProduct" minlength="0" maxlength="20"
                                placeholder="Description du produit" name="descProduct" value="{{ $produit->description }}">
                        </div>
                        <div class="col-lg-3"></div>
                        <input type="hidden" id="idProduct" name="idProduct" value="{{ $produit->ID }}">
                        <div class="col-12 mt-4 d-flex flex-column align-items-center justify-content-center">
                            <button type="submit" class="btn bouton_style bouton_noir bouton_fond_orange">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endforeach
@endif
@stop