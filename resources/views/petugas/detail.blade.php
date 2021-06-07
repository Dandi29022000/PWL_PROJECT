@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Petugas
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Petugas : </b>{{$Petugas->id_petugas}}</li>
                        <li class="list-group-item"><b>Nama Petugas : </b>{{$Petugas->nama_petugas}}</li>
                        <li class="list-group-item"><b>Gambar : </b>{{$Petugas->gambar}}</li>
                        <li class="list-group-item"><b>Alamat : </b>{{$Petugas->alamat}}</li>
                        <li class="list-group-item"><b>Telepon : </b>{{$Petugas->no_telepon}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('petugas.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection