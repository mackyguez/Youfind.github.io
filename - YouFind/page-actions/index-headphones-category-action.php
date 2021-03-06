<?php 
		session_start();
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_category = "Gagdets" ORDER BY product_id ASC LIMIT 4';
		$statement = $connect->prepare($query);
		$statement->execute();
		$resultIndexProduct = $statement->fetchAll();
		$resultCount = $statement->rowCount();

		$cartFetch = 'SELECT * FROM index_newsfeed_tbl WHERE product_category = "Headphones & Speakers"';
		$cartStatament = $connect->prepare($cartFetch);
		$cartStatament->execute();
		$cartFetchResult = $cartStatament->fetchAll();
		$cartCount = $cartStatament->rowCount();
 
		if(@$_POST['action'] == 'headphones_category') { ?>
			<?php  	for($i=0; $i<$cartCount; $i++) { ?>
						<div class="product-fetch" id="product_fetch">
							<div class="prod-image-holder" id="product_id" data-image_product_id="<?php echo @$cartFetchResult[$i]['product_id']; ?>" style="cursor: pointer;">
								<img src="product-photo/<?php echo $cartFetchResult[$i]['product_photo']; ?>" width="100%" height="100%">
							</div>
							<div class="prod-name"><strong><?php echo @$cartFetchResult[$i]['product_name']; ?></strong></div>
							<div class="prod-seller">By: <a class="seller-name"><?php echo @$cartFetchResult[$i]['shopname']; ?></a></div>
							<img src="images/verified.png" class="verified-img">
							<p class="prod-price">&#8369; <?php echo @number_format($cartFetchResult[$i]['product_price'],2); ?></p>
							<img src="images/star-ratings.png" class="star-ratings" style="display: none;">
							<div class="review-counter" style="display: none;">0 reviews</div>

								<div class="add-to-cart-holder" id="add_to_cart"
									data-product_id="<?php echo @$cartFetchResult[$i]['product_id']; ?>" 
									data-product_name="<?php echo @$cartFetchResult[$i]['product_name']; ?>"
									data-product_price="<?php echo @$cartFetchResult[$i]['product_price']; ?>"
									data-product_seller_id="<?php echo @$cartFetchResult[$i]['user_id']; ?>"
									data-product_seller_shopname="<?php echo @$cartFetchResult[$i]['shopname']; ?>"
									data-product_photo="<?php echo @$cartFetchResult[$i]['product_photo']; ?>"
									data-product_quantity="1">
										<img src="images/add-to-cart2.png" width="25px" height="25px" class="atc-img"><p class="atc-text">Add to Cart</p>
								</div>
								<button class="wishlist-button" id="add_wishlist" style="cursor: pointer; display: none;">
									<img src="images/wishlist.png" width="100%" height="100%">
								</button>

						</div>
			<?php  	} ?>
<?php 	} 

?>
	