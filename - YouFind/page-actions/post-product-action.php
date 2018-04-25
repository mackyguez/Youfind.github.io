<?php 
	include('../database_connection.php');
	if(@$_FILES['product_photo']['tmp_name'] != '') {
		$ext = end(explode('.', $_FILES['product_photo']['name']));
		$name = md5(rand());
		$location = '../product-photo/'.$name.'.'.$ext;

		if(@file_exists('../product-photo/'.$_SESSION['product_photo_old_name'])) {
			@unlink('../product-photo/'.$_SESSION['product_photo_old_name']);
			unset($_SESSION['product_photo_old_name']);
		}

		if(move_uploaded_file($_FILES['product_photo']['tmp_name'], $location)) {
			echo '<img src="photo-product/'.$location.'" width="100%" height="100%">';
			@$_SESSION['product_photo_old_name'] = @$name.'.'.@$ext;
		}
	}

	if(@$_POST['action'] == 'product_post') {
		$fetchQuery = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$fetchStatement = $connect->prepare($fetchQuery);
		$fetchStatement->execute();
		$result = $fetchStatement->fetchAll();

		$user_id = $result[0]['user_id'];
		$seller_first_name = $result[0]['first_name'];
		$seller_last_name = $result[0]['last_name'];
		$email = $result[0]['email'];
		$contact_number = $result[0]['contact_number'];
		$shopname = $result[0]['shopname'];

		$query = '
		INSERT INTO index_newsfeed_tbl(
				user_id,
				shopname, 
				product_photo,
				product_category, 
				product_name, 
				product_price, 
				product_quantity, 
				product_overview, 
				seller_first_name, 
				seller_last_name)
		VALUES(
				:user_id,
				:shopname, 
				:product_photo,
				:product_category, 
				:product_name, 
				:product_price, 
				:product_quantity, 
				:product_overview, 
				:seller_first_name, 
				:seller_last_name)
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'				=> $user_id,
				':shopname'				=> $shopname,
				':product_photo'		=> $_SESSION['product_photo_old_name'],
				':product_category'		=> $_POST['product_category'],
				':product_name'			=> $_POST['product_name'],
				':product_price'		=> $_POST['product_price'],
				':product_quantity'		=> $_POST['product_quantity'],
				':product_overview'		=> $_POST['product_overview'],
				':seller_first_name'	=> $seller_first_name,
				':seller_last_name'		=> $seller_last_name
			)
		);

		unset($_SESSION['product_photo_old_name']);
		echo 'Done';
		$_SESSION['last_product_id'] = $connect->lastInsertId();

	}

	if(@$_POST['action'] == 'direct_index') {
		unset($_SESSION['last_product_id']);
		unset($_SESSION['product_id']);
		echo 'Done';
	}
 ?>