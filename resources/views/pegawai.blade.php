@extends('layouts.app')

@section('title', 'Caffe House Template')

@section('konten', 'Kelompok 12')

@section('content')
<section class="tm-section tm-section-margin-bottom-0 row">
    <div class="col-lg-12 tm-section-header-container">
        <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="img/logo.png" alt="Logo"
                class="tm-site-logo">Daftar Pelanggan</h2>
        <div class="tm-hr-container">
            <hr class="tm-hr">
        </div>
    </div>
    <div class="col-lg-12 tm-popular-items-container">
        @foreach($pegawais as $pegawai)
        <div class="tm-popular-item">
            <img src="img/{{$pegawai -> foto}}" alt="Popular" class="tm-popular-item-img" width="97.5%">
            <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title">{{$pegawai -> nama}}</h3>
                <hr class="tm-popular-item-hr">
                <p>Kelas : TI 2D<br>NIM : {{$pegawai -> nim}}<br>No. Absen : {{$pegawai -> absen}}</p>
                <div class="order-now-container">
                    <a href="#" class="order-now-link tm-handwriting-font">Employee</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection