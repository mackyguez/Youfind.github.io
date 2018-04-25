<?php 
	session_start();

	if(!isset($_SESSION['customer_user_id'])) {
		header('location:login.php');
	}

	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
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

	<link rel="stylesheet" type="text/css" href="customer-profile.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="nav-bar-wrapper">
				<p class="user-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
				<p class="user-verification"><?php echo ucfirst($result[0]['user_status']); ?></p>
				<p class="user-navigation"  style="font-weight: bold; color: #125965;">Dashboard</p>
				<p class="user-navigation" onclick="location.href='wallet.php'">YouWallet</p>
				<p class="user-navigation" onclick="location.href='cart.php'">Shopping Cart</p>
				<p class="user-navigation" onclick="location.href='wishlist.php'">Wishlist</p>
				<p class="user-navigation" onclick="location.href='settings.php'">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<p class="dashboard-title">Insights</p>
				<div class="insight-wrapper">
					<div class="insight-1" style="background-image: url('images/insight3.png');
											background-size: cover;">
						<p class="insight-ctr" id="load_product_purchased">0</p>
						<p class="insight-title">Products Purchased</p>
					</div>
					<div class="insight-1" style="background-image: url('images/insight1.png');
											background-size: cover;">
						<p class="insight-ctr" id="shop_cart_count">0</p>
						<p class="insight-title">Items in your Shopping cart</p>
					</div>
					<div class="insight-1" style="background-image: url('images/insight2.png');
											background-size: cover;">
						<p class="insight-ctr" id="load_wishlist_counter">0</p>
						<p class="insight-title" id="wishlist_counter">Items on your Wishlist</p>
					</div>
				</div>


			<div class="personal-wrapper">
				<p class="dashboard-title">Personal Information</p>

					<div class="personal-info">
						<img src="<?php 
							if($result[0]['profile_picture'] != '') {
								echo '1.User/profile-pictures/'.$result[0]['profile_picture'];
							}
							else {
								echo 'images/user.jpg';
							}
						?>" class="account-photo">
						<div class="account-info">
							<p class="account-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
							<p class="account-add"><?php echo $result[0]['add_street']; ?><br><?php echo $result[0]['add_brgy'].' '.$result[0]['add_city']; ?></p>
							<p class="edit-profile" onclick="location.href='settings.php'">EDIT PROFILE</p>
						</div>
					</div>
			</div>

			<div class="personal-wrapper">
				<p class="dashboard-title">Shipping Address</p>

					<div class="personal-info" style="height: 142px;">
						<div class="account-info">
							<p class="account-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
							<p class="account-add"><?php echo $result[0]['add_street']; ?><br><?php echo $result[0]['add_brgy'].' '.$result[0]['add_city']; ?></p>
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
			load_cart_counter();
			load_cart_total();
			load_wishlist_counter();
			load_product_purchased();

			function load_cart_counter() {
				var action = 'load_cart_counter';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_counter').html(data);
						$('#shop_cart_count').html(data);
					}
				})
			}
			function load_cart_total() {
				var action = 'load_cart_total';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_total').html(data);
					}
				})
			}

			function load_wishlist_counter() {
				var action = 'load_wishlist_counter';
				$.ajax({
					url:'page-actions/wishlist-counter-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#load_wishlist_counter').html(data);
					}
				})

			}

			function load_product_purchased() {
				var action = 'load_product_purchased';
				$.ajax({
					url:'page-actions/wishlist-counter-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#load_product_purchased').html(data);
					}
				})
			}

		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location = 'cart.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'customer-profile.php';
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
		$(document).on('click', '.header-wishlist', function() {
			window.location = 'wishlist.php';
		});
	
	});
</script>