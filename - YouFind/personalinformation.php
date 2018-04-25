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
			height: 550px;
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
			<div style="background-image: url('images/second_active.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 82px; margin-top: -51px; padding-right: 8px;">Personal Info</div>
			<div style="background-image: url('images/second.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 463px; margin-top: -53px; padding-right: 0px;">ID Verification</div>
			<div style="background-image: url('images/last.png'); background-repeat: no-repeat; width: 250px; height: 54px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 807px; margin-top: -55px; padding-right: 30px; padding-top: 13px;">Review</div><br>

			<h4 style="margin-left: 200px;">We need your basic information</h4><br>

			<div class="forms">
				<form action="" method="POST">
				<table  style="width: 72%; margin-left: 18%;">
					<tr>
						<td style="width: 20%; margin-bottom: 10px;"> Client Name
						<td style="width: 35%;"> <input type="text" class="form-control" placeholder="Given Name" style="width: 100%;">
						<td style="width: 35%; padding-left: 20px;"> <input type="text" class="form-control" placeholder="Last Name" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 7px;"> Email Address
						<td colspan="2" style="padding-top: 7px;"> <input type="text" class="form-control" placeholder="E-Mail" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 7px;"> Physical Address
						<td style="padding-top: 7px;"> <input type="text" class="form-control" placeholder="Street" style="width: 100%;">
						<td style="padding-top: 7px; padding-left: 20px;"> <input type="text" class="form-control" placeholder="Barangay" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 7px;">
						<td style="padding-top: 7px;"> <input type="text" class="form-control" placeholder="City" style="width: 100%;">
						<td style="padding-top: 7px; padding-left: 20px;"> <input type="text" class="form-control" placeholder="Province" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 7px;"> Password
						<td colspan="2" style="padding-top: 7px;"> <input type="text" class="form-control" placeholder="Password" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 7px;"> Re-enter Password
						<td colspan="2" style="padding-top: 7px;"> <input type="text" class="form-control" placeholder="Password" style="width: 100%;">
					</tr>
				</table><br>
				<input type="reset" name="btn_back" value="Back" onclick="" style="color: white; background-color: #125965; margin-left: 22%; width: 20%; border: none; border-radius: 3px; padding: 5px">
				<input type="submit" name="btn_submit" value="Next" style="color: white; background-color: #125965; margin-left: 22%; width: 20%; border: none; border-radius: 3px; padding: 5px"><br>
			</form>
				
			</div>

	</div>
	
	</center>

</body>
</html>