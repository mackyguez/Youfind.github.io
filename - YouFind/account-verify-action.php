<?php 
	include('database_connection.php');
	if($_FILES['upload_front_id']['tmp_name'] != '' && 
		$_FILES['upload_back_id']['tmp_name'] != '' && 
		$_POST['select_id'] != '' && 
		$_POST['id_number'] != '' && 
		$_POST['account_name'] != '' && 
		$_POST['account_number'] != '' && 
		$_POST['expi_year'] != '' && 
		$_POST['expi_month'] != '') {

			$last_id = $_SESSION['last_id'];
			$f_image_name = explode('.', $_FILES['upload_front_id']['name']);
			$front_extension = $f_image_name[1];
			$b_image_name = explode('.', $_FILES['upload_back_id']['name']);
			$back_extension = $b_image_name[1];
			$front_name = 'front-image-' .rand(100, 999). '.' .$front_extension;
			$back_name = 'back-image-' .rand(100, 999). '.' .$back_extension;
			$path_front = 'upload/' .$front_name;
			$path_back = 'upload/' .$back_name;
			move_uploaded_file($_FILES['upload_front_id']['tmp_name'] , $path_front);
			move_uploaded_file($_FILES['upload_back_id']['tmp_name'] , $path_back);
			$user_type = '';
			$first_name = '';
			$last_name = '';
			$shopname = '';
			$email = '';
			$password = '';
			$user_status = '';
			$select = '
			SELECT user_type, first_name, last_name, shopname, email, password, user_status
			FROM temp_database WHERE id = "'.$last_id.'"
			';
			$statement1 = $connect->prepare($select);
			$statement1->execute();
			$result = $statement1->fetchAll();
			foreach($result as $row) {
				$user_type 		= $row['user_type'];
				$first_name 	= $row['first_name'];
				$last_name 		= $row['last_name'];
				$shopname 		= $row['shopname'];
				$email 			= $row['email'];
				$password 		= $row['password'];
				$user_status	= $row['user_status'];
			}
			$query = '
				INSERT INTO temp_database(user_type, first_name, last_name, shopname, email, password, user_status, front_id, back_id, select_id, id_number, account_name, account_number, expi_month, expi_year)
				VALUES(:user_type, :first_name, :last_name, :shopname, :email, :password,:user_status,:front_id, :back_id, :select_id, :id_number, :account_name, :account_number, :expi_month, :expi_year)
			';
			$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':user_type'		=> 	$user_type, 
						':first_name'		=> 	$first_name, 
						':last_name'		=> 	$last_name, 
						':shopname'			=> 	$shopname, 
						':email'			=> 	$email, 
						':password'			=>	$password,
						':user_status'		=> 	$user_status,
						':front_id'			=> 	$front_name,
						':back_id'			=> 	$back_name,
						':select_id'		=> 	$_POST['select_id'],
						':id_number' 		=> 	$_POST['id_number'],
						':account_name'		=> 	$_POST['account_name'],
						':account_number'	=> 	$_POST['account_number'],
						':expi_month'		=> 	$_POST['expi_month'], 
						':expi_year'		=> 	$_POST['expi_year']
					)
				);
				$_SESSION['last_id'] = $connect->lastInsertId();
				echo 'Done';
	}
	else {
		echo 'All fields are Required';
	}
 ?>