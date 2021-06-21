@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Transaksi</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data transaksi</strong></h3>
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
                        <form method="POST" action="{{ route('produk_transaksi.store') }}" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="produk_id">Nama Produk</label>
                                <select name="produk_id" id="produk_id" class="form-control">
                                    <option selected disabled>Pilih Produk</option>
                                @foreach($products as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pelanggan_id">Nama Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                    <option selected disabled>Pilih Pelanggan</option>
                                @foreach($pelanggan as $pelanggan)
                                    <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" placeholder="dd-mm-yyyy" 
                                value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label> 
                                <input type="text" name="harga" class="form-control" id="harga" aria-describedby="harga">
                            </div>

                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="text" name="qty" class="form-control" id="qty" aria-describedby="qty">
                            </div>

                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input type="text" name="total_bayar" class="form-control" id="total_bayar" aria-describedby="total_bayar">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('produk_transaksi.index') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
