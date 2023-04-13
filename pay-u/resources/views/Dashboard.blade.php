@extends('template.HomePage')
@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> -->
    </head>

    <body>
        <div class="container-fluid">
            <header>
                <h1>Dashboard</h1>
            </header>
            <br>
            <div class="row md-8" style="z-index: 1;">
                <div class="col-xl-3 col-sm-6 col-12" style="z-index: 1;"> 
                    <div class="card"">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                            <i class="bi bi-receipt primary font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right" style="z-index: 1;">
                            <h3>Rp {{ number_format($totalPenjualan, 0, '.', '.') }}</h3>
                            <span>Total Penjualan</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                            <i class="bi bi-receipt-cutoff warning font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                            <h3>Rp {{ number_format($totalPenjualanBulan, 0, '.', '.') }}</h3>
                            <span>Total Penjualan Bulan Ini</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                            <i class="bi bi-basket success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                            <h3>{{ $totalProdukTerjual }}</h3>
                            <span>Total Produk Terjual</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                            <i class="bi bi-people danger font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                            <h3>{{ $totalPengunjung }}</h3>
                            <span>Total Pengunjung</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-100" style="z-index: 1; padding:0; width=100%;">
                <div class="card" style="z-index: 1; width=100%;">
                        <div class="card-body" style="z-index: 1; width=100%;">

                            <h1>{{ $chart1->options['chart_title'] }}</h1>
                            {!! $chart1->renderHtml() !!}
                            {!! $chart1->renderChartJsLibrary() !!}
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            {!! $chart1->renderJs() !!}
                        </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection