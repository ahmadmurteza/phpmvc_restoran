<?php 

if ( !isset($_SESSION['user']) ) {
	header('location: '. BASEURL .'Auth/login');
	die;
}



?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<h1>worker/index</h1>
		<ul>
			<?php foreach ($data['user'] as $row) : ?>
				<li><?= $row ?></li>
			<?php endforeach; ?>
		</ul>
	</section>
</div>
