<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$_SESSION['product_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="product-new-styles.css">
</head>
<body>
	<div class="index-whole-wrapper">
		<div class="index-header-holder"><?php include('new-header-online.php'); ?></div>

		<div class="directory"><a href="#" class="dr-text" id="direct_index">Home</a> / <a href="#" class="dr-text">Laptops & Computers</a> / <a href="#" class="dr-text">Laptop</a> / <?php echo @$result[0]['product_name']; ?></div>

		<div class="index-middle-wrapper">
			<div class="index-category-left">
					<div class="product-wrapper">Products</div>
					<div class="category-container"><a href="#" class="category-link">Gadgets</a></div>
					<div class="category-container"><a href="#" class="category-link">Laptops & Computers</a></div>
					<div class="category-container"><a href="#" class="category-link">Camera, Photos & Videos</a></div>
					<div class="category-container"><a href="#" class="category-link">Headphones & Speakers</a></div>
					<div class="category-container"><a href="#" class="category-link">Computer Parts</a></div>
					<div class="category-container"><a href="#" class="category-link">Storage Devices</a></div>
					<div class="category-container"><a href="#" class="category-link">Accessories</a></div>
					<div class="category-container"><a href="#" class="category-link">Drones</a></div>
					<div class="category-container"><a href="#" class="category-link">Home Entertainment</a></div>
					<div class="services-wrapper">Services</div>
					<div class="category-container"><a href="#" class="category-link">Cellphone Repairs</a></div>
					<div class="category-container"><a href="#" class="category-link">Update & Upgrade</a></div>
					<div class="category-container"><a href="#" class="category-link">Installation</a></div>
					<div class="category-container"><a href="#" class="category-link">Computer Repairs</a></div>
			</div>
			<div class="index-product-display-right">
				<div class="product-info-holder">
					
				<div class="index-product-name-holder">
					<div class="product-name"><?php echo $result[0]['product_name']; ?></div>
		
				</div class="image-desc">
				<div class="img-left">
					<img class="img-1" src="product-photo/<?php echo @$result[0]['product_photo']; ?>" width="20px" height="20px">
					<img class="img-2" src="product-photo/<?php echo @$result[0]['product_photo']; ?>" width="20px" height="20px">
					<img class="img-3" src="product-photo/<?php echo @$result[0]['product_photo']; ?>" width="20px" height="20px">
				</div>
				<div class="product-photo-holder">
					<img src="product-photo/<?php echo @$result[0]['product_photo']; ?>" class="product-photo-large">
				</div>
				<div class="product-overview-holder">
					<p class="product-overview-title">Product Overview</p>
					<p class="product-overview-text"><?php echo @$result[0]['product_overview']; ?></p>
					<p class="product-price">&#8369; <?php echo number_format(@$result[0]['product_price'], 2); ?></p>
					<p class="original-price">&#8369; 599.00</p>
					<p class="discount">15%</p>

					<div class="rating-overview">
						<div class="star-ratings"><img src="images/5-star.png" width="100%" height="100%"></div>
						<p class="star-counter">(10)</p><br>
						<p class="review-overview">Reviews (20)</p>
					</div>

				</div>
				<?php 
						if(!isset($_SESSION['customer_user_id'])) { ?>
						<div class="seller-action-holder">
							<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$result[0]['product_id']; ?>">Edit Product</button>
							<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$result[0]['product_id']; ?>" onclick="location.href='post-product.php'">Add New Product</button>	
							<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$result[0]['product_id']; ?>">Delete Product</button>		
						</div>

				<?php	}
				 ?>
			</div>

			<div class="product-description-holder">
				<p class="product-description">Product Description</p>
				<div class="full-description">
					<p class="whats-in-box">Included in the box</p>
					<div class="item-in-box">
						<p class="qty-item">1 x</p><p class="what-item">User Manual</p>
					</div>
					<div class="item-in-box">
						<p class="qty-item">1 x</p><p class="what-item">User Manual</p>
					</div>
					<div class="item-in-box">
						<p class="qty-item">1 x</p><p class="what-item">User Manual</p>
					</div>
					<div class="item-in-box">
						<p class="qty-item">1 x</p><p class="what-item">User Manual</p>
					</div>
					<br>

					<p class="specifications">Specifications</p>
					<div class="all-specs">
						<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
					</div>
					<div class="all-specs">
						<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
					</div>
					<div class="all-specs">
						<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
					</div>
					<div class="all-specs">
						<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
					</div>
					<div class="all-specs">
						<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
					</div>
				</div>
			</div>

			<div class="star-rating-holder"></div>
			</div>
		</div>
		<div class="index-footer-wrapper"><?php include('footer1.php'); ?></div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('click', '#direct_index', function() {
			var action = 'direct_index';
			$.ajax({
				url:'page-actions/post-product-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'new-index.php';
					}
				}
			})
			
		});
		load_cart_counter();
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
		
	});
</script>
