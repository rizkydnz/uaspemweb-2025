<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'products' => Product::latest()->take(3)->get(), // ambil 6 produk terbaru
        ]);
    }
}
