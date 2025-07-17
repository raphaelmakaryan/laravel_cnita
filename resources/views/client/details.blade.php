@extends('layouts.miromiro')
@section('title', "Détails")
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
        @if ($details)
                <div class="row mt-4">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td class="w-25"><img src="{{ $detail->product->image }}" class="img-fluid w-100"
                                                alt=""></td>
                                        <td>{{ $detail->product->nom }}</td>
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