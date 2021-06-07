@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Pelanggan</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data pelanggan</strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Perhatian!</strong> Ada masalah dengan inputan Anda!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('pelanggan.store') }}" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="id_pelanggan">Id Pelanggan</label>
                                <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan" aria-describedby="id_pelanggan" required="required">
                            </div>

                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" aria-describedby="nama_pelanggan" required="required">
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label> 
                                <input type="file" name="gambar" class="form-control" id="gambar" aria-describedby="gambar" required="required">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" required="required">
                            </div>

                            <div class="form-group">
                                <label for="no_telepon">Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" id="no_telepon" aria-describedby="no_telepon" required="required">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
