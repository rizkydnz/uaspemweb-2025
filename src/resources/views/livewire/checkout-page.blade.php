<main>
    <div>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
        <div class="container">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <!-- Billing Form -->
                    <div class="col-md-6 mb-5">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group mb-3">
                                <label class="text-black">Name *</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-black">Email *</label>
                                <input type="email" wire:model.defer="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-black">Phone *</label>
                                <input type="text" wire:model.defer="phone" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-black">Address *</label>
                                <input type="text" wire:model.defer="address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-black">Order Notes</label>
                                <textarea wire:model.defer="notes" class="form-control" rows="4" placeholder="Write your notes here..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-md-6">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <tr><th>Product</th><th>Total</th></tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($cart as $item)
                                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                                        <tr>
                                            <td>{{ $item['name'] }} <strong class="mx-2">x</strong> {{ $item['quantity'] }}</td>
                                            <td>${{ number_format($subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td class="text-black font-weight-bold"><strong>${{ number_format($total, 0, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <button type="submit" class="btn btn-black btn-lg btn-block">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@livewire('transaction-history')
</main>