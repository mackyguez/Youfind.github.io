<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="register-seller-styles.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="top-nav">
			<?php include('new-header.php'); ?>
		</div>
		<div class="middle-wrapper">
			<div class="register-text">
				<h4 style="margin: 0;">Sell on Youfind?</h4>
				<br>
				 * Required Fields
			</div>

			<div class="progress-wrapper">
				<p class="personal-title">Personal Information</p>
				<p class="follows1">></p>
				<p class="account-title"></p>
				<p class="follows2"></p>
				<p class="review-title"></p>
			</div>

			<div class="register-input-left" id="change_ui">
				<div class="error-message" id="error_message">
					<div id="error_message1"></div>
					<div id="error_message2"></div>
				</div>
				
				<div class="first-name-holder-inner">
					<div class="first-name-text-holder">First Name</div>
					<div class="first-name-input-holder"><input type="text" name="first_name" id="first_name" class="form-control first-name" placeholder="First name" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="last-name-holder-inner">
					<div class="last-name-text-holder">Last Name</div>
					<div class="last-name-input-holder"><input type="text" name="last_name" id="last_name" class="form-control last-name" placeholder="Last name" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="birthday-holder-inner">
					<div class="birthday-text-holder">Shop Name</div>
					<div class="birthday-input-holder"><input type="text" name="shopname" id="shopname" class="form-control birthday" placeholder="Shopname" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="email-holder-inner">
					<div class="email-text-holder">Email</div>
					<div class="email-input-holder"><input type="email" name="email" id="email" class="form-control email" placeholder="Email" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="password-holder-inner">
					<div class="password-text-holder">Password</div>
					<div class="password-input-holder"><input type="password" name="password" id="password" class="form-control password" placeholder="Password" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="register-submit-wrapper"><button type="submit" class="register-button" id="btn_next" name="register_button">Next</button></div>
				<input type="hidden" name="user_type" id="user_type" value="Seller">
				<input type="hidden" name="user_status" id="user_status" value="not verified">
			</div>
			
		</div>
		<div class="footer-wrapper">
			<?php include('footer1.php'); ?>
		</div>
	</div>
</body>
</html>


<script>
	$(document).ready(function() {
		$(document).on('click', '#header_sell_link', function() {
			window.location = 'register-seller.php';
		});
		$(document).on('click', '#header_create_account', function() {
			window.location = 'create_account.php';
		});
		$(document).on('click', '#header_login', function() {
			window.location = 'login.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
				window.location = 'user_profile-customer-logged-in.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			alert('wala pang function!');
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location.href = 'logout.php';
		});
		$(document).on('click', '#btn_next', function() {
			var user_type = $('#user_type').val();
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var shopname = $('#shopname').val();
			var email = $('#email').val();
			var password = $.trim($('#password').val());
			var user_status = $('#user_status').val();
			var action = 'register_seller';
			$.ajax({
				url:'register_seller_action.php',
				method:'POST',
				data:{
					user_type:user_type,
					first_name:first_name,
					last_name:last_name,
					shopname:shopname,
					email:email,
					password:password,
					user_status:user_status,
					action:action
				},
				success:function(data) {
					if(data == 'emailErr') {
						$('#error_message1').html('Email is already in use');
					}
					else if(data == 'allFieldErr') {
						$('#error_message1').html('All Fields are Required');
					}
					else if(data == 'Done') {
						window.location = 'register-seller-account-verify.php';
					}
				}
			})
		});

		$('#search').keyup(function() {
					var search_something = $('#search').val();
					var select_search = $('#select_search').val();
					if(search_something != '') {
						$.ajax({
							url:'search_action.php',
							method:'POST',
							data:{
								search_something:search_something,
								select_search
							},
							success:function(data) {
								$('#search_success').fadeIn(0);
								$('#search_success').html(data);
							}
						})
					}
					else if(search_something == '') {
						$('#search_success').fadeOut(200);
					}
				});
				$(document).on('click', 'li', function() {
					$('#search').val($(this).text());
					$('#search_success').fadeOut();
				});

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
			$(document).on('click', '#header_shop_cart_holder', function() {
				window.location.href = 'cart.php';
			});
	});	
</script>