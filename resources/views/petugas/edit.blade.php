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

                    <form method="post" action="{{ route('petugas.update', $Petugas->id_petugas) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" id="nama_petugas" value="{{ $Petugas->nama_petugas }}" ariadescribedby="nama_petugas" >
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $Petugas->gambar }}" ariadescribedby="gambar" >
                        <img width="150px" src="{{asset('storage/'.$Petugas->gambar)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Petugas->alamat }}" ariadescribedby="alamat" >
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="{{ $Petugas->no_telepon }}" ariadescribedby="no_telepon" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
