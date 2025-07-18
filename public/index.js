//#region BODY
function onlyNumberInput() {
    document.querySelectorAll('input[type="tel"]').forEach(input => {
        input.addEventListener('input', (event) => {
            const input = event.target;
            const value = input.value;
            const newValue = value.replace(/[^0-9]/g, '');
            if (newValue !== value) {
                input.value = newValue;
            }
        });
    });
}
onlyNumberInput()

function onlyStringInput() {
    document.querySelectorAll('input[type="text"]').forEach(input => {
        input.addEventListener('input', (event) => {
            const input = event.target;
            const value = input.value;
            const newValue = value.replace(/[^a-zA-Z\s]/g, '');
            if (newValue !== value) {
                input.value = newValue;
            }
        });
    });
}
onlyStringInput()
//#endregion BODY

//#region LOCAL STORAGE PANIER
function addOnCart(connect) {
    const debug = true;
    const id = document.getElementById("idProductDetail").value;
    const nom = document.getElementById("nameProductDetail").innerText;
    const image = document.getElementById("imageProductDetail").src;
    const prix = document.getElementById("prixProductDetail").innerText;
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    if (connect) {
        if (Object.keys(cartItems).length > 0) {
            fetch('/api/product/addoncart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ cartItems })
            })
                .then(response => response.json())
                .then(data => {
                    if (debug) {
                        console.log('Réponse du serveur :', data);
                    }
                    if (data.status === "success") {
                        disabledButtonAddCart();
                        localStorage.removeItem("cart");
                    } else {
                        console.error('Erreur lors de l\'ajout au panier :', data.message);
                        alert("Erreur lors de l'ajout au panier. Veuillez réessayer.");
                    }
                })
                .catch(error => console.error('Erreur :', error));
        } else {
            let cartItems = [{ id, nom, image, prix }]
            fetch('/api/product/addoncart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ cartItems })
            })
                .then(response => response.json())
                .then(data => {
                    if (debug) {
                        console.log('Réponse du serveur :', data);
                    }
                    if (data.status === "success") {
                        disabledButtonAddCart();
                        localStorage.removeItem("cart");
                    } else {
                        alert("Erreur lors de l'ajout au panier. Veuillez réessayer.");
                    }
                })
                .catch(error => console.error('Erreur :', error));
        }
    } else if (!connect && id && nom && image && prix) {
        const newItem = { id, nom, image, prix, quantity: 1 };
        cartItems.push(newItem);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        disabledButtonAddCart();
    }
}

function removeFromCart(index, connect, type) {
    let debug = true
    if (connect && index) {
        let dataRemove = { index, type }
        fetch('/api/product/deleteoncart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ dataRemove })
        })
            .then(response => response.json())
            .then(data => {
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
            })
            .catch(error => console.error('Erreur :', error));
    } else if (index && !connect && type == "normal") {
        const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
        if (index >= 0 && index < cartItems.length) {
            cartItems.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cartItems));
        }
    } else if (index && !connect && type == "perso") {
        const cartItems = JSON.parse(localStorage.getItem("perso")) || [];
        if (index >= 0 && index < cartItems.length) {
            cartItems.splice(index, 1);
            localStorage.setItem("perso", JSON.stringify(cartItems));
        }
    }
    window.location.reload();
}

