<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      background-image: url('{{asset("Images/background.jpg")}}'); /* Ganti 'path-to-your-image.jpg' dengan lokasi file gambar latar belakang Anda */
      background-size: cover; /* Opsional: mengatur bagaimana gambar ditampilkan */
      animation: slideRight 100s linear infinite; /* Animasi akan berlangsung selama 10 detik dan diulang terus-menerus */
}
@keyframes slideRight {
  100% {
    background-position: 100% 0; /* Posisi awal latar belakang */
  }
  100% {
    background-position: 100% 0; /* Posisi akhir latar belakang (ke kanan) */
  }
}
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan X | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">



<div class="login-box">
  <div class="login-logo">
    <img src="{{asset('Images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width:15%;"> <b style="color: white; ">Perpustakaan X </b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @if (session('status'))
      <div class="alert-alert danger" style="margin-top: 10px;">
        <div class="alert alert-danger alert-dismissible">
          {{ session('status') }}
        </div>
      </div>
    @endif
    
      
      {{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    
    @if (session('status'))
    <div class="alert alert-failed">
        {{ session('message') }}
    </div>
    @endif --}}

    @if (session('status'))
  <div class="alert-alert danger"  style="margin-top: 10px;">
    <div class="alert alert-danger alert-dismissible">
      {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
      {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
      {{session('status')}}
    </div>
@endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <label name="username"></label>
          <input type="number" name="username" id="username" class="form-control" placeholder="Username (NIM/NIP)" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <label name="password"></label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div>
            <button type="submit" class="btn btn-primary form-control">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0 " style="text-align: center;">
        <a href="register">Sign Up</a>
      </p>
      <br>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>

<script>
  // Gunakan JavaScript untuk mengatur latar belakang
  const body = document.body;
  let backgroundPosition = 0;

  setInterval(() => {
    backgroundPosition += 1; // Kecepatan pergerakan latar belakang
    body.style.backgroundPosition = backgroundPosition + "px 0";
    if (backgroundPosition >= window.innerWidth) {
      backgroundPosition = -body.clientWidth; // Kembali ke posisi awal
    }
  }, 10); // Kecepatan pembaruan
</script>

</body>
</html>
