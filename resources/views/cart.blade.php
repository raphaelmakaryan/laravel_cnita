@extends('layouts.miromiro')
@section('title', "Panier")@endsection
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
            @if (Auth::check() && $products && count($products) > 0)
                <div class="col-12 col-lg-3 mt-3 mb-3">
                    @foreach ($products as $produits)
                        <div class="mt-1 mb-1">
                            <div class="container">
                                <div class="row border">
                                    <div class="col-4 d-flex">
                                        <img src="{{ $produits->image }}" class="img-fluid w-100" alt="...">
                                    </div>
                                    <div class="col-4 d-flex flex-column align-items-start">
                                        <p class="fs-5 mt-1">{{ $produits->nom }}</p>
                                        <p class="fs-6"><span class="priceForCalculate">{{ $produits->prix }}</span> €</p>
                                    </div>
                                    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
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
            @if (Auth::check() && $products && count($products) > 0)
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="/payment" class="btn bouton_style bouton_noir bouton_fond_orange">PAYER</a>
                </div>
            @elseif  (Auth::check() && $products && count($products) == 0)
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="/authentication" class="btn bouton_style bouton_noir bouton_fond_orange disabled">AUCUN
                        PRODUIT</a>
                </div>
            @else
                <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                    <a href="/authentication" class="btn bouton_style bouton_noir bouton_fond_orange">SE CONNECTER POUR
                        PAYER</a>
                </div>
            @endif
        </div>
    </div>
</section>


<script>
    let calculate = true
    setInterval(() => {
        if (calculate === true) {
            const allPrice = document.getElementsByClassName("priceForCalculate");
            const totalPrice = document.getElementById("totalPrice");
            let sum = 0;
            for (let index = 0; index < allPrice.length; index++) {
                sum = sum + parseInt(allPrice[index].innerText)
            }
            totalPrice.innerText = sum.toFixed(2);
            calculate = false;
        }
    }, 1000);

</script>

@stop