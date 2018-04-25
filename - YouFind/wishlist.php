<?php 
		session_start();

		if(!isset($_SESSION['customer_user_id'])) {
			header('location:login.php');
		}

		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		$fetchUser = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$fetchStatement = $connect->prepare($fetchUser);
		$fetchStatement->execute();
		$resultFetch = $fetchStatement->fetchAll();

		$query = 'SELECT * FROM user_wishlist_tbl WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="wishlist.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="nav-bar-wrapper">
				<p class="user-name"><?php echo $resultFetch[0]['first_name'].' '.$resultFetch[0]['last_name']; ?></p>
				<p class="user-verification"><?php echo ucfirst($resultFetch[0]['user_status']); ?></p>
				<p class="user-navigation" onclick="location.href='customer-profile.php'">Dashboard</p>
				<p class="user-navigation" onclick="location.href='wallet.php'">YouWallet</p>
				<p class="user-navigation" onclick="location.href='cart.php'">Shopping Cart</p>
				<p class="user-navigation" style="font-weight: bold; color: #125965;">Wishlist</p>
				<p class="user-navigation" onclick="location.href='settings.php'">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<div class="wishlist-wrapper">
					<div class="wishlist-title-wrapper">
						<p class="wishlist-title">My Wishlist</p>
						<p class="num-items" id="wishlist_items">0 item/s</p>

						<div class="search-wrapper" style="display: none;">
						<input type="search" name="search" class="search-input" placeholder="Search">
						<button class="search-btn"><img src="images/search.png"></button>
						</div>
					</div>

					<div class="table-wrapper">
						
					<p class="nothing-follows">*nothing follows*</p>
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
		load_wishlist();
		function load_wishlist() {
			var action = 'load_wishlist';
			$.ajax({
				url:'page-actions/wishlist-display-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					load_cart_counter();
					load_cart_total();
					$('#wishlist_items').html(data);
				}
			})
		}
		function load_cart_counter() {
			var action = 'load_cart_counter';
			$.ajax({
				url:'page-actions/add-to-cart-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#cart_counter').html(data);
					$('#cart_total_items').html(data+' item/s');
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

		$(document).on('click', '#add_wishlist_to_cart', function() {
			var action = 'add_to_cart';
			var product_id = $(this).data('add_to_cart');
			$.ajax({
				url:'page-actions/wishlist-action.php',
				method:'POST',
				data:{
					action:action,
					product_id:product_id
				},success:function(data) {
					if(data == 'Done') {
						load_wishlist();
					}
				}
			})

		});

		$(document).on('click', '#delete_wishlist', function() {
			var action = 'delete_wishlist';
			var wishlist_id = $(this).data('wishlist_id');
			$.ajax({
				url:'page-actions/wishlist-action.php',
				method:'POST',
				data:{
					action:action,
					wishlist_id:wishlist_id
				},
				success:function(data) {
					if(data == 'Done') {
						load_wishlist();
					}
				}
			})
		});


		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'customer-profile.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			window.location = 'settings.php';
		});

		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location = 'cart.php';
		});
	});
</script>