<!DOCTYPE html>
<html>
<head>
	<title>Post Service</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="post-style.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('header-seller-logged-in.php'); ?></div>
		<div class="content-holder">
			<div class="header-text">
				<p class="sell-what">What kind of service do you want to lend?</p>
				<p class="required">* Required Field</p>
			</div>

			<div class="input-forms">
				<div class="categories">
					<select class="allCategories">
							<?php  
							$actions = array('* Choose Category *','Laptop Repairs','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
					</select>

					<button class="photo">
						<img src="images/add_pic.png" width="55px" height="40px">
						<p style="margin-top: 5px;">Required</p>
					</button>

					<hr class="thin-line">

					<input type="text" name="prod-name" placeholder="Service Title *" class="input-type">
					<input type="text" name="your-price" placeholder="Your Price *" class="input-type">
					<input type="text" name="your-price" placeholder="Day Availability *" class="input-type">
					<input type="text" name="your-price" placeholder="Time Availability *" class="input-type">
					<input type="text" name="your-price" placeholder="Location *" class="input-type">

					<textarea cols="135" rows="5" class="overview" maxlength="300">Product Overview.            NOTE: Maximum of 300 characters.</textarea>

					<input type="submit" name="submit" class="post-ad" value="Post Your Ad">
					<input type="reset" name="cancel" class="cancel" value="Cancel" onclick="location.href='user_profile-seller-logged-in.php'">


				</div>
			</div>
		</div>
	</div>
</body>
</html>