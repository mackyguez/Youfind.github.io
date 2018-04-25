<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		$query = 'SELECT * FROM user_wishlist_tbl WHERE user_id = '.$_SESSION['customer_user_id'].' ORDER BY wishlist_id DESC';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
 ?>

<?php if($_POST['action'] == 'load_wishlist') { ?>
<?php 	for($i=0; $i<$count; $i++) { ?>
		
			<div class="item-wrapper">
				<div class="picture-wrapper"><img src="product-photo/<?php echo $result[$i]['product_photo']; ?>" width="90%" height="90%"></div>
				<div class="info-wrapper">
					<p class="item-name"><?php echo $result[$i]['product_name']; ?></p>
					<p class="item-seller"><?php echo $result[0]['product_seller_shopname']; ?></p>
				</div>
				<div class="unit-price-wrapper">
					<p class="unit-price">&#8369; <?php echo number_format($result[$i]['product_price'],2); ?></p>
				</div>
				<div class="add-wrapper" data-add_to_cart="<?php echo $result[$i]['wishlist_id']; ?>" id="add_wishlist_to_cart">
					<button class="add-to-cart">Add to Cart</button>
				</div>
				<div class="close-wrapper" style="float: right;" data-wishlist_id="<?php echo $result[$i]['wishlist_id']; ?>" id="delete_wishlist">
					<p class="close">x</p>
				</div>
			</div>

<?php 	} ?>
<?php } ?>

