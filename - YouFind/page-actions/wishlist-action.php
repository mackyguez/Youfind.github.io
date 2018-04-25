<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

			$query = 'SELECT * FROM user_wishlist_tbl WHERE wishlist_id = '.@$_POST['product_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			if(@$_POST['action'] == 'add_to_cart') {
				$query1 = 'INSERT INTO user_cart_tbl(product_id, user_id, product_seller_id, product_photo, product_seller_shopname, product_name, product_price, product_quantity)
					VALUES(:product_id, :user_id, :product_seller_id, :product_photo, :product_seller_shopname, :product_name, :product_price, :product_quantity)
				';
				$statement1 = $connect->prepare($query1);
				$statement1->execute(
					array(
						':product_id'			=> $result[0]['product_id'],
						':user_id'					=> $result[0]['user_id'],
						':product_seller_id'		=> $result[0]['product_seller_id'],
						':product_photo'			=> $result[0]['product_photo'],
						':product_seller_shopname'	=> $result[0]['product_seller_shopname'],
						':product_name'				=> $result[0]['product_name'],
						':product_price'			=> $result[0]['product_price'],
						':product_quantity'			=> $result[0]['product_quantity']
					)
				);

				$delete = 'DELETE FROM user_wishlist_tbl WHERE wishlist_id = '.$_POST['product_id'].'';
				$deleteStatement = $connect->prepare($delete);
				$deleteStatement->execute();
				echo 'Done';
			}

			if(@$_POST['action'] == 'delete_wishlist') {
				$query = 'DELETE FROM user_wishlist_tbl WHERE wishlist_id = '.$_POST['wishlist_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute();
				echo 'Done';
			}
 ?>