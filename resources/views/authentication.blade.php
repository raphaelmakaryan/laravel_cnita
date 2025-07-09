@extends('layouts.miromiro')

@section('content')
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 border border-black rounded mt-3 mb-3">
                <p class="fs-4 text-center mb-5 mt-5">CREER UN COMPTE</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" class="form-label" :value="__('Nom')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Mot de passe')" />
            
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" class="form-label" :value="__('Confirmation du mot de passe')" />
            
                        <x-text-input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Deja enregistre ?') }}
                        </a>
            
                        <x-primary-button class="ms-4 mb-2 btn bouton_style bouton_noir bouton_fond_orange">
                            {{ __("S'enregistrer") }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6 border border-black rounded mt-3 mb-3 ">
                <p class="fs-4 text-center mb-5 mt-5">SE CONNECTER</p>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                            autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
        
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Mot de passe')" />
            
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center form-label">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Souvenir de moi') }}</span>
                        </label>
                    </div>
            
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif
            
                        <x-primary-button class="ms-4 mb-2 btn bouton_style bouton_noir bouton_fond_orange">
                            {{ __('Se connecter') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop