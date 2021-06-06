<section class="tm-section tm-section-margin-bottom-0 row">
    <div class="col-lg-12 tm-section-header-container">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/logo.png" alt="Logo"
                class="tm-site-logo">Daftar Pegawai Hits</h2>
        <div class="tm-hr-container">
            <hr class="tm-hr">
        </div>
    </div>
    <div class="col-lg-12 tm-popular-items-container">
        @foreach($petugas as $petugas)
        <div class="tm-popular-item">
            <img src="img/{{$petugas -> gambar}}" alt="Popular" class="tm-popular-item-img" width="97.5%">
            <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title">{{$petugas -> nama_petugas}}</h3>
                <hr class="tm-popular-item-hr">
                <p><br>Alamat : {{$petugas -> alamat}}<br>No telepon : {{$petugas -> no_telepon}}</p>
                <div class="order-now-container">
                    <a href="#" class="order-now-link tm-handwriting-font">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>