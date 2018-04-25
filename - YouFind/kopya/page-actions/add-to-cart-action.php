<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
		if($_POST['action'] == 'load_cart_counter') {
			$is_available = 0;
			foreach($_SESSION['shopping_cart'] as $keys => $values) {
				$is_available++;
				$_SESSION['shopping_cart'][$keys]['product_id'] = $_POST['product_id'];	
			}
			if($is_available < 0) {
				$item_array = array(
					'product_id'		=> $_POST['product_id']
				);
				$_SESSION['shopping_cart'][] = $item_array;
			}
			else {
				$item_array = array(
					'product_id'		=> $_POST['product_id']
				);
				$_SESSION['shopping_cart'][] = $item_array;	
			}
			
		}
		

 ?>