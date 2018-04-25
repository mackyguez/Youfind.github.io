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
					<li><a href="sales_management.php" class="li-link users">Reports</a></li>
					<li><a href="admin_login.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
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
							<p class="dashboard">Edit Product</p>
						</div>
					</div>
			</div>


			<div class="user-counter-wrapper">
				<p class="pending-applications">Edit Products</p>

				<div class="input-wrapper" style="overflow-y: scroll; max-height: 570px;">


				<p class="item-progress-title">Product Images</p>
				<div class="item-preview-wrapper">	
					<div class="item-preview">
						<img src="images/date-wrapper.jpg" width="100%" height="100%">
					</div>
				</div>

				<div class="input-upload">
					<input type="file" name="file[]" multiple id="file"/>
				</div>
   				
					
				<p class="item-progress-title">Product Category</p>
		      	<div class="input-forms">
						<div class="categories">
							<select class="allCategories" id="category">
									<?php  
									$actions = array('Laptops & Computers','Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Home Entertainment');
									foreach ($actions as $choice) {
										echo "<option name='$actions'>".$choice."</option>";
									}
									?>
							</select>

			      <p class="item-progress-title">Product Information</p>

							<input type="text" name="prod-name" id="product_name" placeholder="Product Name *" class="input-type">
							<input type="text" name="your-price" placeholder="Your Price *" class="input-type" id="product_price">
							<input type="number" name="stock" class="input-type" min="1" value="1" id="product_quantity">

							<textarea cols="135" rows="3" class="overview" maxlength="300" placeholder="Product Overview.            NOTE: Maximum of 300 characters." id="product_overview" style="margin-bottom: 30px;"></textarea>

			  		<p class="item-progress-title">Product Inclusion</p>

			  			<button class="add-inclusion" id="add_inclusion">Add Inclusion</button>

			  			<div class="add-more-item" id="add_this">
			  				<input type="number" name="qty" class="input-num" min="1" value="1" id="product_quantity">
			  				<p class="ex">&times;</p>
			  				<input type="text" name="prod-name" id="product_name" placeholder="What is included with your product?" class="input-what">
						</div>

					<div class="space">  space  </div>
					<p class="item-progress-title">Product Specifications</p>

			  			<button class="add-inclusion" id="specs_btn">Add Specifications</button>

			  			<div class="add-more-item" id="specs_div">
			  				<input type="text" name="qty" class="spec_title" id="product_quantity" placeholder="Specification Title">
			  				<input type="text" name="prod-name" id="product_name" placeholder="Specification Description" class="spec_value">
						</div>


				<div class="space">  space  </div>
				<button class="post-ad">Save</button>
				</div>
			</div>
		</div>
</div>
</body>
</html>

<script type="text/javascript">
	
	$("#add_inclusion").click(function () {
		$("#add_this").append('<input type="number" name="qty" class="input-num" min="1" value="1" id="product_quantity"><p class="ex">&times;</p><input type="text" name="prod-name" id="product_name" placeholder="What is included with your product?" class="input-what">');
	});

	$("#specs_btn").click(function () {
		$("#specs_div").append('<input type="text" name="qty" class="spec_title" id="product_quantity" placeholder="Specification Title"></p><input type="text" name="prod-name" id="product_name" placeholder="Specification Description" class="spec_value">');
	});
</script>