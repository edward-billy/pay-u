@extends('template.HomePage')
@section('title', 'Setting Admin')
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
            <h1>Setting</h1>
        </header>
        <br><br>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}.
                {{ session()->get('status') }}
            </div>
        @endif

        <div class="container-fluid" style="margin-right: 3rem">
        <div class="card" style="z-index: 1;">
            <div class="card-body">
                <a href="{{ url('setting/create') }}" class="button" id="addstok">Tambah User</a>
                <br><br>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Email </th>
                            <th>Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ url('setting/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm"
                                        style="width: 55px;">
                                        edit
                                    </a>
                                    <a href="{{ url('setting/' . $item->id) }}" class="btn btn-warning btn-sm"
                                        style="width: 55px;">
                                        detail
                                    </a>
                                    <form method="post" action="/setting/{{ $item->id }}" style="display:inline"
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
        </div>
    </body>

    </html>
@endsection
