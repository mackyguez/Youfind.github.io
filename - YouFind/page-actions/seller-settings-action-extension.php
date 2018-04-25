<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();


	if($_POST['first_name'] != '') {
		$query = 'UPDATE youfind_user SET first_name = :first_name WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':first_name' => $_POST['first_name']
			)
		);
	}

	if($_POST['last_name'] != '') {
		$query = 'UPDATE youfind_user SET last_name = :last_name WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':last_name' => $_POST['last_name']
			)
		);
	}

	if($_POST['contact_number'] != '') {
		$query = 'UPDATE youfind_user SET contact_number = :contact_number WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':contact_number' => $_POST['contact_number']
			)
		);
	}

	if($_POST['bank_acc_name'] != '') {
		$query = 'UPDATE youfind_user SET account_name = :account_name WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':account_name' => $_POST['bank_acc_name']
			)
		);
	}

	if($_POST['bank_acc_number'] != '') {
		$query = 'UPDATE youfind_user SET account_number = :account_number WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':account_number' => $_POST['bank_acc_number']
			)
		);
	}

	if($_POST['id_type'] != '') {
		$query = 'UPDATE youfind_user SET select_id = :select_id WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':select_id' => $_POST['id_type']
			)
		);
	}

	if($_POST['add_street'] != '') {
		$query = 'UPDATE youfind_user SET add_street = :add_street WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':add_street' => $_POST['add_street']
			)
		);
	}

	if($_POST['add_brgy'] != '') {
		$query = 'UPDATE youfind_user SET add_brgy = :add_brgy WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':add_brgy' => $_POST['add_brgy']
			)
		);
	}

	if($_POST['add_city'] != '') {
		$query = 'UPDATE youfind_user SET add_city = :add_city WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':add_city' => $_POST['add_city']
			)
		);
	}

	if($_POST['add_province'] != '') {
		$query = 'UPDATE youfind_user SET add_province = :add_province WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':add_province' => $_POST['add_province']
			)
		);
	}

	if($_POST['id_number'] != '') {
		$query = 'UPDATE youfind_user SET id_number = :id_number WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_number' => $_POST['id_number']
			)
		);
	}

	if($_FILES['front']['tmp_name'] != '') {
			$f_image_name = explode('.', $_FILES['front']['name']);
			$front_extension = $f_image_name[1];
			$front_name = 'front-image-' .rand(100, 999).'.'.$front_extension;
			$path_front = '../upload/' .$front_name;
			if(move_uploaded_file($_FILES['front']['tmp_name'], $path_front)) {
				$query = 'UPDATE youfind_user SET front_id = :front_id WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':front_id'		=> $front_name
					)
				);

			}
	}

	if($_FILES['back']['tmp_name'] != '') {
			$b_image_name = explode('.', $_FILES['back']['name']);
			$back_extension = $b_image_name[1];
			$back_name = 'back-image-' .rand(100, 999).'.'.$back_extension;
			$path_back = '../upload/' .$back_name;
			if(move_uploaded_file($_FILES['back']['tmp_name'], $path_back)) {
				$query = 'UPDATE youfind_user SET back_id = :back_id WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':back_id'		=> $back_name
					)
				);

			}
		}
	

 ?>