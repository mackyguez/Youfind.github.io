<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		if(isset($_SESSION['customer_user_id'])) {
			if(@$_POST['action'] == 'get_code') {
				$query = 'SELECT * FROM load_cards_tbl WHERE load_card_code = :load_card_code';
				$statement = $connect->prepare($query);
				$statement->execute(array(':load_card_code'	=> $_POST['code']));
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
				if($count > 0) {
					$user = 'UPDATE youfind_user SET youwallet ';
					
					$user = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
					$statementUser = $connect->prepare($user);
					$statementUser->execute();
					$resultUser = $statementUser->fetchAll();
					
					$deleteQuery = 'DELETE FROM load_cards_tbl WHERE load_card_code = :load_card_code';
					$deleteStatement = $connect->prepare($deleteQuery);
					$deleteStatement->execute(
						array(
							':load_card_code'	=> $_POST['code']
						)
					);

					$total = $resultUser[0]['youwallet'] + $result[0]['amount'];

					$update = 'UPDATE youfind_user SET youwallet = '.$total.' WHERE user_id = '.$_SESSION['customer_user_id'].'';
					$updateStatement = $connect->prepare($update);
					$updateStatement->execute();
					$res = $updateStatement->rowCount();
				
					if($res > 0) {
						
						$deleteStatement = $connect->prepare($query);
						$deleteStatement->execute(array(':load_card_code'	=>	$_POST['code']));
						echo 'Done';
					}
				}
				else {
					echo 'The code is not valid';
				}
			}

			if(@$_POST['action'] == 'load_points') {
				$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				echo number_format($result[0]['points'],2);
			}

			if(@$_POST['action'] == 'redeem_points') {
				$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();

				if(@$_POST['redeem_quantity'] > $result[0]['points']) {
					echo 'Insufficient points';
				} 
				else {
					$youwallet = $result[0]['youwallet'] + $_POST['redeem_quantity'];
					$points = $result[0]['points'] - $_POST['redeem_quantity'];
					$update = 'UPDATE youfind_user SET youwallet = '.$youwallet.', points = '.$points.' WHERE user_id = '.$_SESSION['customer_user_id'].'';
					$updateStatement = $connect->prepare($update);
					$updateStatement->execute();
					$updateResult = $updateStatement->rowCount();
						if($updateResult > 0) {
							echo 'Done';
						}
				}
			}
		}

		if(isset($_SESSION['seller_user_id'])) {
			if(@$_POST['action'] == 'get_code') {
				$query = 'SELECT * FROM load_cards_tbl WHERE load_card_code = :load_card_code';
				$statement = $connect->prepare($query);
				$statement->execute(array(':load_card_code'	=> $_POST['code']));
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
				if($count > 0) {
					$user = 'UPDATE youfind_user SET youwallet ';
					
					$user = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
					$statementUser = $connect->prepare($user);
					$statementUser->execute();
					$resultUser = $statementUser->fetchAll();
					
					$deleteQuery = 'DELETE FROM load_cards_tbl WHERE load_card_code = :load_card_code';
					$deleteStatement = $connect->prepare($deleteQuery);
					$deleteStatement->execute(
						array(
							':load_card_code'	=> $_POST['code']
						)
					);

					$total = $resultUser[0]['youwallet'] + $result[0]['amount'];

					$update = 'UPDATE youfind_user SET youwallet = '.$total.' WHERE user_id = '.$_SESSION['seller_user_id'].'';
					$updateStatement = $connect->prepare($update);
					$updateStatement->execute();
					$res = $updateStatement->rowCount();
				
					if($res > 0) {
						
						$deleteStatement = $connect->prepare($query);
						$deleteStatement->execute(array(':load_card_code'	=>	$_POST['code']));
						echo 'Done';
					}
				}
				else {
					echo 'The code is not valid';
				}
			}

			if(@$_POST['action'] == 'load_points') {
				$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				echo number_format($result[0]['points'],2);
			}

			if(@$_POST['action'] == 'redeem_points') {
				$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();

				if(@$_POST['redeem_quantity'] > $result[0]['points']) {
					echo 'Insufficient points';
				} 
				else {
					$youwallet = $result[0]['youwallet'] + $_POST['redeem_quantity'];
					$points = $result[0]['points'] - $_POST['redeem_quantity'];
					$update = 'UPDATE youfind_user SET youwallet = '.$youwallet.', points = '.$points.' WHERE user_id = '.$_SESSION['seller_user_id'].'';
					$updateStatement = $connect->prepare($update);
					$updateStatement->execute();
					$updateResult = $updateStatement->rowCount();
						if($updateResult > 0) {
							echo 'Done';
						}
				}
			}


		}
		
 ?>