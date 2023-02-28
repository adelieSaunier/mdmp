@extends('layouts.admin')

@section('title','Liste des Utilisateurs')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Utilisateurs
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Ajouter un utilisateur
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Mail</th>
                                <th>Rôle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->roles_as == '0')
                                        <label class="badge btn-primary">Client</label>
                                    @elseif ($user->roles_as == '1')
                                        <label class="badge btn-success">Admin</label>
                                    @else
                                        <label class="badge btn-danger">Sans rôle</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">
                                        Modifier
                                    </a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete') }}"
                                        onclick="return confirm('Are you sure, you want to delete this data?')"
                                        class="btn btn-sm btn-danger">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Pas d'utilisateur disponible</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
