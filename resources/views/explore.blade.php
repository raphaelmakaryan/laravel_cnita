@include("./structures/header")

<section class="mt-5 mb-2" id="boutonFilter">
    <div class="container-fluid">
        <div class="row d-flex flex-column">
            <div class="col-12 d-flex flex-column align-items-center">
                <button type="button" class="btn bouton_style bouton_noir orange w-75" id="buttonFilterExplore">FILTRER</button>
            </div>
        </div>
    </div>
</section>

<section class="mt-2 mb-5">
    <div class="container-fluid">
        <div class="row ">
            @foreach ($produits as $produit)
                <div class="col-12 col-lg-3 d-flex flex-column align-items-center mb-2 mt-1 mt-lg-2">
                    <div class="card rounded" style="width: 18rem;">
                        <img src="{{ asset($produit->image ?? 'assets/exemples/exempleExplore.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom ?? 'Nom des lunettes ici la' }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $produit->prix ?? '10€' }}</h6>
                            <p class="card-text">{{ $produit->description ?? 'Ces lunettes sont magnifique genre wahhhh suis jaloux de fou' }}</p>
                            <div class="d-flex flex-row justify-content-end">
                                <a href="/product/{{ $produit->id ?? 1 }}" class="btn bouton_style bouton_noir orange w-25">VOIR</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@include("./structures/footer")