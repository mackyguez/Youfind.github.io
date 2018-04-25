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

	<link rel="stylesheet" type="text/css" href="create_account_styles.css">
</head>
<body>

	<div class="whole-wrapper">

		<div class="top-nav"><?php include('new-header.php'); ?></div>

		<div class="middle-wrapper">
			<div class="register-text"><h4 style="margin: 0;">Create an Account</h4></div>
			<div class="register-input-left">
				<div class="error-message" id="error_message" style="color: red; float: right; width: 80%; text-align: center; font-size: 16px;"></div>
				<div class="first-name-holder-inner">
					<div class="first-name-text-holder">First Name</div>
					<div class="first-name-input-holder"><input type="text" name="first_name" id="first_name" class="form-control first-name" placeholder="First name" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="last-name-holder-inner">
					<div class="last-name-text-holder">Last Name</div>
					<div class="last-name-input-holder"><input type="text" name="last_name" id="last_name" class="form-control last-name" placeholder="Last name" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="email-holder-inner">
					<div class="email-text-holder">Email</div>
					<div class="email-input-holder"><input type="text" name="email" id="email" class="form-control email" placeholder="Email" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="password-holder-inner">
					<div class="password-text-holder">Password</div>
					<div class="password-input-holder"><input type="password" name="password" id="password" class="form-control password" placeholder="Password" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="address-holder-inner">
					<div class="address-text-holder-left">Address</div>
					<div class="add-top-input-holder-right">
						<input type="text" name="add_street" id="add_street" class="form-control add-street"  placeholder="Street" style="border: 2px solid #b1b1b1;">
						<input type="text" name="add_brgy" id="add_brgy" class="form-control add-brgy" placeholder="Barangay" style="border: 2px solid #b1b1b1;">
					</div>
					<div class="add-bottom-input-holder-right">
						<input type="text" name="add_city" id="add_city" class="form-control add-city" placeholder="City" style="border: 2px solid #b1b1b1;">
						<input type="text" name="add_province" id="add_province" class="form-control add-province" placeholder="Province" style="border: 2px solid #b1b1b1;">
					</div>
				</div>
				<div class="mobile-holder-inner">
					<div class="mobile-text-holder">Mobile Number</div>
					<div class="mobile-input-holder"><input type="text" name="mobile" id="mobile" class="form-control mobile" placeholder="Contact number" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="birthday-holder-inner">
					<div class="birthday-text-holder">Birthday</div>
					<div class="birthday-input-holder"><input type="date" name="birthday" id="birthday" class="form-control birthday" placeholder="Birthday" style="border: 2px solid #b1b1b1;"></div>
				</div>
				<div class="register-submit-wrapper"><button type="submit" class="register-button" id="register_button" name="register_button">Register</button></div>
				<input type="hidden" name="user_type" id="user_type" value="Customer">
				<input type="hidden" name="user_status" id="user_status" value="None">
			</div>
			<div class="ads-right">
				<div class="ads-right-content">Advertisement</div>
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
			load_cart_total();
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
			$(document).on('click', '#header_sell_link', function() {
					window.location = 'register-seller.php';
				});
				$(document).on('click', '#header_create_account', function() {
					window.location = 'create_account.php';
				});
				$(document).on('click', '#header_login', function() {
					window.location = 'login.php';
				});

		$(document).on('click', '#register_button', function() {
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var re_password = $('#re_password').val();
			var add_street = $('#add_street').val();
			var add_brgy = $('#add_brgy').val();
			var add_city = $('#add_city').val();
			var add_province = $('#add_province').val();
			var contact_number = $('#mobile').val();
			var birthday = $('#birthday').val();
			var user_type = $('#user_type').val();
			var user_status = $('#user_status').val();

			if(first_name == '' || last_name == '' || 
				email == '' || password == '' || 
				re_password == '' || add_street == '' || 
				add_brgy == '' || add_city == '' || 
				add_province == '' || mobile == '' || birthday == '') {
				
				$('#error_message').html('All fields are required');
			}
			else {
				$.ajax({
					url:'create_account_action.php',
					method:'POST',
					data:{
						user_type:user_type,
						first_name:first_name,
						last_name:last_name,
						email:email,
						password:password,
						re_password:re_password,
						add_street:add_street,
						add_brgy:add_brgy,
						add_city:add_city,
						add_province:add_province,
						contact_number:contact_number,
						birthday:birthday,
						user_status:user_status
					},
					success:function(data) {
						if(data == 'Done') {
							window.location = 'customer-profile.php';
						}
						else {
							$('#error_message').html(data);
						}

					}
				})
			}
		})
		
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
	});
</script>