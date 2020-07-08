

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<h2 class="section-title">Diagram</h2>
		<p id="tes"></p>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h4>Menu Favorit</h4>
					</div>
					<div class="card-body">
						<canvas id="chart1" width="100" height="100"></canvas>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h4>Line Chart</h4>
					</div>
					<div class="card-body">
						<canvas id="chart2" width="100" height="100"></canvas>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("chart1");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
					<?php foreach ($data['menu'] as $row) : ?>
						"<?= $row['name_menu'] ?>",
					<?php endforeach; ?>
				],
				datasets: [{
					label: '# of Votes',
					data: [
						<?php foreach ($data['menu'] as $row) : ?>
							<?= $row['terbeli'] ?>,
						<?php endforeach; ?>
						
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				title: {
					display: true,
					fontSize: 25,
					text: 'Menu Favorit'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				legend:{
					display: false
				}
			}
		});

		var ctx = document.getElementById("chart2");
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			}
		});
</script>