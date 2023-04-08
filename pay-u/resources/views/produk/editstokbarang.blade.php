@extends('template.HomePage')
@section('title', 'Edit Barang')
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
            <h1>Edit Barang</h1>
        </header>
        <br><br>
        <div class="card" id="addbarang">
            <form action="{{ url('product/' . $produk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="content">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form=group">
                                <label>Nama Produk</label>
                                <input name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}">
                                <div class="text-danger">
                                    @error('nama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Kategori Barang</label>
                                <select name="kategoriId" id="kategoriId">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($kategoris as $item)
                                        <option value={{ $item->id }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('kategoriId')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Deskripsi</label>
                                <input name="deskripsi" class="form-control"
                                    value="{{ old('deskripsi', $produk->deskripsi) }}">
                                <div class="text-danger">
                                    @error('deskripsi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Stok Barang</label>
                                <input name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}">
                                <div class="text-danger">
                                    @error('stok')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Foto Barang</label>
                                <input type="file" name="foto_produk" class="form-control"
                                    value="{{ old('foto_produk', $produk->foto_produk) }}">
                                <div class="text-danger">
                                    @error('foto_produk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Harga Barang</label>
                                <input name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}">
                                <div class="text-danger">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form=group">
                                <button class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
