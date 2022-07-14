<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Livewire\Component;

class Productlist extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::get();

        return view('livewire.productlist');
    }

    public function addToCart($id)
    {
        if (auth()->user()) {
            // add to cart
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];

            ShoppingCart::updateOrCreate($data);
            session()->flash('success', 'Product added to the cart successfully!');
        } else {
            // redirect to login
            return redirect()->route('login');
        }
    }
}
