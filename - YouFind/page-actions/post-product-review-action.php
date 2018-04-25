<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		if(@$_POST['action'] == 'delete_product') {
			$query = 'DELETE FROM index_newsfeed_tbl WHERE product_id = '.$_POST['product_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$count = $statement->rowCount();
				if($count > 0) {
					echo 'Done';
				}
		}

 ?>