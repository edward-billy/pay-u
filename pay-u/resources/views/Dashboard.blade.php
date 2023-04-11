@extends('template.HomePage')
@section('title', 'Dashboard')
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
            <h1>Dashboard</h1>
        </header>
        <div class="col-md-8">
            <div class="card">
                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
                        {!! $chart1->renderChartJsLibrary() !!}
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                        {!! $chart1->renderJs() !!}
                    </div>
            </div>
        </div>
    </body>

    </html>
@endsection