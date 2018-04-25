<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<style>
		body{
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center center;
			background-size: cover;
		}

		.content-wrapper{
			background-color: #f4f4f4;
			border: 1px solid black;
			border-radius: 10px;
			height: 450px;
			width: 60%;
			margin-top: 6%;
		}
		.content-wrapper > .title {
			background-color: #125965;
			padding: 8px 280px;
			height: 70px;
			border-radius: 5px:
		}
		.content-wrapper > .content-text{
			margin-left: -200px;
			margin-top: 20px;
		}
		.content-wrapper > .content-text > input[type="submit"].btn_sub:hover {
			background-color: #0e424b;
		}

	</style>
</head>
<body background="images\bg_login.png">
	<center>
		

	<div class="content-wrapper">
		<div class="title">
			<a class="navbar-brand" href="#"><img src="images/arrow.png"></a>
			<a class="navbar-brand" href="#" id="logo"><img class="logo" src="images/logo.png"></a>
		</div>
		<div class="content-text">
			<div style="background-image: url('images/first.png'); background-repeat: no-repeat; width: 250px; height: 50px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: -298px; padding-right: 50px;">User Type</div>
			<div style="background-image: url('images/second.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 79px; margin-top: -51px; padding-right: 8px;">Personal Info</div>
			<div style="background-image: url('images/second.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 456px; margin-top: -53px; padding-right: 0px;">ID Verification</div>
			<div style="background-image: url('images/last_active.png'); background-repeat: no-repeat; width: 250px; height: 54px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 800px; margin-top: -55px; padding-right: 35px; padding-top: 13px;">Review</div><br>

			<h4 style="margin-left: 200px;">Review your account</h4><br>
				<table>
					<tr>
						<th style="width: 30%;"> Client's Name:
						<td style="width: 70%;"> Juan Dela Cruz
					</tr>
					<tr>
						<th style="width: 30%;"> Email Address:
						<td style="width: 70%; padding-top: 2%;"> jdc@gmail.com
					</tr>
					<tr>
						<th style="width: 30%;"> Physical Address:
						<td style="width: 75%; padding-top: 2%;"> 1230 Boyle St., Palanan, Makati City, Metro Manila
					</tr>
					<tr>
						<th style="width: 30%;"> ID Verification
						<td style="width: 75%; padding-top: 2%;"> Pending
					</tr>
					<tr>
						<th style="width: 30%;"> ID Number
						<td style="width: 75%; padding-top: 2%;"> K11111111
					</tr>
				</table>
				<br>
				<input type="reset" name="btn_back" value="Back" onclick="" style="color: white; background-color: #125965; margin-left: 18%; width: 20%; border: none; border-radius: 3px; padding: 5px">
				<input type="submit" name="btn_submit" value="Submit" style="color: white; background-color: #125965; margin-left: 5%; width: 20%; border: none; border-radius: 3px; padding: 5px"><br>
	</div>
	
	</center>

</body>
</html>