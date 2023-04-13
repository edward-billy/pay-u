@extends('template.HomePage')
@section('title', 'Kasir Kategori')
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
            <h1>Cashier</h1>
        </header>
        <br>
        <div class="card" style="width: 50rem; height: 50rem; z-index: 1;">
            <div class="card-body">
                <form action="{{ url()->previous() }}">
                    <button class="btn btn-danger btn-sm">Back</button>
                </form>
                <br><br>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <td>Gambar</td>
                            <th>Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($stok as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori->nama }}</td>
                                <td><img src="{{ url('kategori/' . $item->foto_produk) }}" width='150px'></td>
                                <td>IDR. {{ number_format($item->harga) }}-,</td>
                                <td>
                                    <form action="{{ url('/cashier/tambah/' . $item->id) }}">
                                        <input type="number" name="jumlah" value="1" min="1"
                                            style="width: 35px">

                                        <button type="submit" class="btn btn-warning btn-sm" style="width: 90px">Add
                                            to Cart</button>

                                    </form>


                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
@endsection
