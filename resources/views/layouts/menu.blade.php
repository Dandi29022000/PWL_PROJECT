<div class="tm-top-header">
    <div class="container">
        <div class="row">
            <div class="tm-top-header-inner">
                <div class="tm-logo-container">
                    <img src="img/logo.png" alt="Logo" class="tm-site-logo">
                    <h1 class="tm-site-name tm-handwriting-font">Kelompok 12</h1>
                </div>
                <div class="mobile-menu-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <nav class="tm-nav">
                    <ul>
                        <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="/pelanggan" class="{{ Request::is('pelanggan') ? 'active' : '' }}">Pelanggan</a></li>
                        <li><a href="/produk" class="{{ Request::is('products') ? 'active' : '' }}">Produk</a></li>
                        {{-- <li><a href="/menu" class="{{ Request::is('menu') ? 'active' : '' }}">Menu</a></li> --}}
                        <li><a href="/petugas" class="{{ Request::is('petugas') ? 'active' : '' }}">Petugas</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
