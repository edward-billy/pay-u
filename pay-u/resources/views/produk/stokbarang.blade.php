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
        <br><br>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}.
                {{ session()->get('status') }}
            </div>
        @endif
        <div class="card" style="width: 100rem; z-index: 1;">
            <div class="card-body">
                <a href="{{ url('product/create') }}" class="button" id="addstok">Tambah Data</a>
                <br><br>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
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
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->stok }}</td>
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

        <div class="card-body" id="pagination">
            {{ $stok->links() }}
        </div>

    </body>
    {{-- <script>
        document.getElementById("delete-data").addEventListener("click", function(event) {
            event.preventDefault();
            if (confirm("Anda yakin ingin menghapus data ini?")) {
                document.getElementById('delete-data').form.submit();
            }
        });
    </script> --}}

    </html>

@endsection
