<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <title>Data Produk</title>
</head>

<body>
    <h5 class="text-center">Laporan Cetak Data</h5>
    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$p->name}}</td>
                <td>{{$p->description}}</td>
                <td><img width="150px" src="{{ public_path('storage/'.$p->image) }}" alt=""></td>
                <td>{{$p->price}}</td>
                <td>{{$p->weigth}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
