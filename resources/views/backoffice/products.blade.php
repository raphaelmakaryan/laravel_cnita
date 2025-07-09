@include("structures.header")

<section class="mt-5 mb-5" id="dashboardMain">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">Dashboard</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-row justify-content-end justify-content-lg-center">
                <a href="/backoffice/product/new">
                    <button class="btn bouton_orange bouton_fond_blanc">
                        <img src="{{ asset('assets/dashboard/create.png') }}" class="img-fluid" alt="..." width="25">
                    </button>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @if($produits)
                @foreach ($produits as $produit)
                    <div class="col-lg-3"></div>
                    <div class="col-12 col-lg-6">
                        <div class="mt-1 mb-1 container">
                            <div class="row border rounded">
                                <div class="col-4 d-flex">
                                    <img src="{{ asset($produit->image) }}" class="img-fluid w-100" alt="...">
                                </div>
                                <div class="col-4 d-flex flex-column align-items-start">
                                    <p class="fs-5 mt-1">{{ $produit->nom }}</p>
                                    <p class="fs-6">ID : {{ $produit->ID }}</p>
                                    <p class="fs-6">{{ $produit->prix }} €</p>
                                </div>
                                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                    <a href="/backoffice/product/{{ $produit->ID }}/edit" class="btn bouton_style bouton_orange bouton_fond_blanc mt-2 mb-2">
                                        <img src="{{ asset('assets/dashboard/modify.png') }}" class="img-fluid" alt="..."
                                            width="25">
                                    </a>
                                    <a href="/backoffice/delete/{{ $produit->ID }}" class="btn bouton_style bouton_orange bouton_fond_blanc mt-2 mb-2">
                                        <img src="{{ asset('assets/dashboard/delete.png') }}" class="img-fluid" alt="..."
                                            width="25">
                                    </a>
                                    <a href="/backoffice/product/{{ $produit->ID }}/detail" class="btn bouton_style bouton_orange bouton_fond_blanc mt-2 mb-2">
                                        <img src="{{ asset('assets/dashboard/look.png') }}" class="img-fluid" alt="..." width="25">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                @endforeach
            @endif
        </div>
    </div>
</section>


@include("structures.footer")