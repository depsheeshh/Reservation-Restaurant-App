<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - Reservasi Restoran</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Reservasi</b>RESTORAN</a>
  </div>


  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post" class="form-group">
        @csrf
        @if(session()->has('registerError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('registerError') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">

            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {{-- <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> --}}
        @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                    </div>
        @endif
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">

              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-4">
            <center><button type="submit" class="btn btn-primary btn-block mt-2">Register</button></center>
          </div>
          <!-- /.col -->


        </div>

      </form>


      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>

