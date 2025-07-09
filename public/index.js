//#region LOCAL STORAGE PANIER
function addOnCart(connect) {
    const debug = true;
    const button = document.getElementById("buttonAddCart");
    const id = document.getElementById("idProductDetail").value;
    const nom = document.getElementById("nameProductDetail").innerText;
    const image = document.getElementById("imageProductDetail").src;
    const prix = document.getElementById("prixProductDetail").innerText;
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    if (connect) {
        if (Object.keys(cartItems).length > 0) {
            fetch('/product/addoncart', {
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
                    localStorage.removeItem("cart");
                })
                .catch(error => console.error('Erreur :', error));
        } else {
            let items = [{ id, nom, image, prix }]
            fetch('/product/addoncart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ items })
            })
                .then(response => response.json())
                .then(data => {
                    if (debug) {
                        console.log('Réponse du serveur :', data);
                    }
                    localStorage.removeItem("cart");
                })
                .catch(error => console.error('Erreur :', error));
        }
    } else if (!connect && id && nom && image && prix) {
        const newItem = { id, nom, image, prix };
        cartItems.push(newItem);
        localStorage.setItem("cart", JSON.stringify(cartItems));
    }
    if (button) {
        button.classList.add("disabled");
        button.disabled = true;
        button.innerText = "Ajouté au panier";
    }
}

function removeFromCart(index, connect) {
    let debug = true
    if (connect && index) {
        fetch('/product/deleteoncart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ index })
        })
            .then(response => response.json())
            .then(data => {
                if (debug) {
                    console.log('Réponse du serveur :', data);
                }
            })
            .catch(error => console.error('Erreur :', error));
    } else if (index && !connect) {
        const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
        if (index >= 0 && index < cartItems.length) {
            cartItems.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cartItems));
        }
    }
    window.location.reload();
}


// Si dans page panier et qu'il est pas connecté
if (document.getElementById("cartProduct")) {
    const rowItems = document.getElementById("cartProduct");
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    let index = 0
    cartItems.forEach(item => {
        let aDiv = document.createElement("div");
        aDiv.className = "mt-1 mb-1";
        aDiv.innerHTML = `
                            <div class="container">
                                <div class="row border">
                                    <div class="col-4 d-flex">
                                        <img src="${item.image}" class="img-fluid w-100"
                                            alt="...">
                                    </div>
                                    <div class="col-4 d-flex flex-column align-items-start">
                                        <p class="fs-5 mt-1">${item.nom}</p>
                                        <p class="fs-6"><span class="priceForCalculate">${item.prix}</span>€</p>
                                    </div>
                                    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                        <button class="btn bouton_style bouton_orange bouton_fond_blanc" onclick="removeFromCart('${index}', false)"><img src="assets/dashboard/delete.png" class="img-fluid" alt="..." width="25"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
        `;
        index++;
        rowItems.appendChild(aDiv);
    });
}
// Si pas dans page panier (verification si il a des items dans le panier)
if (!document.getElementById("cartProduct")) {
    let debug = true
    const cartItems = JSON.parse(localStorage.getItem("cart")) || {};
    if (Object.keys(cartItems).length > 0) {
        fetch('/product/verificationcart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cartItems })
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
}
//#endregion LOCAL STORAGE PANIER