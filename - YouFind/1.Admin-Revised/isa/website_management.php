<!DOCTYPE html>
<html>
<head>
	<title>Website Management</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/website_management.css">
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
					<li><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					<li class="link-active"><a href="website_management.php" class="li-link inventory">Website Management</a></li>
					<li><a href="sales_management.php" class="li-link inventory">Reports</a></li>
					<li><a href="admin_login.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right">
			<div class="direction-wrapper">
				<div class="location-wrapper">
					<div class="location-icon"><img src="images/website-icon.png" height="100%" width="100%"></div>
					<div class="location-title">WEBSITE MANAGEMENT</div>
					<div class="direction-holder">
						<p class="home">Home</p>	
						<p class="separator">&#10095;</p>
						<p class="dashboard">Website Management</p>
					</div>
				</div>
			</div>

			<div class="installment-wrapper">
				<p class="pending-applications">Products-On-Sale</p>	
			</div>
		</div>
	</div>
</body>
</html>