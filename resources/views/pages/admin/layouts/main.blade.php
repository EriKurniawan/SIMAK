<!DOCTYPE html>
<html lang="en">

<!-- head -->
@include('pages.admin.layouts.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('pages.admin.layouts.navbar')

        <!-- Sidebar Container -->
        @include('pages.admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- footer -->
        @include('pages.admin.layouts.footer')


        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('pages.admin.layouts.script')
    @stack('script')
</body>

</html>
