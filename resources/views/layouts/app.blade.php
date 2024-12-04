<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Abstack - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('')}}/assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{url('')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            @include('layouts.topbar')

            @include('layouts.left-sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        @yield('content')
    
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                @include('layouts.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        @include('layouts.right-sidebar')

        <!-- Vendor js -->
        <script src="{{url('')}}/assets/js/vendor.min.js"></script>

         <!-- Chart JS -->
         <script src="{{url('')}}/assets/libs/chart-js/Chart.bundle.min.js"></script>

          <!-- Init js -->
        <script src="{{url('')}}/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{url('')}}/assets/js/app.min.js"></script>
        
    </body>
</html>