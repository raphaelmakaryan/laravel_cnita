@extends('layouts.miromiro')

@section('content')
<header class="mt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('assets/separationHAUT.png') }}" alt="" class="img-fluid separations">
        </div>
        <div class="row background_couleur_principale_400">
            <div class="col-12 p-0 d-flex flex-column align-items-center">
                <div class="z-3 position-absolute d-flex align-items-center flex-column" id="heroItems">
                    <p class="couleur_grise_100 text-center">MIRO MIRO propose un large
                        choix de lunettes photochromiques, du design à la vente, incluant des
                        modèles personnalisés.</p>
                    <a href="/explore" class="btn bouton_style bouton_noir">EXPLORER</a>
                </div>
                <img src="{{ asset('assets/home/hero.png') }}" alt="" id="heroImg" class="img-fluid w-100">
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('assets/separationBAS.png') }}" alt="" class="img-fluid separations">
        </div>
    </div>
</header>

<section class="mt-5 mb-5 rounded" id="divProduitsTendances">
    <div class="container">
        <div class="row">
            <p class="fs-2 text-center couleur_grise_700">Nos produits tendances</p>
        </div>
        <div class="row mt-4">
            @foreach ($produits as $produit)
                <div class="col-12 col-md-4 col-lg-4 p-0 p-lg-1 mb-2 mt-2">
                    <div class="container-fluid">
                        <div
                            class="row flex-md-column flex-lg-column background_couleur_principale_400 d-flex align-items-center rounded">
                            <div class="col-1 p-0 w-0"></div>
                            <div class="col-3 col-sm-3 col-md-12 col-lg-12 p-0">
                                <img src="{{ asset($produit->image ?? 'assets/exemples/exempleProduitsTendance.png') }}"
                                    alt="" class="img-fluid w-100 rounded">
                            </div>
                            <div
                                class="col-4 col-sm-4 col-md-12 col-lg-12 ps-3 ps-lg-2 d-flex align-items-start flex-column mt-lg-1">
                                <p class="fs-6">{{ $produit->nom ?? 'Nom des lunettes ici la' }}</p>
                                <p class="fs-6">{{ $produit->prix ?? 'X'}} €</p>
                            </div>
                            <div
                                class="col-5 col-sm-5 col-md-12 col-lg-12 p-0 d-flex align-items-center flex-row flex-md-column flex-lg-column justify-content-end pe-2 pe-lg-0 mb-lg-2 mb-md-2">
                                <a href="/product/{{ $produit->ID }}" class="btn bouton_style bouton_noir">VOIR</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="mt-5 mb-5 " id="persoPub">
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('assets/separationHAUT.png') }}" alt="" class="img-fluid separations">
        </div>
        <div class="row background_couleur_principale_400 p-3 p-lg-5">
            <p class="fs-6 text-center">Vous souhaitez personnaliser vos lunettes ? Vous pouvez le faire en ligne avec
                notre
                sélécteur en sélectionnant parmi
                différentes formes, couleurs et styles.</p>
            <a class="d-flex flex-column align-items-center mt-2">
                <button type="button" class="btn bouton_style bouton_blanc">VOIR</button></a>
        </div>
        <div class="row">
            <img src="{{ asset('assets/separationBAS.png') }}" alt="" class="img-fluid separations">
        </div>
    </div>

</section>

<section class="mt-5 mb-5" id="itemsMore">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex flex-column align-items-center mb-4 mt-4 p-lg-1">
                <div>
                    <img src="{{ asset('assets/home/verres.png') }}" alt="" class="img-fluid w-100">
                </div>
                <div>
                    <p class="fs-5 text-center">Verres adaptatifs intelligents</p>
                </div>
                <div class="w-75">
                    <p class="fs-6 text-center">Nos verres photochromiques s’adaptent instantanément à la lumière
                        ambiante pour
                        offrir un confort visuel optimal.</p>
                </div>
                <div>
                    <button type="button" class="btn bouton_style bouton_noir bouton_fond_orange">EXPLORER</button>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex flex-column align-items-center mt-4 mb-4 p-lg-1">
                <div>
                    <img src="{{ asset('assets/home/perso.png') }}" alt="" class="img-fluid w-100">
                </div>
                <div>
                    <p class="fs-5">Lunettes 100% personnalisables</p>
                </div>
                <div class="w-75">
                    <p class="fs-6 text-center">Montures sport, urbaines ou décontractées, à vous de créer la paire qui
                        vous ressemble. Couleur, forme, verres, tout est
                        personnalisable.</p>
                </div>
                <div>
                    <button type="button" class="btn bouton_style bouton_noir bouton_fond_orange">EN SAVOIR
                        PLUS</button>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex flex-column align-items-center mt-4 mb-5 p-lg-1">
                <div>
                    <img src="{{ asset('assets/home/livraison.png') }}" alt="" class="img-fluid w-100">
                </div>
                <div>
                    <p class="fs-5">Suivi facile & livraison rapide</p>
                </div>
                <div class="w-75">
                    <p class="fs-6 text-center">Suivi de commande instantané depuis votre espace client. Expédition
                        rapide dans toute la France.</p>
                </div>
                <div>
                    <button type="button" class="btn bouton_style bouton_noir bouton_fond_orange">SUIVRE MA
                        COMMANDE</button>
                </div>
            </div>
        </div>
    </div>
</section>
@stop