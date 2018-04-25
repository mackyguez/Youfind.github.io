<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/inventory_management.css">
	<link rel="stylesheet" type="text/css" href="modal.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="navigation-left">
			<div class="logo-container">
				<div class="logo-wrapper"><img src="images/logo.png"></div>
				<div class="tagline-wrapper">"Find your satisfaction here"</div>
			</div>
			<div class="account-container">
				<div class="dp-container">
					<div class="dp-wrapper"><img src="images/user-white.png" class="image"></div>
				</div>
				<div class="info-container"><p class="name">John Michael Olangco</p><p class="position">Administrator</p></div>
			</div>

			<div class="navigation-links-holder">
				<ul class="ul-link">
					<li><a href="admin_dashboard.php" class="li-link dashboard">Dashboard</a></li>
					<li><a href="installment_application.php" class="li-link sales">Installment Application</a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li class="link-active"><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					<li><a href="sales_management.php" class="li-link users">Sales Management</a></li>
				</ul>
			</div>
		</div>

		<div class="content-right">
			<div class="direction-wrapper">
					<div class="location-wrapper">
						<div class="location-icon"><img src="images/inventory-icon.png" height="100%" width="100%"></div>
						<div class="location-title">INVENTORY MANAGEMENT</div>
						<div class="direction-holder">
							<p class="home" onclick="location.href='admin_dashboard.php'">Home</p>
							<p class="separator">&#10095;</p>
							<p class="dashboard" style="font-weight: normal;" onclick="location.href='inventory_management.php'">Inventory Management</p>
							<p class="separator">&#10095;</p>
							<p class="dashboard">Add New Product</p>
						</div>
					</div>
			</div>


			<div class="user-counter-wrapper">
				<p class="pending-applications">Add New Products</p>

				<div class="input-wrapper" style="overflow-y: scroll; max-height: 570px;">

				<p class="item-progress-title">Product Images</p>
				<div class="item-preview-wrapper">	
					<div class="item-preview">
						<img src="images/date-wrapper.jpg" width="100%" height="100%">
					</div>
				</div>

				<div class="input-upload">
					<form id="form_wall">
						<input type="file" name="file"  id="upload_product_photo">
					</form>
				</div>
   				
					
				<p class="item-progress-title">Product Category</p>
		      	<div class="input-forms">
						<div class="categories">
							<select class="allCategories" id="category">
									<?php  
									$actions = array('Gadgets','Laptops & Computers','Camera, Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Drone','Home Entertainment');
									foreach ($actions as $choice) {
										echo "<option name='$actions'>".$choice."</option>";
									}
									?>
							</select>

			      <p class="item-progress-title">Product Information</p>

							<input type="text" name="prod-name" placeholder="Product Name *" class="input-type" id="product_name">
							<input type="number" name="your-price" placeholder="Your Price *" class="input-type" id="product_price">
							<input type="number" name="stock" class="input-type" min="1" value="1" id="product_quantity">

							<input type="number" name="stock" class="input-type" min="1" max="100" id="product_discount" placeholder="Your product discount Ex* 15">

							<textarea cols="135" rows="3" class="overview" maxlength="300" placeholder="Product Overview.            NOTE: Maximum of 300 characters." id="product_overview" style="margin-bottom: 30px;"></textarea>

			  		<p class="item-progress-title">Product Inclusion</p>

			  			<button class="add-inclusion" id="add_inclusion">Add Inclusion</button>
			  			<button class="add-inclusion" id="delete_inclusion">Remove</button>
			  			<div class="add-more-item" id="add_this">
			  				<input type="number" name="qty" class="input-num" min="1" value="1">
			  				<p class="ex">&times;</p>
			  				<input type="text" name="prod-name" placeholder="What is included with your product?" class="input-what">
						</div>
					<div class="space">  space  </div>
					<p class="item-progress-title">Product Specifications</p>

			  			<button class="add-inclusion" id="add_spec">Add Specifications</button>
			  			<button class="add-inclusion" id="delete_spec">Remove</button>

			  			<div class="add-more-item" id="specs_div">
			  				<input type="text" name="qty" class="spec_title spec-title" placeholder="Specification Title">
			  				<input type="text" name="prod-name" placeholder="Specification Description" class="spec_value spec-value">
						</div>


				<div class="space">  space  </div>
				<button class="post-ad" id="post_btn">Post ad</button>
				</div>
			</div>
		</div>
