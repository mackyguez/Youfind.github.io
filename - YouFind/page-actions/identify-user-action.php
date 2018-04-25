<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	if(@$_POST['action'] == 'identify_user') {
		if(isset($_SESSION['customer_user_id'])) {
			echo 'DoneCustomer';
		}
		else if(isset($_SESSION['seller_user_id'])) {
			echo 'DoneSeller';
		}
	}
	if(@$_POST['action'] == 'check_status_seller') {
		$seller_id = @$_SESSION['seller_user_id'];
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$seller_id.'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		if($result[0]['user_status'] == 'not verified') {
			echo 'not verified';
		}
		else if($result[0]['user_status'] == 'verified') {
			echo 'verified';
		}
	}
	if(@$_POST['action'] == 'session_product_id') {
			$_SESSION['product_id'] = $_POST['product_id'];
			if(isset($_SESSION['seller_user_id'])) {
				echo 'DoneSeller';
			}
			else if(isset($_SESSION['customer_user_id'])){
				echo 'DoneCustomer';
			}
			else {
				echo 'Done';
			}
		}
 ?>