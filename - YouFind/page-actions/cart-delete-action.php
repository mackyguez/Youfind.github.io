<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
		
		if(@$_POST['action'] == 'cart_delete') {
			$query = 'DELETE FROM user_cart_tbl WHERE cart_id = '.$_POST['cart_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			if($statement->rowCount() > 0) {
				echo 'Done';
			}
		}
		if(@$_POST['action'] == 'load_total_with_vat') {
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
			}
			else {
				echo '0.00';
			}
			
		}
 ?>