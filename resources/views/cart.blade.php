@extends('layouts.miromiro')
<title>MiroMiro - Panier</title>

@section('content')
<?php    
$index = 0
?>

<section class="mt-2 mb-5" id="cartDiv">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <p class="fs-2 text-center">Mon panier</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            </div>
            @if (Auth::check() && $cartUsers && count($cartUsers) > 0)
                <div class="col-12 col-lg-3 mt-3 mb-3">
                    @foreach ($cartUsers as $produits)
                        <div class="mt-1 mb-1">
                            <div class="container">
                                <div class="row border">
                                    <div class="col-3 d-flex">
                                        <img src="{{ $produits->product->image }}" class="img-fluid w-100" alt="...">
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-start">
                                        <p class="fs-5 mt-1">{{ $produits->product->nom }}</p>
                                        <p class="fs-6"><span class="priceForCalculate">{{ $produits->product->prix }}</span> €
                                        </p>
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                                        <form action="/api/cart/quantity" method="post">
                                            @csrf
                                            <label for="quantityCart" class="form-label">Quantité</label>
                                            <input type="number" class="form-control quantityForCalculate" name="quantityCart" min="1" max="10"
                                                id="quantityCart" value="{{ $produits->quantite }}">
                                            <input type="hidden" name="idProduct" id="idProduct"
                                                value="{{ $produits->product->ID }}">
                                            <button type="submit"
                                                class="btn bouton_style bouton_orange bouton_fond_blanc p-1 mt-1">Mettre a jour
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                        <button class="btn bouton_style bouton_orange bouton_fond_blanc"
                                            onclick="removeFromCart('{{ $produits->ID }}', true)">
                                            <img src="{{ asset('assets/dashboard/delete.png') }}" class="img-fluid" alt="..."
                                                width="25">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-12 col-lg-3 mt-3 mb-3" id="cartProduct">
                    <p class="fs-6 text-center">
                        Aucun produit
                    </p>
                </div>
            @endif
            <div class="col-12 col-lg-3 mt-3 mb-3">
                <div class="container">
                    <div class="row">
                        <div
                            class="background_couleur_grise_900 col-12 rounded d-flex flex-row justify-content-end p-2">
                            <p class="fs-6 couleur_grise_100 text-center m-0">TOTAL <span id="totalPrice"></span> €</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
            @if (Auth::check() && $cartUsers && count($cartUsers) > 0)
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="{{ route('payment') }}" class="btn bouton_style bouton_noir bouton_fond_orange">PAYER</a>
                </div>
            @elseif  (Auth::check() && $cartUsers && count($cartUsers) == 0)
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="{{ route('authentication') }}" class="btn bouton_style bouton_noir bouton_fond_orange">AUCUN
                        PRODUIT</a>
                </div>
            @else
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="{{ route('authentication') }}" class="btn bouton_style bouton_noir bouton_fond_orange">SE CONNECTER POUR
                        PAYER</a>
                </div>
            @endif
        </div>
    </div>
</section>


<script>
    function updateTotalPrice() {
        const allPrice = document.getElementsByClassName("priceForCalculate");
        const allQuantities = document.getElementsByClassName("quantityForCalculate");
        const totalPrice = document.getElementById("totalPrice");
        let sum = 0;

        for (let index = 0; index < allPrice.length; index++) {
            const price = parseFloat(allPrice[index].innerText);
            const quantity = parseInt(allQuantities[index].value);
            sum += price * quantity;
        }

        totalPrice.innerText = sum.toFixed(2);
    }

    window.addEventListener('DOMContentLoaded', () => {
        const quantityInputs = document.getElementsByClassName("quantityForCalculate");
        for (let input of quantityInputs) {
            input.addEventListener("input", updateTotalPrice);
        }

        updateTotalPrice();
    });
</script>

@stop