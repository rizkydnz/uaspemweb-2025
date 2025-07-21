<main><div class="container py-5">
    <h2 class="mb-4">Riwayat Transaksi Anda</h2>

    <form wire:submit.prevent="search" class="mb-4">
        <div class="input-group">
            <input type="email" wire:model.defer="email" class="form-control" placeholder="Masukkan email saat checkout" required>
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
        @error('email') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
    </form>

    @if(!empty($transactions) && count($transactions) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $trx)
                        <tr>
                            <td>{{ $trx->code }}</td>
                            <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            <td>Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($trx->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif(!empty($transactions))
        <div class="alert alert-warning">Tidak ada transaksi ditemukan untuk email tersebut.</div>
    @endif
</div>
</main>