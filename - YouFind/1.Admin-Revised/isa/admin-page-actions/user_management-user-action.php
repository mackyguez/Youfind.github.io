<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	if(isset($_POST['action'])) {
		if($_POST['action'] == 'verify_user') {
			$user_id = $_POST['user_verify_id'];
			$user_status = '';

			$query = 'SELECT user_status FROM youfind_user WHERE user_id = "'.$user_id.'"';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				$user_status = $row['user_status'];
			}
			if($user_status == 'verified') {
				echo 'User is already Verified';
			}
			else if($user_status == 'not verified') {
				$update_status = 'UPDATE youfind_user SET user_status = "verified" WHERE user_id = '.$user_id.'';
				$statement = $connect->prepare($update_status);
				$statement->execute();
				$result = $statement->fetchAll();
					if(isset($result)) {
						echo 'User Verified';
					}
			}
			else if($user_status == 'banned') {
				$update_status = 'UPDATE youfind_user SET user_status = "verified" WHERE user_id = '.$user_id.'';
				$statement = $connect->prepare($update_status);
				$statement->execute();
				$result = $statement->fetchAll();
					if(isset($result)) {
						echo 'User Unbanned and Verified';
					}	
			}
		}
	}
 ?>