<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Transaksi.xls");
	?>

	<center>
		<h1>Laporan Transaksi</h1>
	</center>
	
	
	<table border="1">
		<tr>
			<th>#ID</th>
			<th>Nama Pegawai</th>
			<th>No.Telp</th>
			<th>Pelanggan</th>
			<th>Total</th>
			<th>Tunai</th>
			<th>Kembalian</th>
			<th>Waktu</th>
		</tr>
		<?php foreach ($data['transaksi'] as $row) : ?>
			<tr>
				<td><?= $row['id_transaksi'] ?></td>
				<td><?= $row['pegawai'] ?></td>
				<td><?= $row['no_telp'] ?></td>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['total'] ?></td>
				<td><?= $row['tunai'] ?></td>
				<td><?= $row['kembalian'] ?></td>
				<td><?= $row['waktu'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>