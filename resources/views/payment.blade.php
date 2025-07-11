@extends('layouts.miromiro')
@section('title', "Paiement")
@section('content')

<?php
use Carbon\Carbon;

?>

<section class="mt-5 mb-5" id="paymentPage">
    <div class="container">
        <div class="row">
            <!-- BARRE -->
            <p class="fs-4 text-center">Finaliser ma commande</p>
        </div>
        <div class="row mt-3" id="informationsUser">
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-6">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="fs-5 text-start">Informations bancaire</p>
                        </div>
                        <div class="col-12 mt-2 mb-2">
                            <label for="numberCard" class="form-label ms-1">Numéro de carte bancaire :</label>
                            <input id="numberCard" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}"
                                autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"
                                class="form-control" required>
                        </div>
                        <div class="col-12 mt-2 mb-2">
                            <label for="nameOnCard" class="form-label ms-1">Nom sur la carte bancaire :</label>
                            <input id="nameOnCard" type="text" class="form-control" required placeholder="NOM PRENOM">
                        </div>
                        <div class="d-flex flex-row">
                            <div class="col-6 mt-2 mb-2 me-1">
                                <label for="expiredCard" class="form-label">Date d'expliration :</label>
                                <input id="expiredCard" class="form-control" type="tel" pattern="\d*" minlength="4" maxlength="4"
                                    placeholder="MM / YY">
                            </div>
                            <div class="col-6 mt-2 mb-2 ms-1">
                                <label for="securityCard" class="form-label">Code de sécurité :</label>
                                <input id="securityCard" class="form-control" type="tel" pattern="\d*" minlength="3" maxlength="3"
                                    placeholder="CVC">
                            </div>
                        </div>
                    </div>
                    @if (count($alreadyLivraison) == 0)
                        <div class="row mt-5">
                            <div class="col-12">
                                <p class="fs-5 text-start">Informations pour la livraison</p>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label for="firstSecondName" class="form-label">NOM Prénom :</label>
                                <input type="text" class="form-control" id="firstSecondName" placeholder="NOM prenom"
                                    min="10" max="100" required name="firstSecondName">
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label for="adressLivraison" class="form-label">Adresse :</label>
                                <input type="search" class="form-control" id="adressLivraison" placeholder="Nombre Rue"
                                    min="10" max="500" required name="adressLivraison">
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-4 mt-2 mb-2 me-1">
                                    <label for="cityLivraison" class="form-label">Ville :</label>
                                    <input id="cityLivraison" name="cityLivraison" class="form-control" type="text"
                                        minlength="2" required placeholder="Annecy">
                                </div>
                                <div class="col-4 mt-2 mb-2 ms-1">
                                    <label for="CPLivraison" class="form-label">Code postal :</label>
                                    <input id="CPLivraison" name="CPLivraison" class="form-control" type="text"
                                        minlength="5" maxlength="5" required placeholder="74000">
                                </div>
                                <div class="col-4 mt-2 mb-2 ms-1">
                                    <label for="countryLivraison" class="form-label">Pays :</label>
                                    <input id="countryLivraison" name="countryLivraison" class="form-control" type="text"
                                        minlength="5" required placeholder="France">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                            <button href="#" class="btn bouton_style bouton_noir bouton_fond_orange"
                                onclick="addInformationLivraison()">VALIDER</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <div class="row mt-3" id="deliveryDivPayment" style="display:none">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 mb-4">
                <p class="fs-4 text-center">Choisissez votre mode de livraison</p>
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-6">
                <div class="container">
                    <div class="row d-flex flex-row border">
                        <div class="col-3 d-flex">
                            <img src="{{ asset('assets/payment/simpleDelivery.png') }}" class="img-fluid w-100"
                                alt="...">
                        </div>
                        <div class="col-7 d-flex flex-column align-items-start">
                            <p class="fs-5">
                                Livraison simple
                            </p>
                            <p class="fs-6 mt-0">
                                Optez pour le mode de livraison simple.
                            </p>
                        </div>
                        <div class="col-2 d-flex flex-column justify-content-center align-items-center form-check">
                            <input class="form-check-input" type="radio" name="deliveryType" id="simpleLiv"
                                value="simple">
                        </div>
                    </div>
                    <div class="row d-flex flex-row border">
                        <div class="col-3 d-flex">
                            <img src="{{ asset('assets/payment/expressDelivery.png') }}" class="img-fluid w-100"
                                alt="...">
                        </div>
                        <div class="col-7 d-flex flex-column align-items-start">
                            <p class="fs-5">
                                Livraison express
                            </p>
                            <p class="fs-6 mt-0">
                                Optez pour le mode de livraison express.
                            </p>
                        </div>
                        <div class="col-2 d-flex flex-column justify-content-center align-items-center form-check">
                            <input class="form-check-input" type="radio" name="deliveryType" id="expressLiv"
                                value="express">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                <button href="#" class="btn bouton_style bouton_noir bouton_fond_orange"
                    onclick="choiceLivraison()">VALIDER</button>
            </div>
        </div>
        <div class="row mt-3" id="factureDivPayment" style="display:none">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 mb-2">
                <p class="fs-4 text-center">Facture</p>
            </div>
            @if ($alreadyLivraison && $products)
                @foreach ($alreadyLivraison as $info)
                    <div class="col-12 mb-4 d-flex align-items-center flex-column">
                        <div style="background: #D9D9D9;" class="p-3 rounded" id="factureInfos">
                            <div class="d-flex flex-column align-items-start">
                                <p class="fs-6 m-0">{{$info->firstname_lastname}}</p>
                                <p class="fs-6 m-0">{{$info->address}}, {{$info->city}},
                                    {{$info->postal_code}},{{$info->country}}
                                </p>
                                <p class="fs-6 m-0">Date d'achat : {{  $date = Carbon::now() }}</p>
                                <p class="fs-6 m-0">Choix livraison : <span id="choiseUserLivraison"
                                        class="text-capitalize"></span></p>
                @endforeach
                            @foreach ($products as $produit)
                                            <p class="fs-6 mt-3">Listes des articles :</p>
                                            <div class="table-responsive w-100">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col" class="w-50">Image</th>
                                                            <th scope="col">Quantité</th>
                                                            <th scope="col">Prix</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $produit->nom }}</td>
                                                            <td><img src="{{ $produit->image }}" alt="" class="img-fluid w-50"></td>
                                                            <td>1</td>
                                                            <td><span class="priceForCalculate">{{ $produit->prix }}</span> €</td>
                                                            <td style='display: none;' class="IDForFinal">{{ $produit->ID }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end align-items-end">
                                            <p class="fs-6 mt-3 fw-bold">Total : <span id="totalPrice"></span> €</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
            @else
                <div class="col-12 mb-4 d-flex align-items-center flex-column">
                    <div style="background: #D9D9D9;" class="p-3 rounded" id="factureInfos">
                        <div class="d-flex flex-column align-items-start">
                            <p class="fs-6 m-0" id="FLName"></p>
                            <p class="fs-6 m-0" id="ACPCUser"> </p>
                            <p class="fs-6 m-0">Date d'achat : <span id="dateBuy"></span></p>
                            <p class="fs-6 m-0">Choix livraison : <span id="choiseUserLivraison"
                                    class="text-capitalize"></span></p>
                            @foreach ($products as $produit)
                                            <p class="fs-6 mt-3">Listes des articles :</p>
                                            <div class="table-responsive w-100">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col" class="w-50">Image</th>
                                                            <th scope="col">Quantité</th>
                                                            <th scope="col">Prix</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $produit->nom }}</td>
                                                            <td><img src="{{ $produit->image }}" alt="" class="img-fluid w-50"></td>
                                                            <td>1</td>
                                                            <td><span class="priceForCalculate">{{ $produit->prix }}</span> €</td>
                                                            <td style='display: none;' class="IDForFinal">{{ $produit->ID }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end align-items-end">
                                            <p class="fs-6 mt-3 fw-bold">Total : <span id="totalPrice"></span> €</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
            @endif
            <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                <button onclick="finalPayment()" class="btn bouton_style bouton_noir bouton_fond_orange w-25">CONTINUER</>
            </div>
        </div>
        <div class="row mt-3" id="responsePayment" style="display:none">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <hr>
                    </div>
                </div>
                <div class="row" id="acceptPayment" style="display: none;">
                    <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                        <img src="{{ asset('assets/payment/validationPayment.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-12">
                        <p class="fs-5 couleur_succes text-center">
                            <span id="responseSuccess"></span> Votre achat a été effectuer !
                        </p>
                    </div>
                </div>
                <div class="row" id="refusePayment" style="display: none;">
                    <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                        <img src="{{ asset('assets/payment/refusePayment.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-12">
                        <p class="fs-5 couleur_error text-center">
                            Votre achat a été annuler car cet erreur est survenue : <span id="responseSuccess"></span>
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12  d-flex align-items-center justify-content-center">
                        <a href="/" class="btn bouton_style bouton_noir bouton_fond_orange">RETOUR A L'ACCUEIL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const factureInfos = document.getElementById("factureInfos");
    if (screen.width >= 992) {
        factureInfos.style.width = screen.width / 4 + "px";
    } else {
        factureInfos.classList.add("w-100");
    }

    let calculate = true
    setInterval(() => {
        if (calculate === true) {
            const allPrice = document.getElementsByClassName("priceForCalculate");
            const totalPrice = document.getElementById("totalPrice");
            let sum = 0;
            for (let index = 0; index < allPrice.length; index++) {
                sum = sum + parseInt(allPrice[index].innerText)
            }
            totalPrice.innerText = sum.toFixed(2);
            calculate = false;
        }
    }, 1000);

</script>

@stop