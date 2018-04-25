<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	if(@$_POST['action'] == 'add_address') {
		$query = '
			INSERT INTO user_addresses(customer_user_id,first_name,last_name,add_street,add_brgy,add_city,add_province,contact_number)
			VALUES(:customer_user_id,:first_name,:last_name,:add_street,:add_brgy,:add_city,:add_province,:contact_number)
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':customer_user_id'			=> $_POST['customer_user_id'],
				':first_name'				=> $_POST['first_name'],
				':last_name'				=> $_POST['last_name'],
				':add_street'				=> $_POST['add_street'],
				':add_brgy'					=> $_POST['add_brgy'],
				':add_city'					=> $_POST['add_city'],
				':add_province'				=> $_POST['add_province'],
				':contact_number'			=> $_POST['contact_number']

			)
		);
		$result = $statement->fetchAll();
		if(isset($result)) {
			echo 'Done';
		}
	}
	if(@$_POST['action'] == 'check_address') {
		$query = 'SELECT * FROM user_addresses WHERE customer_user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();

		if($count >= 3) {
			echo 'Adding Address are only allowed three times';
		}
		else {
			echo 'applicable';
		}
	}
 ?>