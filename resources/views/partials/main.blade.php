<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Vehicle Parking Management System</title>
        <link href="{{asset('/backend/css/styles.css')}}" rel="stylesheet" />
        @stack('css')
        <link href="{{asset('/backend/css/dataTables.min.css')}}"rel="stylesheet" crossorigin="anonymous" />
        <script src="{{asset('/backend/js/all2.min.js')}}" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        @include('partials.topbar')
        <div id="layoutSidenav">
        @include('partials.sidebar') 
            <div id="layoutSidenav_content">
                <main class="p-5">
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            
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
        <script src="{{asset('/backend/js/jquery-3.5.1.slim.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('/backend/js/bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('/backend/js/scripts.js')}}"></script>
        <script src="{{asset('/backend/js/Chart.min.js')}}" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="{{asset('/backend/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('/backend/js/dataTables.bootstrap4.min')}}" crossorigin="anonymous"></script>
        <script src="{{asset('/backend/js/datatables-demo.js')}}"></script>
    </body>
</html>
