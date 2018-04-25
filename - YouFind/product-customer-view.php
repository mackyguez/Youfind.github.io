<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.@$_SESSION['product_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result1 = $statement->fetchAll();

	$sellerFetch = 'SELECT * FROM youfind_user WHERE user_id = '.@$result1[0]['user_id'].'';
	$sellerFetchStatement = $connect->prepare($sellerFetch);
	$sellerFetchStatement->execute();
	$result2 = $sellerFetchStatement->fetchAll();

	$address = 'SELECT * FROM youfind_user WHERE user_id = '.@$_SESSION['customer_user_id'].'';
	$addressstatement = $connect->prepare($address);
	$addressstatement->execute();
	$result3 = $addressstatement->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="product-style.css">
	<link rel="stylesheet" type="text/css" href="product-styles2.css">
	<link rel="stylesheet" type="text/css" href="index-styles4.css">
</head>
<body>

<!--SELLER'S VIEW-->

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('new-header.php'); ?></div>

		<div class="content-holder">

			<div class="directory">
				<a class="direct-a" href="new-index.php">Home</a> / <a class="direct-a" href="#" style="text-decoration: none; color: black; cursor: default;"><?php echo @$result1[0]['product_category']; ?></a> / <?php echo $result1[0]['product_name']; ?>
			</div>

			<div class="category-wrapper" style="margin: 30px 0;">
				<div class="product-wrapper">Products</div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Gadgets</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Laptops & Computers</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Camera, Photos & Videos</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Headphones & Speakers</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Computer Parts</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Storage Devices</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Accessories</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Drones</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Home Entertainment</a></div>
					<div class="services-wrapper" style="display: none;">Services</div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Cellphone Repairs</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Update & Upgrade</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Installation</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Computer Repairs</a></div>
			</div>


			<div class="left-wrapper">
				
			<div class="prod-wrapper">
				
			<div class="top-info">
				<div class="title-edit">
				<p class="prod-title"><?php echo @$result1[0]['product_name']; ?></p>
				</div>
			</div>

			<div class="bottom-info">

					<div class="item-photos">
							
						<div class="item-list" style="display: none;">
							<ul>
								<li class="photo-list"><img src="product-photo/<?php echo @$result1[0]['product_photo']; ?>" width="50px" height="50px">
								<li class="photo-list"><img src="product-photo/<?php echo @$result1[0]['product_photo']; ?>" width="50px" height="50px">
								<li class="photo-list"><img src="product-photo/<?php echo @$result1[0]['product_photo']; ?>" width="50px" height="50px">
							</ul>
						</div>
						<div class="item-preview"><img src="product-photo/<?php echo @$result1[0]['product_photo']; ?>" width="100%" height="100%"></div>
					</div>

					<div class="item-info">
						<div class="item-overview">

							<p class="overview-title">Product Overview</p>
							<p class="overview" style="text-indent: 20px; text-align: justify; width: 90%;"><?php echo @$result1[0]['product_overview']; ?></p>

						</div>

						<div class="price-wrapper">
							<p class="price">P <?php echo number_format($result1[0]['product_price'], 2); ?></p>
						</div>

						<div class="title-rate" style="display: none;">
							<div class="ratings"><img src="images/star-ratings.png" width="85px" height="15px" class="img-rate"><p class="rate-counter">(10)</p></div>
							<div class="reviews">
								<p class="all-review">Reviews (20)</p><p class="write-review"><a href="#review" style="color: blue;">Write a Review</a></p>
							</div>
						</div>

						<div class="button-wrapper" style="width: 200px;" id="add_to_cart" 
							data-product_id="<?php echo @$result1[0]['product_id']; ?>"
							data-product_name="<?php echo @$result1[0]['product_name']; ?>"
							data-product_price="<?php echo @$result1[0]['product_price']; ?>"
							data-product_seller_id="<?php echo @$result1[0]['user_id']; ?>"
							data-product_seller_shopname="<?php echo @$result1[0]['shopname']; ?>"
							data-product_photo="<?php echo @$result1[0]['product_photo']; ?>"
							data-product_quantity="1"
							>	
							<button class="add-cart-btn" style="width: 154px; height: 37px; outline: none;">
								<img src="images/add-to-cart2.png" width="35px" height="35px" style="border-radius: 3px;">
								<p class="add-cart" style="font-size: 15px; padding: 6px 15px;">Add to Cart</p>
							</button>
							<button class="wishlist-btn" title="Wishlist"  style="width: 37px; height: 37px; float: right; display: none;"><img src="images/wishlist.png" width="68%" height="70%"></button>
							</div>
					</div>

					<div class="customer-action">
						<div class="delivery-wrapper">
							<p class="delivery-title">Delivery options</p>
							<button class="change-add" style="display: none;">CHANGE</button><br><br>
							<p class="delivery-ship">Ships to</p>
							<p class="delivery-add">
								<?php
								 echo @$result3[0]['add_street'] .' '. @$result3[0]['add_brgy'] .' '.
								 @$result3[0]['add_city'];
								 ?>	 	
							 </p>
						</div>
						<div class="item-privilege">
							<div class="this-icon"><img src="images/cash-on-delivery.png" width="100%" height="100%"></div>
							<p class="this-desc">Accepts Cash on Delivery</p><br>

							<div class="this-icon"><img src="images/return.png" width="100%" height="100%"></div>
							<p class="this-desc">7 days easy return</p>

						</div>
					</div>

					<div class="prod-owner">
						Sold by<br>
						<a style="font-size: 18px; color: #125965; font-weight: bold; text-decoration: none; cursor: default;">
							<?php echo @$result1[0]['shopname']; ?>
						</a>
					</div>
				</div>
			</div>
		

			<div class="product-description-holder" style="display: none;">
				<p class="product-description">Product Description</p>
				<div class="full-description">
					<p class="whats-in-box">Included in the box</p>
					<div class="item-in-box">
						<p class="qty-item"><?php echo $result1[0]['inc_prod_quantity1'].' x'; ?></p><p class="what-item"><?php echo $result1[0]['inc_prod_name1'].' '; ?></p>
					</div>
					<div class="item-in-box">
						<p class="qty-item"><?php echo $result1[0]['inc_prod_quantity2'].' '; ?> x</p><p class="what-item"><?php echo $result1[0]['inc_prod_name2'].' '; ?></p>
					</div>
					<div class="item-in-box">
						<p class="qty-item"><?php echo $result1[0]['inc_prod_quantity2'].' '; ?> x</p><p class="what-item"><?php echo $result1[0]['inc_prod_name2'].' '; ?></p>
					</div>
					<div class="item-in-box">
						<p class="qty-item"><?php echo $result1[0]['inc_prod_quantity2'].' '; ?> x</p><p class="what-item"><?php echo $result1[0]['inc_prod_name2'].' '; ?></p>
					</div>
					<br>

					<p class="specifications">Specifications</p>
					<div class="all-specs">
						<p class="specs-title"><?php echo $result1[0]['spec_title1'] ?></p><p class="what-specs"><?php echo $result1[0]['desc_spec1']; ?></p>
					</div>
					<div class="all-specs">
						<p class="specs-title"><?php echo $result1[0]['spec_title2'] ?></p><p class="what-specs"><?php echo $result1[0]['desc_spec2']; ?></p>
					</div>
					<div class="all-specs">
						<p class="specs-title"><?php echo $result1[0]['spec_title3'] ?></p><p class="what-specs"><?php echo $result1[0]['desc_spec3']; ?></p>
					</div>
					<div class="all-specs">
						<p class="specs-title"><?php echo $result1[0]['spec_title4'] ?></p><p class="what-specs"><?php echo $result1[0]['desc_spec4']; ?></p>
					</div>
				</div>
			</div>

			<div class="rate-wrapper" style="display: none;">
				<p class="desc-title">Product Ratings</p>

				<div class="rate-container">
					
				<p class="rate-title">Average Product Rating</p>
				<div class="rate-this"><img src="images/star-ratings.png" width="200px" height="28px"></div>
				<div class="summary"><p class="review-count">20 Reviews</p><p class="rate-count">10 Rates</p></div>

				</div>

				<div class="star-counter">

				<p class="rate-title">Product Rating Summary</p>

				<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">5 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
				<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">4 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
				<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">3 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
				<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">2 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
				<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">1 Star</p><div style="float: left; width: 60px; padding: 8px 13px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 30px">10</p></div>
					
				</div>
			</div>


			<div class="review-wrapper" id="review" style="display: none;">
				<p class="desc-title" style="display: none;">Product Reviews</p>
				<div class="write-here">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<textarea class="write-your-review"></textarea>
					<button class="post-btn">Post</button>
				</div>
				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>

				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>

				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>
			</div>



</div>
</div>
</div>

				<div class="footer-wrapper" style="margin-top: 70px;">
				<?php include('footer1.php'); ?>
			</div>
</body>
</html>



<script type="text/javascript">
	$(document).ready(function() {

		load_cart_counter();
		load_cart_total();
		function load_cart_counter() {
				var action = 'load_cart_counter';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_counter').html(data);
					}
				})
			}
			function load_cart_total() {
				var action = 'load_cart_total';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_total').html(data);
					}
				})
			}
		
		$(document).on('click', '#add_to_cart', function() {
			var action = 'add_to_cart';
			var product_id = $(this).data('product_id');
			var product_name = $(this).data('product_name');
			var product_price = $(this).data('product_price');
			var product_quantity = $(this).data('product_quantity');
			var product_seller_id = $(this).data('product_seller_id');
			var product_seller_shopname = $(this).data('product_seller_shopname');
			var product_photo = $(this).data('product_photo');
			$.ajax({
				url:'page-actions/add-to-cart-action.php',
				method:'POST',
				data:{
					action:action,
					product_id:product_id,
					product_name:product_name,
					product_price:product_price,
					product_seller_id:product_seller_id,
					product_seller_shopname:product_seller_shopname,
					product_quantity:product_quantity,
					product_photo:product_photo
				},
				success:function(data) {
					if(data == 'Done') {
						alert('Product Added to Cart');
						load_cart_counter();
						load_cart_total();
					}
					else {
						alert(data);
					}
				}
			})
		});

		$(document).on('click', '#header_logo', function() {
			window.location = 'new-index.php';
		});
		$(document).on('click', '#header_login', function() {
			window.location = 'login.php';
		});
		$(document).on('click', '#header_sell_link', function() {
			window.location = 'register-seller.php';
		});
		$(document).on('click', '#header_create_account', function() {
			window.location = 'create_account.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'user_profile-customer-logged-in.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'user_profile-customer-logged-in.php';
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = 'logout.php';
		});
		$(document).on('click', '#header_shop_cart_holder', function() {
				window.location.href = 'cart.php';
			});
	});
</script>