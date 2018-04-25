<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');

	if($_POST['action'] == 'delete_product') {
		$query = 'DELETE FROM index_newsfeed_tbl WHERE product_id = '.$_POST['delete_product_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		echo 'Done';
	}

 ?>