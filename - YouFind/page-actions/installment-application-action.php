<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

			if(@$_POST['action'] == '_3Months') {
				$price = $_POST['price'];
				$downPayment = $price*0.20;
				$_3mosTotal = ($price - $downPayment)/3;

				$characters = '0123456789';
				$string = '';
				$max = strlen($characters) - 1;

		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
		      	}

		      	$_SESSION['account_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
		      	$_SESSION['installment_order_number'] = $string;
		      	$_SESSION['installment_total_amount'] = $price;
		      	$_SESSION['installment_terms'] = 3;
		      	$_SESSION['installment_amount_to_pay'] = round($_3mosTotal,2);
		      	$_SESSION['installment_customer_id'] = $_SESSION['customer_user_id'];

	 		}

	 		if(@$_POST['action'] == '_6Months') {
				$price = $_POST['price'];
				$downPayment = $price*0.20;
				$_6mosTotal = ($price - $downPayment)/6;

				$characters = '0123456789';
				$string = '';
				$max = strlen($characters) - 1;

		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
		      	}

		      	$_SESSION['account_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
		      	$_SESSION['installment_order_number'] = $string;
		      	$_SESSION['installment_total_amount'] = $price;
		      	$_SESSION['installment_terms'] = 6;
		      	$_SESSION['installment_amount_to_pay'] = round($_6mosTotal,2);
		      	$_SESSION['installment_customer_id'] = $_SESSION['customer_user_id'];

	 		}

	 		if(@$_POST['action'] == '_12Months') {
				$price = $_POST['price'];
				$downPayment = $price*0.20;
				$_12mosTotal = ($price - $downPayment)/12;

				$characters = '0123456789';
				$string = '';
				$max = strlen($characters) - 1;

		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
		      	}

		      	$_SESSION['account_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
		      	$_SESSION['installment_order_number'] = $string;
		      	$_SESSION['installment_total_amount'] = $price;
		      	$_SESSION['installment_terms'] = 12;
		      	$_SESSION['installment_amount_to_pay'] = round($_12mosTotal,2);
		      	$_SESSION['installment_customer_id'] = $_SESSION['customer_user_id'];

	 		}

	 		if(@$_POST['action'] == '_18Months') {
				$price = $_POST['price'];
				$downPayment = $price*0.20;
				$_18mosTotal = ($price - $downPayment)/18;

				$characters = '0123456789';
				$string = '';
				$max = strlen($characters) - 1;

		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
		      	}

		      	$_SESSION['account_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
		      	$_SESSION['installment_order_number'] = $string;
		      	$_SESSION['installment_total_amount'] = $price;
		      	$_SESSION['installment_terms'] = 18;
		      	$_SESSION['installment_amount_to_pay'] = round($_18mosTotal,2);
		      	$_SESSION['installment_customer_id'] = $_SESSION['customer_user_id'];

	 		}

	 		if(@$_POST['action'] == '_24Months') {
				$price = $_POST['price'];
				$downPayment = $price*0.20;
				$_24mosTotal = ($price - $downPayment)/24;

				$characters = '0123456789';
				$string = '';
				$max = strlen($characters) - 1;

		 		for ($j = 0; $j < 8; $j++) {
		      		$string .= $characters[mt_rand(0, $max)];
		      	}

		      	$_SESSION['account_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
		      	$_SESSION['installment_order_number'] = $string;
		      	$_SESSION['installment_total_amount'] = $price;
		      	$_SESSION['installment_terms'] = 24;
		      	$_SESSION['installment_amount_to_pay'] = round($_24mosTotal,2);
		      	$_SESSION['installment_customer_id'] = $_SESSION['customer_user_id'];

	 		}

	 		if(@$_POST['action'] == 'complete_apply_installment') {
	 			$cart = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].' AND product_seller_shopname = "YouFind Corporation"';
	 			$cartStatement = $connect->prepare($cart);
	 			$cartStatement->execute();
	 			$resultCart = $cartStatement->fetchAll();
	 			$productId = $resultCart[0]['product_id'];
	 			
	 			$query = '
	 				INSERT INTO user_installment_tbl(account_name, customer_user_id, product_id, order_number, installment_terms, installment_total_amount, installment_amount_to_pay)
	 				VALUES(:account_name, :customer_user_id, :product_id, :order_number, :installment_terms, :installment_total_amount, :installment_amount_to_pay)
				';

				$insertInstall = $connect->prepare($query);
				$insertInstall->execute(
					array(
						':account_name'					=> $_SESSION['account_name'],
						':customer_user_id'				=> $_SESSION['installment_customer_id'],
						':product_id'					=> $productId,
						':order_number'					=> $_SESSION['installment_order_number'],
						':installment_terms'			=> $_SESSION['installment_terms'],
						':installment_total_amount'		=> $_SESSION['installment_total_amount'],
						':installment_amount_to_pay'	=> $_SESSION['installment_amount_to_pay']
					)
				);

				echo 'Done';

	 		}
 ?>