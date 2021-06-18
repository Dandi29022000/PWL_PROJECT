@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Produk</h1>
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
            <div class="left mr-4 mt-1" >
                <div class="float-left">
                    <form action="{{ route('user.produk') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('user.produk') }}" class="mr-4 mt-1">
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
                                <th scope="">Id</th>
                                <th scope="">Name</th>
                                <th scope="">Description</th>
                                <th scope="">Image</th>
                                <th scope="">Price</th>
                                <th scope="">Weigth</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $Product)
                            <tr>
                                <td>{{ $Product->id }}</td>
                                <td>{{ $Product->name }}</td>
                                <td>{{ $Product->description }}</td>
                                <td><img width="200px" src="{{asset('storage/'.$Product->image)}}" alt=""></td>
                                <td>{{ $Product->price }}</td>
                                <td>{{ $Product->weigth }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $products->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
