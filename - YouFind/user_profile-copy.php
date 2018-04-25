<?php 
	include('database_connection.php');
	print_r($_SESSION);
		$customer_register_last_id = $_SESSION['customer_register_last_id'];
		$first_name = '';
		$last_name = '';
		$add_city = '';
		$query = '
			SELECT * FROM youfind_user where user_id = :user_id
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'		=> $customer_register_last_id
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$add_city = $row['add_city'];
		}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="user_profile.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('header-logged-in.php'); ?></div>
		<div class="content-holder">
			<div class="content-left">
				<p class="about-text">About</p>
				<div class="left-upper">
					<div class="user-pic-holder-left">
						<div class="user-pic">
							<img src="images/clang.jpg" class="user-pic-image">
						</div>
					</div>
					<div class="user-details-holder-right">
						<p class="user-name"><?php echo @$first_name .' '. @$last_name; ?></p>
						<input type="button" class="edit-profile-button" name="edit_profile" id="edit_profile" value="Edit profile">
						<p class="user-address"><?php echo @$add_city; ?></p>
						<p class="ratings-text">Ratings</p>
						<img src="images/star-ratings.png" class="star-ratings-image">
					</div>
				</div>
				<p class="insight-text">Insights</p>
				<div class="insights-holder">
					<div class="reviews-wrapper">
						<p class="counting-numbers">20</p>
						<p class="text-bottom">Reviews</p>
					</div>
					<div class="items-ordered-wrapper">
						<p class="counting-numbers">50</p>
						<p class="text-bottom">Items Ordered</p>
					</div>
					<div class="service-hired-wrapper">
						<p class="counting-numbers">2</p>
						<p class="text-bottom">Service Hired</p>
					</div>
				</div>
				<p class="wishlist-text">Wishlist</p>
				<div class="wishlist-holder">
						<div class="product-image-holder"><img src="images/clang.jpg" class="product-image"></div>
						<p class="product-name">Earphone</p>
						<p class="delete-button">&times;</p>
						<p class="shop-name">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="product-star-ratings">
						<p class="product-description">This is a product which can be more than putangina.</p>
						<div class="wishlist-add-to-cart-holder">
							<input type="button" name="add_to_cart" class="wishlist-add-to-cart" value="Add to Cart">
						</div>
				</div>
			</div>
			<div class="content-right">
				<p class="activities-text">Activities</p>
				<div class="reviewed-division">
					<a class="activities-user-name">John Michael Olangco</a><p class="reviewed-text">reviewed an item</p>
					<p class="activities-date">01/09/2018</p>
					<div class="product-information">
						<img src="images/clang.jpg" class="activities-product-image">
						<p class="activities-product-name">Motherboard</p>
						<p class="activities-shopname">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="activities-star-ratings">
						<p class="activities-title-review">Title of the review</p>
						<p class="activities-product-description">This is the description of the product where the product has a description and a description has a product thats relies on the description of the product.</p>
					</div>
				</div>
				<div class="reviewed-division">
					<a class="activities-user-name">John Michael Olangco</a><p class="reviewed-text">reviewed an item</p>
					<p class="activities-date">01/09/2018</p>
					<div class="product-information">
						<img src="images/clang.jpg" class="activities-product-image">
						<p class="activities-product-name">Motherboard</p>
						<p class="activities-shopname">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="activities-star-ratings">
						<p class="activities-title-review">Title of the review</p>
						<p class="activities-product-description">This is the description of the product where the product has a description and a description has a product thats relies on the description of the product.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-holder" style="border: 1px solid red; margin: 2px 0 0 0;"><?php include('footer.php'); ?></div>
	</div>

</body>
</html>