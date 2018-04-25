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
			
			<div style="margin: 10px auto 0 auto; width: 90%; color: red; min-height: 22px; text-align: center;" id="error_field"></div>

			<input type="text" name="username" placeholder="Username" class="input-style" id="username" style="margin: 10px 18px 0 18px;">
			<input type="password" name="password" placeholder="Password" class="input-style" style="margin-top: 20px;" id="password">
			<button class="sign-in-wrapper" id="button_login">
				<p class="sign-in">Sign In</p>
				<div class="icon-wrapper"><img src="images/sign-in.png" height="80%" width="100%"></div>
			</button>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('click', '#button_login', function() {
			var username = $('#username').val();
			var password = $('#password').val();
			var action = 'admin_login';
			$.ajax({
				url:'admin-page-actions/admin-login-action.php',
				method:'POST',
				data:{
					action:action,
					username:username,
					password:password
				},
				success:function(data) {
					if(data == 'Done') {
						$('#error_field').html('');
						window.location = 'admin_dashboard.php';
					}
					else {
						$('#error_field').html(data);
					}
				}
			})
		});

	});
</script>