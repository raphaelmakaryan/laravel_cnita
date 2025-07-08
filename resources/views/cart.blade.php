@include("./structures/header")

<section class="mt-2 mb-5" id="cartDiv">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <p class="fs-2 text-center">Mon panier</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-3 mt-3 mb-3">
                <div class="mt-1 mb-1">
                    <div class="container">
                        <div class="row border">
                            <div class="col-4 d-flex">
                                <img src="{{ asset('assets/exemples/exempleCart.png') }}" class="img-fluid w-100"
                                    alt="...">
                            </div>
                            <div class="col-4 d-flex flex-column align-items-start">
                                <p class="fs-5 mt-1">NOM DES LUNETTES</p>
                                <p class="fs-6">10 €</p>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="container">
                        <div class="row border">
                            <div class="col-4 d-flex">
                                <img src="{{ asset('assets/exemples/exempleCart.png') }}" class="img-fluid w-100"
                                    alt="...">
                            </div>
                            <div class="col-4 d-flex flex-column align-items-start">
                                <p class="fs-5 mt-1">NOM DES LUNETTES</p>
                                <p class="fs-6">10 €</p>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="container">
                        <div class="row border">
                            <div class="col-4 d-flex">
                                <img src="{{ asset('assets/exemples/exempleCart.png') }}" class="img-fluid w-100"
                                    alt="...">
                            </div>
                            <div class="col-4 d-flex flex-column align-items-start">
                                <p class="fs-5 mt-1">NOM DES LUNETTES</p>
                                <p class="fs-6">10 €</p>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-3 mb-3">
                <div class="container">
                    <div class="row">
                        <div
                            class="background_couleur_grise_900 col-12 rounded d-flex flex-row justify-content-end p-2">
                            <p class="fs-6 couleur_grise_100 text-center m-0">TOTAL €</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                <a href="/payment" class="btn bouton_style bouton_noir orange">VALIDER</a>
            </div>
        </div>
    </div>
</section>

@include("./structures/footer")