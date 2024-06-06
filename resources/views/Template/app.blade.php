<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template/head')
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('Template/preloader')

  <!-- Navbar -->
  @include('Template/navbar-admin')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="{{asset('Images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">Perpustakaan X</span>
    </a>

    <!-- Sidebar -->
    @include('Template/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- @include('Template/main-header') --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('Template/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('Template/Javascript')
<style>
  .main-footer {
    text-align: center; /* Untuk mengatur teks ke tengah */
  }

  .social-links {
    display: flex;
    justify-content: center;
    gap: 20px; /* Spasi antara ikon sosial media */
  }
</style>
<footer class="main-footer">
  <div class="social-links">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
  </div>
 &copy; 2023 Basis Data SD-A2 Kelompok 9. All rights reserved.
</footer>
</body>
</html>
