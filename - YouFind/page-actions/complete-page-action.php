<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();

			for($i=0; $i<$count; $i++) { ?>
				<div class="item-wrapper">
					<div class="picture-wrapper"><img src="product-photo/<?php echo $result[$i]['product_photo']; ?>" width="90%" height="90%"></div>
					<div class="info-wrapper">
						<p class="item-name"><?php echo $result[$i]['product_name']; ?></p>
						<p class="item-seller"><?php echo $result[$i]['product_seller_shopname']; ?></p>
					</div>
					<div class="quantity-wrapper">
						<p class="qty-counter"><?php echo $result[$i]['product_quantity']; ?></p>
					</div>
					<div class="unit-price-wrapper">
						<p class="unit-price">&#8369; <?php echo number_format($result[$i]['product_price'],2); ?></p>
					</div>
				</div>
<?php 		}


 ?>
