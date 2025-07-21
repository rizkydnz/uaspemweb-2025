<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public function increment($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        }
        session()->put('cart', $cart);
    }

    public function decrement($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
        }
        session()->put('cart', $cart);
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }

    public function render()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('livewire.cart-page', compact('cart', 'subtotal'));
    }
}
