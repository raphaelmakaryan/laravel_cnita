@extends('layouts.miromiro') 
@section('title', "Compte")
@section('content')

@auth
    <section class="mt-5 mb-5" id="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="fs-3 text-center">Compte</p>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <img src="" alt="" class="img-fluid rounded-circle">
                </div>
                <div class="col-12">
                    <p class="fs-4 text-center">Bienvenue sur ton compte <span class="fw-bold">{{Auth::user()->name;}}</span> !</p>
                </div>
                <div class="col-12">
                    <p class="fs-4 text-center">Ton rôle : <span class="fw-bold">{{ Auth::user()->permission == 1 ? 'Admin' : 'Client' }}</span></p>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-lg-4"></div>
                <div class="col-12 col-lg-4">
                    <a href="{{ route('client.historic') }}" class="btn bouton_style bouton_noir bouton_fond_orange">Historique</a>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn bouton_style background_couleur_error w-100" :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Se deconnecter') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endauth

@stop