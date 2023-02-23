<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category;
    public $product;
    public $quantityCount = 1;
    public $productColorQuantity;
    public $prodColorId;

    public function addToWishList($productId)
    {
        //dd($productId);
        if(Auth::check()){
            //dd('je suis co');
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                //session()->flash('message', 'Ce produit est déjà dans votre liste de souhaits');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Ce produit est déjà dans votre liste de souhaits',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdated');
                //session()->flash('message', 'Ce produit a été ajouté dans votre liste de souhaits');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Ce produit a été ajouté dans votre liste de souhaits',
                    'type' => 'info',
                    'status' => 200
                ]);
            }


        } else {
            //session()->flash('message', 'Connectez vous pour gardez ce produit dans votre liste de souhaits');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Connectez vous pour gardez ce produit dans votre liste de souhaits',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($prodColorId)
    {
        $this->prodColorId = $prodColorId;
        $prodColor = $this->product->productColors()->where('id', $prodColorId)->first();
        $this->productColorQuantity = $prodColor->quantity;

        if ($this->productColorQuantity == 0) {
            $this->productColorQuantity = 'outOfStock';
        }
    }

    //10 pour le test mais il faut envoyer la quantité de produit en stock
    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                // Verrif quantité de produit/couleur
                if($this->product->productColors()->count() > 1)
                {
                    if($this->productColorQuantity != NULL)
                    {
                        if(Cart::where('user_id',auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->prodColorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Produit déjà ajouté',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id',$this->prodColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                if($productColor->quantity > $this->quantityCount)
                                {
                                    // Insertion du produit dans le panier
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->prodColorId,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Produit ajouté au panier',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Seulement '.$productColor->quantity.' disponibles',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }

                            } else{

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'En rupture de stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Selectionnez une couleur de produit',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Produit déjà ajouté',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                // Insert Product to Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Produit ajouté au panier',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Seulement '.$this->product->quantity.' produits sont disponibles',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Stock épuisé',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Le produit n\'existe pas',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Connectez vous pour enregistrer votre panier',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',
        [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
