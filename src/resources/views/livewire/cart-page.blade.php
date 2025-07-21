<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart as $item)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $item['image']) }}" width="80"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>${{ number_format($item['price'], 2) }}</td>
                                    <td>
                                        <div class="input-group" style="max-width: 120px;">
                                            <button wire:click="decrement({{ $item['id'] }})" class="btn btn-outline-black">-</button>
                                            <input type="text" class="form-control text-center" value="{{ $item['quantity'] }}" readonly>
                                            <button wire:click="increment({{ $item['id'] }})" class="btn btn-outline-black">+</button>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                    <td><button wire:click="remove({{ $item['id'] }})" class="btn btn-black btn-sm">X</button></td>
                                </tr>
                            @empty
                                <tr><td colspan="6">Keranjangmu Kosong Saat Ini</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Cart Totals --}}
        <div class="row">
            <div class="col-md-6">
                <a href="shop" class="btn btn-black">Lanjutkan Belanja</a>
            </div>
            <div class="col-md-6 text-right">
                <h4>Cart Totals</h4>
                <p>Subtotal: <strong>${{ number_format($subtotal, 2) }}</strong></p>
                <p>Total: <strong>${{ number_format($subtotal, 2) }}</strong></p>
                <a href="checkout" class="btn btn-black">Proses Belanja</a>
            </div>
        </div>
    </div>
</div>
