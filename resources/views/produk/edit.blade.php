@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Produk
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('produk.update', $Product->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control" id="id" value="{{ $Product->name }}" ariadescribedby="name" >
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $Product->description }}" ariadescribedby="description" >
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ $Product->image }}" ariadescribedby="image" >
                        <img width="200px" src="{{asset('storage/'.$Product->image)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ $Product->price }}" ariadescribedby="price" >
                    </div>

                    <div class="form-group">
                        <label for="weigth">Weigth</label>
                        <input type="text" name="weigth" class="form-control" id="weigth" value="{{ $Product->weigth }}" ariadescribedby="weigth" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
