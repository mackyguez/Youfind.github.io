<?php 
	include('database_connection.php');
	unset($_SESSION['seller_user_id']);
	unset($_SESSION['customer_user_id']);
	unset($_SESSION['customer_register_last_id']);
	unset($_SESSION['seller_register_last_id']);
	header('location:login.php');
 ?>