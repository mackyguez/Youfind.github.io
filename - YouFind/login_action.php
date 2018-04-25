<?php 
	include('database_connection.php');

		if(isset($_POST['login'])) {
			if($_POST['email'] == '' || $_POST['password'] == '') {
				echo 'Both fields are required';
			}
			else {
				$query = 'SELECT DISTINCT * FROM youfind_user WHERE email = :email';
				$statement = $connect->prepare($query);
				$statement->execute(array(':email' => $_POST['email']));
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
					if(@$result[0]['email'] == $_POST['email']) {
						if(password_verify($_POST['password'], @$result[0]['password'])) {
							if($result[0]['user_type'] == 'Customer') {
								$_SESSION['customer_user_id'] = $result[0]['user_id'];
								echo 'Done_Customer';
							}
							else if(@$result[0]['user_type'] == 'Seller') {
								$_SESSION['seller_user_id'] = @$result[0]['user_id'];
								echo 'Done_Seller';
							}
						}
					else {
						echo 'Invalid Password';
						}
					}
					else {
						echo 'User does not exist';
					}
			}
		}


 ?>