<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if($_POST['action'] == 'send_user_id') {
		$_SESSION['edit_user_id'] = $_POST['edit_user_id'];
	}
	if($_POST['action'] == 'update_user') {
		$user_id = $_SESSION['edit_user_id'];
		
		$first_name = $_POST['update_first_name'];
		$last_name = $_POST['update_last_name'];
		$email = $_POST['update_email'];
		
		$query = 'UPDATE youfind_user SET first_name = :first_name, last_name = :last_name, email = :email WHERE user_id = :user_id';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':first_name'		=> $first_name,
				':last_name'		=> $last_name,
				':email'			=> $email,
				':user_id'			=> $user_id
			)
		);
		$result = $statement->fetchAll();
			if(isset($result)) {
				echo 'Done';
				unset($_SESSION['edit_user_id']);
			}
	}
	if($_POST['action'] == 'delete_user') {
		$user_id = $_POST['user_delete_id'];

		$query = 'INSERT INTO archived_youfind_user SELECT * FROM youfind_user WHERE user_id = '.$user_id.'';
		$statement = $connect->prepare($query);
		$statement->execute();

		$delete = 'DELETE FROM youfind_user WHERE user_id = '.$user_id.'';
		$deleteStatement = $connect->prepare($delete);
		$deleteStatement->execute();		

		$result = $statement->fetchAll();
		if(isset($result)) {
			echo 'Done';
		}
	}
	if($_POST['action'] == 'ban_user') {
		$user_id = $_POST['user_ban_id'];
		$query = 'UPDATE youfind_user SET user_status = "banned" WHERE user_id = '.$user_id.'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result)) {
			echo 'Done';
		}
	}

 ?>