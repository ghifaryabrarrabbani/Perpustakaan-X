
<!DOCTYPE html>
<html lang="en">
  
<head>
  <style>
body {
      background-image: url('{{asset("Images/background.jpg")}}');
      background-size: cover;
      animation: slideRight 40s linear infinite alternate;
    }
    
    @keyframes slideRight {
      100% {
        background-position: 0;
      }
      100% {
        background-position: 100%;
      }
    }

  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="{{asset('Images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width:15%;"> <b style="color: white; ">Perpustakaan X </b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>

      @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="" method="post">
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
        <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group" style="width:320px">
                        <select class="form-control" name="id_role" id="id_role" required>
                        <option value="" disabled selected>Sivitas</option>
                          <option>Dosen</option>
                          <option>Mahasiswa</option>
                        </select>
                      </div>
                    </div>
          <button type="submit" class="btn btn-primary form-control">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <p style="text-align: center;">
        <a href="login" class="text-center">I already have an account</a>
      </form>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
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
