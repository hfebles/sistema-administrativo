<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title-section')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


        
        

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/themes/scss/sb-admin-2.scss', 'resources/js/app.js'])
</head>
<body>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.partials.side')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                    @include('layouts.partials.navbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- top side -->
                    @include('layouts.partials.topside')
                    <!-- end top side -->
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            @yield('content')
                        </div>                     
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="container">
    <!-- Sidebar -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" data-bs-backdrop="false" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasExampleLabel">@yield('side-title')</h4>
                    
                    <button data-bs-dismiss="offcanvas" aria-label="Close" class="btn btn-danger align-self-start ml-1">

                        <i class="fas fa-times-circle"></i>

    
                    </button>
                </div>
                <div class="offcanvas-body">
                    @yield('side-body')
                </div>
            </div>
            <!-- end sidebar -->
            </div>


    @yield('js')

    <script>
       @yield('js2') 
    </script>

    <script src="/themes/vendor/jquery/jquery.min.js"></script>
    <script src="/themes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/themes/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/themes/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/themes/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts 
    <script src="/themes/js/demo/chart-area-demo.js"></script>
    <script src="/themes/js/demo/chart-pie-demo.js"></script>-->

</body>
</html>
