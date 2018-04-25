<?php 
	session_start();

	if(!isset($_SESSION['customer_user_id'])) {
		header('location:login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cart-styles.css">

	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>

	<div class="whole-wrapper">

		<div class="header-wrapper"><?php include('new-header.php'); ?></div>

		<div class="content-wrapper">
			
			<div class="directory-wrapper"><p class="continue"><a href="new-index.php" style="color: #737373;">< Continue Shopping</a></p></div>

			
			<div class="progress-bar-wrapper" style="width: 14%; margin: 30px 0 0 70px; float: left;">
				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid #125965; width: 30px; height: 30px; overflow: hidden; background-color: #93deec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; font-weight: bold;">1</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #125965; font-weight: bold;">Shopping Cart</p></div>
				</div>
				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">2</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Address</p></div>
				</div>
				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">3</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Payment</p></div>
				</div>
				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">4</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Complete</p></div>
				</div>
			</div>

			<div class="shop-cart-wrapper">
				
				<div class="shop-wrapper"><p class="shop-title">My Shopping Cart</p></div>

				<div class="total-num-wrapper"><p class="total-num-title" id="cart_total_items"></p></div>
			
				<div class="list-item-wrapper">
					<div class="header-tbl">
						<p class="item-price">Item Price</p>
						<p class="quantity">Quantity</p>
					</div>
					<div class="item-display" id="item_display"></div>

					<p class="nothing-follows">*nothing follows*</p>
			</div>
			<div class="summary-wrapper">
				<p class="order-summary">Order Summary</p>

				<div class="subtotal-wrapper">	
				<p class="subtotal-title">Subtotal</p>
				<p class="subtotal-num" id="subtotal_num">&#8369; 0.00</p>
				</div>

				<div class="shipping-wrapper">
				<p class="shipping-title">Shipping fee</p>
				<p class="shipping-num">&#8369; 0.00</p>
				</div>

				<div class="total-wrapper">
					<p class="total-title">Total (VAT incl):</p>
					<p class="total-num" id="total_with_vat"><p class="total-num">&#8369;</p></p>
				</div>

				<div class="proceed-wrapper"><button class="proceed-btn" onclick="location.href='order-add.php';">Proceed to checkout</button></div>
			</div>
		</div>
		</div>
		
		<div class="footer-wrapper"><?php include('footer1.php');?></div>
	
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {

		load_cart_counter();
		function load_cart_counter() {
			var action = 'load_cart_counter';
			$.ajax({
				url:'page-actions/add-to-cart-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#cart_counter').html(data);
					$('#cart_total_items').html(data+' item/s');
					load_cart_total();
					load_cart_items();
					load_total_with_vat();
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
		load_cart_items();
		function load_cart_items() {
			var action = 'load_cart_items';
			$.ajax({
				url:'page-actions/cart-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#item_display').html(data);
				}
			})
		}
		function load_total_with_vat() {
			var action = 'load_total_with_vat';
			$.ajax({
				url:'page-actions/cart-delete-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#total_with_vat').html(data);
					$('#subtotal_num').html(data);
				}
			})
		}
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'customer-profile.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			window.location = 'settings.php';
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
		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location.href = 'cart.php';
		});
		$(document).on('click', '#header_logo', function() {
			window.location.href = 'new-index.php';
		});

		$(document).on('click', '#cart_delete', function() {
			var action = 'cart_delete';
			var cart_id = $(this).data('cart_id');
			if(confirm('Are you sure you want to delete this on cart?')) {
				$.ajax({
					url:'page-actions/cart-delete-action.php',
					method:'POST',
					data:{
						action:action,
						cart_id:cart_id
					},
					success:function(data) {
						if(data == 'Done') {
							load_cart_counter();
						}
					}
				})
			}
		});

		$(document).on('click', '.header-wishlist', function() {
			window.location = 'wishlist.php';
		});


		$(document).on('change', '#quantity_change', function() {
			alert();
		});

		$(document).on('click', '#add_to_wishlist', function() {
			var action = 'add_to_wishlist';
			var cart_product_id = $(this).data('cart_id');
			$.ajax({
				url:'page-actions/cart-display-wishlist-action.php',
				method:'POST',
				data:{
					action:action,
					cart_product_id:cart_product_id
				},
				success:function(data) {
					if(data == 'Done') {
						load_cart_counter();
					}
				}
			})

		});
	});
</script>