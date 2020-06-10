<?php 

if ( !isset($_SESSION['customer']) ) {
	header('location: '. BASEURL);
	die;
}



 ?>
<h1>customer/index</h1>
<a href="<?= BASEURL; ?>Auth/logout">LOGOUT</a>