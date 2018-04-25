<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action'] == 'fetch_data_for_discount') {
		$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$_POST['product_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		$discounted = $result[0]['product_price'] * $result[0]['product_discount'];
		$discounted_price = $result[0]['product_price'] - $discounted;

		$item = array(
			'orig_price'		=> $result[0]['product_price'],
			'discount_price'	=> $result[0]['product_discount'],
			'discounted_price'	=> number_format($discounted_price,2)
		);
		echo json_encode($item);
	}

	if(@$_POST['action'] == 'discount_compute') {
		$discount = ($_POST['orig_price'] * $_POST['discount_price']);

		$total = $_POST['orig_price'] - $discount;
			
		if($total > 0) {
			echo number_format($total,2);
		}
		else {
			echo 0;
		}
	}

	if(@$_POST['action'] == 'set_session') {
		$_SESSION['admin_product_id'] = $_POST['product_id'];
	}

	if(@$_POST['action'] == 'complete_discount') {
		$query = 'UPDATE index_newsfeed_tbl 
						SET product_price = '.$_POST['orig_price'].',
						product_discount = '.$_POST['discount_price'].'
						WHERE product_id = '.$_SESSION['admin_product_id'].'
		';
		  	$statement = $connect->prepare($query);
		  	$statement->execute();
		  	$count = $statement->rowCount();
		
			echo 'Done';
			unset($_SESSION['admin_product_id']);
	}

 ?>