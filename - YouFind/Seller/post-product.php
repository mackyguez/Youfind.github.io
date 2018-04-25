<!DOCTYPE html>
<html>
<head>
	<title>Post Product</title>
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
				<p class="sell-what">What do you want to sell?</p>
				<p class="required">* Required Field</p>
			</div>

			<div class="input-forms">
				<div class="categories">
					<select class="allCategories" id="category">
							<?php  
							$actions = array('Laptops & Computers','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories', 'Others');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
					</select>
					<div id="specify_other" style="display: none;"></div>
					<div class="photo-holder" id="photo_holder">
							<div class="not-set-image" style="width: 60px; height: 50px; margin: 25px auto 0 auto;">
								<img src="images/add_pic.png" width="100%" height="100%">
								<p style="margin-top: 5px;">Required</p>
							</div>
					</div>
						<div class="choose-photo-product-button-wrapper" style="width: 84px; margin: 7px 0 0 30px;">
							<form id="form_wall">
								<input type="file" name="product_photo" id="product_photo" style="width: 100%; color: transparent;">
							</form>
						</div>
					<hr class="thin-line">
					<input type="text" name="prod-name" id="product_title" placeholder="Product Title *" class="input-type">
					<input type="text" name="your-price" placeholder="Your Price *" class="input-type" id="product_price">
					<input type="number" name="qty" placeholder="Qty of Items On-Hand *" class="input-type" min="1" value="1" id="product_quantity">

					<textarea cols="135" rows="5" class="overview" maxlength="300" placeholder="Product Overview.            NOTE: Maximum of 300 characters." id="product_overview"></textarea>

					<input type="submit" name="submit" class="post-ad" value="Post Your Ad" id="product_post">
					<input type="reset" name="cancel" class="cancel" value="Cancel" onclick="location.href='user_profile-seller-logged-in.php'">

				</div>
			</div>
		</div>
		<div class="footer-wrapper"><?php include('footer.php'); ?></div>
	</div>
</body>
</html>


<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('change', '#category', function() {
			var category = $(this).val();
			if(category == 'Others') {
				$('#specify_other').html('<input type="text" class="form-control" placeholder="Please specify other product that you want to sell" width="100%" height="100%" style="margin: 0 0 7px 0; border: 1px solid black; width: 70%;" id="product_other">');
				$('#specify_other').show(400);
			}
			else {
				$('#specify_other').hide(400);
			}
		});

		$(document).on('change', '#product_photo', function() {
				
		});

		$(document).on('click', '#product_post', function() {
			
		});

	});
</script>	