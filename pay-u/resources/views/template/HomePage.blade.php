<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style\style_home_page.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Pay-U | @yield('title')</title>
</head>

<body>
    <aside>
        <nav class="side-bars">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="logo">
                        <img src="/images/logo.png" />
                        <span class="nav-item">Pay-U</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Purchase Order</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-warehouse"></i>
                        <span class="nav-item">Inventory</span>
                    </a>
                </li>
                <a href="#">
                    <i class="fas fa-calculator"></i>
                    <span class="nav-item">Cashier</span>
                </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">Payment</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Settings</span>
                    </a>
                </li>
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

</html>
