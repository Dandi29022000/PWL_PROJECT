@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Transaksi
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Transaksi : </b>{{$Produk_Transaksi->id}}</li>
                        <li class="list-group-item"><b>Kelas: </b>{{$Produk_Transaksi->produk->name}}</li>
                        <li class="list-group-item"><b>Kelas: </b>{{$Produk_Transaksi->pelanggan->nama_pelanggan}}</li>
                        <li class="list-group-item"><b>Tanggal : </b>{{$Produk_Transaksi->tanggal}}</li>
                        <li class="list-group-item"><b>Harga : </b>{{$Produk_Transaksi->harga}}</li>
                        <li class="list-group-item"><b>Qty : </b>{{$Produk_Transaksi->qty}}</li>
                        <li class="list-group-item"><b>Total Bayar : </b>{{$Produk_Transaksi->total_bayar}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('produk_transaksi.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection