<!DOCTYPE html>
<html lang="en">

<!-- head -->
@include('tampilan_user.layouts.head')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('tampilan_user.layouts.navbar')

  <!-- Sidebar Container -->
  @include('tampilan_user.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <!-- footer -->
 @include('tampilan_user.layouts.footer')


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('tampilan_user.layouts.script')

</body>
</html>
