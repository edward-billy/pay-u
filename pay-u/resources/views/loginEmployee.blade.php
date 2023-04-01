<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style\style.css">
    <title>Login</title>
</head>

<body>

    <div class="bg-image">
        <div class="blur">
            <div class="container-form">
                <div class="card-register">
                    <div class="card-body">
                        <div style="margin-bottom: 2rem;">
                            <img src="images/logo.png" style="width: 10%;" alt="">
                        </div>

                        <form action={{ route('login.post') }} method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email_address"> Email Address </label>
                                <div class="col-md-14">
                                    <input type="text" id="email_address" class="form-control" name="email"
                                        required autofocus placeholder="email@examples.com">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="password"> Password </label>
                                <div class="col-md-14">
                                    <input type="password" id="password" class="form-control" name="password" required
                                        placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div style="margin-top: 2rem;">
                                <button class="button button4"> Login </button>
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
