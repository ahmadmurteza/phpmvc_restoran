<div class="container">
	<div class="jumbotron">
	  <h1 class="display-4"><?= $data['user']; ?></h1>
	  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  <hr class="my-4">
	  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
	  <hr>
	  <img src="<?= BASEURL; ?>img/test.jpg" width="150" height="150">
	</div>

	<?php foreach ($data['database'] as $row) : ?>
		<ul class="list-group">
		  <li class="list-group-item"><?= $row['judul']; ?></li>
		  <li class="list-group-item"><?= $row['nama']; ?></li>
		  <li class="list-group-item">
		  	<?php if ($row['img'] == ''): ?>
		  		<img src="<?= BASEURL; ?>img/default.png" width="150" height="150">
		  	<?php else: ?>
		  		<img src="<?= BASEURL; ?>img/<?= $row['img']; ?>" width="150" height="150">
		  	<?php endif; ?>
		  </li>
		</ul>
		<br/>
	<?php endforeach; ?>
</div>

