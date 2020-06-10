<?php 

if ( isset($_SESSION['customer']) ) {
  header('location: '. BASEURL . 'customer/index');
  die;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; RestoranKu</title>

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
                <i class="fas fa-pizza-slice fa-2x"></i>
              </span>
            </div>
            <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">RestoranKu</span></h4>
            <p class="text-muted">Pilih makanan untuk dipesan.</p>
            <form method="POST" action="" class="needs-validation" novalidate="" id="loginFormCustomer">
              <div id="loginAlert"></div>

              <div class="form-group">
                <label for="name">Nama Anda</label>
                <input id="text" type="nama" class="form-control" name="nama" tabindex="1" required minlength="4" autofocus>
                <div class="invalid-feedback">
                  Tolong isi Nama anda
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Pilih nomer meja</label>
                <div class="selectgroup selectgroup-pills w-100">
                  <?php foreach ($data as $row) : ?>
                    <label class="selectgroup-item">
                      <input type="radio" name="no_meja" value="<?= $row['id'] ?>" class="selectgroup-input" <?= ($row['status'] == 'active') ? 'disabled' : ''?>>
                      <span class="selectgroup-button selectgroup-button-icon <?= ($row['status'] == 'active') ? 'bg-secondary' : ''?>"><i class="fas fa-utensils"></i>&nbsp;&nbsp;<?= $row['no_meja'] ?></span>
                    </label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4" id="loginBtnCustomer">
                  Pilih Makanan
                </button>
              </div>

              <div class="mt-5 text-center">
                Silahkan isi form diatas sebelum memilih makanan anda!
              </div>
            </form>

            <a href="<?= BASEURL; ?>Auth/login" class="float-left mt-3">
                Halaman login pekerja
            </a>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Ahmad Murteza Akbari. Dibuat dengan 💙
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
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
      // login customer
      $('#loginBtnCustomer').click(function(e) {
        if ( $('#loginFormCustomer')[0].checkValidity() ) {
          e.preventDefault();
          $('#loginBtnCustomer').val('Tunggu sebentar ..');
          $.ajax({
            url: '<?= BASEURL ?>Auth/storeCustomerLogin',
            method: 'POST',
            data: $('#loginFormCustomer').serialize(),
            success: function(response) {
              console.log(response);
              if (response == 'login') {
                window.location.href = '<?= BASEURL ?>Customer/index';
              }
            }
          });
        }
      });
    });
  </script>
</body>
</html>
