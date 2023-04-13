@extends('template.HomePage')
@section('title', 'Profile')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body style="background-color: #ffffff">
        <div class="container-fluid">
            <div class="row" >
                <!-- COL CATEGORY -->
                <div class="col-sm-8" style="z-index: 1">
                    <header>
                        <h1>Cashier</h1>
                    </header>

                    <div class="card-item">
                        <p>NAMA BARANG</p>
                        <p class="text-mute">Stock: </p>
                    </div>

                    <div class="card-item">
                        <p>NAMA BARANG</p>
                        <p class="text-mute">Stock: </p>
                    </div>
                </div>
                
                <!-- COL HARGA -->
                <div class="col-sm-4">
                    <div class="card card-price p-1" style="height: 650px;">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <!-- ISI TABLE -->

                                <tbody>
                                    <tr>
                                    <td>NAMA</td>
                                    <td>1</td>
                                    <td>Rp 10000</td>
                                    <td>Rp 10000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <p>Total </p>
                                </div>

                                <div class="col"></div>
                                
                                <div class="col">
                                    <p>Rp 100000 </p>
                                </div>
                            </div>
                            
                            <button type="button" class="btn button-pay"> PAY </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
