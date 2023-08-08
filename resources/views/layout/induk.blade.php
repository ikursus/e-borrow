<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        {{-- <link href="/themes/sbadmin/css/styles.css" rel="stylesheet" /> --}}
        <link href="{{ asset('/') }}themes/sbadmin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        @include('layout.navbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                @include('layout.sidebar')

            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        @yield('isi-kandungan-utama')

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/') }}themes/sbadmin/js/scripts.js"></script>

        @stack('javascript-custom')

    </body>
</html>
