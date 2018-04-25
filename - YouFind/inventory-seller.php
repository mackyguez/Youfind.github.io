<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

/*
	$selectProducts = 'SELECT * FROM index_newsfeed_tbl WHERE user_id = '.$_SESSION['seller_user_id'].'';
	$selectStatement = $connect->prepare($selectStatement);
	$selectStatement->execute();
	$selectResult = $selectStatement->fetchAll();
*/

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="inventory-seller.css">

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
				<p class="user-navigation" onclick="location.href='seller-profile.php'">Dashboard</p>
				<p class="user-navigation" style="font-weight: bold; color: #125965;">Inventory Management</p>
				<p class="user-navigation" onclick="location.href='seller-settings.php'">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<div style="width: 100%; overflow: hidden;">
				<button class="post-item-btn" id="post_item_btn">Post New Item</button>
				<div class="search-wrapper">
					<select name="pick_search" id="pick_search" class="pick-search">
						<?php  
						$actions = array('All','Laptops & Computers','Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Mobile Phones');
							foreach ($actions as $choice) {
								echo "<option name='$choice'>".$choice."</option>";
							}
						?>
					</select>
					<input type="text" name="search" class="searchbar" placeholder="Search"  id="search_user">
					<button style="height: 24px; margin: 0; padding: 2px 10px;">Search</button>
				</div>
				</div>
				<div class="table-wrapper">
					<table id="fetch_seller_product"></table>
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
					$('#fetch_seller_product').html(data.output);
				}
			})
		}


		$(document).on('click', '#product_name', function() {
			var action = 'view_product';
			var product_id = $(this).data('product_id');
				$.ajax({
					url:'page-actions/inventory-seller-action.php',
					method:'POST',
					data:{
						action:action,
						product_id:product_id
					},
					success:function(data) {
						if(data == 'Done') {
							window.location = 'product-seller-view.php';
						}
					}
				})
		});

		$(document).on('click', '#post_item_btn', function() {
			var action = 'check_user';
			$.ajax({
				url:'page-actions/inventory-seller-action.php',
				method:'POST',
				data:{
					action:action
				},
				success:function(data) {
					if(data == 'verified') {
						window.location = 'post-product.php';
					}
					else if(data == 'not verified') {
						alert('Posting of product is not allowed yet unless you are Verified Seller.');
					}
					else if(data == 'banned') {
						alert('Your account has been banned.');
					}
				}
			})
		});

	});
</script>