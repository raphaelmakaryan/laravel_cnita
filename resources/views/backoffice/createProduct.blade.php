@extends('layouts.miromiro')
<title>MiroMiro - Crée un produit</title>

@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">Ajouter un produit</p>
            </div>
        </div>
        <div class="row mt-4">
            <form action="/backoffice/createproduct" method="post"
                class="d-flex flex-row flex-wrap align-content-center align-items-center">
                @csrf
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="nameProduct" class="form-label required">Nom du nouveau produit</label>
                    <input type="text" class="form-control" id="nameProduct" minlength="5" maxlength="20"
                        placeholder="Nom du produit" required name="nameProduct">
                </div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="priceProduct" class="form-label required">Prix du nouveau produit</label>
                    <input name="priceProduct" type="number" class="form-control" id="priceProduct" required
                        placeholder="1" value="1" minlength="1" min="1">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="imageProduct" class="form-label required">Lien image du nouveau produit</label>
                    <input name="imageProduct" type="url" class="form-control" id="imageProduct" required
                        pattern="^(http|https)://.*" placeholder="URL">
                </div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="sizeProduct" class="form-label">Taille du nouveau produit</label>
                    <select class="form-select" id="sizeProduct" name="sizeProduct">
                        <option selected>Taille</option>
                        <option value="Petit">Petit</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Grand">Grand</option>
                    </select>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="genreProduct" class="form-label">Genre du nouveau produit</label>
                    <select class="form-select" id="genreProduct" name="genreProduct">
                        <option selected>Genre</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Unisexe">Unisexe</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 m-1 mt-2 mb-2">
                    <label for="formProduct" class="form-label">Forme du nouveau produit</label>
                    <select class="form-select" id="formProduct" name="formProduct">
                        <option selected>Forme</option>
                        <option value="Rondes">Rondes</option>
                        <option value="Carré">Carré</option>
                        <option value="Papillon">Papillon</option>
                    </select>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-6 m-1">
                    <label for="descProduct" class="form-label">Description du nouveau produit</label>
                    <input type="text" class="form-control" id="descProduct" minlength="0" maxlength="20"
                        placeholder="Description du produit" name="descProduct">
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