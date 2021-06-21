@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Petugas</h1>
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
                <a class="btn btn-success" href="{{ route('petugas.create') }}">Input Petugas</a>
            </div>
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('petugas.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('petugas.index') }}" class="mr-4 mt-1">
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
                                <th scope="">Id Petugas</th>
                                <th scope="">Nama Petugas</th>
                                <th scope="">Gambar</th>
                                <th scope="">Alamat</th>
                                <th scope="">Telepon</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $Petugas)
                            <tr>
                                <td>{{ $Petugas->id_petugas }}</td>
                                <td>{{ $Petugas->nama_petugas }}</td>
                                <td><img width="200px" src="{{asset('storage/'.$Petugas->gambar)}}" alt=""></td>
                                <td>{{ $Petugas->alamat }}</td>
                                <td>{{ $Petugas->no_telepon }}</td>
                                <td>
                                    <form action="{{ route('petugas.destroy', $Petugas->id_petugas ) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data petugas?')">
                                    <a class="btn btn-info" href="{{ route('petugas.show', $Petugas->id_petugas ) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('petugas.edit', $Petugas->id_petugas ) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $petugas->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
