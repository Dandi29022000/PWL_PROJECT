@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Produk
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

                    <form method="post" action="{{ route('produk.update', $Product->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">Id Produk</label>
                        <input type="id" name="id" class="form-control" id="id" value="{{ $Product->id }}" ariadescribedby="id" >
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="description" name="description" class="form-control" id="description" value="{{ $Product->description }}" ariadescribedby="description" >
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="image" name="image" class="form-control" id="image" value="{{ $Product->image }}" ariadescribedby="image" >
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" name="price" class="form-control" id="price" value="{{ $Product->price }}" ariadescribedby="price" >
                    </div>

                    <div class="form-group">
                        <label for="weigth">Weigth</label>
                        <input type="weigth" name="weigth" class="form-control" id="weigth" value="{{ $Product->weigth }}" ariadescribedby="weigth" >
                    </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
