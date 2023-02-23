<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <h3>Ma liste de souhaits</h3>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Produits</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Prix</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Retirer</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">

                                        <a href="{{ url('produit/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                            <label class="product-name">
                                                @if ($wishlistItem->product->productImages->count() > 0)
                                                <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px"
                                                    alt="{{ $wishlistItem->product->name }}" />
                                                @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" style="width: 50px; height: 50px"
                                                    alt="{{ $wishlistItem->product->name }}" />
                                                @endif

                                                {{ $wishlistItem->product->name }}
                                            </label>
                                        </a>
                                    </div>

                                    <div class="col-md-2 my-auto">
                                        <label class="price">{{ $wishlistItem->product->selling_price }} €</label>
                                    </div>

                                    <div class="col-md-4 col-12 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> Retirer
                                                </span>
                                                <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> ...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <h4>Pas d'articles dans votre liste de souhait</h4>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

