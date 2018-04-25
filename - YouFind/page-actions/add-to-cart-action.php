<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
		if(@$_POST['action'] == 'load_cart_counter') {
			$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.@$_SESSION['customer_user_id'].' ORDER BY product_id DESC';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();
			echo $count;
		}
		if(@$_POST['action'] == 'load_cart_total') {
			$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.@$_SESSION['customer_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();

			$total = 0;

			for($i=0; $i<$count; $i++) {
				$total = $total + $result[$i]['product_price'] * $result[$i]['product_quantity'];
			}
			echo '&#8369; '. number_format($total,2);
		}

		if($_POST['action'] == 'add_wishlist') {
			echo 'Done';
		}
		
		if(@$_POST['action'] == 'add_to_cart') {
				$query = 'SELECT 
					user_cart_tbl.*, 
					index_newsfeed_tbl.product_quantity as product_quantity_limit
				FROM user_cart_tbl
				JOIN index_newsfeed_tbl
				WHERE user_cart_tbl.product_id = index_newsfeed_tbl.product_id
				AND user_cart_tbl.user_id = '.$_SESSION['customer_user_id'].'';

				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
				
				$cartProductIds = array();

				for($i=0; $i<$count; $i++) {
					array_push($cartProductIds, $result[$i]['product_id']);
				}
				if(!in_array($_POST['product_id'], $cartProductIds)) {
					$query1 = '
						INSERT INTO user_cart_tbl(
							product_id, user_id, product_name, 
							product_price, product_quantity, product_seller_id,
							product_seller_shopname, product_photo)
						VALUES(
							:product_id, :user_id, :product_name, :product_price, :product_quantity, :product_seller_id, :product_seller_shopname, :product_photo)
					';
					$statement1 = $connect->prepare($query1);
					$statement1->execute(
						array(
							':product_id'				=> $_POST['product_id'],
							':user_id'					=> $_SESSION['customer_user_id'],
							':product_name'				=> $_POST['product_name'],
							':product_price'			=> $_POST['product_price'],
							':product_quantity'			=> 1,
							':product_seller_id'		=> $_POST['product_seller_id'],
							':product_seller_shopname'	=> $_POST['product_seller_shopname'],
							':product_photo'			=> $_POST['product_photo']
						)
					);
					$result1 = $statement1->fetchAll();
					echo 'Done';
				}
				else if(in_array($_POST['product_id'], $cartProductIds)) {
					$query = 'SELECT 
									user_cart_tbl.*, 
									index_newsfeed_tbl.product_quantity as product_quantity_limit
							FROM user_cart_tbl
							JOIN index_newsfeed_tbl
							WHERE user_cart_tbl.product_id = index_newsfeed_tbl.product_id
							AND user_cart_tbl.user_id = '.$_SESSION['customer_user_id'].' 
							AND user_cart_tbl.product_id = '.$_POST['product_id'].'';
					$statement = $connect->prepare($query);
					$statement->execute();
					$result = $statement->fetchAll();

					if($result[0]['product_quantity'] < $result[0]['product_quantity_limit']) {
						$updateQuantity = $result[0]['product_quantity']+1;
						$change = 'UPDATE user_cart_tbl 
									SET product_quantity = '.$updateQuantity.'
									WHERE product_id = '.$_POST['product_id'].'
									AND user_id = '.$_SESSION['customer_user_id'].'
									';
						$changeStatement = $connect->prepare($change);
						$changeStatement->execute();
						echo 'Product Quantity Added';
					}
					else {
						echo 'You have already reached the maximum quantity of the product';
					}
				}
		}

 ?>