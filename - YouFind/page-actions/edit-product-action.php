<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		if($_POST['action'] == 'update_product') {
			
			if($_POST['counter'] == 0) {
				$query = '
						UPDATE index_newsfeed_tbl 
						SET product_category = :product_category,
							product_name = :product_name,
							product_price = :product_price,
							product_quantity = :product_quantity,
							product_overview = :product_overview,
							inc_prod_quantity1 = :inc_prod_quantity1,
							inc_prod_name1 = :inc_prod_name1
						WHERE product_id = '.$_SESSION['product_id'].'
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':product_category'		=> $_POST['product_category'],
						':product_name'			=> $_POST['product_name'],
						':product_price'		=> $_POST['product_price'],
						':product_quantity'		=> $_POST['product_quantity'],
						':product_overview'		=> $_POST['product_overview'],
						':product_quantity'		=> $_POST['product_quantity'],
						':inc_prod_quantity1'	=> $_POST['inc_prod_quantity1'],
						':inc_prod_name1'		=> $_POST['inc_prod_name1']
					)
				);
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
					if($count > 0) {
						echo 'Done';
					}
					else {
						echo 'None';
					}
			}
			/*
			if($_POST['counter'] == 1) {
				$query = '
						UPDATE index_newsfeed_tbl 
						SET product_category = :product_category,
							product_name = :product_name,
							product_price = :product_price,
							product_quantity = :product_quantity,
							product_overview = :product_overview,
							inc_prod_quantity1 = :inc_prod_quantity1,
							inc_prod_name1 = :inc_prod_name1,
							inc_prod_quantity2 = :inc_prod_quantity2,
							inc_prod_name2 = :inc_prod_name2

						WHERE product_id = '.$_SESSION['product_id'].'
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':product_category'		=> $_POST['product_category'],
						':product_name'			=> $_POST['product_name'],
						':product_price'		=> $_POST['product_price'],
						':product_quantity'		=> $_POST['product_quantity'],
						':product_overview'		=> $_POST['product_overview'],
						':product_quantity'		=> $_POST['product_quantity'],
						':inc_prod_quantity1'	=> $_POST['inc_prod_quantity1'],
						':inc_prod_name1'		=> $_POST['inc_prod_name1'],
						':inc_prod_quantity2'	=> $_POST['inc_prod_quantity2'],
						':inc_prod_name2'		=> $_POST['inc_prod_name2']

					)
				);
				$result = $statement->fetchAll();
				$count = $statement->rowCount();
					if($count > 0) {
						echo 'Done';
					}
					else {
						echo 'None';
					}
			}
			*/

			if($_POST['spec_counter'] == 0) {

			}
		}
 ?>