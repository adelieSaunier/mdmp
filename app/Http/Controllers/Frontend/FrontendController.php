<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    // La recherche du produit se fait ici sur le nom du produit
    // Il faudrait aussi ajouter une recherche dans la description
    public function searchProducts(Request $request)
    {
        if($request->search){
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        }else{
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function categories(){
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function category_products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category){

            return view('frontend.collections.products.index', compact('category'));
        }else{
            return redirect()->back();
        }
    }

    public function show_product(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category){
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product){
                return view('frontend.collections.products.show', compact('product','category'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thanks');
    }


}