function disabledButtonAddCart() {
    const button = document.getElementById("buttonAddCart");
    if (button) {
        button.classList.add("disabled");
        button.disabled = true;
        button.innerText = "Ajouté au panier";
    }

}
// Si dans page panier et qu'il est pas connecté
if (document.getElementById("cartProduct")) {
    const rowItems = document.getElementById("cartProduct");
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    const cartPerso = JSON.parse(localStorage.getItem("perso")) || [];
    if (cartItems.length > 0) {
        let index = 0;
        cartItems.forEach(item => {
            let aDiv = document.createElement("div");
            aDiv.className = "mt-1 mb-1";
            aDiv.innerHTML = `
                            <div class="container">
                                <div class="row border">
                                    <div class="col-3 d-flex">
                                        <img src="${item.image}" class="img-fluid w-100"
                                            alt="...">
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-start">
                                        <p class="fs-5 mt-1">${item.nom}</p>
                                        <p class="fs-6"><span class="priceForCalculate">${item.prix}</span>€</p>
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                                            <label for="quantityCart" class="form-label">Quantité</label>
                                            <input type="number" class="form-control quantityForCalculate" name="quantityCart"
                                                min="1" max="10" id="quantityCartNormal${index}" value="${item.quantity}">
                                            <button onclick="updateCartLocal(${index}, 'Normal')"
                                                class="btn bouton_style bouton_orange bouton_fond_blanc p-1 mt-1">Mettre a
                                                jour
                                            </button>
                                    </div>
                                    <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                        <button class="btn bouton_style bouton_orange bouton_fond_blanc" onclick="removeFromCart('${index}', false, 'normal')"><img src="assets/dashboard/delete.png" class="img-fluid" alt="..." width="25"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
        `;
            index++;
            rowItems.appendChild(aDiv);
        });
    }
    if (cartPerso.length > 0) {
        let index = 0;
        cartPerso.forEach(item => {
            let aDiv = document.createElement("div");
            aDiv.className = "mt-1 mb-1";
            aDiv.innerHTML = `
                            <div class="container">
                                <div class="row border">
                                    <div class="col-3 d-flex">
                                        <img src="${item.image}" class="img-fluid w-100"
                                            alt="...">
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-start">
                                        <p class="fs-5 mt-1">${item.nom}</p>
                                        <p class="fs-6"><span class="priceForCalculate">${item.prix}</span>€</p>
                                    </div>
                                    <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                                            <label for="quantityCart" class="form-label">Quantité</label>
                                            <input type="number" class="form-control quantityForCalculate" name="quantityCart"
                                                min="1" max="10" id="quantityCartPerso${index}" value="${item.quantity}">
                                            <button onclick="updateCartLocal(${index}, 'Perso')"
                                                class="btn bouton_style bouton_orange bouton_fond_blanc p-1 mt-1">Mettre a
                                                jour
                                            </button>
                                    </div>
                                    <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                        <button class="btn bouton_style bouton_orange bouton_fond_blanc" onclick="removeFromCart('${index}', false, 'perso')"><img src="assets/dashboard/delete.png" class="img-fluid" alt="..." width="25"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
        `;
            index++;
            rowItems.appendChild(aDiv);
        });
    }
}
// Si pas dans page panier (verification si il a des items dans le panier)
if (!document.getElementById("cartProduct")) {
    let debug = true
    const cartItemsNormal = JSON.parse(localStorage.getItem("cart")) || {};
    const cartItemsPerso = JSON.parse(localStorage.getItem("perso")) || {};
    if (Object.keys(cartItemsNormal).length > 0) {
        fetch('/api/product/verificationcart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cartItemsNormal })
        })
            .then(response => response.json())
            .then(data => {
                localStorage.removeItem("cart");
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
            })
            .catch(error => console.error('Erreur :', error));
    }
    if (Object.keys(cartItemsPerso).length > 0) {
        fetch('/api/product/verificationcart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cartItemsPerso })
        })
            .then(response => response.json())
            .then(data => {
                localStorage.removeItem("perso");
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
            })
            .catch(error => console.error('Erreur :', error));
    }
}

function updateCartLocal(index, type) {
    const quantityInput = document.getElementById(`quantityCart${type}${index}`);
    const quantity = parseInt(quantityInput.value);
    switch (type) {
        case "Perso":
            const cartItemsPerso = JSON.parse(localStorage.getItem("perso")) || [];
            if (index >= 0 && index < cartItemsPerso.length) {
                if (quantity > 0 && quantity <= 10) {
                    cartItemsPerso[index].quantity = quantity;
                    localStorage.setItem("perso", JSON.stringify(cartItemsPerso));
                } else {
                    alert("Veuillez entrer une quantité valide entre 1 et 10.");
                }
            }
            break;

        case "Normal":
            const cartItemsNormal = JSON.parse(localStorage.getItem("cart")) || [];
            if (index >= 0 && index < cartItemsNormal.length) {
                if (quantity > 0 && quantity <= 10) {
                    cartItemsNormal[index].quantity = quantity;
                    localStorage.setItem("cart", JSON.stringify(cartItemsNormal));
                } else {
                    alert("Veuillez entrer une quantité valide entre 1 et 10.");
                }
            }
            break;
    }
    window.location.reload();
}
//#endregion LOCAL STORAGE PANIER

