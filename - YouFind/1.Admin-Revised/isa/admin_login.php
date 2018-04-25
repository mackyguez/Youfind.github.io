<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/admin_login.css">
</head>
<body>

	<div class="go-to" onclick="location.href='../new-index.php'">Go to YouFind Website &#10095;&#10095;</div>
	<div class="login-wrapper">
		<div class="img-wrapper"><img src="images/admin-login.png" width="100%" height="100%"></div>
		<div class="login-holder">
			<p class="administrator">ADMINISTRATOR</p>
			<p class="please-signin">Please sign in to gain access</p>
			<input type="text" name="username" placeholder="Username" class="input-style">
			<input type="text" name="password" placeholder="Password" class="input-style" style="margin-top: 20px;">
			<button class="sign-in-wrapper">
				<p class="sign-in">Sign In</p>
				<div class="icon-wrapper"><img src="images/sign-in.png" height="80%" width="100%"></div>
			</button>
		</div>
	</div>
</body>
</html>