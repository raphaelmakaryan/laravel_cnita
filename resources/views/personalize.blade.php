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
            <div class="col-lg-3"></div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="accordion accordion-flush" id="accordeonPersonalize">
                    <div class="accordion-item" id="choicePerso1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false"
                                aria-controls="flush-collapse1">
                                Choix 1 : Monture
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionFlushExample">
                            <div id="carouselExample" class="carousel slide mt-2">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('assets/personalize/frames/carbon.jpg') }}" class=" d-block
                                            w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/personalize/frames/titan.jpg') }}" class=" d-block
                                            w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/personalize/frames/wood.jpg') }}" class=" d-block
                                            w-100" alt="...">
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
                            <div class="mt-5 mb-4">
                                <button class="btn bouton_style bouton_orange bouton_fond_blanc w-100" onclick="newChoice()">
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
                        <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselExample" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-4 mb-3">
                                    <a href="#"
                                        class="btn bouton_style bouton_noir bouton_fond_orange w-100">VALIDER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="choicePerso3" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target=""flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                Choix 3 : Verres
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselExample" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-4 mb-3">
                                    <a href="#"
                                        class="btn bouton_style bouton_noir bouton_fond_orange w-100">VALIDER</a>
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
                        <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselExample" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-4 mb-3">
                                    <a href="#"
                                        class="btn bouton_style bouton_noir bouton_fond_orange w-100">VALIDER</a>
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
                        <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselExample" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-4 mb-3">
                                    <a href="#"
                                        class="btn bouton_style bouton_noir bouton_fond_orange w-100">VALIDER</a>
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
                        <div id="flush-collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div id="carouselExample" class="carousel slide mt-2">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/exemples/exempleExplore.png') }}"" class="
                                                d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-4 mb-3">
                                    <a href="#"
                                        class="btn bouton_style bouton_noir bouton_fond_orange w-100">VALIDER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row mt-3 mb-3" id="buttonCart" style="display: none;">
            <div class="col-12 mt-4 d-flex flex-row justify-content-end justify-content-lg-center">
                <a href="#" class="btn bouton_style bouton_noir bouton_fond_orange">PANIER</a>
            </div>
        </div>
    </div>
</section>

<script>
    let index = 1
    function newChoice() {
        if (index != 6){
            document.getElementById(`flush-collapse${index}`).classList.remove("show");
            index++
            document.getElementById(`choicePerso${index}`).style.display = "block"
            document.getElementById(`flush-collapse${index}`).classList.add("show");
        }
    }
</script>

@stop