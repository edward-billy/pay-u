@extends('template.HomePage')
@section('title', 'History Order')
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
            <h1>History</h1>
        </header>
        <br>
        <div class="card" style="width: 100rem; z-index: 1;">
        <div class="card-body">
            <div class="text-end">
                <a href="{{ url('/history/print') }}" class="btn btn-primary">
                    <i class="bi bi-printer"></i> Download History
                </a>
            </div>
                <br>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Invoice ID</th>
                            <th>Nama Customer</th>
                            <th>Nama Kasir</th>
                            <th>Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = ($data->currentPage() - 1) * $data->perPage() + 1; ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $item->invoiceId }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    {{ $item->name }}

                                </td>
                                <td>Rp. {{ number_format($item->total) }}-,</td>
                                <td class="text-center">
                                <a href="{{ url('/history/detail/' . $item->id) }}?invoiceId={{ $item->invoiceId }}&nama={{ $item->nama }}&name={{ $item->name }}" class="btn btn-warning btn-sm" style="width: 55px;">
                                    detail
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body" id="pagination">
            {{ $data->links() }}
        </div>
    </body>

    </html>
@endsection
