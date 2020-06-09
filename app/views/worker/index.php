<?php 

if ( !isset($_SESSION['user']) ) {
	header('location: '. BASEURL .'Auth/login');
	die;
}


var_dump($data);

 ?>
<h1>worker/index</h1>
<a href="<?= BASEURL; ?>Auth/logout">LOGOUT</a>