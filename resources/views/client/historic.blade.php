@extends('layouts.miromiro')
<title>MiroMiro - Historique</title>
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
                                    <th scope="col">ID de la commande</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historic as $historicUser)
                                    <tr>
                                        <td>#{{ $historicUser['idOrder'] }}</td>
                                        <td>{{ $historicUser['prix'] }} €</td>
                                        <td>{{ $historicUser['date'] }}</td>
                                        <td>
                                            @if ($historicUser['status'] === 0)
                                                <span class="badge rounded-pill status_attente w-100">Attente de traitement</span>
                                            @elseif ($historicUser['status'] === 1)
                                                <span class="badge rounded-pill status_preparation w-100">Préparation</span>
                                            @elseif ($historicUser['status'] === 2)
                                                <span class="badge rounded-pill status_livraison w-100">En cours de livraison</span>
                                            @elseif ($historicUser['status'] === 3)
                                                <span class="badge rounded-pill status_retard w-100">En retard</span>
                                            @elseif ($historicUser['status'] === 4)
                                                <span class="badge rounded-pill status_livre w-100">Livré</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('client.details', $historicUser['idOrder']) }}"
                                                class="btn bouton_style bouton_orange bouton_fond_noir">
                                                Voir
                                            </a>
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