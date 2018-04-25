<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM index_newsfeed_tbl ORDER BY product_id';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	foreach($result as $row) {
?>
	<div class="item-1">	
		<div class="item-img-wrapper"><img src="../product-photo/<?php echo @$row['product_photo']; ?>" width="100%" height="100%" data-item_product_id="<?php echo @$row['product_id']; ?>" id="item_photo"></div>
		<div class="item-info-wrapper">
			<p class="item-name"><a href="#" style="color: black;"><?php echo @$row['product_name']; ?></a></p>
			<div class="item-owner"><p style="float: left; padding-right: 10px;">By:</p> <p class="shop-name"><a href="#" style="color: #125965;"><?php echo @$row['shopname']; ?></a></p><img src="images/verified.png" width="10px" height="10px"></div>
			<p class="item-price">&#8369; <?php $product_price = preg_replace('/[^0-9.]+/', '', $row['product_price']); echo number_format($product_price,2); ?></p>
		</div>
		<div class="item-action">
			<img src="images/star-ratings.png" width="75px" height="10px">
			<p class="review-total">0 reviews</p>
			<div class="button-wrapper" data-add_to_cart_id="<?php echo @$row['product_id']; ?>" id="add_to_cart">	
					<button class="add-cart-btn" title="Add to Cart" style="cursor: pointer;">
						<img src="images/add-to-cart2.png" width="25px" height="25px">
						<p class="add-cart">Add to Cart</p>
					</button>
			</div>
				<button class="wishlist-btn" title="Wishlist"><img src="images/wishlist.png" width="68%" height="70%" id="add_to_wishlist" data-add_to_wishlist_id="<?php echo @$row['product_id']; ?>"></button>
		</div>
</div>
	
<?php
	}
?>

