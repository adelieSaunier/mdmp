@extends('layouts.app')

@section('title', 'Merci pour votre achat')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif

                    <div class="p-4 shadow bg-white">
                        <h2>My Digital Market Place</h2>
                        <h4 class="mb-3">Merci pour votre achat !</h4>
                        <a href="{{ url('categories') }}" class="btn btn-primary">Voir les autres produits</a><br>
                        <a href="{{ url('commandes') }}" class="btn btn-primary">Voir mes commandes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
