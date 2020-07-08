

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<h2 class="section-title">Diagram</h2>
		<div class="col-12 col-md-6 col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4>Line Chart</h4>
				</div>
				<div class="card-body">
					<canvas id="myChart" width="400" height="400"></canvas>
				</div>
			</div>
		</div>
		<h1>worker/index</h1>
		<ul>
			<?php foreach ($data['user'] as $row) : ?>
				<li><?= $row ?></li>
			<?php endforeach; ?>
		</ul>
	</section>
</div>
