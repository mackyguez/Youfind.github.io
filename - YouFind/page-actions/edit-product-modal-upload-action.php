<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		if($_FILES['upload_product_photo']['tmp_name'] != '') {
			$user_id = $_SESSION['seller_user_id'];
			$ext = end(explode('.', $_FILES['upload_product_photo']['name']));
			$name = md5(rand());
			$location = '../product-photo/' .$name.'.'.$ext;
			$upload_product_photo = $name.'.'.$ext;

			$query = 'SELECT * FROM index_newsfeed_tbl WHERE user_id = '.$user_id.'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$fetchResult = $statement->fetchAll();

			@unlink('../product-photo/'.$_SESSION['edit_product_photo_change']);

			if(move_uploaded_file($_FILES['upload_product_photo']['tmp_name'], $location)) {
				$_SESSION['edit_product_photo_change'] = $name.'.'.$ext;
				echo '<img src="product-photo/'.$_SESSION['edit_product_photo_change'].'" width="100%" height="100%">';
			}
		}
 ?>