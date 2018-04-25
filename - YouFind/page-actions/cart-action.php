<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

		$query = 'SELECT user_cart_tbl.*, index_newsfeed_tbl.product_quantity as product_quantity_limit 
					FROM user_cart_tbl 
					JOIN index_newsfeed_tbl
					WHERE user_cart_tbl.user_id = index_newsfeed_tbl.product_id
					AND user_cart_tbl.user_id = '.$_SESSION['customer_user_id'].'
		';
		$statement = $connect->prepare($query);
		$statement->execute();
		$resultCart = $statement->fetchAll();
		$count = $statement->rowCount();

?>
	<?php for($i=0; $i<$count; $i++) {?>
		<div class="item-wrapper">
			<div class="picture-wrapper"><img src="product-photo/<?php echo @$resultCart[$i]['product_photo']; ?>" width="100%" height="100%"></div>
			<div class="info-wrapper">
				<p class="item-name"><?php echo $resultCart[$i]['product_name']; ?></p>
				<p class="item-seller"><?php echo $resultCart[$i]['product_seller_shopname']; ?></p>
				<div class="move-btn-wrapper">
				<button class="move-btn" id="add_to_wishlist" data-cart_id="<?php echo $resultCart[$i]['cart_id']; ?>" style="outline: none;">
					<img src="images/wishlist.png" width="10%" height="10%" style="float: left; margin: 2px 5px;">
					<p class="move-text" style="margin: 0;">Add to wishlist</p>
				</button>
				</div>
			</div>
			<div class="unit-price-wrapper">
				<p class="unit-price">&#8369; <?php echo number_format($resultCart[$i]['product_price'],2); ?></p>
			</div>
			<div class="quantity-wrapper" id="quantity_changes">
				<input type="number" name="qty" min="1" max="<?php echo $resultCart[$i]['product_quantity_limit']; ?>" value="<?php echo $resultCart[$i]['product_quantity']; ?>" class="qty-style" id="quantity_change">
			</div>
			<div class="close-wrapper" data-cart_id="<?php echo $resultCart[$i]['cart_id']; ?>" id="cart_delete">
				<p class="close" style="cursor: pointer;">&times;</p>
			</div>
		</div>
<?php } ?>