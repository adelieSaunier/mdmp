@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Nos Produits
                    <a class="btn btn-sm btn-primary text-white float-end" href="{{ url('admin/products/create') }}">
                        Ajouter un produit
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Nom</th>
                            <th>Prix de vente</th>
                            <th>Quantité</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product )
                        <tr>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                @if ( $product->category )
                                    {{ $product->category->name }}
                                    @else
                                        Pas de catégorie
                                @endif

                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->selling_price }}
                            </td>
                            <td>
                                {{ $product->quantity }}
                            </td>
                            <td>
                                {{ $product->status == '1' ? 'Hors-ligne' : 'En ligne' }}
                            </td>
                            <td>
                                <a href="{{ url('admin/products/'. $product->id .'/edit')}}" class="btn btn-success">Modifier</a>
                                <a href="{{ url('admin/products/'. $product->id .'/delete')}}" onclick="return confirm('êtes vous certain de vouloir supprimer ce produit ?')" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    Pas de produit disponible
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
