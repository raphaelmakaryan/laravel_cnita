@extends('layouts.miromiro')

@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row" id="">
            <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                <img src="{{ asset('assets/payment/refusePayment.png') }}" class="img-fluid" alt="...">
            </div>
            <div class="col-12">
                <p class="fs-5 couleur_error text-center">
                    L'ajout du produit n'a pas pu marcher, une erreur est survenue !
                </p>
            </div>
        </div>
    </div>
</section>

@stop