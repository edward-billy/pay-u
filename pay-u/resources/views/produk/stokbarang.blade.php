@extends('template.HomePage')
@section('title', 'Barang')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <header>
            <h1>Inventory</h1>
        </header>
        <br>

        <div class="card" style="width: 100rem; z-index: 1;">
            <div class="card-body">
                <a href="{{ url('product/create') }}" class="button" id="addstok">Tambah Data</a>
                <br><br>
                <table class="table">
                    <br>
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <td>Gambar</td>
                            <th>Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = ($stok->currentPage() - 1) * $stok->perPage() + 1; ?>
                        @foreach ($stok as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->stok }}</td>
                                <td><img src="{{ url('kategori/' . $item->foto_produk) }}" width='150px'></td>
                                <td>IDR. {{ number_format($item->harga) }}-,</td>
                                <td class="text-center">
                                    <a href="{{ url('product/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm"
                                        style="width: 55px;">
                                        edit
                                    </a>
                                    <a href="{{ url('product/' . $item->id) }}" class="btn btn-warning btn-sm"
                                        style="width: 55px;">
                                        detail
                                    </a>
                                    <form method="post" action="/product/{{ $item->id }}" style="display:inline"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container d-flex justify-content-end" style="z-index: 1;">
            {{ $stok->links() }}
        </div>
    </body>


    </html>
    <script>
        @if (session('success'))
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection
