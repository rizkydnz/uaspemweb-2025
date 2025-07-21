<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'state_country' => 'required|string',
        'postal_zip' => 'required|string',
        'cart' => 'required|array',
    ]);

    // Simpan order
    $order = Order::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'state_country' => $validated['state_country'],
        'postal_zip' => $validated['postal_zip'],
        'total' => collect($validated['cart'])->sum(fn ($item) => $item['price'] * $item['quantity']),
    ]);

    foreach ($validated['cart'] as $item) {
        $order->items()->create([
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    return redirect('/thankyou.html');
}
}
