<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Side Bar Navigation</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        li {
            list-style: none;
            margin: 20px 0 20px 0;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
        }

        .active-main-content {
            margin-left: 250px;
        }

        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: 0.4s;
        }
    </style>
</head>

<body>
    <div>
        <div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white">{{ Auth::user()->name }}</h4>
            <li>
                <a class="text-white" href="/dashboard">
                    <i class="bi bi-house mr-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="text-white" href="/stokbarang">
                    <i class="bi bi-house mr-2"></i>
                    Stok Barang
                </a>
            </li>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-bag-plus mr-2"></i>
                    Keranjang
                </a>
            </li>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-newspaper mr-2"></i>
                    History Belanja
                </a>
            </li>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-bicycle mr-2"></i>
                    Calculator
                </a>
            </li>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-boombox mr-2"></i>
                    Payment
                </a>
            </li>
        </div>
    </div>
    <div class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>

    </div>

    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {

            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");

            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
