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
                <h3>Ajouter une couleur
                    <a class="btn btn-sm btn-danger text-white float-end" href="{{ url('admin/colors') }}">
                        Retour
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/colors/create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nom de la couleur</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Code couleur</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Hors ligne</label>
                        <input type="checkbox" name="status" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sauvegarder la couleur</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

