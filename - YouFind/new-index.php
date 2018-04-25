<?php 
	session_start();
	//print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="new-index-styles.css">

</head>
<body>
	<div class="index-whole-wrapper">
		<div class="index-header-holder"><?php include('new-header.php'); ?></div>
		<div class="carousel"><img src="images/Welcome1.png" width="100%" height="100%" draggable="false"></div>

		<div class="index-middle-wrapper">
			<div class="index-category-left">
					<div class="product-wrapper">Products</div>
					<div class="category-container" id="gadget_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" sclass="category-link">Gadgets</a></div>
					<div class="category-container" id="laptop_category"><a class="category-link" style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;">Laptops & Computers</a></div>
					<div class="category-container" id="camera_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Camera, Photos & Videos</a></div>
					<div class="category-container" id="headphones_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Headphones & Speakers</a></div>
					<div class="category-container" id="compparts_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Computer Parts</a></div>
					<div class="category-container" id="storage_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Storage Devices</a></div>
					<div class="category-container" id="acc_category"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Accessories</a></div>
					<div class="category-container"><a style="cursor: pointer; text-decoration: none; font-size: 12px; color: black;" class="category-link">Drones</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Home Entertainment</a></div>
					<div class="services-wrapper" style="display: none;">Services</div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Cellphone Repairs</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Update & Upgrade</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Installation</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Computer Repairs</a></div>
					<div class="category-container"><a href="#" class="category-link">Brand New</a></div>
					<div class="category-container"><a href="#" class="category-link">Secondhand</a></div>

			</div>
			<div class="index-product-display-right">
				<div class="index-product-dislay-title-show-all-button">
					<div class="index-new-product-text">New Products</div>
					<button type="button" id="show_all_prods" class="show-all-prods">Show all products</button>
				</div>
				<div class="product-display" id="product_display"></div>
			</div>
		</div>

		<div class="index-footer-wrapper"><?php include('footer1.php'); ?></div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {

		load_products_limit();
		function load_products_limit() {
			var action = 'load_products_limit';
			$.ajax({
				url:'page-actions/index-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
					load_cart_counter();
					load_cart_total();
				}
			})
		}
		function load_all_products() {
			var action = 'load_all_products';
			$.ajax({
				url:'page-actions/index-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
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
						load_cart_counter();
						load_cart_total();
					}
				}
			})
		});
		$(document).on('click', '#product_id', function() {
			var product_id = $(this).data('image_product_id');
			var action = 'session_product_id';
			$.ajax({
				url:'page-actions/identify-user-action.php',
				method:'POST',
				data:{
					action:action,
					product_id:product_id
				},
				success:function(data) {
					if(data == 'DoneSeller') {
						window.location = 'product-seller-view.php';
					}
					else if(data == 'DoneCustomer') {
						window.location = 'product-customer-view.php';
					}
				}
			})
		});
		
		$(document).on('click', '#show_all_prods', function() {
			var action = 'show_all_prods';
			$.ajax({
				url:'page-actions/index-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					load_all_products();
					$('#show_all_prods').html('Show Less');
					$('#show_all_prods').attr('id', 'show_less_prods');
				}
			})
		});
		$(document).on('click', '#show_less_prods', function() {
			load_products_limit();
			$('#show_less_prods').html('Show all products');
			$('#show_less_prods').attr('id', 'show_all_prods');
		});

	
		$(document).on('click', '#header_logout_link', function() {
			window.location.href = 'logout.php';
		});
		$(document).on('click', '#header_sell_link', function() {
			window.location.href = 'register-seller.php';
		});
		$(document).on('click', '#header_login', function() {
			window.location.href = 'login.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
			var action = 'identify_user';
			$.ajax({
				url:'page-actions/identify-user-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'DoneSeller') {
						window.location = 'seller-profile.php';
					}
					else if(data == 'DoneCustomer') {
						window.location = 'customer-profile.php';
					}
				}
			})
		});

		$(document).on('click', '#header_create_account', function() {
			window.location.href = 'create_account.php';
		});
		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location.href = 'cart.php';
		});
		$(document).on('click', '#header_logo', function() {
			window.location.href = 'new-index.php';
		});

		$(document).on('click', '#gadget_category', function() {
			var action = 'gadget_category';
			$.ajax({
				url:'page-actions/index-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#laptop_category', function() {
			var action = 'laptop_category';
			$.ajax({
				url:'page-actions/index-laptop-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#camera_category', function() {
			var action = 'camera_category';
			$.ajax({
				url:'page-actions/index-camera-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#headphones_category', function() {
			var action = 'headphones_category';
			$.ajax({
				url:'page-actions/index-headphones-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#storage_category', function() {
			var action = 'storage_category';
			$.ajax({
				url:'page-actions/index-storage-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#compparts_category', function() {
			var action = 'compparts_category';
			$.ajax({
				url:'page-actions/index-compparts-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$(document).on('click', '#acc_category', function() {
			var action = 'acc_category';
			$.ajax({
				url:'page-actions/index-acc-category-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#product_display').html(data);
				}
			})
		});

		$('#header_search').keyup(function(e) {
			var action = 'search';
			var query = $(this).val();
			if(e.keyCode == 13) {
				var action = 'search_product';
				var searched = $('#header_search').val();
				$.ajax({
					url:'page-actions/index-searched-action.php',
					method:'POST',
					data:{
						action:action,
						searched:searched
					},
					success:function(data) {
						$('#search_success').fadeOut(0);
						$('#product_display').html(data);
					}
				})
			}
			if(query != '') {
				$.ajax({
					url:'page-actions/index-search-action.php',
					method:'POST',
					data:{
						action:action,
						query:query
					},
					success:function(data) {
						$('#search_success').fadeIn(0);
						$('#search_success').html(data);
					}
				})
			}
			else if(query == '') {
				$('#search_success').fadeOut(200);
				load_all_products();
			}

			
		});

		$(document).on('click', 'li', function() {
			if($(this).text() == 'Product not found') {
				$('#search_success').fadeOut(200);
			}
			else {
				var search = $('#header_search').val($(this).text());
				var searched = $('#header_search').val();
				$('#search_success').fadeOut(200);
				var action = 'search_product';
				var searched = $('#header_search').val();
				$.ajax({
					url:'page-actions/index-searched-action.php',
					method:'POST',
					data:{
						action:action,
						searched:searched
					},
					success:function(data) {
						$('#search_success').fadeOut(0);
						$('#product_display').html(data);
					}
				})

			}
		});

		$(document).on('click', '.header-wishlist', function() {
			window.location = 'wishlist.php';
		});

		$(document).on('click', '.header-youwallet', function() {
				window.location = 'wallet.php';
		});

		$(document).on('click', '.header-settings-link', function() {
				window.location = 'wallet.php';
		});
	});
</script>