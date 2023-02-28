@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
            <h6 class="alert alert-success">{{ session('message') }},</h6>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2>Tableau de bord,</h2>
            <p class="mb-md-0">Vos analyses</p>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Toutes les commandes</label>
                    <h1>{{ $totalOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Commandes du jour</label>
                    <h1>{{ $todayOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Les commandes du mois</label>
                    <h1>{{ $thisMonthOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label>Les commandes de l'année</label>
                    <h1>{{ $thisYearOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white">Voir</a>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Nombre de produits</label>
                    <h1>{{ $totalProducts }}</h1>
                    <a href="{{ url('admin/products') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Nombre de catégories</label>
                    <h1>{{ $totalCategories }}</h1>
                    <a href="{{ url('admin/category') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Nombre de marques</label>
                    <h1>{{ $totalBrands }}</h1>
                    <a href="{{ url('admin/brands') }}" class="btn text-white">Voir</a>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Nombre d'utilisateurs</label>
                    <h1>{{ $totalAllUsers }}</h1>
                    <a href="{{ url('admin/users') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Nombre de clients</label>
                    <h1>{{ $totalUser }}</h1>
                    <a href="{{ url('admin/users') }}" class="btn text-white">Voir</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Nombre d'admins</label>
                    <h1>{{ $totalAdmin }}</h1>
                    <a href="{{ url('admin/users') }}" class="btn text-white">Voir</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
