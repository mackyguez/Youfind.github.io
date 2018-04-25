<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<link rel="stylesheet" type="text/css" href="register_customer_styles.css">
	<link rel="stylesheet" type="text/css" href="register_customer_styles_extension.css">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>

	<div class="whole-wrapper">
		<?php include('header.php'); ?>

		<div class="middle-wrapper">
			<div class="login-text-title-wrapper"><p class="text">Create an account</p></div>
				<div class="login-content-left">
					<form method="POST" id="form_wall">
							<div class="email-text-wrapper"><p>First Name</p></div>
							<div class="email-input-wrapper"><input type="text" name="fname" id="fname" class="form-control email"></div>
							<div class="password-text-wrapper"><p>Last Name</p></div>
							<div class="password-input-wrapper"><input type="text" name="lname" id="lname" class="form-control password"></div>
							<div class="password-text-wrapper"><p>Email</p></div>
							<div class="password-input-wrapper"><input type="email" name="email" id="password" class="form-control password"></div>
							<div class="password-text-wrapper"><p>Password</p></div>
							<div class="password-input-wrapper"><input type="password" name="password" id="password" class="form-control password"></div>
							<div class="password-text-wrapper"><p>Re-type Password</p></div>
							<div class="password-input-wrapper"><input type="password" name="password" id="password" class="form-control password"></div>
							<div class="password-text-wrapper"><p>Address</p></div>
							<div class="password-input-wrapper">
								<input type="password" name="password" id="password" class="form-control password" style="width: 49%; float: left;" placeholder="Street">
								<input type="password" name="password" id="password" class="form-control password" style="width: 49%; float: right;" placeholder="Barangay">
								<input type="password" name="password" id="password" class="form-control password" style="width: 49%; float: left;  margin: 10px 0 0 0;" placeholder="City">
								<input type="password" name="password" id="password" class="form-control password" style="width: 49%; float: right;  margin: 10px 0 0 0;" placeholder="Province"></div>

							<div class="password-text-wrapper"><p>Contact Number</p></div>
							<div class="password-input-wrapper"><input type="password" name="password" id="password" class="form-control password"></div>
							<div class="password-text-wrapper"><p>Birthday</p></div>
							<div class="password-input-wrapper"><input type="password" name="password" id="password" class="form-control password"></div>
							<div class="input-submit"><input type="submit" name="submit" id="submit" class="submit"></div>
					</form>
				</div>
				<div class="content-page-right">
					<div class="advertisement" style="background-color: gray; height: 500px;">Advertisement</div>
				</div>
		</div>
		<div class="login-footer">
			<div class="first-two">
				<div class="all-about-wrapper">
					<div class="footer-title-wrapper"><h4 class="title-footer">All about </h4></div>
					<div class="footer-logo-wrapper"><img src="images/logo.png" class="logo-icon"></div>

					<div class="nav-footer">
						<ul>
							<li>About us
							<li>FAQs
							<li> Contact Us
						</ul>
					</div>
				</div>

				<div class="user-wrapper">
					<div class="whole-title-wrapper"><h4 class="title-footer">User Section</h4></div>

					<div class="nav-whole-footer">
						<ul>
							<li>Login
							<li>Register
							<li>My Account
							<li>YouWallet
							<li>Shopping Cart
							<li>Wishlist
						</ul>
					</div>
				</div>
			</div>
			<div class="last-two">
				
				<div class="location-wrapper">
					<div class="whole-title-wrapper"><h4 class="title-footer">Where to find us</h4></div>

					<div class="nav-whole-footer">
						<ul>
							<li>5555 Boyle., St
							<li>Palanan,
							<li>Makati City 1235
							<li>Philippines
						</ul>
					</div>
				</div>

				<div class="connection-wrapper">
					<div class="whole-title-wrapper"><h4 class="title-footer">Stay Connected</h4></div>

					<div class="nav-whole-footer">
						<div class="mobile-icon-wrapper" style="margin-left: 20px;"><img src="images/phone-icon.png" class="icon"></div>
						<div class="mobile-icon-text-wrapper"><p>09993114949</p></div><br><br>
						<div class="mail-icon-wrapper" style="margin-left: 20px;"><img src="images/mail-icon.png" class="icon"></div>
						<div class="mail-icon-text-wrapper"><p>youfind@gmail.com</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#form_wall').on('submit', function() {
			alert();
		});
	});
</script>