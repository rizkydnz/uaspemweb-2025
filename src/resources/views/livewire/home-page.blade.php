<main>
    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Desain Furniture <span class="d-block">Modern & Elegan</span></h1>
                        <p class="mb-4">Jadikan ruangan Anda lebih hidup dengan pilihan furniture berkualitas dan desain kekinian dari Futurenire.</p>
                        <p><a href="{{ url('/cart') }}" class="btn btn-secondary me-2">Belanja Sekarang</a><a href="{{ url('/shop') }}" class="btn btn-white-outline">Lihat Koleksi</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('front/images/couch.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Section -->
    <div class="product-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Furniture dengan Material Berkualitas</h2>
                    <p class="mb-4">Setiap produk dibuat dari bahan pilihan, memastikan ketahanan dan kenyamanan untuk penggunaan jangka panjang.</p>
                    <p><a href="{{ route('shop') }}" class="btn">Lihat Semua</a></p>
                </div>

                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ route('cart') }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                            <span class="icon-cross" style="cursor: pointer;" wire:click="addToCart({{ $product->id }})">
                                <img src="{{ asset('front/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Kenapa Memilih Futurenire?</h2>
                    <p>Kami menawarkan furniture yang tidak hanya indah dipandang, tetapi juga fungsional dan tahan lama untuk kebutuhan rumah Anda.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('front/images/truck.svg') }}" alt="Pengiriman" class="imf-fluid">
                                </div>
                                <h3>Pengiriman Cepat & Gratis</h3>
                                <p>Kami mengirimkan produk ke seluruh Indonesia dengan aman dan cepat, tanpa biaya tambahan.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('front/images/bag.svg') }}" alt="Belanja Mudah" class="imf-fluid">
                                </div>
                                <h3>Mudah Berbelanja</h3>
                                <p>Proses pemesanan sederhana, cukup pilih produk, bayar, dan tunggu di rumah.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('front/images/support.svg') }}" alt="Support" class="imf-fluid">
                                </div>
                                <h3>Dukungan 24/7</h3>
                                <p>Tim kami siap membantu kapan saja Anda butuhkan.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('front/images/return.svg') }}" alt="Garansi" class="imf-fluid">
                                </div>
                                <h3>Garansi Pengembalian</h3>
                                <p>Tidak puas? Anda bisa kembalikan produk sesuai syarat dan ketentuan.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('front/images/why-choose-us-img.jpg') }}" alt="Interior Futurenire" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- We Help Section -->
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="{{ asset('front/images/img-grid-1.jpg') }}" alt="Inspirasi Interior"></div>
                        <div class="grid grid-2"><img src="{{ asset('front/images/img-grid-2.jpg') }}" alt="Inspirasi Rumah"></div>
                        <div class="grid grid-3"><img src="{{ asset('front/images/img-grid-3.jpg') }}" alt="Inspirasi Desain"></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">Kami Membantu Anda Menata Rumah Impian</h2>
                    <p>Temukan inspirasi desain dan produk furniture yang sesuai dengan gaya hidup Anda. Mulai dari ruang tamu hingga kamar tidur, kami hadir untuk memberi solusi interior yang estetik dan fungsional.</p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Desain minimalis dan elegan</li>
                        <li>Bahan ramah lingkungan</li>
                        <li>Proses pemesanan cepat dan aman</li>
                        <li>Dukungan pelanggan yang responsif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Inspirasi & Tips Furniture</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('front/images/post-1.jpg') }}" alt="Tips Rumah" class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Tips Menata Rumah Minimalis Modern</a></h3>
                            <div class="meta">
                                <span>oleh <a href="#">Kristin Watson</a></span> <span>pada <a href="#">19 Jul 2025</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('front/images/post-2.jpg') }}" alt="Perawatan Furniture" class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Cara Merawat Sofa agar Awet dan Bersih</a></h3>
                            <div class="meta">
                                <span>oleh <a href="#">Robert Fox</a></span> <span>pada <a href="#">15 Jul 2025</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('front/images/post-3.jpg') }}" alt="Interior Kecil" class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">Ide Desain Furniture untuk Ruangan Sempit</a></h3>
                            <div class="meta">
                                <span>oleh <a href="#">Kristin Watson</a></span> <span>pada <a href="#">12 Jul 2025</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
