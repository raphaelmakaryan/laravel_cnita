@include("./structures/header")

<header class="mt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('assets/separationHAUT.png') }}" alt="" class="img-fluid separations">
        </div>
        <div class="row">
            <div class="col-12" id="heroImg">
                <div style="z-index: 1;">
                    <p>MIRO MIRO propose un large choix de lunettes photochromiques, du design à la vente, incluant des
                        modèles personnalisés.</p>
                    <a>
                        <button type="button" class="btn bouton_noir">EXPLORER</button>
                    </a>
                </div>
                <img src="{{ asset('assets/hero.png') }}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('assets/separationBAS.png') }}" alt="" class="img-fluid separations">
        </div>
    </div>
</header>

<section class="mt-5 mb-5" id="produitsTendances">
    <div class="container">
        <div class="row">
            <p class="fs-2 text-center couleur_grise_700">Nos produits tendances</p>
        </div>
        <div class="row mt-4">
            <div class="col-12 p-0 mb-3 mt-3">
                <div class="container-fluid">
                    <div class="row produitsTendances d-flex align-items-center">
                        <div class="col-1 p-0 w-0"></div>
                        <div class="col-3 p-0">
                            <img src="{{ asset('assets/exemples/exempleProduitsTendance.png') }}" alt=""
                                class="img-fluid w-100">
                        </div>
                        <div class="col-4 ps-3 d-flex align-items-start flex-column">
                            <p>Nom de la lunette</p>
                            <p>20€</p>
                        </div>
                        <div class="col-5 p-0">
                            <a class="d-flex align-items-center flex-row justify-content-end pe-2">
                                <button type="button" class="btn bouton_noir">VOIR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mb-3 mt-3">
                <div class="container-fluid">
                    <div class="row produitsTendances d-flex align-items-center">
                        <div class="col-1 p-0 w-0"></div>
                        <div class="col-3 p-0">
                            <img src="{{ asset('assets/exemples/exempleProduitsTendance.png') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-4 ps-3 d-flex align-items-start flex-column">
                            <p>Nom de la lunette</p>
                            <p>20€</p>
                        </div>
                        <div class="col-5 p-0">
                            <a class="d-flex align-items-center flex-row justify-content-end pe-2">
                                <button type="button" class="btn bouton_noir">VOIR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mb-3 mt-3">
                <div class="container-fluid">
                    <div class="row produitsTendances d-flex align-items-center">
                        <div class="col-1 p-0 w-0"></div>
                        <div class="col-3 p-0">
                            <img src="{{ asset('assets/exemples/exempleProduitsTendance.png') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-4 ps-3 d-flex align-items-start flex-column">
                            <p>Nom de la lunette</p>
                            <p>20€</p>
                        </div>
                        <div class="col-5 p-0">
                            <a class="d-flex align-items-center flex-row justify-content-end pe-2">
                                <button type="button" class="btn bouton_noir">VOIR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mb-3 mt-3">
                <div class="container-fluid">
                    <div class="row produitsTendances d-flex align-items-center">
                        <div class="col-1 p-0 w-0"></div>
                        <div class="col-3 p-0">
                            <img src="{{ asset('assets/exemples/exempleProduitsTendance.png') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-4 ps-3 d-flex align-items-start flex-column">
                            <p>Nom de la lunette</p>
                            <p>20€</p>
                        </div>
                        <div class="col-5 p-0">
                            <a class="d-flex align-items-center flex-row justify-content-end pe-2">
                                <button type="button" class="btn bouton_noir">VOIR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 mb-3 mt-3">
                <div class="container-fluid">
                    <div class="row produitsTendances d-flex align-items-center">
                        <div class="col-1 p-0 w-0"></div>
                        <div class="col-3 p-0">
                            <img src="{{ asset('assets/exemples/exempleProduitsTendance.png') }}" alt="" class="img-fluid w-100">
                        </div>
                        <div class="col-4 ps-3 d-flex align-items-start flex-column">
                            <p>Nom de la lunette</p>
                            <p>20€</p>
                        </div>
                        <div class="col-5 p-0">
                            <a class="d-flex align-items-center flex-row justify-content-end pe-2">
                                <button type="button" class="btn bouton_noir">VOIR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@include("./structures/footer")