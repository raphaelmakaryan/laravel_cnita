@extends('layouts.miromiro')
@section('title', "Historique")
@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">
                    Historique
                </p>
            </div>
        </div>
        @if ($historic)
                <div class="row mt-4">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historic as $historicUser)
                                    <tr>
                                        <td class="w-25"><img src="{{ $historicUser->imageProduit }}" class="img-fluid w-100"
                                                alt=""></td>
                                        <td>{{ $historicUser->nomProduit }}</td>
                                        <td>{{ $historicUser->prixCommande }}</td>
                                        <td>{{ $historicUser->dateCommande }}</td>
                                        <td>
                                            @if ($historicUser->statutCommande === 1)
                                                <span
                                                    class="badge rounded-pill status_preparation w-100">Préparation</span>
                                            @elseif ($historicUser->statutCommande === 2)
                                                <span
                                                    class="badge rounded-pill status_livraison  w-100">En cours de livraison</span>
                                            @elseif ($historicUser->statutCommande === 3)
                                                <span
                                                    class="badge rounded-pill status_retard w-100">En retard</span>
                                            @elseif ($historicUser->statutCommande === 4)
                                                <span
                                                    class="badge rounded-pill status_livre w-100">Livré</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill status_attente w-100">Attente de traitement</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
</section>

@stop