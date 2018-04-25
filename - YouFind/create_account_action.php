<?php 

	include('database_connection.php');

	$email = '';
			$check = '
				SELECT email FROM youfind_user WHERE email = :email
			';
			$checkStatement = $connect->prepare($check);
			$checkStatement->execute(
				array(
					':email'	=> $_POST['email']
				)
			);
			$checkResult = $checkStatement->fetchAll();
			if($checkResult == TRUE) {
				echo 'Email is already in use';
			}
			else {
				$password = $_POST['password'];
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$query = '
				INSERT INTO youfind_user(
				user_type,user_status,first_name,last_name,email,password,add_street,add_city,add_brgy,add_province,contact_number,birthday)
				VALUES(:user_type,:user_status,:first_name, :last_name, :email, :password, :add_street, :add_city, :add_brgy, :add_province,:contact_number,:birthday)
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':user_type'		=> $_POST['user_type'],
						':user_status'		=> $_POST['user_status'],
						':first_name'		=> $_POST['first_name'],
						':last_name'		=> $_POST['last_name'],
						':email'			=> $_POST['email'],
						':first_name'		=> $_POST['first_name'],
						':password'			=> $hash,
						':add_street'		=> $_POST['add_street'],
						':add_brgy'			=> $_POST['add_brgy'],
						':add_city'			=> $_POST['add_city'],
						':add_province'		=> $_POST['add_province'],
						':contact_number'	=> $_POST['contact_number'],
						':birthday'			=> $_POST['birthday']

					)
				);
					$_SESSION['customer_user_id'] = $connect->lastInsertId();
					echo 'Done';
			}

			




 ?>
