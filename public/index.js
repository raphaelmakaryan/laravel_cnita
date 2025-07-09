//#region LOCAL STORAGE PANIER
function addOnCart() {
    try {
        const id = document.getElementById("idProductDetail").value;
        const nom = document.getElementById("nameProductDetail").innerText;
        const image = document.getElementById("imageProductDetail").src;
        const prix = document.getElementById("prixProductDetail").innerText;
        const button = document.getElementById("buttonAddCart");
        const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
        const newItem = { id, nom, image, prix };
        cartItems.push(newItem);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        button.innerText = "Ajouté au panier";
        button.disabled = true;
        button.classList.add("disabled");
    } catch (error) {

    }
}

function removeFromCart(index) {
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    if (index >= 0 && index < cartItems.length) {
        cartItems.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cartItems));
    }
    window.location.reload();
}

// Si dans page panier et qu'il est pas connécté
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
                                        <button class="btn bouton_style bouton_orange bouton_fond_blanc" onclick="removeFromCart('${index}')"><img src="assets/dashboard/delete.png" class="img-fluid" alt="..." width="25"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
        `;
        index++;
        rowItems.appendChild(aDiv);
    });
}
//#endregion LOCAL STORAGE PANIER