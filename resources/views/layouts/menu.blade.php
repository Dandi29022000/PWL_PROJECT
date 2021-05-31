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
                        <li><a href="/customer" class="{{ Request::is('customer') ? 'active' : '' }}">Customer</a></li>
                        <li><a href="/menu" class="{{ Request::is('menu') ? 'active' : '' }}">Menu</a></li>
                        <li><a href="/contact-us" class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact</a></li>
                        <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
                        <li><a href="/pegawai" class="{{ Request::is('pegawai') ? 'active' : '' }}">Employee</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
