<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style\style.css">
    <title>Landing</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    @if (session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}.
        </div>
    @endif
    <div class="container-fluid text-light"
        style="overflow: hidden; display: flex; align-items: center; padding-top: 6rem;">
        <div class="text" style="padding-left: 10rem;">
            <h1 style="font-size: 110px; padding-bottom: 4rem;">
                LET'S START YOUR EASY DAY
            </h1>

            <div class="button-container">
                <form action="{{ route('register') }}" method="get">
                    @csrf
                    <button class="button button1"> REGISTER </button>
                </form>
                <form action="{{ route('login') }}" method="get">
                    @csrf
                    <button class="button button2" style="margin-left: 5rem"> LOGIN </button>
                </form>
            </div>


        </div>
        <div class="image">
            <img src="/images/cashier.png" style="float: right; width: 70%;">
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
