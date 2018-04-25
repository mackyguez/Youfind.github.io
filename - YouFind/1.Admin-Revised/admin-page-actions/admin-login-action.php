<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		$query = 'SELECT * FROM admin_table WHERE username = :username';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':username'		=> $_POST['username']
			)
		);
		$result = $statement->fetchAll();
		$count = $statement->rowCount();

		if($count > 0) {
			if($result[0]['password'] != $_POST['password']) {
				echo 'Incorrect Password';
			}
			else {
				$_SESSION['admin_user_id'] = $result[0]['admin_id'];
				echo 'Done';
			}
		}
		else {
			echo 'User Admin '.$_POST['username'].' is not existing';
		}

 ?>