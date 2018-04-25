<?php 
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="register-seller-logged-in-styles.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="top-nav">
			<?php include('header-logged-in.php'); ?>
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
					<div class="first-name-input-holder"><input type="text" name="first_name" id="first_name" class="form-control first-name" placeholder="First name"></div>
				</div>
				<div class="last-name-holder-inner">
					<div class="last-name-text-holder">Last Name</div>
					<div class="last-name-input-holder"><input type="text" name="last_name" id="last_name" class="form-control last-name" placeholder="Last name"></div>
				</div>
				<div class="birthday-holder-inner">
					<div class="birthday-text-holder">Shop Name</div>
					<div class="birthday-input-holder"><input type="text" name="shopname" id="shopname" class="form-control birthday" placeholder="Shopname"></div>
				</div>
				<div class="email-holder-inner">
					<div class="email-text-holder">Email</div>
					<div class="email-input-holder"><input type="email" name="email" id="email" class="form-control email" placeholder="Email"></div>
				</div>
				<div class="password-holder-inner">
					<div class="password-text-holder">Password</div>
					<div class="password-input-holder"><input type="text" name="password" id="password" class="form-control password" placeholder="Password"></div>
				</div>
				<div class="register-submit-wrapper"><button type="submit" class="register-button" id="btn_next" name="register_button">Next</button></div>
				<input type="hidden" name="user_type" id="user_type" value="Seller">
				<input type="hidden" name="user_status" id="user_status" value="not verified">
			</div>
			
		</div>
		<div class="footer-wrapper">
			<?php include('footer.php'); ?>
		</div>
	</div>
</body>
</html>


<script>
	$(document).ready(function() {

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

		
	});	
</script>