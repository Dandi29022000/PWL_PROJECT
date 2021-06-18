<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <title>Data Transaksi</title>
</head>

<body>
    <div class="text-center card-header">
        <h3>SISTEM INFORMASI JUAL BELI OOTD</h3>
        <h4>Struk Transaksi</h4>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Id Transaksi</th>
            <th>Nama Produk</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Bayar</th>
        </tr>
        @foreach($produk_transaksi as $tr)
        <tr>
            <td>{{ $tr->id }}</td>
            <td>{{ $tr->produk->name }}</td>
            <td>{{ $tr->pelanggan->nama_pelanggan }}</td>
            <td>{{ $tr->tanggal}}</td>
            <td>{{ $tr->harga }}</td>
            <td>{{ $tr->qty}}</td>
            <td>{{ $tr->total_bayar }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
