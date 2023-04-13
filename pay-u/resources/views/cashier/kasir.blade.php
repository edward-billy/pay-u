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

    <body style="background-color: #ffffff">
        <div class="container-fluid" Style="">
            <div class="row">
                <!-- COL CATEGORY -->
                <div class="col" style="z-index: 1">
                    <header>
                        <h1>Cashier</h1>
                    </header>
                    <div class="row m-0">
                        <a href="{{ url('/cashier/kategori/') }}?category=1" class="card-category"
                            style="background-image: url(/images/foods.jpg)">
                            <h5 class="text-center text-shadow">
                                MAKANAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=2" class="card-category"
                            style="background-image: url(/images/drink.jpg)">
                            <h5 class="text-center text-shadow">
                                MINUMAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=3" class="card-category"
                            style="background-image: url(/images/snack.jpg)">
                            <h5 class="text-center text-shadow">
                                CEMILAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=4" class="card-category"
                            style="background-image: url(/images/outfit.jpg)">
                            <h5 class="text-center text-shadow">
                                PAKAIAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=5" class="card-category"
                            style="background-image: url(/images/elektronic.jpg)">
                            <h5 class="text-center text-shadow">
                                ELEKTRONIK
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=6" class="card-category"
                            style="background-image: url(/images/furniture.jpg)">
                            <h5 class="text-center text-shadow">
                                PERABOTAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=7" class="card-category"
                            style="background-image: url(/images/cosmetic.jpg)">
                            <h5 class="text-center text-shadow">
                                KECANTIKAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=8" class="card-category"
                            style="background-image: url(/images/sports.jpg)">
                            <h5 class="text-center text-shadow">
                                OLAHRAGA
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=9" class="card-category"
                            style="background-image: url(/images/medic.jpg)">
                            <h5 class="text-center text-shadow">
                                KESEHATAN
                            </h5>
                        </a>

                        <a href="{{ url('/cashier/kategori/') }}?category=10" class="card-category"
                            style="background-image: url(/images/hobe.jpg)">
                            <h5 class="text-center text-shadow">
                                HOBI
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
