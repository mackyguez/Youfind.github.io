<?php 	
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$result[0]['youwallet'];
		$round = $_SESSION['total_amount']/50;
		$points = round($round);
		$query = 'UPDATE youfind_user SET points = '.$points.' WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();

		if($count > 0) {
			echo 'Done';
		}

	


 ?>