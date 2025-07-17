@extends('layouts.miromiro')
@section('title', "Détail de la commande")
@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">
                    Détail de la commande
                </p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-12 col-lg-6 mt-2">
                <div class="container">
                    <div class="row background_couleur_principale_400 rounded">
                        @foreach ($commandes as $commande)
                            <div class="col-12 border border-black rounded">
                                <div class="container">
                                    <div class="row mb-3 mt-3">
                                        <div class="col-6 col-lg-3">
                                            <img src="{{ $commande->product->image }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-6 col-lg-9 d-flex flex-column aligns-items-start">
                                            <p class="fs-6">Nom :
                                                {{ $commande->product->nom }}
                                            </p>
                                            <p class="fs-6"> Quantité :
                                                {{ $commande->quantite }}
                                            </p>
                                            <p class="fs-6"> Prix a l'individuel :
                                                {{ $commande->product->prix }} €
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2 background_couleur_principale_400 rounded border border-black">
                <div class="mt-3">
                    <p class="fs-5">
                        Informations de la commande
                    </p>
                    <p class="fs-6">
                        Prix total de la commande : 
                        {{ $commande->prix }} €
                    </p>
                    <hr>
                </div>
                <form action="/backoffice/updatecommand" method="post"
                    class="d-flex aligns-items-center flex-column justify-content-center">
                    @csrf
                    <input type="hidden" value="{{ $commande->idUser }}" name="userId">
                    <div class="mt-1">
                        <p class="fs-5">
                            Mettre a jour la commande ?
                        </p>
                        <select class="form-select" aria-label="" id="selectStatus" name="selectStatus">
                            @foreach ($allStatus as $status)
                                <option value="{{ $status->ID - 1}}" @if ($commande->status === $status->ID - 1) selected
                                @endif>
                                    {{ $status->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn bouton_style bouton_noir bouton_fond_blanc mt-3" type="submit">
                        Mettre à jour
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@stop