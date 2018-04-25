<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	$product_id = $_POST['cart_product_id'];
	$fetchCart = 'SELECT * FROM user_cart_tbl WHERE cart_id = '.$product_id.'';
	$fetchCartStatement = $connect->prepare($fetchCart);
	$fetchCartStatement->execute();
	$fetchCartCount = $fetchCartStatement->rowCount();
	$fetchCartResult = $fetchCartStatement->fetchAll();


	$query = 'INSERT INTO user_wishlist_tbl(product_id, user_id, product_seller_id, product_photo, product_seller_shopname, product_name, product_price, product_quantity)
		VALUES(:product_id, :user_id, :product_seller_id, :product_photo, :product_seller_shopname, :product_name, :product_price, :product_quantity)
	';
	$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_id'					=> $product_id,
				':user_id'						=> $fetchCartResult[0]['user_id'],
				':product_seller_id'			=> $fetchCartResult[0]['product_seller_id'],
				':product_photo'				=> $fetchCartResult[0]['product_photo'],
				':product_seller_shopname'		=> $fetchCartResult[0]['product_seller_shopname'],
				':product_name'					=> $fetchCartResult[0]['product_name'],
				':product_price'				=> $fetchCartResult[0]['product_price'],
				':product_quantity'				=> $fetchCartResult[0]['product_quantity']
			)
	);

	$delete = 'DELETE FROM user_cart_tbl WHERE cart_id = '.$_POST['cart_product_id'].'';
	$delteStatement = $connect->prepare($delete);
	$delteStatement->execute();
	echo 'Done';
 ?>