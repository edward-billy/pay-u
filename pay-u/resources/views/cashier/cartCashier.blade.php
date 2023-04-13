@extends('template.HomePage')
@section('title', 'Cart')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('Style/style_home_page.css') }}">
    </head>

    <body>
        <header>
            <h1>Cart</h1>
        </header>
        <br>
        <a href="{{ url('/cashier') }}" class="btn btn-primary btn-sm" style="width: 50px; z-index: 1;"><span
                class="material-symbols-outlined">
                shopping_cart
            </span></a>
        <br><br>
        @if (empty($cart) || count($cart) == 0)
            <strong>Tidak ada produk yang ditambahkan</strong>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8" style="z-index: 1">
                        <div class="card card-price p-1" style="height: 500px;">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">Nama Produk</th>
                                            <th scope="col" class="text-center">Harga</th>
                                            <th scope="col" class="text-center">Kuantitas</th>
                                            <th scope="col" class="text-center">Total Harga</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <!-- ISI TABLE -->

                                    <tbody>
                                        <?php $no = 1;
                                        $totalBill = 0; ?>
                                        @foreach ($cart as $item => $val)
                                            <?php $total = $val['harga'] * $val['jumlah']; ?>
                                            <tr>

                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $val['nama'] }}</td>
                                                <td class="text-center">Rp. {{ number_format($val['harga']) }}</td>
                                                <td class="text-center">{{ $val['jumlah'] }}</td>
                                                <td class="text-center">Rp. {{ number_format($total) }}</td>
                                                <td class="text-center">
                                                    <form action="{{ url('/cashier/hapus/' . $item) }}">
                                                        <button type="submit" class="btn btn-danger btn-sm text-center"
                                                            style="width: 80px">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $totalBill += $total; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">
                                Total: <strong>{{ number_format($totalBill) }}</strong>
                                <br><br>
                                <form action="{{ route('buy') }}">
                                    <button type="button" class="btn button-pay btn-lg" data-toggle="modal"
                                        data-target="#myModal">Beli</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </body>

    </html>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-custom">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buy') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form=group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" value="{{ old('email') }}">
                                        <div class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form=group">
                                        <label>Nama</label>
                                        <input name="nama" class="form-control" value="{{ old('nama') }}">
                                        <div class="text-danger">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form=group">
                                        <label>No HP</label>
                                        <input name="noHp" class="form-control" value="{{ old('noHp') }}">
                                        <div class="text-danger">
                                            @error('noHp')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form=group">
                                        <label>Alamat</label>
                                        <input name="alamat" class="form-control" value="{{ old('alamat') }}">
                                        <div class="text-danger">
                                            @error('alamat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    @if (isset($totalBill))
                                        Total: <strong>Rp.{{ number_format($totalBill) }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Beli</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
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
