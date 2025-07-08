@include("./structures/header")

<section class="mt-5 mb-5" id="paymentPage">
    <div class="container">
        <div class="row">
            <!-- BARRE -->
            <p class="fs-4 text-center">Finaliser ma commande</p>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-6">
                <div class="container">
                    <div class="row">
                        <form>
                            <div class="col-12 mt-2 mb-2">
                                <label for="numberCard" class="form-label ms-1">Numéro de carte bancaire :</label>
                                <input id="numberCard" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}"
                                    autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label for="nameOnCard" class="form-label ms-1">Nom sur la carte bancaire :</label>
                                <input id="nameOnCard" type="text" class="form-control" required
                                    placeholder="NOM PRENOM">
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-6 mt-2 mb-2 me-1">
                                    <label for="expiredCard" class="form-label">Date d'expliration :</label>
                                    <input id="expiredCard" class="form-control" type="tel" pattern="\d*" maxlength="7"
                                        placeholder="MM / YY">
                                </div>
                                <div class="col-6 mt-2 mb-2 ms-1">
                                    <label for="securityCard" class="form-label">Code de sécurité :</label>
                                    <input id="securityCard" class="form-control" type="tel" pattern="\d*" maxlength="4"
                                        placeholder="CVC">
                                </div>
                            </div>
                            <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                                <button href="#" class="btn bouton_style bouton_noir orange"
                                    type="submit">VALIDER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <div class="row mt-3" id="deliveryDivPayment">
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-6 mb-4">
                <hr>
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
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                            <label class="form-check-label" for="checkDefault">
                            </label>
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
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                            <label class="form-check-label" for="checkDefault">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <div class="row mt-3" id="factureDivPayment">
            <div class="col-lg-3">
            </div>
            <div class="col-12 col-lg-6 mt-4 mb-4">
                <hr>
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-12 mb-2">
                <p class="fs-4 text-center">Facture</p>
            </div>
            <div class="col-12 mb-4 d-flex align-items-center flex-column">
                <div style="background: #D9D9D9; height: 200" class="w-100 rounded">
                </div>
            </div>
            <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                <a href="#" class="btn bouton_style bouton_noir orange w-25">CONTINUER</a>
            </div>
        </div>
        <div class="row mt-3" id="responsePayment">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <hr>
                    </div>
                </div>
                <div class="row" id="acceptPayment">
                    <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                        <img src="{{ asset('assets/payment/validationPayment.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-12">
                        <p class="fs-5 couleur_succes text-center">
                            Votre achat a été effectuer !
                        </p>
                    </div>
                </div>
                <div class="row" id="refusePayment">
                    <div class="col-12 d-flex flex-row align-items-center justify-content-center mb-2">
                        <img src="{{ asset('assets/payment/refusePayment.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-12">
                        <p class="fs-5 couleur_error text-center">
                            Votre achat a été annuler car une erreur est survenue !
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12  d-flex align-items-center justify-content-center">
                        <a href="/" class="btn bouton_style bouton_noir orange">RETOUR A L'ACCUEIL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("./structures/footer")