
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
						<div class="search-backdrop"></div>
						<div class="search-result">
							<div class="search-header">
								Histories
							</div>
							<div class="search-item">
								<a href="#">How to hack NASA using CSS</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-item">
								<a href="#">Kodinger.com</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-item">
								<a href="#">#Stisla</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-header">
								Result
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= BASEURL; ?>assets/img/products/product-3-50.png" alt="product">
									oPhone S9 Limited Edition
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= BASEURL; ?>assets/img/products/product-2-50.png" alt="product">
									Drone X2 New Gen-7
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= BASEURL; ?>assets/img/products/product-1-50.png" alt="product">
									Headphone Blitz
								</a>
							</div>
							<div class="search-header">
								Projects
							</div>
							<div class="search-item">
								<a href="#">
									<div class="search-icon bg-danger text-white mr-3">
										<i class="fas fa-code"></i>
									</div>
									Stisla Admin Template
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<div class="search-icon bg-primary text-white mr-3">
										<i class="fas fa-laptop"></i>
									</div>
									Create a new Homepage Design
								</a>
							</div>
						</div>
					</div>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Notifications
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-icons">
								<a href="#" class="dropdown-item dropdown-item-unread">
									<div class="dropdown-item-icon bg-primary text-white">
										<i class="fas fa-code"></i>
									</div>
									<div class="dropdown-item-desc">
										Template update is available now!
										<div class="time text-primary">2 Min Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-info text-white">
										<i class="far fa-user"></i>
									</div>
									<div class="dropdown-item-desc">
										<b>You</b> and <b>Dedik Sugiharto</b> are now friends
										<div class="time">10 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-success text-white">
										<i class="fas fa-check"></i>
									</div>
									<div class="dropdown-item-desc">
										<b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
										<div class="time">12 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-danger text-white">
										<i class="fas fa-exclamation-triangle"></i>
									</div>
									<div class="dropdown-item-desc">
										Low disk space. Let's clean it!
										<div class="time">17 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-info text-white">
										<i class="fas fa-bell"></i>
									</div>
									<div class="dropdown-item-desc">
										Welcome to Stisla template!
										<div class="time">Yesterday</div>
									</div>
								</a>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						<img alt="image" src="<?= BASEURL; ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
						<div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($data['user']['name']) ?></div></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="features-activities.html" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="features-settings.html" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= BASEURL; ?>Auth/logout" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="index.html">RestoranKu</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">Rk</a>
					</div>
					<div class="user-item">
                      <img alt="image" src="<?= BASEURL; ?>assets/img/avatar/avatar-1.png" class="img-fluid">
                      <div class="user-details">
                        <div class="user-name"><?= $data['user']['name'] ?></div>
                        <div class="text-job text-muted"><?= $data['user']['role'] ?></div>
                      </div>  
                    </div>
                    <hr>
					<ul class="sidebar-menu">
						<?php 
							$role = $data['user']['role'];
						?>
						<?php if ($role == 'koki' || $role == 'admin' || $role == 'owner' || $role == 'kasir') : ?>
							<li class="menu-header">Dashboard</li>
							<li class="<?= ($data['title'] == 'Dashboard') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/index"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp; <span>Dashboard</span></a>
							</li>
						<?php endif; ?>
						<?php if ($role == 'admin' || $role == 'owner') : ?>
							<li class="<?= ($data['title'] == 'Worker') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/worker"><i class="fas fa-users"></i>&nbsp;&nbsp; <span>Pekerja</span></a>
							</li>
							<li class="<?= ($data['title'] == 'Kategori') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/categories"><i class="fas fa-th-large"></i>&nbsp;&nbsp; <span>Kategori</span></a>
							</li>
							<li class="<?= ($data['title'] == 'Menu') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/menu"><i class="fas fa-pizza-slice"></i>&nbsp;&nbsp; <span>Menu</span></a>
							</li>
						<?php endif; ?>
						<?php if ($role == 'koki' || $role == 'admin' || $role == 'owner') : ?>
							<li class="<?= ($data['title'] == 'Meja') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/meja"><i class="fas fa-th"></i>&nbsp;&nbsp; <span>Meja & Info Order</span></a>
							</li>
						<?php endif; ?>
						<?php if ($role == 'kasir' || $role == 'admin' || $role == 'owner') : ?>
							<li class="<?= ($data['title'] == 'Transaksi') ? 'active' : '' ?>">
								<a class="nav-link" href="<?= BASEURL; ?>Dashboard/transaksi"><i class="fas fa-donate"></i>&nbsp;&nbsp; <span>Transaksi</span></a>
							</li>
						<?php endif; ?>
					</ul>
					<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
						<a href="<?= BASEURL; ?>Dashboard/report" class="btn btn-primary btn-lg btn-block btn-icon-split">
							<i class="fas fa-archive"></i> Laporan
						</a>
					</div>
				</aside>
			</div>