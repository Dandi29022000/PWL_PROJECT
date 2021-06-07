@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Produk
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id : </b>{{$Product->id}}</li>
                        <li class="list-group-item"><b>Name : </b>{{$Product->name}}</li>
                        <li class="list-group-item"><b>Description : </b>{{$Product->description}}</li>
                        <li class="list-group-item"><b>Image : </b>{{$Product->image}}</li>
                        <li class="list-group-item"><b>Price : </b>{{$Product->price}}</li>
                        <li class="list-group-item"><b>Weigth : </b>{{$Product->weigth}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('produk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection