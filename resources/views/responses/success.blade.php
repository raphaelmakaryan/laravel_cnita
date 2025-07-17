@extends('layouts.miromiro')
<title>MiroMiro - Réussite !</title>

@section('content')
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row" id="">
            <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                <img src="{{ asset('assets/payment/validationPayment.png') }}" class="img-fluid" alt="...">
            </div>
            @if($texte)
                <div class="col-12">
                    <p class="fs-5 couleur_succes text-center">
                        {{$texte}}
                    </p>
                </div>
            @endif
        </div>
    </div>
</section>
@stop