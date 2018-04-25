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
			<div style="background-image: url('images/first_active.png'); background-repeat: no-repeat; width: 250px; height: 50px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: -298px; padding-right: 50px;">User Type</div>
			<div style="background-image: url('images/second.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 79px; margin-top: -51px; padding-right: 8px;">Personal Info</div>
			<div style="background-image: url('images/second.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 456px; margin-top: -53px; padding-right: 0px;">ID Verification</div>
			<div style="background-image: url('images/last.png'); background-repeat: no-repeat; width: 250px; height: 54px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 800px; margin-top: -55px; padding-right: 35px; padding-top: 13px;">Review</div><br>

			<h4 style="margin-left: 200px;">Select what kind of user type you are applying for</h4><br>


			<button class="user_pick" style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 190px;"><img src="images/cart.png"><br>Customer
			</button>
			<button style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 10px;"><img src="images/seller.png"><br>Seller
			</button>
			<button style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 10px;"><img src="images/student.png"><br>Student
			</button>
			<button style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 10px;"><img src="images/professionals.png"><br>Professional
			</button>
	</div>
	
	</center>

</body>
</html>