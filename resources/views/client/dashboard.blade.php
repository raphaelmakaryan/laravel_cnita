@extends('layouts.miromiro') 
@section('content')

@auth
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="fs-4 text-center">Bienvenue <span class="fw-bold"> {{ Auth::user()->name }} </span>sur ton
                        compte !</p>
                </div>
                <div class="col-12">
                    <p>Ton email : {{ Auth::user()->email }}</p>
                    <p>Ton rôle : {{ Auth::user()->permission == 1 ? 'Admin' : 'Client' }}</p>
                </div>
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