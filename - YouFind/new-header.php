<?php @session_start(); ?>
<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="new-header.css">

<style type="text/css">
	<?php include('new-header.css'); ?>
</style>

<body id="body">
	<?php if(!isset($_SESSION['customer_user_id']) && !isset($_SESSION['seller_user_id'])) { ?>
				<div class="header-holder">
					<div class="header-top">
						<div class="header-left">
							<p class="header-welcome">Welcome visitor!</p>
							<a class="header-login" href="#" id="header_login">Login</a>
							<a class="header-create-account" href="#" id="header_create_account">Create an account</a>
							<button class="header-sell" href="#" id="header_sell_link">Sell on YouFind</button>
						</div>
						<div class="header-right">
							<button class="header-account-btn" id="header_account_btn">My Account</button>
							<div class="header-my-acc-dropdown" id="header_my_acc_dropdown">
				      			<a href="#" class="header-my-prof-link" id="header_my_prof_link">My Profile</a>
				      			<a href="#" class="header-settings-link" id="header_settings_link">Settings</a>
				      			<a href="#" class="header-logout-link" id="header_logout_link">Logout</a>
    						</div>
							<a href="#" class="header-youwallet">YouWallet</a>
							<a href="#" class="header-wishlist" style="display: none;">Wishlist</a>
						</div>	
					</div>
					<div class="header-bottom">
						<div class="header-bottom-left">
							<div class="header-image-holder" id="header_logo" style="cursor: pointer;"><img src="images/logo.png" class="header-image"></div>
						</div>
						<div class="header-bottom-right">
							<div class="header-shop-cart-texts-holder" style="display: none;">
								<div class="header-shop-cart-text">Shopping Cart</div>
							</div>
							<div class="header-shop-cart-holder" style="display: none;">
								<div class="header-shop-cart-image-holder">
									<img src="images/add-to-cart.png" class="header-shop-cart-image">
								</div>
							</div>
							<div class="header-search-activity-holder" style="display: none;">
								<select name="header-select-search" class="header-select-search" id="header_select_search">
									<?php $array = array('Products', 'Services');
											foreach($array as $row) {
												echo '<option name="$array">'.$row.'</option>';
											}
									 ?>
								</select>
								<input type="search" name="header_search" id="header_search" class="header-search">
							</div>
							<div class="header-cart-counter-and-total-holder" style="display: none;">
								<p class="header-cart-counter" id="cart_counter">0</p>
								<p class="header-item-text">item/s</p>
								<p class="header-cart-total">&#8369; 0.00</p>
							</div>
						</div>
					</div>
				</div>
		<?php }
				else if(isset($_SESSION['customer_user_id'])) { ?>
				<?php 
					$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
					$query =  'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
					$statement = $connect->prepare($query);
					$statement->execute();
					$result = $statement->fetchAll();
				?>	
					<div class="header-holder">
					<div class="header-top">
						<div class="header-left">
							<p class="header-welcome">Welcome <?php echo @$result[0]['first_name']; ?>!</p>
								<!--
							<a class="header-login" href="#">Login</a>
							<a class="header-create-account" href="#" id="header_create_account">Create an account</a>
								-->
							<a class="header-sell" href="#" id="header_sell_link">Sell on YouFind</a>
						</div>
						<div class="header-right">
							<button class="header-account-btn" id="header_account_btn" onclick="myFunction()">My Account</button>
							<div class="header-my-acc-dropdown" id="header_my_acc_dropdown">
				      			<a href="#" class="header-my-prof-link" id="header_my_prof_link">My Profile</a>
				      			<a href="#" class="header-settings-link" id="header_settings_link">Settings</a>
				      			<a href="#" class="header-logout-link" id="header_logout_link">Logout</a>
    						</div>
							<a href="wallet.php" class="header-youwallet">YouWallet</a>
							<a class="header-wishlist" style="cursor: pointer;">Wishlist</a>
						</div>	
					</div>
					<div class="header-bottom">
						<div class="header-bottom-left">
							<div class="header-image-holder" id="header_logo" style="cursor: pointer;"><img src="images/logo.png" class="header-image"></div>
						</div>
						<div class="header-bottom-right">
							<div class="header-shop-cart-texts-holder">
								<div class="header-shop-cart-text">Shopping Cart</div>
							</div>
							<div class="header-shop-cart-holder" id="header_shop_cart_holder" style="cursor: pointer;">
								<div class="header-shop-cart-image-holder">
									<img src="images/add-to-cart.png" class="header-shop-cart-image">
								</div>
							</div>
							<div class="header-search-activity-holder">
								<select name="header-select-search" class="header-select-search" id="header_select_search" >
									<?php $array = array('All', 'Gadgets', 'Laptops', 'Cameras', 'Headphones', 'Storage');
											foreach($array as $row) {
												echo '<option name="$array">'.$row.'</option>';
											}
									 ?>
								</select>
								<input type="search" name="header_search" id="header_search" class="header-search">
							</div>
							<div class="header-cart-counter-and-total-holder">
								<p class="header-cart-counter" id="cart_counter">0</p>
								<p class="header-item-text">item/s</p>
								<p class="header-cart-total" id="cart_total">&#8369; 0.00</p>
							</div>
						</div>
					</div>
					<div id="search_success" class="search-success">asd</div>
				</div>
		<?php	} 
				else if(isset($_SESSION['seller_user_id'])) {	?>
					<?php 
					$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
					$query =  'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
					$statement = $connect->prepare($query);
					$statement->execute();
					$result = $statement->fetchAll();
				?>	
					<div class="header-holder">
					<div class="header-top">
						<div class="header-left">
							<p class="header-welcome">Welcome <?php echo @$result[0]['first_name']; ?>!</p>
								<!--
							<a class="header-login" href="#">Login</a>
							<a class="header-create-account" href="#" id="header_create_account">Create an account</a>
								-->
							<a class="header-sell" href="#" id="header_sell_link" style="display: none;">Sell on YouFind</a>
						</div>
						<div class="header-right">
							<button class="header-account-btn" id="header_account_btn" onclick="myFunction()">My Account</button>
							<div class="header-my-acc-dropdown" id="header_my_acc_dropdown">
				      			<a href="#" class="header-my-prof-link" id="header_my_prof_link">My Profile</a>
				      			<a href="#" class="header-settings-link" id="header_settings_link">Settings</a>
				      			<a href="#" class="header-logout-link" id="header_logout_link">Logout</a>
    						</div>
							<a href="#" class="header-youwallet">YouWallet</a>
							<a href="#" class="header-wishlist" style="display: none;">Wishlist</a>
						</div>	
					</div>
					<div class="header-bottom">
						<div class="header-bottom-left">
							<div class="header-image-holder" id="header_logo" style="cursor: pointer;"><img src="images/logo.png" class="header-image"></div>
						</div>
						<div class="header-bottom-right">
							<div class="header-shop-cart-texts-holder" style="display: none;">
								<div class="header-shop-cart-text">Shopping Cart</div>
							</div>
							<div class="header-shop-cart-holder" id="header_shop_cart_holder" style="cursor: pointer; display: none;">
								<div class="header-shop-cart-image-holder">
									<img src="images/add-to-cart.png" class="header-shop-cart-image">
								</div>
							</div>
							<div class="header-search-activity-holder" style="display: none;">
								<select name="header-select-search" class="header-select-search" id="header_select_search">
									<?php $array = array('Products', 'Services');
											foreach($array as $row) {
												echo '<option name="$array">'.$row.'</option>';
											}
									 ?>
								</select>
								<input type="search" name="header_search" id="header_search" class="header-search">
							</div>
							<div class="header-cart-counter-and-total-holder" style="display: none;">
								<p class="header-cart-counter" id="cart_counter">0</p>
								<p class="header-item-text">item/s</p>
								<p class="header-cart-total" id="cart_total">&#8369; 0.00</p>
							</div>
						</div>
					</div>
				</div>
		<?php 	} ?>
</body>

<script type="text/javascript">
	function myFunction() {
		document.getElementById("header_my_acc_dropdown").classList.toggle("show");
	}
	window.onclick = function(e) {
  		if (!e.target.matches('#header_account_btn')) {
    		var myDropdown = document.getElementById("header_my_acc_dropdown");
	      	if (myDropdown.classList.contains('show')) {
	        	myDropdown.classList.remove('show');
	      	}
  		}
	}
	$(document).on('click', '#header_logo', function() {
		window.location = 'new-index.php';
	});

</script>



