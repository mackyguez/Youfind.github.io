<?php 
	include 'database_connection.php';
	$query = 'SELECT * FROM index_newsfeed_tbl ORDER BY product_id DESC';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	if($_POST['action'] == 'load_products') {
		$output = '';
			foreach($result as $row) {
				$output .= '
				<div class="product-wrapper">
					<div class="product-image-holder"><img src="product-photo/'.$row['product_photo'].'" width="170px" height="170px" class="product-image">
					</div>
					<center>
					<div class="index-product-title">'.$row['product_title'].'</div>
					<div class="index-product-price">'.$row['product_price'].'</div>
					</center>
				</div>
				';
			}
		echo $output;
	}

 ?>