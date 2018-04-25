<?php 

	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$qry = 'SELECT * FROM product_success_tbl ORDER BY product_success_id DESC';
	$stm = $connect->prepare($qry);
	$stm->execute();
	$res = $stm->fetchAll();

	echo $res[0]['reference_number'];
 ?>