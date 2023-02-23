<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create(){
        return view('admin.colors.create');
    }

    public function store(ColorsFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message', 'La couleur a été ajouté avec succès');
    }

    public function edit(Color $color){
        return view('admin.colors.edit', compact('color'));

    }

    public function update(ColorsFormRequest $request, $color_id){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::find($color_id)->update($validatedData);
        return redirect('admin/colors')->with('message', 'La couleur a été modifiée avec succès');
    }

    public function destroy($color_id){
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message', 'La couleur a été supprimée avec succès');

    }
}
