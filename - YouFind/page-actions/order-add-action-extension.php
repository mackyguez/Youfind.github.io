<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action'] == 'set_session_delivery_standard') {
		$_SESSION['delivery_option'] = 'standard';
		$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.@$_SESSION['customer_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();
			$total = '';
			foreach($result as $row) {
				@$total += $row['product_price'] * $row['product_quantity'];
			}
			if($count > 0) {
				echo number_format($total, 2);
				$_SESSION['total_amount'] = $total;
			}
			else {
				echo '0.00';
			}
	}

	if(@$_POST['action'] == 'set_session_delivery_express') {
		$_SESSION['delivery_option'] = 'express';
		$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.@$_SESSION['customer_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();
			$total = '';
			foreach($result as $row) {
				@$total += $row['product_price'] * $row['product_quantity'];
			}
			if($count > 0) {
				echo '&#8369 '.number_format($total+29, 2);
				$_SESSION['total_amount'] = $total;
			}
			else {
				$total = '&#8369; '.'0.00';
			}
	}

 ?>