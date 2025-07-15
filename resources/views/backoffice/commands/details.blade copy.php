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
                            <div class="col-4">
                                <img src="http://127.0.0.1:8000/assets/exemples/exempleDetail.png" alt=""
                                    class="img-fluid w-100">
                            </div>
                            <div class="col-4 d-flex flex-column aligns-items-start">
                                <p class="fs-6 mb-0 me-1">Nom de l'utilisateur : <span
                                        class="fw-bold">{{ $commande->nomUtilisateur }}</span> </p>
                                <p class="fs-6 mb-0 me-1">ID commande : <span
                                        class="fw-bold">{{ $commande->idCommande }}</span> </p>
                                <p class="fs-6 mb-0 me-1">Date : <span
                                        class="fw-bold">{{ \Carbon\Carbon::parse($commande->date)->format('d/m/Y') }}</span>
                                </p>
                            </div>
                            <div class="col-4 d-flex aligns-items-center flex-column justify-content-center">
                                <form action="/backoffice/updatecommand" method="post"
                                    class="d-flex aligns-items-center flex-column justify-content-center">
                                    @csrf
                                    <input type="hidden" value="{{ $commande->idUser }}" name="userId">
                                    <div>
                                        <select class="form-select" aria-label="" id="selectStatus" name="selectStatus">
                                            @foreach ($allStatus as $status)
                                                <option value="{{ $status->ID - 1}}" @if ($commande->status === $status->ID - 1)
                                                selected @endif>
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
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop