@extends('layouts.miromiro')
<title>MiroMiro - Personnaliser</title>
@section('content')
<section id="personalizePage" class="mt-7 mb-5">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <p class="fs-3 text-center">Personnaliser vos lunettes !</p>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-lg-4"></div>
            <div class="col-12 col-lg-4 mt-2">
                <div class="accordion accordion-flush" id="accordeonPersonalize">
                    <div class="accordion-item" id="choicePerso1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                                Choix 1 : Monture
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionFlushExample">
                            <div id="carouselMonture" class="carousel slide mt-2">
                                <div class="carousel-inner">
                                    <div class="currentChoiceMonture carousel-item active" data-Monture="Carbone">
                                        <img src="{{ asset('assets/personalize/frames/carbon.jpg') }}" class=" d-block
                                            w-75" alt="...">
                                    </div>
                                    <div class="currentChoiceMonture carousel-item" data-Monture="Titane">
                                        <img src="{{ asset('assets/personalize/frames/titan.jpg') }}" class=" d-block
                                            w-75" alt="...">
                                    </div>
                                    <div class="currentChoiceMonture carousel-item" data-Monture="Bois">
                                        <img src="{{ asset('assets/personalize/frames/wood.jpg') }}" class=" d-block
                                            w-75" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMonture"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselMonture"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="mt-5 mb-4">
                                <p class="fs-4 text-center fw-bold" id="currentChoiceMonture">Carbone</p>
                            </div>
                            <div class="mt-5 mb-4 buttonPerso">
                                <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                    onclick="newChoice('Monture', 1)">
                                    VALIDER
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso2" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                Choix 2 : Couleur monture
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselCouleurMonture" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="currentChoiceCouleursMonture carousel-item active"
                                            data-CouleurMonture="Bleu">
                                            <img src="{{ asset('assets/personalize/colors/blue.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleursMonture carousel-item"
                                            data-CouleurMonture="Vert">
                                            <img src="{{ asset('assets/personalize/colors/green.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleursMonture carousel-item"
                                            data-CouleurMonture="Rouge">
                                            <img src="{{ asset('assets/personalize/colors/red.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselCouleurMonture" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselCouleurMonture" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-5 mb-4">
                                    <p class="fs-4 text-center fw-bold" id="currentChoiceCouleurMonture">Bleu</p>
                                </div>
                                <div class="mt-5 mb-4 buttonPerso">
                                    <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                        onclick="newChoice('CouleurMonture', 2)">
                                        VALIDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso3" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                Choix 3 : Verres
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselVerre" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="currentChoiceVerre carousel-item active" data-Verre="Minéraux">
                                            <img src="{{ asset('assets/personalize/glass/mineral.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceVerre carousel-item" data-Verre="Organiques">
                                            <img src="{{ asset('assets/personalize/glass/organic.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceVerre carousel-item" data-Verre="Polycarbonate">
                                            <img src="{{ asset('assets/personalize/glass/polycarbonate.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselVerre"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselVerre"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-5 mb-4">
                                    <p class="fs-4 text-center fw-bold" id="currentChoiceVerre">Minéraux</p>
                                </div>
                                <div class="mt-5 mb-4 buttonPerso">
                                    <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                        onclick="newChoice('Verre', 3)">
                                        VALIDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso4" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                Choix 4 : Couleur des verres
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselCouleurVerre" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="currentChoiceCouleurVerre carousel-item active"
                                            data-CouleurVerre="Blue">
                                            <img src="{{ asset('assets/personalize/colors/blue.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleurVerre carousel-item" data-CouleurVerre="Vert">
                                            <img src="{{ asset('assets/personalize/colors/green.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleurVerre carousel-item" data-CouleurVerre="Rouge">
                                            <img src="{{ asset('assets/personalize/colors/red.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselCouleurVerre" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselCouleurVerre" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-5 mb-4">
                                    <p class="fs-4 text-center fw-bold" id="currentChoiceCouleurVerre">Bleu</p>
                                </div>
                                <div class="mt-5 mb-4 buttonPerso">
                                    <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                        onclick="newChoice('CouleurVerre', 4)">
                                        VALIDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso5" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                Choix 5 : Boite
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselBoîte" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="currentChoiceBoîte carousel-item active" data-Boîte="Pliable">
                                            <img src="{{ asset('assets/personalize/box/foldable.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceBoîte carousel-item" data-Boîte="Arrondi">
                                            <img src="{{ asset('assets/personalize/box/rounded.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceBoîte carousel-item" data-Boîte="Carré">
                                            <img src="{{ asset('assets/personalize/box/square.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBoîte"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBoîte"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-5 mb-4">
                                    <p class="fs-4 text-center fw-bold" id="currentChoiceBoîte">Pliable</p>
                                </div>
                                <div class="mt-5 mb-4 buttonPerso">
                                    <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                        onclick="newChoice('Boîte',5)">
                                        VALIDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso6" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                Choix 6 : Couleur de la boite
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselCouleurBoîte" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="currentChoiceCouleurBoîte carousel-item active" data-CouleurBoîte="Bleu">
                                            <img src="{{ asset('assets/personalize/colors/blue.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleurBoîte carousel-item" data-CouleurBoîte="Rouge">
                                            <img src="{{ asset('assets/personalize/colors/red.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                        <div class="currentChoiceCouleurBoîte carousel-item" data-CouleurBoîte="Vert">
                                            <img src="{{ asset('assets/personalize/colors/green.jpg') }}" class="
                                                d-block w-75" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselCouleurBoîte" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselCouleurBoîte" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-5 mb-4">
                                    <p class="fs-4 text-center fw-bold" id="currentChoiceCouleurBoîte">Bleu</p>
                                </div>
                                <div class="mt-5 mb-4 buttonPerso">
                                    <button class="btn bouton_style bouton_orange bouton_fond_blanc w-75"
                                        onclick="newChoice('CouleurBoîte',6)">VALIDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row mt-3 mb-3" id="buttonCart" style="display: none;">
            <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                <a href="#" class="btn bouton_style bouton_noir bouton_fond_orange">PANIER</a>
            </div>
        </div>
    </div>
</section>

<script>

</script>

@stop