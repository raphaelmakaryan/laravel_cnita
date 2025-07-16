@extends('layouts.miromiro')
@section('title', 'Crée un produit')

@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">Ajouter un produit</p>
            </div>
        </div>
        <div class="row mt-4">
            <!--   <form action="/backoffice/createproduct" method="post">-->
            <form action="" method="post" class="d-flex flex-row flex-wrap align-content-center align-items-center">
                @csrf
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 m-1">
                    <label for="nameProduct" class="form-label">Nom du nouveau produit</label>
                    <input type="text" class="form-control" id="nameProduct" minlength="5" maxlength="20"
                        placeholder="Nom du produit" required name="nameProduct">
                </div>
                <div class="col-12 col-lg-3 m-1">
                    <label for="imageProduct" class="form-label">Lien image du nouveau produit</label>
                    <input name="imageProduct" type="url" class="form-control" id="imageProduct" required
                        pattern="^(http|https)://.*" placeholder="URL">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 m-1">
                    <label for="priceProduct" class="form-label">Prix du nouveau produit</label>
                    <input name="priceProduct" type="number" class="form-control" id="priceProduct" required
                        placeholder="0" minlength="1" min="1">
                </div>
                <div class="col-12 col-lg-3 m-1">
                    <label for="descProduct" class="form-label">Description du nouveau produit</label>
                    <input type="text" class="form-control" id="descProduct" minlength="0" maxlength="20"
                        placeholder="Description du produit" name="descProduct">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 mt-2 mb-2">
                    <label for="genreProduct" class="form-label">Genre du nouveau produit</label>
                    <input type="text" class="form-control" id="genreProduct" minlength="5" maxlength="20"
                        placeholder="Nom du produit" required name="genreProduct">
                </div>
                <div class="col-12 mt-2 mb-2">
                    <label for="sizeProduct" class="form-label">Taille du nouveau produit</label>
                    <input type="text" class="form-control" id="sizeProduct" minlength="5" maxlength="20"
                        placeholder="Nom du produit" required name="sizeProduct">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-12 mt-2 mb-2">
                    <label for="formProduct" class="form-label">Forme du nouveau produit</label>
                    <input type="text" class="form-control" id="formProduct" minlength="5" maxlength="20"
                        placeholder="Nom du produit" required name="formProduct">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-12 mt-4 d-flex flex-column align-items-center justify-content-center">
                    <button type="submit" class="btn bouton_style bouton_noir bouton_fond_orange">Créer</button>
                </div>
            </form>
        </div>
    </div>

</section>

@stop