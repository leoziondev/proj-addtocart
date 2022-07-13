<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
        } else {
            // redirect to login
            return redirect()->route('login');
        }
    }
}
