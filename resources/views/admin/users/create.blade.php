@extends('layouts.admin')

@section('title','Add User')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Créer un utilisateur
                    <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">
                        Retour
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/users') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Mail</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Mot de passe</label>
                            <input type="text" name="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Définir un rôle</label>
                            <select name="role_as" class="form-control">
                                <option value="">Rôle</option>
                                <option value="0">Client</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
