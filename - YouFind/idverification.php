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
			<div style="background-image: url('images/second_active.png'); background-repeat: no-repeat; width: 250px; height: 53px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 456px; margin-top: -53px; padding-right: 0px;">ID Verification</div>
			<div style="background-image: url('images/last.png'); background-repeat: no-repeat; width: 250px; height: 54px; background-size: 100% 100%; padding-top: 10px; color: white; font-size: 18px; margin-left: 800px; margin-top: -55px; padding-right: 35px; padding-top: 13px;">Review</div><br><br>

			<div style="float: left; margin-left: 3%; width: 55%;">
			<button class="user_pick" style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 190px;"><img src="images/add_pic.png"><br>Click to Upload<br>Front
			</button>
			<button class="user_pick" style="background-color: #125965; width: 170px; height: 170px; border: none; color: white; border-radius: 5px; margin-left: 10px;"><img src="images/add_pic.png"><br>Click to Upload<br>Back
			</button>
			</div>

			<div style="float: right; width: 40%; margin-right: 2%; ">
				<table>
					<tr>
						<td style="width: 45%;">Government-issued ID
						<td style="width: 60%; padding-left: 5%;" colspan="2"><select class="form-control">
							<?php 
								$id_type = array('SSS/GSIS ID', 'UMID','PAGIBIG ID', 'PHILHEALTH', 'TIN ID', 'POLICE CLEARANCE', 'PASSPORT', 'PRC ID', 'SCHOOL ID');

								foreach ($id_type as $choice) {
									echo "<option value='$id_type'>".$choice ."</option>";
								}
							?>
							</select>
					</tr>
					<tr>
						<td style="padding-top: 3%;">ID Number
						<td style="width: 60%; padding-top: 3%; padding-left: 5%;" colspan="2"><input type="text" class="form-control" style="width: 100%;">
					</tr>
					<tr>
						<td style="padding-top: 3%;">Expiration Date
						<td style="width: 12%; padding-top: 3%; padding-left: 5%;"><input type="checkbox" class="form-control" style="width: 15px; height: 15px; margin-left: 0px;">
						<td style="padding-top: 3%;">(check if available)
					</tr>
					<tr>
						<td style="padding-top: 3%;">
						<td style="width: 60%; padding-top: 3%; padding-left: 5%;" colspan="2"><input type="date" class="form-control" style="width: 100%;">
					</tr>
				</table>
				<br>
				<input type="reset" name="btn_back" value="Back" onclick="" style="color: white; background-color: #125965; margin-left: 5%; width: 20%; border: none; border-radius: 3px; padding: 5px">
				<input type="reset" name="btn_skip" value="Skip" onclick="" style="color: white; background-color: #125965; margin-left: 5%; width: 20%; border: none; border-radius: 3px; padding: 5px">
				<input type="submit" name="btn_submit" value="Next" style="color: white; background-color: #125965; margin-left: 5%; width: 20%; border: none; border-radius: 3px; padding: 5px"><br>
			</div>
	</center>

</body>
</html>