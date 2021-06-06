@extends('layouts.app')

@section('title', 'Caffe House Template')

@section('konten', 'Kelompok 12')

@section('content')
<section class="tm-section row">
    <div class="col-lg-9 col-md-9 col-sm-8">
        <h2 class="tm-section-header gold-text tm-handwriting-font">The Best Coffee for you</h2>
        <h2>Cafe House</h2>
        @foreach($posts as $post)
        <p class="tm-welcome-description">
            This is free HTML5 website template from <span class="blue-text">template</span><span class="green-text">mo</span>.
            {{$post -> konten}}
        </p>
        @endforeach
        <a href="#" class="tm-more-button margin-top-30">Read More</a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
        <div class="inline-block shadow-img">
            <img src="img/1.jpg" alt="Image" class="img-circle img-thumbnail">
        </div>
    </div>
</section>

@include('layouts.pelanggan')

@include('layouts.today-special')

@include('layouts.daily-menu')

@endsection