<main>
    <div class="container mt-5">
    <h2 class="mb-4">Invoice #{{ $order->id }}</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><strong>Order Details</strong></div>
        <ul class="list-group list-group-flush">
            @foreach ($order->items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item->product_name }} (x{{ $item->quantity }})
                    <span>${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Total</strong>
                <strong>${{ number_format($order->total, 0, ',', '.') }}</strong>
            </li>
        </ul>
    </div>

    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-primary">Download PDF</a>
    <a href="{{ route('shop') }}"class="btn btn-sm btn-outline-black">Back to shop</a>
</div>
</main>
