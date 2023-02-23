<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){

        $validatedDatas = $request->validated();
        $category = new Category;
        $category->name = $validatedDatas['name'];
        $category->slug = Str::slug($validatedDatas['slug']);
        $category->description = $validatedDatas['description'];
        $uploadPath = 'uploads/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/category/', $filename);

            $category->image = $uploadPath.$filename;
        }

        $category->meta_title = $validatedDatas['meta_title'];
        $category->meta_keyword = $validatedDatas['meta_keyword'];
        $category->meta_description = $validatedDatas['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message', 'Catégorie ajoutée');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category){

        $category = Category::findOrFail($category);

        $validatedDatas = $request->validated();

        $category->name = $validatedDatas['name'];
        $category->slug = Str::slug($validatedDatas['slug']);
        $category->description = $validatedDatas['description'];
        $uploadPath = 'uploads/category/';
        if($request->hasFile('image')){

            $path = 'uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/category/', $filename);

            $category->image = $uploadPath.$filename;
        }

        $category->meta_title = $validatedDatas['meta_title'];
        $category->meta_keyword = $validatedDatas['meta_keyword'];
        $category->meta_description = $validatedDatas['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->update();
        return redirect('admin/category')->with('message', 'Catégorie modifiée');
    }




}
