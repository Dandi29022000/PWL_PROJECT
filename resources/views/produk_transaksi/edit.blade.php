@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Transaksi
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

                    <form method="post" action="{{ route('produk_transaksi.update', $Produk_Transaksi->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="produk_id">Nama Produk</label>
                        <select name="produk_id" id="produk_id" class="form-control">
                            <option selected disabled>Pilih Produk</option>
                            @foreach($Product as $pd)
                                <option value="{{ $pd->id }}">{{ $Produk_Transaksi->produk_id == $pd->id ? 'selected': ''}}>{{ $pd->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pelanggan_id">Nama Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                            <option selected disabled>Pilih Pelanggan</option>
                            @foreach($Pelanggan as $pl)
                                <option value="{{ $pl->id_pelanggan }}">{{ $Produk_Transaksi->pelanggan_id == $pl->id_pelanggan ? 'selected': ''}}>{{ $pl->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" id="tanggal" value="{{ $Produk_Transaksi->tanggal }}"  aria-describedby="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label> 
                        <input type="text" name="harga" class="form-control" id="harga" value="{{ $Produk_Transaksi->harga }}"  aria-describedby="harga">
                    </div>

                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="text" name="qty" class="form-control" id="qty" value="{{ $Produk_Transaksi->qty }}"  aria-describedby="qty">
                    </div>

                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="text" name="total_bayar" class="form-control" id="total_bayar" value="{{ $Produk_Transaksi->total_bayar }}"  aria-describedby="total_bayar">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk_transaksi.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
