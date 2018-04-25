<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	
		if($_POST['action'] == 'view_item') {
			$_SESSION['product_id'] = $_POST['item_id'];
			echo 'Done';
		}

 ?>