//#region PAYMENT
function addInformationLivraison() {
    const debug = false;

    const divInfoUser = document.getElementById("informationsUser");
    const divDelivery = document.getElementById("deliveryDivPayment");

    const firstSecondNameElem = document.getElementById("firstSecondName");
    const adressLivraisonElem = document.getElementById("adressLivraison");
    const cityLivraisonElem = document.getElementById("cityLivraison");
    const CPLivraisonElem = document.getElementById("CPLivraison");
    const countryLivraisonElem = document.getElementById("countryLivraison");

    const firstSecondName = firstSecondNameElem ? firstSecondNameElem.value : null;
    const adressLivraison = adressLivraisonElem ? adressLivraisonElem.value : null;
    const cityLivraison = cityLivraisonElem ? cityLivraisonElem.value : null;
    const CPLivraison = CPLivraisonElem ? CPLivraisonElem.value : null;
    const countryLivraison = countryLivraisonElem ? countryLivraisonElem.value : null;

    if (firstSecondName != null && adressLivraison != null && cityLivraison != null && CPLivraison != null && countryLivraison != null) {
        let informationsUser = [{ firstSecondName, adressLivraison, cityLivraison, CPLivraison, countryLivraison }]
        fetch('/api/payment/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ informationsUser })
        })
            .then(response => response.json())
            .then(data => {
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
                if (data.status === "success") {
                    window.location.reload();
                } else {
                    alert("Erreur lors de l'ajout de vos informations de livraison. Veuillez réessayer.");
                }
            })
            .catch(error => console.error('Erreur :', error));
    } else {
        progressBar();
        divInfoUser.style.display = "none";
        divDelivery.style.display = "flex";
    }
}


function choiceLivraison() {
    const divDelivery = document.getElementById("deliveryDivPayment");
    const divFacture = document.getElementById("factureDivPayment");
    const choiseUserLivraison = document.getElementById("choiseUserLivraison");

    const choiceRadio = document.querySelector('input[name="deliveryType"]:checked');
    const verificationRadio = choiceRadio ? choiceRadio.value : null;

    if (verificationRadio !== null) {
        progressBar();
        divDelivery.style.display = "none";
        divFacture.style.display = "flex";
        choiseUserLivraison.innerText = verificationRadio;
    }
}

function finalPayment() {
    const debug = true;

    const IDForFinalElements = document.getElementsByClassName("IDForFinal");
    const price = document.getElementById("totalPrice").innerText;
    const type = Array.from(document.getElementsByClassName("typeForFinal")).map(el => el.innerText);
    const idForFinalArray = Array.from(IDForFinalElements).map(el => el.innerText);
    const date = new Date().toISOString().slice(0, 10);

    if (idForFinalArray.length > 0) {
        const payload = [{
            idForFinalArray,
            price,
            date,
            type
        }];

        fetch('/api/payment/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ payload })
        })
            .then(response => response.json())
            .then(data => {
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
                progressBar()
                paymentResult(data);
            })
            .catch(error => console.error('Erreur :', error));
    } else {
        alert("Informations manquantes pour finaliser le paiement.");
    }

}

function paymentResult(resultat) {
    let displayMessage = false;
    const factureDivPayment = document.getElementById("factureDivPayment");
    const responsePayment = document.getElementById("responsePayment");

    const acceptPayment = document.getElementById("acceptPayment");
    const refusePayment = document.getElementById("refusePayment");

    if (resultat.status === "success") {
        factureDivPayment.style.display = "none";
        responsePayment.style.display = "flex";
        acceptPayment.style.display = "flex";
        setInterval(() => {
            if (displayMessage === false) {
                document.getElementById("responseSuccess").innerText = resultat.message;
                displayMessage = true
            }
        }, 1000);
    } else {
        factureDivPayment.style.display = "none";
        responsePayment.style.display = "flex";
        refusePayment.style.display = "flex";
        setInterval(() => {
            if (displayMessage === false) {
                document.getElementById("responseError").innerText = resultat.message;
                displayMessage = true
            }
        }, 2000);
    }
}

const progress = document.getElementById("progressBar");
let lastValueProgress = 25;

function progressBar() {
    lastValueProgress = lastValueProgress + 25;
    progress.style.width = `${lastValueProgress}%`;
}
//#endregion PAYMENT

//#region EXPLORE
function triNameExplore() {
    const allProductExplore = document.getElementById("allProductExplore");
    if (!allProductExplore) return;
    const products = Array.from(allProductExplore.getElementsByClassName("card"));
    products.sort((a, b) => {
        const nameA = a.querySelector(".card-title")?.innerText.toLowerCase() || "";
        const nameB = b.querySelector(".card-title")?.innerText.toLowerCase() || "";
        return nameA.localeCompare(nameB);
    });
    allProductExplore.innerHTML = "";
    products.forEach(card => {
        const container = card.closest(".col-12") ?? card.parentElement;
        if (container) {
            container.className = "col-12 col-lg-3 d-flex flex-column align-items-center mb-2 mt-1 mt-lg-2";
            allProductExplore.appendChild(container);
        }
    });
}

