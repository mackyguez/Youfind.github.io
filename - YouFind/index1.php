<?php 
	session_start();
	//print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="index-styles1.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header-online.php'); ?>
		</div>

		<div class="carousel-wrapper">
			<img src="images/Welcome1.png" width="100%" height="100%">
		</div>

		<div class="content-wrapper">
			
		<div class="category-wrapper">
			<!-- CATEGORIES -->
			<div class="product-wrapper">Products</div>
			<div class="category-container"><a href="#" style="color: black;">Gadgets</a></div>
			<div class="category-container"><a href="#" style="color: black;">Laptops & Computers</a></div>
			<div class="category-container"><a href="#" style="color: black;">Camera, Photos & Videos</a></div>
			<div class="category-container"><a href="#" style="color: black;">Headphones & Speakers</a></div>
			<div class="category-container"><a href="#" style="color: black;">Computer Parts</a></div>
			<div class="category-container"><a href="#" style="color: black;">Storage Devices</a></div>
			<div class="category-container"><a href="#" style="color: black;">Accessories</a></div>
			<div class="category-container"><a href="#" style="color: black;">Drones</a></div>
			<div class="category-container"><a href="#" style="color: black;">Home Entertainment</a></div>
			<br><br><br>
			<div class="product-wrapper">Services</div>
			<div class="category-container"><a href="#" style="color: black;">Cellphone Repairs</a></div>
			<div class="category-container"><a href="#" style="color: black;">Update & Upgrade</a></div>
			<div class="category-container"><a href="#" style="color: black;">Installation</a></div>
			<div class="category-container"><a href="#" style="color: black;">Computer Repairs</a></div>
			<br><br>
			<div class="ad-container">
				<img src="images/ad-1.png" width="100%" height="100%">
			</div>
			<br><br>
			<!-- ITEM-OF-THE-WEEK -->
			<p class="item-week-title">Item of the Day</p>
			<div class="item-week-wrapper">
				<?php include('item-1.php');?>
			</div>
		</div>


		<!-- NEW PRODUCTS -->
		<div class="item-wrapper">
			<div class="new-item-wrapper">
				<p class="index-title">New Products</p>
				<button class="view-more">Show all products</button>
				<div class="item-container" id="item_container"></div>
			</div>
			<!-- PRODUCST ON SALE -->
			<div class="sale-item-wrapper">
				<p class="sale-title">Products On Sale</p>
				<div style="float: left;"><?php include('try.html');?></div>
				<button class="view-more-sale" >Show all products</button>
				<div class="item-container">
					<div class="item-1">
						<?php include('item-2.php');?>
					</div>

					<div class="item-1">
						<?php include('item-2.php');?>
					</div>

					<div class="item-1">
						<?php include('item-2.php');?>
					</div>

					<div class="item-1" style="border-right: none;">
						<?php include('item-2.php');?>
					</div>
				</div>
			</div>


			<!-- PRODUCTS UNDER 200.00 -->
			<div class="sale-item-wrapper">
			<div class="new-item-wrapper">
				<p class="index-title">Products Under 200</p>
				<button class="view-more">Show all products</button>
				<div class="item-container">
					<div class="item-1">
						<?php include('item-1.php');?>
					</div>

					<div class="item-1">
						<?php include('item-1.php');?>
					</div>

					<div class="item-1">
						<?php include('item-1.php');?>
					</div>

					<div class="item-1" style="border-right: none;">
						<?php include('item-1.php');?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

		<div class="footer-wrapper">
			<?php include('footer.php');?>
		</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {

		load_products();
		function load_products() {
			var action = 'load_products';
			$.ajax({
				url:'page-actions/index-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#item_container').html(data);
				}
			})
		}
		
		$(document).on('click', '#item_photo', function() {
			var action = 'view_item';
			var item_id = $(this).data('item_product_id');
			$.ajax({
				url:'page-actions/index-product-view-action.php',
				type:'POST',
				data:{action:action,item_id:item_id},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'product1.php';
					}
				}
			})


		});
		$(document).on('click', '#add_to_cart', function() {
			var action = 'load_cart_counter';
			var product_id = $(this).data('add_to_cart_id');
			$.ajax({
				url:'page-actions/add-to-cart-action.php',
				method:'POST',
				data:{
					action:action,
					product_id:product_id
				},
				success:function(data) {
					alert(data);
				}
			})
		});
		$(document).on('click', '#add_to_wishlist', function() {
			var add_to_wishlist = $(this).data('add_to_wishlist_id');
			alert(add_to_wishlist);
		});
	});
</script>