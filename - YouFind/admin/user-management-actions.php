<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	if(isset($_POST['action'])) {
		if($_POST['action'] == 'delete') {
			$user_id = $_POST['user_id'];
			$query = 'DELETE FROM youfind_user WHERE user_id = :user_id';
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':user_id'	=> $user_id
				)
			);
		}
	}
 ?>