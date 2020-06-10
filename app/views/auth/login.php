<?php 

if ( isset($_SESSION['user']) ) {
  header('location: '. BASEURL .'Dashboard/index');
  die;
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; RestoranKu | Pekerja</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= BASEURL; ?>node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-3 m-3">
          	<div class="login-brand">
              <span style="color:#6777ef;">
                <i class="fas fa-user-shield fa-2x"></i>
              </span>
            </div>
            <h4 class="text-center text-dark font-weight-normal"><span class="font-weight-bold">RestoranKu Worker Panel</span></h4>
            <p class="text-muted">Sebelum anda memulai, anda harus login atau register terlebih dahulu.</p>
            <form method="POST" action="" class="needs-validation" novalidate="" id="loginForm">
              <div id="loginAlert"></div>

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; }?>" required autofocus>
                <div class="invalid-feedback">
                  Tolong isi email anda
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; }?>" required>
                <div class="invalid-feedback">
                  Tolong isi password anda
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>>
                  <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="<?= BASEURL; ?>Auth/forgot" class="float-left mt-3">
                  Lupa Password?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4" id="loginBtn">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Belum mempunyai akun? <a href="<?= BASEURL; ?>Auth/register">Buat akun baru</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Ahmad Murteza Akbari. Dibuat dengan 💙
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>

            <a href="<?= BASEURL; ?>Auth/index" class="btn btn-primary float-left mt-5">
              <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;
                Halaman Customer
            </a>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= BASEURL; ?>assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">RestoranKu App</h1>
                <h5 class="font-weight-normal text-muted-transparent">Makanan, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://www.pexels.com/photo/plate-of-rice-and-cooked-meat-1624487/">Rajesh TP</a> on <a class="text-light bb" target="_blank" href="https://www.pexels.com">Pexels</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= BASEURL; ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= BASEURL; ?>assets/js/scripts.js"></script>
  <script src="<?= BASEURL; ?>assets/js/custom.js"></script>

  <!-- font awasome -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

  <!-- Page Specific JS File -->
  <script type="text/javascript">
    $(document).ready(function() {
      // form login
      $('#loginBtn').click(function(e) {
        if ( $('#loginForm')[0].checkValidity() ) {
          e.preventDefault();
          $('#loginBtn').val('Tunggu sebentar ..');
          $.ajax({
            url: '<?= BASEURL ?>Auth/storeLogin',
            method: 'POST',
            data: $('#loginForm').serialize(),
            success: function(response) {
              console.log(response);
              if (response == 'login') {
                window.location.href = '<?= BASEURL ?>Dashboard/index';
              } else {
                $('#loginAlert').html(response);
              }
            }
          });
        }
      });


    });
  </script>
</body>
</html>
