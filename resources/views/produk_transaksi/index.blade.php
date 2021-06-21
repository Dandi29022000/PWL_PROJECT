@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Transaksi</h1>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-success" href="{{ route('produk_transaksi.create') }}">Input Transaksi</a>
            </div>
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('produk_transaksi.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('produk_transaksi.index') }}" class="mr-4 mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Refresh</span>
                                    </button>
                                </span>
                            </a>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <span class="input-group-btn mr-2 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="default-table">
                    <table>
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">Id Transaksi</th>
                                <th scope="">Nama Produk</th>
                                <th scope="">Nama Pelanggan</th>
                                <th scope="">Tanggal</th>
                                <th scope="">Harga</th>
                                <th scope="">Qty</th>
                                <th scope="">Total Bayar</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk_transaksi as $Transaksi)
                            <tr>
                                <td>{{ $Transaksi->id }}</td>
                                <td>{{ $Transaksi->produk->name }}</td>
                                <td>{{ $Transaksi->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $Transaksi->tanggal }}</td>
                                <td>{{ $Transaksi->harga }}</td>
                                <td>{{ $Transaksi->qty }}</td>
                                <td>{{ $Transaksi->total_bayar }}</td>
                                <td>
                                    <form action="{{ route('produk_transaksi.destroy', $Transaksi->id ) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data transaksi?')">
                                        <a class="btn btn-info" href="{{ route('produk_transaksi.show', $Transaksi->id ) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('produk_transaksi.edit', $Transaksi->id ) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        <a class="btn btn-warning" href="{{ route('produk_transaksi.cetak_pdf',  $Transaksi->id) }}">Cetak</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $produk_transaksi->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
