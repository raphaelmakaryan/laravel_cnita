<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

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
                    <a class="nav-link couleur_grise_900" href="/account">Compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link couleur_grise_900" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link couleur_grise_900" href="/dashboard">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>