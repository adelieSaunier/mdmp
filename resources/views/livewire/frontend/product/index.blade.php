<div class="row">
    <div class="col-md-3">

        @if ($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Marques</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brand)
                        <label class="d-block"><input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}"> {{ $brand->name }}</label>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <h4>Prix</h4>
            </div>
            <div class="card-body">


                <label class="d-block">
                    <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high"> Croissants
                </label>

                <label class="d-block">
                    <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low"> Décroissants
                </label>

            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="row">
            @forelse ( $products as $product )

                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($product->quantity > 0 )
                                <label class="stock bg-success">En Stock</label>
                                @else
                                <label class="stock bg-success">En rupture de stock</label>
                            @endif
                            @if ( $product->productImages->count() > 0 )
                                <a href="{{ url( '/produit/'. $product->category->slug .'/'. $product->slug ) }}">
                                    <img src="{{ asset($product->productImages[0]->image) }}" class="img-card-product-sized" alt="image produit">
                                </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand }}</p>
                            <h5 class="product-name">
                                <a href="{{ url( '/produit/'. $product->category->slug .'/'. $product->slug ) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $product->selling_price }} €</span>
                                <span class="original-price">{{ $product->original_price }} €</span>
                            </div>
                            <!--
                            <div class="mt-2">
                                <a href="" class="btn btn1">Acheter</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> Voir </a>
                            </div>
                            -->
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-12">
                    <h5>
                        Pas de produit disponible dans {{ $category->name }}
                    </h5>
                </div>
            @endforelse
        </div>

    </div>
</div>


