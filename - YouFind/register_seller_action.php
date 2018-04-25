<?php 
	include('database_connection.php');

	if(isset($_POST['action'])) {
		if($_POST['action'] == 'register_seller') {
			$email = '';
			if( $_POST['user_type'] != '' && $_POST['first_name'] != '' && 
				$_POST['last_name'] != '' && $_POST['shopname'] != '' && 
				$_POST['email'] != '' && $_POST['password'] != '') {

					$query = 'SELECT email FROM youfind_user';
					$statement = $connect->prepare($query);
					$statement->execute();
					$result = $statement->fetchAll();
					foreach($result as $row) {
						if($_POST['email'] == $row['email']) {
							$email = $row['email'];
							echo 'emailErr';
							break;
						}
					}
					if($email != $_POST['email']) {
						$query1 = '
						INSERT INTO temp_database(user_type, first_name, last_name, shopname, email, password, user_status)
						VALUES(:user_type, :first_name, :last_name, :shopname, :email, :password, :user_status)
						';
							$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
							$statement1 = $connect->prepare($query1);
							$statement1->execute(
								array(
									':user_type' 	=> $_POST['user_type'],
									':first_name' 	=> $_POST['first_name'],
									':last_name' 	=> $_POST['last_name'],
									':shopname' 	=> $_POST['shopname'],
									':email' 		=> $_POST['email'],
									':password' 	=> $hash,
									':user_status'	=> $_POST['user_status']
								)
							);
							$count = $statement1->rowCount();
							if($count > 0) {
								$_SESSION['last_id'] = $connect->lastInsertId();
								echo 'Done';
							}
							else {
								echo 'None';
							}
					}	
				}
			else {
				echo 'allFieldErr';
			}
		}
	}

 ?>