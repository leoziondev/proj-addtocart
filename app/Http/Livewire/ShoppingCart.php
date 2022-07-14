<?php

namespace App\Http\Livewire;

use App\Models\ShoppingCart as Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public
        $cartItems,
        $sub_total = 0,
        $total = 0,
        $discount = 0;

    public function render()
    {
        $this->cartItems = Cart::with('product')
            ->where(['user_id' => auth()->user()->id])
            ->get();

            $this->sub_total = 0;
            $this->total = 0;
            $discount = $this->discount;

            foreach($this->cartItems as $item) {
                $this->sub_total += $item->product->formatted_price * $item->quantity;
            }

            $this->total = $this->sub_total - $this->discount;

        return view('livewire.shopping-cart');
    }

    public function incrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();

        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
        }


    }

    public function removeItem($id) {
        $cart = Cart::whereId($id)->first();
        $cart->delete();

        $this->emit('updateCartCount');
    }
}
