<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; RestoranKu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= BASEURL; ?>node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <span style="color:#6777ef;">
                <i class="fas fa-pizza-slice fa-4x"></i>
              </span>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" id="registerForm">
                  <div id="formAlert"></div>
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control" name="name" required minlength="5">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Kata Sandi</label>
                      <input id="password" type="password" class="form-control" name="password" required minlength="5">
                    </div>
                    <div class="form-group col-6">
                      <label for="cpassword" class="d-block">Konfirmasi Kata Sandi</label>
                      <input id="cpassword" type="password" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-divider">
                    Identitas
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jenis Kelamin</label>
                      <select class="form-control selectric" name="gender" required>
                        <option value=""> </option>
                        <option value="male">Pria</option>
                        <option value="female">Wanita</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Nomer Hp</label>
                      <input type="text" class="form-control" id="phone" name="phone" required minlength="10">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input id="dob" type="date" class="form-control" name="dob" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="registerBtn">
                      Register
                    </button>
                  </div>
                </form>
                <div class="mt-5 text-center">
                  Sudah mempunyai akun <a href="<?= BASEURL; ?>Auth/login">Log-in</a>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
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


  <!-- Template JS File -->
  <script src="<?= BASEURL; ?>assets/js/scripts.js"></script>
  <script src="<?= BASEURL; ?>assets/js/custom.js"></script>

  <!-- font awasome -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- script ajax -->
  <script type="text/javascript">
    $(document).ready(function() {
      // form register
      $('#registerBtn').click(function(e){        
        if ( $('#registerForm')[0].checkValidity() ) {
          e.preventDefault();
          $('#registerBtn').val('Tunggu sebentar ..');
          if ( $('#password').val() != $('#cpassword').val() ) {
            Swal.fire({
                icon: 'error',
                title: 'Konfirmasi password tidak sama!',
                showConfirmButton: false,
                timer: 1500
            });
            $('#registerBtn').val('Register');
          } else {
            $.ajax({
              url: '<?= BASEURL; ?>Auth/storeRegister',
              method: 'POST',
              data: $('#registerForm').serialize(),
              success: function(response) {
                // console.log(response);
                if (response == 'register') {
                  $('#registerForm')[0].reset();
                  Swal.fire(
                    'Register berhasil',
                    'Tunggu verifikasi admin',
                    'success'
                  );
                } else {
                  $('#formAlert').html(response);
                }
              }
            });
          }
        }
      });


    });
  </script>
</body>
</html>
