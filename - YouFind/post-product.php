<?php 
	session_start();
	//print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="post-style.css">
</head>
<body>

	<div class="post-whole-wrapper">
		<div class="header-wrapper"><?php include('new-header.php'); ?></div>
	
		<div class="content-holder">
				<div class="header-text">
					<p class="sell-what">What do you want to sell?</p>
					<p class="required">* Required Field</p>
				</div>

				<div class="input-forms">
					<div class="categories">
						<select class="allCategories" id="category">
								<?php  
								$actions = array('Laptops & Computers','Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Mobile Phones');
								foreach ($actions as $choice) {
									echo "<option name='$actions'>".$choice."</option>";
								}
								?>
						</select>
						<div class="photo-holder" id="photo_holder">
								<div class="not-set-image" style="width: 50px; height: 50px; margin: 25px auto 0 auto; ">
									<img src="images/add_pic.png" width="100%" height="100%">
									<p style="margin-top: 5px; font-size: 13px;">Required</p>
								</div>
						</div>
							<div class="choose-photo-product-button-wrapper" style="width: 90px; margin: 7px 0 0 30px;">
								<form id="form_wall">
									<input type="file" name="product_photo" id="product_photo" style="width: 100%; color: transparent;">
								</form>
							</div>
						<hr class="thin-line">
						<input type="text" name="prod-name" id="product_name" placeholder="Product Title *" class="input-type" maxlength="50">
						<input type="number" name="your-price" placeholder="Your Price *" class="input-type" id="product_price">
						<input type="number" name="qty" placeholder="Qty of Items On-Hand *" class="input-type" min="1" value="1" id="product_quantity">

						<textarea cols="135" rows="5" class="overview" maxlength="300" placeholder="Product Overview.            NOTE: Maximum of 300 characters." id="product_overview"></textarea>

						<input type="submit" name="submit" class="post-ad" value="Post Your Ad" id="product_post">
						<input type="reset" name="cancel" class="cancel" value="Cancel" onclick="location.href='Seller/user_profile-seller-logged-in.php'">
					</div>
				</div>
			</div>
		<div class="footer-wrapper"><?php include('footer1.php'); ?></div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('change', '#category', function() {
			var category = $(this).val();	
		});

		$(document).on('change', '#product_photo', function() {
				var upload_profile_picture = document.getElementById('product_photo').files[0].name;
				var ext = upload_profile_picture.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('product_photo').files[0]);
				var f = document.getElementById('product_photo').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 200000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('product_photo', document.getElementById('product_photo').files[0]);
					$.ajax({
						url:'page-actions/post-product-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#photo_holder').html(data);
						}
					})
				}
		});

		$(document).on('click', '#product_post', function() {
			var product_category = $('#category').val();
			var product_name = $('#product_name').val();
			var product_price = $('#product_price').val();
			var product_quantity = $('#product_quantity').val();
			var product_overview = $('#product_overview').val();
			var action = 'product_post';
			if(product_name == '' || product_price == '' || product_quantity == 0 || product_overview == '') {
				if(product_quantity == '0') {
					alert('The quantity of your must not be zero');
				}
				else if(product_quantity != '0'){
					alert('Kindly specify other requirements');
				}
			}
			else {
				$.ajax({
				url:'page-actions/post-product-action.php',
				method:'POST',
				data:{
					action:action,
					product_name:product_name,
					product_category:product_category,
					product_price:product_price,
					product_quantity:product_quantity,
					product_overview:product_overview
				},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'post-product-review.php';
					}
					else {
						alert(data);
					}
				}
			})
			}
		});
		$(document).on('click', '#header_logo', function() {
			window.location = 'new-index.php';
		});
	});
</script>