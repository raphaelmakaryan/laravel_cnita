@extends('layouts.miromiro')
<title>MiroMiro - Détails</title>
@section('content')

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">
                    Détail
                </p>
            </div>
        </div>
        @if ($details || $detailsPerso)
                <div class="row mt-4">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    @if (count($detailsPerso) >= 1)
                                        <th scope="col">Détails</th>
                                    @endif
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td class="w-25"><img src="{{ $detail->product->image }}" class="img-fluid w-100" alt="">
                                        </td>
                                        <td>{{ $detail->product->nom }}</td>
                                        @if (count($detailsPerso) >= 1)
                                            <td>X</td>
                                        @endif
                                        <td>{{ $detail->product->prix }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($detailsPerso as $detail)
                                    <tr>
                                        <td class="w-25"><img
                                                src="<?php        echo asset('assets/personalize/frames/' . $detail->product->monture . '.jpg'); ?>"
                                                class="img-fluid w-100" alt=""></td>
                                        <td>Lunette personaliser</td>
                                        <td>
                                            <ul>
                                                <li>Monture : <span class="text-decoration-underline">
                                                        {{ $detail->product->monture }}</span></li>
                                                <li>Couleur monture : <span class="text-decoration-underline">
                                                        {{ $detail->product->couleurmonture }}</span></li>
                                                <li>Verre : <span class="text-decoration-underline">
                                                        {{ $detail->product->verre }}</span></li>
                                                <li>Couleur verre : <span class="text-decoration-underline">
                                                        {{ $detail->product->couleurverre }}</span></li>
                                                <li>Boîte : <span
                                                        class="text-decoration-underline">{{ $detail->product->boite }}</span></li>
                                                <li>Couleur boîte : <span
                                                        class="text-decoration-underline">{{ $detail->product->couleurboite }}</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{ $detail->product->prix }}</td>
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