<?php 
	include('database_connection.php');

	if(isset($_POST['action'])) {
		if($_POST['action'] == 'create') {
			if($_POST['profile_image'] == '') {
				return false;
			}
			else {
				@$last_id = $_SESSION['last_id'];
				$query = '
					INSERT INTO youfind_user(user_type, first_name, last_name, shopname, email, password, front_id, back_id, profile_picture, select_id, id_number, account_name, account_number, expi_month, expi_year, user_status)
					SELECT user_type, first_name, last_name, shopname, email, password, front_id, back_id, profile_picture, select_id, id_number, account_name, account_number, expi_month, expi_year, user_status
					FROM temp_database
					WHERE id = "'.$last_id.'"
				';
				$statement = $connect->prepare($query);
				$statement->execute();
				$_SESSION['seller_user_id'] = $connect->lastInsertId();
				$query1 = 'TRUNCATE temp_database';
				$statement1 = $connect->prepare($query1);
				$statement1->execute();
				unset($_SESSION['last_id']);
				unset($_SESSION['photo_old_name']);
				echo 'Done';
			}
		}//action create
	}//isset
 ?>
