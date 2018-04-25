<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

			if(@$_POST['action'] == 'check_user') {
				if($result[0]['user_status'] == 'verified') {
					echo 'verified';
				}
				else if($result[0]['user_status'] == 'not verified') {
					echo 'not verified';	
				}
				else if($result[0]['user_status'] == 'banned') {
					echo 'banned';	
				}
			}

			if(@$_POST['action'] == 'load_seller_products') {
				$fetch_seller_product = 'SELECT * FROM index_newsfeed_tbl WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$fetchStatement = $connect->prepare($fetch_seller_product);
				$fetchStatement->execute();
				$fetchResult = $fetchStatement->fetchAll();
				$fetchCount = $fetchStatement->rowCount();
				$remaining = 0;

				$output = '<tr>
							<th width="250px" style="padding: 5px;">Product Name
							<th width="250px" style="padding: 5px;">Category
							<th width="150px" style="padding: 5px;">Unit Price
							<th width="100px" style="padding: 5px;">Quantity
						</tr>
					';
				for($i=0; $i<$fetchCount; $i++) {
					$remaining = $remaining + $fetchResult[$i]['product_quantity'];
					$output .= '
							<tr>
								<td style="padding: 5px; cursor: pointer;" data-product_id="'.$fetchResult[$i]["product_id"].'" id="product_name">'.$fetchResult[$i]['product_name'].'
								<td style="padding: 5px;">'.$fetchResult[$i]['product_category'].'
								<td style="padding: 5px;">&#8369; '.number_format($fetchResult[$i]['product_price'],2).'
								<td style="padding: 5px;">'.$fetchResult[$i]['product_quantity'].'
							</tr>';
				}

				$item = array(
					'output'			=> $output,
					'posted_products'	=> $fetchCount,
					'remaining_prods'	=> $remaining
				);
				echo json_encode($item);
			}

			if(@$_POST['action'] == 'view_product') {
				$_SESSION['product_id'] = $_POST['product_id'];
				echo 'Done';
			}
 ?>