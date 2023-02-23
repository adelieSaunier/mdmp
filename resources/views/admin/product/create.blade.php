@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Ajouter un produit
                    <a class="btn btn-sm btn-danger text-white float-end" href="{{ url('admin/products') }}">
                        Retour
                    </a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div class="">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>

                @endif
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Infos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Détails
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Images
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Couleurs / Quantité
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <!-- Infos générales -->
                            <div class="mt-4 mb-3">
                                <label for="product_category">Catégorie</label>
                                <select name="category_id" id="product_category" class="form-control">
                                    @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Nom du produit</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Slug du produit</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="brand_product">Marque</label>
                                <select name="brand" id="brand_product" class="form-control">
                                    @foreach ( $brands as $brand )
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="small_description_product">Description Courte</label>
                                <textarea name="small_description" id="small_description_product" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description_product">Description</label>
                                <textarea name="description" id="description_product" rows="6" class="form-control"></textarea>
                            </div>

                        </div>

                        <!-- SEO TAGS -->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mt-4 mb-3">
                                <label for="meta_title_product">Meta Title</label>
                                <textarea name="meta_title" id="meta_title_product" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_description_product">Meta Description</label>
                                <textarea name="meta_description" id="meta_description_product" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_keyword_product">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword_product" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- DETAILS PRODUITS -->
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="mt-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price_product">Prix sans discount</label>
                                        <input type="text" name="original_price" id="original_price_product" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price_product">Prix de vente avec remise</label><br>
                                        <input type="text" name="selling_price" id="selling_price_product" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity_product">Quantité</label>
                                        <input type="text" name="quantity" id="quantity_product" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="trending_product">Tendance<label>
                                        <input type="checkbox" class="m-2" name="trending" id="trending_product">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status_product">Hors ligne</label>
                                        <input type="checkbox" class="m-2" name="status" id="status_product">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- IMAGES PRODUIT -->
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <label>Charger les images du produit</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Choisir une couleur par quantité en stock</label>
                                    <div class="row">
                                        @forelse ($colors as $coloronline)
                                            <div class="col-md-3 mt-2">
                                                Couleur :<input type="checkbox" name="colors[{{$coloronline->id}}]" value="{{$coloronline->id}}">
                                                {{ $coloronline->name }}<br>
                                                Quantité : <input type="number" name="colorquantity[{{$coloronline->id}}]" style="width:70px; border: 1px solid;">
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h5>Vous n'avez pas de couleur en ligne</h5>
                                            </div>

                                        @endforelse

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
