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
                <h3>Liste des sliders
                    <a class="btn btn-sm btn-primary text-white float-end" href="{{ url('admin/slider/create') }}">
                        Ajouter un slider
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>
                                    <div class="text-center">
                                      {{ $slider->id }}
                                    </div>
                                </td>
                                <td>
                                    {{ $slider->title }}
                                </td>
                                <td>
                                    {{ $slider->description }}
                                </td>
                                <td>
                                    <div class="text-center">
                                        <img src="{{ asset("$slider->image") }}" style="height:70px; width:70px;" alt="slider">
                                    </div>


                                </td>
                                <td>
                                    {{ $slider->status == '0' ? 'En ligne'  : 'Hors-ligne' }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/slider/'.$slider->id.'/edit') }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <a href="{{ url('admin/slider/'.$slider->id.'/delete') }}" onclick="return confirm('êtes vous certain de vouloir supprimer ce slider ?')" class="btn btn-danger btn-sm">Supprimer</a>
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

