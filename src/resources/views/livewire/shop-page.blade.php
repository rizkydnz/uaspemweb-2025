<main><div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-item">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                        <span class="icon-cross" style="cursor: pointer;" wire:click="addToCart({{ $product->id }})">
                            <img src="{{ asset('front/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div></main>
