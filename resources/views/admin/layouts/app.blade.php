<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Car-Pool</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        @include('admin.layouts.common_styles')
    </head>

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

        @include('admin.layouts.topnavbar')


            @include('admin.layouts.navigation')


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->

            @include('admin.layouts.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



    </body>
</html>
