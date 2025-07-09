@extends('layouts.miromiro')

@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">Ajouter un produit</p>
            </div>
        </div>
        <div class="row mt-4">
            <form action="/createproduct" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="col-12 mt-1 mb-1">
                    <label for="nameProduct" class="form-label">Nom du nouveau produit</label>
                    <input type="text" class="form-control" id="nameProduct" max="20" placeholder="Nom du produit"
                        required name="nameProduct">
                </div>
                <div class="col-12 mt-1 mb-1">
                    <label for="imageProduct" class="form-label">Lien image du nouveau produit</label>
                    <input name="imageProduct" type="url" class="form-control" id="imageProduct" required pattern="^(http|https)://.*" placeholder="URL">
                </div>
                <div class="col-12 mt-1 mb-2">
                    <label for="priceProduct" class="form-label">Prix du nouveau produit</label>
                    <input name="priceProduct" type="number" class="form-control" id="priceProduct" required placeholder="0" min="1">
                </div>
                <div class="col-12 mt-4 d-flex flex-column align-items-center justify-content-center">
                    <button type="submit" class="btn bouton_style bouton_noir bouton_fond_orange">Créer</button>
                </div>
            </form>
        </div>
    </div>

</section>

@stop