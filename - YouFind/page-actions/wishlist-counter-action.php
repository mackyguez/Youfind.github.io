<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action'] == 'load_wishlist_counter') {
		$query = 'SELECT * FROM user_wishlist_tbl WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$count = $statement->rowCount();
		echo $count;
	}
	
	if(@$_POST['action'] == 'load_product_purchased') {
		$query = 'SELECT * FROM product_success_tbl WHERE customer_user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$count = $statement->rowCount();
		echo $count;
	}

 ?>