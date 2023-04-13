@extends('template.HomePage')
@section('title', 'Detail Produk')
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
            <h1>Detail Produk</h1>
        </header>
        <br>
        <div class="card" id="addbarang" style="z-index: 1">
            <div class="card-header">
                <br>
                <form action="{{ url('product') }}">
                    <button class="btn btn-danger btn-sm">Back</button>
                </form>
                {{-- <a href="{{ url('product') }}" class="btn btn-default btn-sm" style="color: black">
                    Kembali
                </a> --}}

            </div>

            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th> Nama Produk</th>
                                    <th>{{ $produk->nama }}</th>
                                </tr>
                                <tr>
                                    <th>Kategori Produk</th>
                                    <th>{{ $produk->kategori->nama }}</th>
                                </tr>
                                <tr>
                                    <th>Deskripsi Produk</th>
                                    <th>{{ $produk->deskripsi }}</th>
                                </tr>
                                <tr>
                                    <th>Harga Produk</th>
                                    <th> {{ $produk->harga }}</th>
                                </tr>
                                <tr>
                                    <th>Stok Barang</th>
                                    <th>{{ $produk->stok }}</th>
                                </tr>
                                <tr>
                                    <th>Foto Produk</th>
                                    <th><img src="{{ url('kategori/' . $produk->foto_produk) }}" width='150px'></th>
                                </tr>
                                <tr>
                                    <th>Di buat pada</th>
                                    <th>{{ $produk->created_at->diffForHumans() }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
