@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Pelanggan
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

                    <form method="post" action="{{ route('pelanggan.update', $Pelanggan->id_pelanggan) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" value="{{ $Pelanggan->nama_pelanggan }}" ariadescribedby="nama_pelanggan" >
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $Pelanggan->gambar }}" ariadescribedby="gambar" >
                        <img width="150px" src="{{asset('storage/'.$Pelanggan->gambar)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Pelanggan->alamat }}" ariadescribedby="alamat" >
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="{{ $Pelanggan->no_telepon }}" ariadescribedby="no_telepon" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
