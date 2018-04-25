<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="index-styles.css">
</head>
<body>
	<div class="whole-wrapper">
		<div class="header-holder">
			<?php 
				if(isset($_SESSION['seller_user_id'])) {
					include('header-seller-logged-in.php');
				}
				else if (isset($_SESSION['customer_user_id'])) {
					include('header-customer-logged-in.php');
				}
			 ?>
			 	
		 </div>

		<div class="middle-wrapper">
			<div class="index-content-left">a</div>
			<div class="index-content-right">
				<div class="index-product-text-holder">Products</div>
				<div class="index-products" id="index_products"></div>
			</div>
		</div>


		<div class="footer-holder">
			<?php include 'footer.php'; ?>
		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function() {

		load_products();
		function load_products() {
			var action = 'load_products';
			$.ajax({
				url:'index-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#index_products').html(data);
				}
			})
		}
	});
</script>