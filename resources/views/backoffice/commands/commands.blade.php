@extends('layouts.miromiro')
@section('title', "Toute les commandes")
@section('content')
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">
                    Commandes
                </p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            @foreach ($commandes as $commande)
                <div class="col-4 w-50">
                    <div class="container">
                        <div class="row background_couleur_principale_400 rounded mb-2 mt-2 p-2">
                            <div class="col-3 d-flex flex-column aligns-items-start">
                                <p class="fs-6 mb-0 me-1">Utilisateur : <span
                                        class="fw-bold">{{ $commande->nomUtilisateur }}</span> </p>
                            </div>
                            <div class="col-3 d-flex aligns-items-center flex-column justify-content-center">
                                <p class="fs-6 mb-0 me-1">ID commande : <span
                                        class="fw-bold">{{ $commande->idOrder }}</span> </p>
                            </div>
                            <div class="col-3 d-flex aligns-items-center flex-column justify-content-center">
                                <p class="fs-6 mb-0 me-1">Date : <span
                                        class="fw-bold">{{ \Carbon\Carbon::parse($commande->date)->format('d/m/Y') }}</span>
                                </p>
                            </div>
                            <div class="col-3 d-flex aligns-items-center flex-column justify-content-center">
                                <a href="/backoffice/commands/details/{{ $commande->idOrder }}" class="btn bouton_style bouton_noir bouton_fond_blanc">Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop