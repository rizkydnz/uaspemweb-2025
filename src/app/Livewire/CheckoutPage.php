<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;

class CheckoutPage extends Component
{
    public $name, $email, $phone, $address, $notes;
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->cart = Session::get('cart', []);
        $this->total = collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function placeOrder()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $order = Order::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
            'total' => $this->total,
        ]);

        foreach ($this->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('invoice', ['order' => $order->id]);
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}

