<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style\style.css">
    <title>Register</title>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil</h5>
            {{ session('success') }}.
        </div>
    @endif
    <div class="bg-image">
        <div class="blur">
            <div class="container-form">
                <div class="card-register">
                    <div class="card-body">
                        <div>
                            <img src="images/logo.png" style="width: 10%;" alt="">
                        </div>

                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="name"> Fullname </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required value="{{ old('name') }}" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"> Email Address </label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="{{ old('email') }}" placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="password"> Password </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top: 2rem;">
                                <button class="button button4" type="submit"> Register </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
