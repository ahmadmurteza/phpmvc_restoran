<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $data['title'] ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide"><i class="fas fa-drumstick-bite fa-lg"></i> RestoranKu</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="dropdown">
            <a href="#" class="nav-link nav-link-lg nav-link-user">
              <div class="d-sm-none d-lg-inline-block"><?= $data['customer']['nama'] ?> (meja <?= $data['customer']['no_meja'] ?>)</div>&nbsp;&nbsp;
              <i class="fas fa-shopping-cart fa-lg"></i>&nbsp;<span class="badge badge-warning">1</span>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item <?= ($data['title'] == 'Order') ? 'active' : ''; ?>">
              <a href="<?= BASEURL ?>Customer/index" class="nav-link"><i class="far fa-heart"></i>&nbsp;&nbsp;<span>Home</span></a>
            </li>
          </ul>
        </div>
      </nav>

      