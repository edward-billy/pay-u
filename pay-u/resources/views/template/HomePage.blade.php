<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('Style/style_home_page.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <title>Pay-U | @yield('title')</title>
</head>

<body>
    <aside>
        <nav class="side-bars">
            <ul id="sidebbb">
                <li>
                    <a href="{{ route('dashboard') }}" class="logo">
                        <img src="/images/logo.png" />
                        <span class="nav-item">{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <li>
                    <a href={{ url('/dashboard') }}>
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href={{ url('/profile') }}>
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href={{ url('/history') }}>
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">History Order</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                    <li>
                        <a href={{ url('/product') }}>
                            <i class="fas fa-warehouse"></i>
                            <span class="nav-item">Inventory</span>
                        </a>
                    </li>
                @endif

                <a href={{ url('/cashier') }}>
                    <i class="fas fa-calculator"></i>
                    <span class="nav-item">Cashier</span>
                </a>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li>
                        <a href={{ url('/setting') }}>
                            <i class="fas fa-cog"></i>
                            <span class="nav-item">Settings</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href={{ route('logout') }} class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log-Out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="content-wrapper" id="contentfitur">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
        </section>


        <section class="content">
            @yield('content')
        </section>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
    integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
</script>

</html>
