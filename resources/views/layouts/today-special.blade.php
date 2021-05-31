<section class="tm-section row">
    <div class="col-lg-12 tm-section-header-container">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/logo.png" alt="Logo"
                class="tm-site-logo"> Today's Special</h2>
        <div class="tm-hr-container">
            <hr class="tm-hr">
        </div>
    </div>
    <div class="col-lg-12 tm-special-container margin-top-60">
    @foreach($menus as $menu)
    @if ($menu -> id == 1)
        <div class="tm-special-container-left">
            <!-- left -->
            <div class="tm-special-item">
                <div class="tm-special-img-container">
                    <img src="img/{{$menu -> foto}}" alt="Special" class="tm-special-img img-responsive">
                    <a href="#">
                        <div class="tm-special-description">
                            <h3 class="tm-special-title">{{$menu -> nama}}</h3>
                            <p>{{$menu -> deskripsi}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif
        <div class="tm-special-container-right">
        @if ($menu -> id == 2)
            <!-- right -->
            <div>
                <div class="tm-special-item">
                    <div class="tm-special-img-container">
                        <img src="img/{{$menu -> foto}}" alt="Special" class="img-responsive">
                        <a href="#">
                            <div class="tm-special-description">
                                <h3 class="tm-special-title">{{$menu -> nama}}</h3>
                                <p>{{$menu -> deskripsi}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @if ($menu -> id == 3)
            <div class="tm-special-container-lower">
                <div class="tm-special-item">
                    <div class="tm-special-img-container">
                        <img src="img/{{$menu -> foto}}" alt="Special" class="img-responsive">
                        <a href="#">
                            <div class="tm-special-description">
                                <p>{{$menu -> nama}}</p>
                            </div>
                        </a>
                    </div>
                </div>
        @endif
        @if ($menu -> id == 4)
                <div class="tm-special-item">
                    <div class="tm-special-img-container">
                        <img src="img/{{$menu -> foto}}" alt="Special" class="img-responsive">
                        <a href="#">
                            <div class="tm-special-description">
                                <p>{{$menu -> nama}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endforeach