<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/categories', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/categories/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'category_products']);
Route::get('/produit/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'show_product']); //route d'un seul produit
Route::get('search', [App\Http\Controllers\Frontend\FrontendController::class, 'searchProducts']);

//Routes de l'utilisateur authentifié avec middleware
Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('panier', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('thanks', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    //Page administration générale
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);

    //routes slider
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('/sliders', 'index');
        Route::get('/slider/create', 'create');
        Route::post('/slider/create','store');
        Route::get('/slider/{slider}/edit', 'edit');
        Route::get('/slider/{slider}/delete', 'destroy');
        Route::put('/slider/{slider}', 'update');
    });

    //routes category
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });

    //Routes Marque
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

    //Routes produits
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColorQty');
    });

    //Routes couleurs
    Route::controller(App\Http\Controllers\Admin\ColorsController::class)->group(function(){
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/color/{color}/edit', 'edit');
        Route::put('/color/{color_id}', 'update');
        Route::get('/color/{color_id}/delete', 'destroy');
    });


});
