<?php 

	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database', 'root', '');
	$query = '
		SELECT user_type FROM youfind_user WHERE user_type = "Customer"
	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$customerCount = $statement->rowCount();
	$fetchSeller = '
		SELECT user_type FROM youfind_user WHERE user_type = "Seller"
	';
	$statementSeller = $connect->prepare($fetchSeller);
	$statementSeller->execute();
	$sellerCount = $statementSeller->rowCount();
	$totalUsers = $customerCount + $sellerCount;
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<link rel="stylesheet" type="text/css" href="user-management.css">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<style type="text/css">
		
	</style>
</head>

<body>

	<div class="whole-wrapper">
		<div class="navbar-left">
			<div class="logo-container">
				<div class="logo-wrapper"><img src="images/logo.png"></div>
				<div class="tagline-wrapper">"Find your satisfaction here"</div>
				<hr>
			</div>

			<div class="account-container">
				<div class="dp-container">
					<div class="dp-wrapper"><img src="images/user-white.png" class="image"></div>
				</div>
				<div class="info-container"><p class="name">John Michael Olangco</p><p class="position">Administrator</p></div>

			</div>
			<hr>

			<div class="navigation-wrapper">
				<ul>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="dashboard.php" style="text-decoration: none; color: #a2a2a2;">Dashboard</a>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="sales-management.php" style="text-decoration: none; color: #a2a2a2;">Sales Management</a>
					<li class="active" sstyle="color: white; font-size: 13px;"><a href="user-management.php" style="text-decoration: none; color: #a2a2a2;">User Management</a>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="inventory-management.php" style="text-decoration: none; color: #a2a2a2;">Inventory Management</a>
				</ul>
			</div>

		</div>

		<div class="content-wrapper">
			<div class="directory-wrapper">
				Home  >  User Management
			</div>

			<div class="table-holder-wrapper">
				<div class="title-wrapper">
					<p class="title">User Management Page</p>
					<hr class="content">
				</div>
				<div class="table-wrapper">
					<div class="categories">
						<ul>
							<li class="first">All (5)</li>
							<li class="second">Customers (2)</li>
							<li class="last">Entreprenuers (3)</li>
						</ul><br><br><br>
							<div class="top-wrapper">	
								<div class="action-wrapper">
									<select>
										<?php  
										$actions = array('No Action','Verify','Delete', 'Ban');
										foreach ($actions as $choice) {
											echo "<option name='$actions'>".$choice."</option>";
										}
										?>
									</select>
									<button>Apply</button>
									<button>Apply to All</button>
								</div>
								<div class="search-wrapper">
								<select>
									<?php  
									$actions = array('All', 'Customer','Verified - Entrepreneurs','Unverified - Entrepreneurs','Banned');
									foreach ($actions as $choice) {
										echo "<option name='$actions'>".$choice."</option>";
									}
									?>
								</select>
								<input type="text" name="search" class="searchbar" placeholder="Search">
								<button>Search</button>
								</div>
							</div>
						</div>
					<div class="user-table-wrapper" id="table_data" style="clear: both; border: 1px solid red; height: 20px;"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>


<script type="text/javascript">
		$(document).ready(function () {

			
		

		});
	</script>
