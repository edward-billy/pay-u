@extends('template.HomePage')
@section('title', 'Kasir')
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
        <br><br>
        <a href="{{ url('/cashier/kategori/') }}?category=1" id="addstok" style="z-index: 1">Makanan</a>
        <a href="{{ url('/cashier/kategori/') }}?category=2" id="addstok" style="z-index: 1">Minuman</a>
        <br><br><a href="{{ url('/cashier/kategori/') }}?category=3" id="addstok" style="z-index: 1">Cemilan</a>
        <a href="{{ url('/cashier/kategori/') }}?category=4" id="addstok" style="z-index: 1">Elektronik</a>
        <br><br><a href="{{ url('/cashier/kategori/') }}?category=5" id="addstok" style="z-index: 1">Furniture</a>
        <a href="{{ url('/cashier/kategori/') }}?category=6" id="addstok" style="z-index: 1">Kecantikan</a>
        <br><br><a href="{{ url('/cashier/kategori/') }}?category=7" id="addstok" style="z-index: 1">Kesehatan</a>


    </body>

    </html>
@endsection
