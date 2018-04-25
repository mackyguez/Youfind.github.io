<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/inventory_management.css">
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
					<li><a href="sales_management.php" class="li-link sales">Installment Application</a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li class="link-active"><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right">
			<div class="direction-wrapper">
					<div class="location-wrapper">
						<div class="location-icon"><img src="images/inventory-icon.png" height="100%" width="100%"></div>
						<div class="location-title">INVENTORY MANAGEMENT</div>
						<div class="direction-holder">
							<p class="home">Home</p>
							<p class="separator">&#10095;</p>
							<p class="dashboard">Inventory Management</p>
						</div>
					</div>
			</div>
			<div class="user-counter-wrapper">
					<ul class="ul-user-counter">
						<li class="all"><a href="#">All (25)</a></li>
						<li class="gadgets"><a href="#">Gadgets (15)</a></li>
						<li class="laptops"><a href="">Laptops & Computers (10)</a></li>
						<li class="camera"><a href="">Camera, Photos & Videos (10)</a></li>
						<li class="headphones"><a href="">Headphones & Speakers (10)</a></li>
						<li class="parts"><a href="">Computer Parts (10)</a></li>
						<li class="storage"><a href="">Storage Devices (10)</a></li>
						<li class="accessories"><a href="">Accessories (10)</a></li>
						<li class="drone"><a href="">Drone (10)</a></li>
						<li class="home"><a href="">Home Entertainment (10)</a></li>
					</ul>
					<div class="search-wrapper">
							<select name="pick_search" id="pick_search" class="pick-search">
								<?php  
								$actions = array('All', 'Gadgets','Laptops & Computers','Camera, Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Drone','Home Entertainment');
								foreach ($actions as $choice) {
									echo "<option name='$choice'>".$choice."</option>";
								}
								?>
							</select>
							<input type="text" name="search" class="searchbar" placeholder="Search"  id="search_user">
							<button style="height: 24px; margin: 0;">Search</button>
						</div>
				</div>

				<div class="users-table-content">
					<div id="table_content" class="table-content">
						<table class="fetch-data-table" id="fetch_data_table" width="980px" style="text-align: center;">
						</table>
					</div>
				</div>

		</div>
	</div>


</body>
</html>