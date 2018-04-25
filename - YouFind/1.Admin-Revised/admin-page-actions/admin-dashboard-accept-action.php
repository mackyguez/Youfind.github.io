<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

		if(@$_POST['action'] == 'verify_user') {
			$user_id = $_POST['user_verify_id'];
			echo $update_status = 'UPDATE youfind_user SET user_status = "verified" WHERE user_id = '.$user_id.'';
			$statement = $connect->prepare($update_status);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();
				if($count > 0) {
					echo 'Done';
				}
		}

 ?>