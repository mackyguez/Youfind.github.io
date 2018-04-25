<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$last_product_id = @$_SESSION['last_product_id'];
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$last_product_id.'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$review = $statement->fetchAll();
	//print_r($_SESSION);

	if(!isset($last_product_id)) {
		header('location:new-index.php');
	}
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
		<div class="index-header-holder"><?php include('new-header.php'); ?></div>

		<div class="directory"><a href="#" class="dr-text" id="direct_index">Home</a> / <a href="#" class="dr-text" style="color: black; cursor: default;"><?php echo @$review[0]['product_category']; ?></a> / <?php echo @$review[0]['product_name']; ?></div>

		<div class="index-middle-wrapper">
			<div class="index-category-left">
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
			<div class="index-product-display-right">
				<div class="product-info-holder">
					
				<div class="index-product-name-holder">
					<div class="product-name"><?php echo @$review[0]['product_name']; ?></div>
		
				</div class="image-desc">
				<div class="img-left" style="display: none;">
					<img class="img-1" src="product-photo/<?php echo @$review[0]['product_photo']; ?>" width="20px" height="20px">
					<img class="img-2" src="product-photo/<?php echo @$review[0]['product_photo']; ?>" width="20px" height="20px">
					<img class="img-3" src="product-photo/<?php echo @$review[0]['product_photo']; ?>" width="20px" height="20px">
				</div>
				<div class="product-photo-holder">
					<img src="product-photo/<?php echo @$review[0]['product_photo']; ?>" class="product-photo-large">
				</div>
				<div class="product-overview-holder">
					<p class="product-overview-title">Product Overview</p>
					<p class="product-overview-text"><?php echo @$review[0]['product_overview']; ?></p>
					<p class="product-price">&#8369; <?php echo number_format(@$review[0]['product_price'], 2); ?></p>
					<p class="original-price" style="display: none;">&#8369; 599.00</p>
					<p class="discount" style="display: none;">15%</p>

					<div class="rating-overview" style="display: none;">
						<div class="star-ratings"><img src="images/5-star.png" width="100%" height="100%"></div>
						<p class="star-counter">(10)</p><br>
						<p class="review-overview">Reviews (20)</p>
					</div>

				</div>
				<div class="seller-action-holder">
					<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$review[0]['product_id']; ?>" style="display: none;">Edit Product</button>
					<button class="edit-product-button" id="add_product_button" data-edit_product="<?php echo @$review[0]['product_id']; ?>">Add New Product</button>	
					<button class="edit-product-button" id="delete_product_button" data-delete_product="<?php echo @$review[0]['product_id']; ?>">Delete Product</button>		
				</div>
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

			<div class="star-rating-holder">
				
			</div>

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

		$('#add_product_button').click(function() {
			window.location = 'post-product.php';
		});



		$(document).on('click', '#delete_product_button', function() {
			var action = 'delete_product';
			var product_id = $(this).data('delete_product');
			$.ajax({
				url:'page-actions/post-product-review-action.php',
				method:'POST',
				data:{
					action:action,
					product_id:product_id
				},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'inventory-seller.php';
					}
				}
			})
			
		});
		
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'Seller/user_profile-seller-logged-in.php';
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = 'logout.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			alert('wala pang function');
		});

		$(document).on('click', '#header_logo', function() {
			window.location = 'new-index.php';
		});
	});
</script>
