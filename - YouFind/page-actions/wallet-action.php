<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	
		if(isset($_SESSION['customer_user_id'])) {
			$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			if($result[0]['youwallet'] == '') {
				echo '&#8369; 0.00';
			}
			else {
				echo '&#8369; '.number_format($result[0]['youwallet'],2);
			}
		}

		if(isset($_SESSION['seller_user_id'])) {
			$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			if($result[0]['youwallet'] == '') {
				echo '&#8369; 0.00';
			}
			else {
				echo '&#8369; '.number_format($result[0]['youwallet'],2);
			}
		}
 ?>