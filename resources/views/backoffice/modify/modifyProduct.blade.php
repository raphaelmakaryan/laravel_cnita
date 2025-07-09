@include("structures.header")

@if ($product)
    @foreach ($product as $produit)
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="fs-4 text-center">Modifier <span class="tw-bold">{{$produit->nom}}</span></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <form action="/backoffice/modifyproduct" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="col-12 mt-1 mb-1">
                            <label for="nameProduct" class="form-label">Nouveau nom du produit</label>
                            <input type="text" class="form-control" id="nameProduct" min="1" max="20"
                                placeholder="Nom du produit" required name="nameProduct" value="{{ $produit->nom }}">
                        </div>
                        <div class="col-12 mt-1 mb-1">
                            <label for="imageProduct" class="form-label">Nouveau lien image du produit</label>
                            <input name="imageProduct" type="url" class="form-control" id="imageProduct" required
                                pattern="^(http|https)://.*" placeholder="URL" value="{{ $produit->image }}">
                        </div>
                        <div class="col-12 mt-1 mb-2">
                            <label for="priceProduct" class="form-label">Nouveau prix du produit</label>
                            <input name="priceProduct" type="number" class="form-control" id="priceProduct" required
                                placeholder="0" min="1" value="{{ $produit->prix }}">
                        </div>
                        <input type="hidden" id="idProduct" name="idProduct" value="{{ $produit->ID }}">
                        <div class="col-12 mt-4 d-flex flex-column align-items-center justify-content-center">
                            <button type="submit" class="btn bouton_style bouton_noir bouton_fond_orange">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endforeach
@endif
@include("structures.footer")