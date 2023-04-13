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
        <div class="container-fluid" Style="">
            <div class="row">
                <!-- COL CATEGORY -->
                <div class="col-sm-8">
                    <header>
                        <h1>Cashier</h1>
                    </header>
                    <div class="row m-0">
                        <a href="#" class="card-category" style="background-image: url(/images/foods.jpg)">
                            <h5 class="text-center text-shadow">
                                MAKANAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/drink.jpg)">
                            <h5 class="text-center text-shadow">
                                MINUMAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/snack.jpg)">
                            <h5 class="text-center text-shadow">
                                CEMILAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/outfit.jpg)">
                            <h5 class="text-center text-shadow">
                                PAKAIAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/elektronic.jpg)">
                            <h5 class="text-center text-shadow">
                                ELEKTRONIK
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/furniture.jpg)">
                            <h5 class="text-center text-shadow">
                                PERABOTAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/cosmetic.jpg)">
                            <h5 class="text-center text-shadow">
                                KECANTIKAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/sports.jpg)">
                            <h5 class="text-center text-shadow">
                                OLAHRAGA
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/medic.jpg)">
                            <h5 class="text-center text-shadow">
                                KESEHATAN
                            </h5>
                        </a>

                        <a href="#" class="card-category" style="background-image: url(/images/hobe.jpg)">
                            <h5 class="text-center text-shadow">
                                HOBI
                            </h5>
                        </a>
                    </div>
                </div>
                
                
                <!-- COL HARGA -->
                <div class="col-sm-4">
                    <div class="card card-price p-1" style="height: 100%">
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
