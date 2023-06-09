@extends('template.HomePage')
@section('title', 'History Detail')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body>
        <header>
            <h1>Detail Transaksi</h1>
        </header>
        <br>
        <div class="card" style="width: 100rem; z-index: 1;">
            <div class="card-body">
                
                <form action="{{ url()->previous() }}">
                    <button class="btn btn-danger btn-sm">Back</button>
                </form>
                <br>
                <h3>Invoice ID: {{ $invoiceId }}</h3>
                <h4>Nama Customer: {{ $nama }}</h4>
                <h4>Nama Kasir: {{ $name }}</h4>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->namaproduk }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp. {{ number_format($item->harga) }}-,</td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
@endsection