</div>
</body>
</html>

<script type="text/javascript">
	var counter = 0;
	var spec_counter = 0;

	$("#add_inclusion").click(function () {
		if(counter < 3) {
			$("#add_this").append('<input type="number" name="qty" class="input-num" min="1" value="1"><p class="ex">&times;</p><input type="text" name="prod-name" placeholder="What is included with your product?" class="input-what">');
			counter++;
		}
	});

	$('#delete_inclusion').click(function() {
		$('input[type].input-num:last').remove();
		$('p.ex:last').remove();
		$('input[type].input-what:last').remove();
		counter--;
	});

	$("#add_spec").click(function () {
		if(spec_counter < 3) {
			$("#specs_div").append('<input type="text" name="qty" class="spec_title spec-title" placeholder="Specification Title"></p><input type="text" name="prod-name" placeholder="Specification Description" class="spec_value spec-value">');
			spec_counter++;
		}
	});

	$('#delete_spec').click(function() {
		$('input[type].spec-title:last').remove();
		$('input[type].spec-value:last').remove();
		spec_counter--;
	});

	$(document).on('change', '#upload_product_photo', function() {
				var upload_product_photo = document.getElementById('upload_product_photo').files[0].name;
				var ext = upload_product_photo.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('upload_product_photo').files[0]);
				var f = document.getElementById('upload_product_photo').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 10000000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('upload_product_photo', document.getElementById('upload_product_photo').files[0]);
					$.ajax({
						url:'admin-page-actions/admin-post-upload-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('.item-preview').html(data);
						}
					})
				}
			});


	$(document).on('click', '#post_btn', function() {
		var action = 'admin_post';
		var category = $('#category').val();
		var product_discount = $('#product_discount').val();
		var product_name = $('#product_name').val();
		var product_price = $('#product_price').val();
		var product_quantity = $('#product_quantity').val();
		var product_overview = $('#product_overview').val();
		var inc_prod0 = $('input[type].input-num:eq(0)').val();
		var inc_prod_name0 = $('input[type].input-what:eq(0)').val();
		var inc_prod1 = $('input[type].input-num:eq(1)').val();
		var inc_prod_name1 = $('input[type].input-what:eq(1)').val();
		var inc_prod2 = $('input[type].input-num:eq(2)').val();
		var inc_prod_name2 = $('input[type].input-what:eq(2)').val();
		var inc_prod3 = $('input[type].input-num:eq(3)').val();
		var inc_prod_name3 = $('input[type].input-what:eq(3)').val();
		var spec_title1 = $('input[type].spec-title:eq(0)').val();
		var spec_value1 = $('input[type].spec-value:eq(0)').val();
		var spec_title2 = $('input[type].spec-title:eq(1)').val();
		var spec_value2 = $('input[type].spec-value:eq(1)').val();
		var spec_title3 = $('input[type].spec-title:eq(2)').val();
		var spec_value3 = $('input[type].spec-value:eq(2)').val();
		var spec_title4 = $('input[type].spec-title:eq(3)').val();
		var spec_value4 = $('input[type].spec-value:eq(3)').val();
		$.ajax({
			url:'admin-page-actions/admin-post-action.php',
			method:'POST',
			data:{
				category:category,
				product_discount:product_discount,
				product_name:product_name,
				product_price:product_price,
				product_quantity:product_quantity,
				product_overview:product_overview,
				action:action,
				inc_prod0:inc_prod0,
				inc_prod_name0:inc_prod_name0,
				inc_prod1:inc_prod1,
				inc_prod_name1:inc_prod_name1,
				inc_prod2:inc_prod2,
				inc_prod_name2:inc_prod_name2,
				inc_prod3:inc_prod3,
				inc_prod_name3:inc_prod_name3,
				spec_title1:spec_title1,
				spec_title2:spec_title2,
				spec_title3:spec_title3,
				spec_title4:spec_title4,
				spec_value1:spec_value1,
				spec_value2:spec_value2,
				spec_value3:spec_value3,
				spec_value4:spec_value4
			},
			success:function(data) {
				if(data == 'Done') {
					window.location = 'inventory_management.php';
				}
				else {
					window.location = 'inventory_management.php';	
				}
			}
		})

	});
</script>