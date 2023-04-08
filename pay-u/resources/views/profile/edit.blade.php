@extends('template.HomePage')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Profile
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('patch')
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select id="role" class="form-control" name="role">
                                        <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // add this line to test that the selector works
                                    $('#auth-password').hide();

                                    // the rest of the code
                                    $('#role').change(function() {
                                        var selectedRole = $(this).val();
                                        if (selectedRole == 'manager') {
                                            $('#auth-password').show();
                                        } else {
                                            $('#auth-password').hide();
                                        }
                                    });
                                });
                            </script>

                            @if ($errors->has('authorization_password'))
                                <script>
                                    alert("{{ $errors->first('authorization_password') }}");
                                </script>
                            @endif


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


                            <div class="form-group row" id="auth-password" style="display:none">
                                <label for="authorization_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password Otorisasi') }}</label>

                                <div class="col-md-6">
                                    <input id="authorization_password" type="password"
                                        class="form-control @error('authorization_password') is-invalid @enderror"
                                        name="authorization_password" autocomplete="current-password">

                                    @error('authorization_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
