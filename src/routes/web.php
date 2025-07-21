<?php

use App\Livewire\TransactionHistory;
use App\Livewire\HomePage;
use App\Livewire\ShopPage;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\InvoicePage; 
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomePage::class)->name('home');
Route::get('/shop', ShopPage::class)->name('shop');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', CartPage::class)->name('checkout');
Route::get('/checkout', CheckoutPage::class)->name('checkout');
Route::get('/riwayat-transaksi', TransactionHistory::class)->name('riwayat.transaksi');
Route::get('/invoice/{order}', InvoicePage::class)->name('invoice');

Route::get('/invoice/{order}/pdf', [InvoiceController::class, 'downloadPdf'])->name('invoice.pdf');
Route::get('/invoice/{order}/pdf', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');

