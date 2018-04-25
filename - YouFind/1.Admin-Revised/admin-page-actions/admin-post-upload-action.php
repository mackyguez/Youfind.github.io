<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		
		if($_FILES['upload_product_photo']['tmp_name'] != '') {
			@$user_id = $_SESSION['customer_user_id'];
			$ext = end(explode('.', $_FILES['upload_product_photo']['name']));
			$name = md5(rand());
			$location = '../../product-photo/' .$name.'.'.$ext;
			$location1 = '../product-photo/' .$name.'.'.$ext;
			$upload_product_photo = $name.'.'.$ext;

			//@unlink('../../product-photo/'.$_SESSION['upload_product_photo']);

			if(move_uploaded_file($_FILES['upload_product_photo']['tmp_name'], $location)) {
				echo '<img src="'.$location1.'" width="100%" height="100%">';
				$_SESSION['upload_product_photo'] = $upload_product_photo;
			}
		}
 ?>