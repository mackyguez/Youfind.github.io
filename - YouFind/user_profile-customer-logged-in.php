<?php 
	include('database_connection.php');
	//print_r($_SESSION);
	if(!isset($_SESSION['customer_user_id'])) {
		header('location:login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>YouFind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="user_profile-customer-logged-in_styles.css">
</head>
<body>
	<div class="whole-wrapper">
		<div class="header-holder" id="header_holder"><?php include('new-header.php'); ?></div>
		<div class="content-holder">
			<div class="content-left">
				<p class="about-text">About</p>
					<div class="left-upper" id="left_upper"></div>
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
		<div class="footer-holder" style="margin: 2px 0 0 0;"><?php include('footer1.php'); ?>
		</div>
	</div>
</body>
</html>


<?php include('page-actions/customer-edit-profile-modal.php'); ?>

<script type="text/javascript">
		$(document).ready(function() {
			load_left_upper();
			load_cart_counter();
			load_cart_total();

			function load_left_upper() {
				var action = 'load_left_upper';
				$.ajax({
					url:'user_profile-customer-logged-in-action-update.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#left_upper').html(data);
					}
				})
			}
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
			$(document).on('click', '#header_my_prof_link', function() {
				window.location = 'user_profile-customer-logged-in.php';
			});
			$(document).on('click', '#header_settings_link', function() {
				alert('wala pang function!');
			});
			$(document).on('click', '#header_logout_link', function() {
				window.location.href = 'logout.php';
			});
			$(document).on('click', '#header_sell_link', function() {
				window.location.href = 'register-seller.php';
			});
			$(document).on('click', '#edit_profile_button', function() {
				$('#editProfileModal').modal('show');
				$('body').removeAttr('style');
			});

			$(document).on('click', '#update', function() {
				var action = 'update';
				var first_name = $('#first_name').val();
				var last_name = $('#last_name').val();
				var account_name = $('#account_name').val();
				var account_number = $('#account_number').val();
				$.ajax({
					url:'user_profile-customer-logged-in-action-update.php',
					method:'POST',
					data:{
						first_name:first_name,
						last_name:last_name,
						account_number:account_number,
						account_name:account_name,
						action:action
					},
					success:function(data) {
						if(data == 'Done') {
							load_left_upper();
							window.location = 'user_profile-customer-logged-in.php';
						}
					}
				})
			});


			$(document).on('change', '#upload_profile_picture', function() {
				var upload_profile_picture = document.getElementById('upload_profile_picture').files[0].name;
				var ext = upload_profile_picture.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('upload_profile_picture').files[0]);
				var f = document.getElementById('upload_profile_picture').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 10000000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('upload_profile_picture', document.getElementById('upload_profile_picture').files[0]);
					$.ajax({
						url:'user_profile-customer-logged-in-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#user_pic').fadeIn(5000).html(data);
							$('#form_wall')[0].reset();
						}
					})
				}
			});

			$(document).on('click', '#header_shop_cart_holder', function() {
				window.location.href = 'cart.php';
			});
				
			$(document).on('click', '#header_logo', function() {
				window.location = 'new-index.php';
			});
		});
</script>