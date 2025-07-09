@include("structures.header")

@if ($produits)
    @foreach ($produits as $produit)
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="fs-4 text-center">
                            Information de <span class="fw-bold">{{ $produit->nom }}</span>
                        </p>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-25"><img src="{{ $produit->image }}" alt="" class="img-fluid w-100"></td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->prix }}</td>
                                    <td>{{ $produit->ID }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif

@include("structures.footer")