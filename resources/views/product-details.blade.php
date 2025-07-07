@include("./structures/header")

<section class="mt-5 mb-5" id="detailProduct">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('assets/exemples/exempleDetail.png') }}"
                                            class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/exemples/exempleDetail.png') }}"
                                            class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/exemples/exempleDetail.png') }}"
                                            class="d-block w-100">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="row">
                    <div class="col-12 d-flex flex-column align-items-start mt-1 ms-1">
                        <p class="fs-5">Lunette n°{{ $product }}</p>
                        <p class="fs-6">50€</p>
                    </div>
                    <div class="col-12">
                        <a href="#" class="btn bouton_style bouton_noir orange w-100">PANIER</a>
                    </div>
                    <div class="col-12 mt-4 mb-2">
                        <hr>
                    </div>
                    <div class="col-12">
                        <p class="fs-6">Informations</p>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fs-6 fw-bold">Genre</p>
                                </div>
                                <div class="col-6" id="genderGlass">
                                    <p class="fs-6">Homme</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fs-6 fw-bold">Taille</p>
                                </div>
                                <div class="col-6" id="tailleGlass">
                                    <p class="fs-6">XL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fs-6 fw-bold">Type</p>
                                </div>
                                <div class="col-6" id="typeGlass">
                                    <p class="fs-6">Cerclées</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fs-6 fw-bold">Forme</p>
                                </div>
                                <div class="col-6" id="formeGlass">
                                    <p class="fs-6">Ovales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("./structures/footer")