@extends('template.HomePage')
@section('title', 'Edit User')
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
            <h1>Edit User</h1>
        </header>
        <br><br>
        <div class="card" id="editbarang" style="z-index: 1">
            <form action="{{ url('setting/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="content">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form=group">
                                <label>Nama User</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                                <div class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form=group">
                                <label>Role</label>
                                <select name="role" id="role">
                                    <option value="">--Pilih Kategori--</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                                <div class="text-danger">
                                    @error('role')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Email User</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}">
                                <div class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form=group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ old('password', $user->password) }}">
                                <div class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="form=group">
                                <button class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
