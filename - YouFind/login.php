<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="login_styles.css">
</head>
<body>

	<div class="whole-wrapper">
		<!-- Top Nav -->
			<?php include('new-header.php'); ?>
		<!-- -->
			<div class="middle-wrapper">
				<center>
					<div><h3 class="login-text-left">Sign in</h3></div>
				</center>

				<div class="middle-content-left">
					<div class="error-both-fields-division" id="error_both"></div>
					<div class="email-input-division">
						<div class="email-text-left">Email Address</div>
						<div class="email-input-right"><input type="text" name="email" id="email" class="form-control input-box"
							 style="border: 2px solid #b1b1b1;"></div>
					</div>
					<div class="password-input-division">
						<div class="password-text-left">Password</div>
						<div class="password-input-right"><input type="password" name="password" id="password" class="form-control input-box" style="border: 2px solid #b1b1b1;"></div>
					</div>
					<div class="activity">
						<div class="checkbox-input-left"><input type="checkbox" name="checkbox" id="checkbox" class="checkbox"></div>
						<div class="checkbox-text-left">Remember me</div>
						<div class="forgot-text-right" style="display: none;">Forgot password?</div>
					</div>

					<div class="submit-button-wrapper"><button type="submit" name="submit" id="submit" class="submit" value="Login">Login</button></div>
					<div class="need-account-wrapper">Need an account?</div>
					<div class="sign-up-wrapper"><button class="sign-up" onclick="location.href='create_account.php'">Sign up now!</button></div>
				</div>
			</div>

			<div class="footer-wrapper">
				<?php include('footer1.php'); ?>
			</div>
	</div>

</body>
</html>
<script type="text/javascript">
		$(document).ready(function() {
				$(document).on('click', '#submit', function() {
					var login = $('#submit').val();
					var email = $('#email').val();
					var password = $('#password').val();
					$.ajax({
							url:'login_action.php',
							method:'POST',
							data:{
								login:login,
								email:email,
								password:password	
							},
							success:function(data) {
								if(data == 'Done_Customer') {
									window.location = 'customer-profile.php';
								}
								else if(data == 'Done_Seller') {
									window.location = 'seller-profile.php';
								}
								else {
									$('#error_both').html(data);
								}
							}
					})
				});
				$(document).on('click', '#header_sell_link', function() {
					window.location = 'register-seller.php';
				});
				$(document).on('click', '#header_create_account', function() {
					window.location = 'create_account.php';
				});
				$(document).on('click', '#header_login', function() {
					window.location = 'login.php';
				});
		});

</script>
