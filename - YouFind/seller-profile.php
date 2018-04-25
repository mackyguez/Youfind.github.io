<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	//print_r($_SESSION);
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="seller-profile.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="nav-bar-wrapper">
				<p class="user-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
				<p class="user-verification">Verified</p>
				<p class="user-navigation"  style="font-weight: bold; color: #125965;">Dashboard</p>
				<p class="user-navigation" onclick="location.href='inventory-seller.php'">Inventory Management</p>
				<p class="user-navigation" onclick="location.href='seller-settings.php'">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<p class="dashboard-title">Insights</p>
				<div class="insight-wrapper">
					<div class="insight-1" style="background-image: url('images/product-icon.png');
											background-size: cover;">
						<p class="insight-ctr" id="posted_prod_ctr">0</p>
						<p class="insight-title">Posted Products</p>
					</div>
					<div class="insight-1" style="background-image: url('images/revenue-icon.png');
											background-size: cover;">
						<p class="insight-ctr">&#8369; 0.00</p>
						<p class="insight-title">Total Revenue</p>
					</div>
					<div class="insight-1" style="background-image: url('images/stock-icon.png');
											background-size: cover;">
						<p class="insight-ctr" id="remaining_prods">0</p>
						<p class="insight-title">Total Remaining Stocks</p>
					</div>
				</div>


			<div class="personal-wrapper">
				<p class="dashboard-title">Personal Information</p>

					<div class="personal-info">
						<img src="1.User/profile-pictures/<?php echo $result[0]['profile_picture']; ?>" class="account-photo">
						<div class="account-info">
							<p class="account-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
							<p class="account-add">
								<?php 
									if( $result[0]['add_street'] == ''
									||  $result[0]['add_brgy'] == '' 
									||  $result[0]['add_city'] == ''
									||  $result[0]['add_province'] == ''
										) {
										echo 'Not set';
									}
									else {
										echo $result[0]['add_street'].' '.$result[0]['add_brgy'].'<br>			'; 
										echo $result[0]['add_city']; 
									}
								?>
							</p>
							<p class="edit-profile" onclick="location.href='seller-settings.php'">EDIT PROFILE</p>
						</div>
					</div>
			</div>

			<div class="personal-wrapper">
				<p class="dashboard-title">YouWallet</p>

					<div class="personal-info">
						<div class="account-info">
							<p class="account-name" style="font-size: 37px;">&#8369; <?php echo number_format($result[0]['youwallet'],2); ?></p>
							<p class="account-add">Balance</p>
							<p class="edit-profile" id="prompt_btn">ASK TO TRANSFER TO BANK</p>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>

<div class="footer-wrapper">
	<?php include('footer1.php');?>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {

		load_seller_products();
		function load_seller_products() {
			var action = 'load_seller_products';
			$.ajax({
				url:'page-actions/inventory-seller-action.php',
				method:'POST',
				dataType:'json',
				data:{action:action},
				success:function(data) {
					$('#posted_prod_ctr').html(data.posted_products);
					$('#remaining_prods').html(data.remaining_prods);
				}
			})
		}

		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'seller-profile.php';
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = 'logout.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			window.location = 'settings.php';
		});
		$(document).on('click', '.header-youwallet', function() {
			window.location = 'wallet.php';
		});

	});
</script>