function triPrixCroissantExplore() {
    const allProductExplore = document.getElementById("allProductExplore");
    if (!allProductExplore) return;
    const productContainers = Array.from(allProductExplore.children);
    productContainers.sort((a, b) => {
        const prixA = parseFloat(
            a.querySelector(".card-subtitle")?.innerText.replace("€", "").trim() || 0
        );
        const prixB = parseFloat(
            b.querySelector(".card-subtitle")?.innerText.replace("€", "").trim() || 0
        );
        return prixA - prixB;
    });

    allProductExplore.innerHTML = "";
    productContainers.forEach(container => {
        container.className = "col-12 col-lg-3 d-flex flex-column align-items-center mb-2 mt-1 mt-lg-2";
        allProductExplore.appendChild(container);
    });
}

let initialOrderExplore = [];

window.addEventListener("DOMContentLoaded", () => {
    const allProductExplore = document.getElementById("allProductExplore");
    if (!allProductExplore) return;
    initialOrderExplore = Array.from(allProductExplore.children);
});

function resetExploreOrder() {
    const allProductExplore = document.getElementById("allProductExplore");
    if (!allProductExplore || initialOrderExplore.length === 0) return;

    allProductExplore.innerHTML = "";
    initialOrderExplore.forEach(product => {
        allProductExplore.appendChild(product);
    });
}
//#endregion EXPLORE

//#region PERSO
const filter = ["Monture", "CouleurMonture", "Verre", "CouleurVerre", "Boîte", "CouleurBoîte"];
let choiceUser = []
let targetImageMonture = [];

function configureCarouselListener(filterName) {
    const currentChoiceId = `currentChoice${filterName}`;
    const carouselId = `carousel${filterName}`;

    const currentChoice = document.getElementById(currentChoiceId);
    const carousel = document.getElementById(carouselId);
    if (currentChoice && carousel) {
        const currentImage = document.getElementsByClassName(`currentChoiceMonture carousel-item active`)[0].children[0].currentSrc;
        targetImageMonture.push(currentImage);
        carousel.addEventListener('slide.bs.carousel', event => {
            const data = event.relatedTarget.dataset[filterName.toLowerCase()];
            if (data) {
                currentChoice.innerText = data;
            }
        });
    }
}

filter.forEach(filterName => {
    configureCarouselListener(filterName);
});

function verificationChoicePerso(filtre, newValue) {
    filter.forEach(filterName => {
        if (filterName === filtre) {
            if (!choiceUser[0]) choiceUser[0] = {};
            choiceUser[0][filterName] = newValue;
        }
    });
}

function newChoice(filtre, index) {
    if (index != 6) {
        verificationChoicePerso(filtre, document.getElementById(`currentChoice${filtre}`).innerText);
        document.getElementById(`flush-collapse${index}`).classList.remove("show");
        document.getElementById(`choicePerso${index + 1}`).style.display = "block";
        document.getElementById(`flush-collapse${index + 1}`).classList.add("show");
    } else {
        verificationChoicePerso(filtre, document.getElementById(`currentChoice${filtre}`).innerText);
        document.getElementById(`flush-collapse${index}`).classList.remove("show");
        document.getElementById("buttonCart").style.display = "block";
    }
}


function addPersoToCart(connect) {
    const debug = true;
    if (!connect) {
        let newItem = { Monture: choiceUser[0]["Monture"], CouleurMonture: choiceUser[0]["CouleurMonture"], Verre: choiceUser[0]["Verre"], CouleurVerre: choiceUser[0]["CouleurVerre"], Boîte: choiceUser[0]["Boîte"], CouleurBoîte: choiceUser[0]["CouleurBoîte"], image: targetImageMonture[0], nom: "Lunette personnalisée", prix: 100, quantity: 1 };
        const cartPerso = JSON.parse(localStorage.getItem("perso")) || [];
        cartPerso.push(newItem);
        localStorage.setItem("perso", JSON.stringify(cartPerso));
        window.location.href = "/cart";
    } else {
        const dataPerso = choiceUser
        fetch('/api/personalize/create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ dataPerso })
        })
            .then(response => response.json())
            .then(data => {
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
                switch (data.status) {
                    case 'success':
                        window.location.href = data.redirect;
                        break;
                    default:
                        break;
                }
            })
            .catch(error => console.error('Erreur :', error));
    }
}
//#endregion PERSO