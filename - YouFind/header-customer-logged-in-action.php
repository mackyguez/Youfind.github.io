<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$user_id = $_SESSION['customer_user_id'];
	$header_first_name = '';
	$header_last_name = '';
	$header_add_city = '';
	$checkUser = '';
	$profile_image = '';
	$query = 'SELECT * FROM youfind_user WHERE user_id = :user_id ';
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_id'	=> $user_id
		)
	);
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$header_first_name = $row['first_name'];
		$header_last_name = $row['last_name'];
		$header_add_city = $row['add_city'];
		$header_user_type = $row['user_type'];
		$profile_image = $row['profile_picture'];
	}
 ?>
 