<?php
use Illuminate\Support\Facades\Auth;
?>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg background_couleur_principale_400">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/logos/logoNoir.png') }}" alt="Bootstrap" width="100"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link couleur_grise_900" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link couleur_grise_900" href="/explore">Explorer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link couleur_grise_900" href="/personalize">Personnaliser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link couleur_grise_900" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link couleur_grise_900" href="/cart">Panier</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link couleur_grise_900" href="/backoffice/products">Compte</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link couleur_grise_900" href="/authentication">Page de connexion</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="mt-7">
        <div class="container-fluid">
            <div class="row">
                <img src="{{ asset('assets/separationHAUT.png') }}" alt="" class="img-fluid separations">
            </div>
            <div class="row background_couleur_principale_400">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('assets/logos/logoBlanc.png') }}" alt="" class="img-fluid w-25 logoFooter">
                </div>
                <div
                    class="d-flex flex-column flex-lg-row align-items-center mt-5 mt-lg-2 justify-content-lg-evenly mb-2">
                    <a href="/" class="couleur_grise_900 fs-6 p-1">Acceuil</a>
                    <a href="/explore" class="couleur_grise_900 fs-6 p-1">Explorer</a>
                    <a href="/authentication" class="couleur_grise_900 fs-6 p-1">Compte</a>
                    <a href="/personalize" class="couleur_grise_900 fs-6 p-1">Personnaliser</a>
                </div>
                <div
                    class="d-flex flex-column flex-lg-row align-items-center mt-5 mt-lg-2 mb-2 justify-content-lg-evenly">
                    <a href="/legalmentions"
                        class="couleur_grise_900 fs-6 p-1 p-lg-0 ms-lg-1 me-lg-1 order-lg-2">Mentions
                        légales</a>
                    <a href="/generalconditions"
                        class="couleur_grise_900 fs-6 p-1 p-lg-0 ms-lg-1 me-lg-1 order-lg-3">Conditions générales de
                        vente</a>
                    <a href="/compliance"
                        class="couleur_grise_900 fs-6 p-1 p-lg-0 ms-lg-1 me-lg-1 order-lg-4">Conformité</a>
                    <a href="/privacypolicy"
                        class="couleur_grise_900 fs-6 p-1 p-lg-0 ms-lg-1 me-lg-1 order-lg-5">Politique
                        de confidentialité</a>
                    <p class="couleur_grise_900 fs-6 p-1 p-lg-0 ms-lg-1 me-lg-1 m-0 order-lg-1">© 2025 Miro-Miro. Tous
                        droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script src="{{ asset('index.js') }}"></script>
</body>

</html>