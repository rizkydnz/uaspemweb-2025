<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Futurenire<span>.</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('shop') ? 'active' : '' }}">
            <a href="{{ route('shop') }}">Shop</a>
        </li>
        <li class="{{ request()->routeIs('riwayat.transaksi') ? 'active' : '' }}">
            <a href="{{ route('riwayat.transaksi') }}">Riwayat Transaksi</a>
        </li>
      </ul>
      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li><a class="nav-link" href="{{ url('/cart') }}"><img src="{{asset ('front/images/cart.svg') }}"></a></li>
      </ul>
    </div>
  </div>
</nav>