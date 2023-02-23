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
                <h3>Liste des couleurs
                    <a class="btn btn-sm btn-primary text-white float-end" href="{{ url('admin/colors/create') }}">
                        Ajouter une couleur
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Code Couleur</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                            <tr>
                                <td>
                                    {{ $color->id }}
                                </td>
                                <td>
                                    {{ $color->name }}
                                </td>
                                <td>
                                    {{ $color->code }}
                                </td>
                                <td>
                                    {{ $color->status ? 'Hors-ligne' : 'En ligne' }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/color/'.$color->id.'/edit') }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <a href="{{ url('admin/color/'.$color->id.'/delete') }}" onclick="return confirm('êtes vous certain de vouloir supprimer cette couleur ?')" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

