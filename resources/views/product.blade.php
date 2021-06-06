@extends('layouts.app')

@section('title', 'Caffe House Menu')

@section('konten', 'Menu')

@section('content')

@include('layouts.daily-menu')
<section class="tm-section row">
    <div class="col-lg-12 tm-section-header-container margin-bottom-30">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/logo.png" alt="Logo"
                class="tm-site-logo"> Our Menus</h2>
        <div class="tm-hr-container">
            <hr class="tm-hr">
        </div>
    </div>
    <div>
        <div class="col-lg-3 col-md-3">
            <div class="tm-position-relative margin-bottom-30">
                <nav class="tm-side-menu">
                    <ul>
                    @foreach($products as $menu)
                        <li><a href="#">{{$menu -> name}}</a></li>
                    @endforeach
                    </ul>
                </nav>
                <img src={{($menu -> image)}} alt="Menu bg" class="tm-side-menu-bg">
            </div>
        </div>
        <div class="tm-menu-product-content col-lg-9 col-md-9">
            <!-- menu content -->
            @foreach($products as $menu)
            <div class="tm-product">
                <img src="img/{{$menu -> image}}" alt="Product" class="tm-popular-item-img" width="55.5%">
                <div class="tm-product-text">
                    <h3 class="tm-product-title">{{$menu -> name}}</h3>
                    <p class="tm-product-description">{{$menu -> description}}</p>
                </div>
                <div class="tm-product-price">
                    <a href="#" class="tm-product-price-link tm-handwriting-font"><span
                            class="tm-product-price-currency">$</span>{{$menu -> price}}</a>
                </div><a href="#" class="order-now-link tm-handwriting-font">Order Now</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection