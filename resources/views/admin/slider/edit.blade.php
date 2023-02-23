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
                <h3>Modifier un slider
                    <a class="btn btn-sm btn-primary text-white float-end" href="{{ url('admin/sliders/' ) }}">
                        Retour
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Titre</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="description_slider" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset($slider->image) }}" width="60px" height="auto">
                        @error('image')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Hors ligne</label>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }} >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sauvegarder le slider</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
