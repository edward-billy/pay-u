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
        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- COL CATEGORY -->
                <div class="col" style="z-index: 1">
                    <header>
                        <h1>Cashier ({{ $stok->first()->kategori->nama }})</h1>
                    </header>
                    <?php $no = 1; ?>
                    <div class="row">
                        @foreach ($stok as $item)
                            <div class="card-item">
                                <div class="row">
                                    <div class="col" style="align-items: center;">
                                        <p>Nama Barang: <strong>{{ $item->nama }}</strong></p>
                                        <p>Harga: {{ number_format($item->harga) }}-,</p>
                                    </div>
                                    <div class="col d-flex justify-content-center" style="align-items: center;">
                                        <form action="{{ url('/cashier/tambah/' . $item->id) }}">
                                            <input type="number" name="jumlah" value="1" min="1">
                                            <button type="submit" class="btn btn-warning btn-sm" style="height: 2rem">Add
                                                to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
