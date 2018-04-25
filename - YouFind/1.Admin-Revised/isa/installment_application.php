<!DOCTYPE html>
<html>
<head>
	<title>Installment Applications</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/installment_application.css">
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
					<li class="link-active"><a href="installment_application.php" class="li-link sales">Installment Applications</a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
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
					<div class="location-icon"><img src="images/installment-icon.png" height="100%" width="100%"></div>
					<div class="location-title">INSTALLMENT APPLICATIONS</div>
					<div class="direction-holder">
						<p class="home">Home</p>	
						<p class="separator">&#10095;</p>
						<p class="dashboard">Installment Applications</p>
					</div>
				</div>
			</div>

			<div class="installment-wrapper">
				<p class="pending-applications">Pending Installment Applications</p>

				<div class="table-wrapper">
					<table>
						<tr>
							<th width="250px">Account Name
							<th width="250px">Order Number
							<th width="150px">Total Amount
							<th width="150px">Installment Terms
							<th width="150px">Amount to Pay
							<th width="150px">Action
						</tr>
						<tr>
							<td>John Michael Olangco
							<td>58616050
							<td><?php session_start(); echo number_format($_SESSION['total_amount'],2); ?>
							<td>12 Months
							<td>4,000
							<td>
								<button class="accept" title="Accept Application">&#10004;</button> 
								<button class="reject" title="Reject Application">&#10006;</button>
								<button class="view" title="View Information">View</button>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="installment-wrapper">
				<p class="pending-applications">Installment Table</p>
				<div class="table-wrapper">
					<table>
						<tr>
							<th width="240px">Account Name
							<th width="240px">Order Number
							<th width="150px">Total Amount
							<th width="150px">Installment Terms
							<th width="150px">Amount to Pay
							<th width="190px">Remaining Balance
							<th width="120px">Remarks

						</tr>
						<tr>
							<td>John Michael Olangco
							<td>111-4365762-1238964
							<td>47,650.00
							<td>12 Months
							<td>4,000
							<td>29,000
							<td>Fully Paid
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>