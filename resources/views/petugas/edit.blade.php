@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Petugas
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

                    <form method="post" action="{{ route('petugas.update', $Petugas->id_petugas) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">Id Petugas</label>
                        <input type="text" name="id" class="form-control" id="id" value="{{ $Petugas->id_petugas }}" ariadescribedby="id" >
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Petugas</label>
                        <input type="text" name="name" class="form-control" id="id" value="{{ $Petugas->nama_petugas }}" ariadescribedby="name" >
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ $Petugas->gambar }}" ariadescribedby="image" >
                        <img width="150px" src="{{asset('images/'.$Petugas->gambar)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="price">Alamat</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ $Petugas->alamat }}" ariadescribedby="price" >
                    </div>

                    <div class="form-group">
                        <label for="weigth">Telepon</label>
                        <input type="text" name="weigth" class="form-control" id="weigth" value="{{ $Petugas->telepon }}" ariadescribedby="weigth" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
