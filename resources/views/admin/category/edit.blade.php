@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3>Modifier une catégorie
                        <a class="btn btn-sm btn-primary text-white float-end" href="{{ url('admin/category') }}">
                            Retour
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'. $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Nom</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                                @error('slug')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="auto">
                                @error('image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Hors ligne</label><br>
                                <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' :'' }} >
                            </div>


                            <div class="col-md-12 mb-3">
                                <h4>SEO TAGS</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                                @error('meta_title')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea name="meta_keyword" id="meta_keyword" rows="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                                @error('meta_keyword')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3" class="form-control">{{ $category->meta_description }}</textarea>
                                @error('meta_description')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                            </div>

                        </div>



                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
