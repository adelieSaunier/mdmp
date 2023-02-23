@extends('layouts.app')

@section('title', 'Search Products')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Recherche de produit</h4>
                <div class="underline mb-4"></div>
            </div>

            @forelse ($searchProducts as $productItem)
            <div class="col-md-10">
                <div class="product-card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/produit/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{$productItem->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{$productItem->selling_price}} €</span>
                                    <span class="original-price">{{$productItem->original_price}} €</span>
                                </div>
                                <p style="height: 45px; overflow: hidden">
                                    <b>Description : </b> {{ $productItem->description }}
                                </p>
                                <a href="{{ url('/produit/'.$productItem->category->slug.'/'.$productItem->slug) }}"
                                    class="btn btn-outline-primary">
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 p-2">
                <h4>Pas de produit correspondant à votre recherche</h4>
            </div>
            @endforelse

            <div class="col-md-10">
                {{ $searchProducts->appends(request()->input())->links() }}
            </div>

        </div>
    </div>
</div>

@endsection
