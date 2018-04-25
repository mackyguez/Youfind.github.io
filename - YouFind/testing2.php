<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].' ORDER BY product_id DESC';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();

 	$order = array(
 		array(
 			'reference_number' => array(
 				'', 
 				'product_id' 			=> array(),
 				'customer_user_id'		=> array(),
 				'product_seller_id'		=> array(),
 				'product_photo'			=> array(),
 				'product_name'			=> array(),
 				'product_price'			=> array(),
 				'product_quantity'		=> array()
 			)
 		)
 	);

 	for($i=0; $i<$count; $i++) {
 		for($j=0; $j<$count; $j++) {	
			$characters = '0123456789';
			$string = '';
			$max = strlen($characters) - 1;
		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
	 		}
 		}

 		if($count > 0) {
	 		for($k=0; $k<$count; $k++) {
					$ref_num = $order[0]['reference_number'][0] = $string;
		 			$prod_id = $order[0]['reference_number']['product_id'][$k] = $result[$k]['product_id'];
		 			$cust_id = $order[0]['reference_number']['customer_user_id'][$k] = $result[$k]['user_id'];
		 			$prod_seller_id = $order[0]['reference_number']['product_seller_id'][$k] = $result[$k]['product_seller_id'];
		 			$prod_photo = $order[0]['reference_number']['product_photo'][$k] = $result[$k]['product_photo'];
		 			$prod_name = $order[0]['reference_number']['product_name'][$k] = $result[$k]['product_name'];
		 			$prod_price = $order[0]['reference_number']['product_price'][$k] = $result[$k]['product_price'];
		 			$prod_quant = $order[0]['reference_number']['product_quantity'][$k] = $result[$k]['product_quantity'];

	 		}
 		}
 	}

 	for($l=0; $l<$count; $l++) {
 		$queryInsert = 'INSERT INTO product_success_tbl(reference_number, product_id, customer_user_id, product_seller_id, product_photo, product_name, product_price, product_quantity)
 		VALUES(:reference_number, :product_id, :customer_user_id, :product_seller_id, :product_photo, :product_name, :product_price, :product_quantity)
		';
 		/**/
		$check = 'SELECT * FROM product_success_tbl';
		$checkStatement = $connect->prepare($check);
		$checkStatement->execute();
		$checkResult = $checkStatement->fetchAll();

		if($checkResult[$l]['product_id'] != $order[0]['reference_number']['product_id'][$l]) {
			$statementInsert = $connect->prepare($queryInsert);	
			$statementInsert->execute(
				array(
					':reference_number'		=> $order[0]['reference_number'][0],
					':product_id'			=> $order[0]['reference_number']['product_id'][$l],
					':customer_user_id'		=> $order[0]['reference_number']['customer_user_id'][$l],
					':product_seller_id'	=> $order[0]['reference_number']['product_seller_id'][$l],
					':product_photo'		=> $order[0]['reference_number']['product_photo'][$l],
					':product_name'			=> $order[0]['reference_number']['product_name'][$l],
					':product_quantity'		=> $order[0]['reference_number']['product_price'][$l],
					':product_price'		=> $order[0]['reference_number']['product_price'][$l]
				)
			);
		}

 	}


 ?>