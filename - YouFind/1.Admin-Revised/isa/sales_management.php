<!DOCTYPE html>
<html>
<head>
	<title>Installment Applications</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/sales_management.css">
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
					<li class="link-active"><a href="sales_management.php" class="li-link inventory">Reports</a></li>
					<li><a href="admin_login.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right">
			<div class="direction-wrapper">
				<div class="location-wrapper">
					<div class="location-icon"><img src="images/installment-icon.png" height="100%" width="100%"></div>
					<div class="location-title">Reports</div>
					<div class="direction-holder">
						<p class="home">Home</p>	
						<p class="separator">&#10095;</p>
						<p class="dashboard" style="font-weight: normal;">Reports</p>
						<p class="separator">&#10095;</p>
						<p class="dashboard">Sales Management</p>
					</div>
				</div>
			</div>

			<div class="installment-wrapper">
				<div class="title-wrapper">
					<p class="nav2" onclick="location.href='sales_management.php'">Sales Management</p>
					<p class="nav1" onclick="location.href='inventory_report.php'">Inventory Management</p>
				</div>

				<div class="report-title">
					<p class="weekly">WEEKLY</p>
					<p class="sale-report">SALES REPORT</p>
				</div>

				<button class="export" style="display: none;">Export</button>

			<div class="table-wrapper">
					<table>
						<tr>
							<th width="100px" rowspan="2">Days
							<th colspan="7">Sales by Categories
							<th width="100px" rowspan="2">Cost
							<th width="100px" rowspan="2">Revenue
							<th width="100px" rowspan="2">Profit
						</tr>
						<tr>
							<th width="91px">Item A
							<th width="91px">Item B
							<th width="91px">Item C
							<th width="91px">Item D
							<th width="91px">Item E
							<th width="91px">Item F
							<th width="91px">Item G
						</tr>

						
						<tr>
							<td>Monday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr>
							<td>Tuesday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr>
							<td>Wednesday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>

						<tr>
							<td>Thursday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr>
							<td>Friday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr>
							<td>Saturday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr>
							<td>Sunday
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
							<td>10000.00
						</tr>
						<tr style="background-color: #597e84; color: white;">
							<td style="font-weight: bold; font-size: 18px;">Total
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
							<td style="font-weight: bold;">10000.00
						</tr>
					</table>

					<div class="legends-wrapper">
						<p class="legends-title">Legend:</p>
						<p class="legends"><b>Item A</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Laptops & Computers</p>
						<p class="legends"><b>Item B</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Photo & Video</p>
						<p class="legends"><b>Item C</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Headphones & Speakers</p>
						<p class="legends"><b>Item D</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Computer Parts</p>
						<p class="legends"><b>Item E</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Storage Devices</p>
						<p class="legends"><b>Item F</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Accessories</p>
						<p class="legends"><b>Item G</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; Mobile Phones</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>


<!-- -->