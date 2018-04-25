<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="header1.css">

<div class="header-holder">
	<div class="header-links-top">
		<div class="text-links-left">
			<p class="youfind-user">Welcome visitor!</p>
			<a href="" class="login-link text-links">Login</a>
			<a href="" class="create-link text-links">Create an account</a>
			<a href="" class="sell-link text-links">Sell on YouFind</a>
		</div>
		<div class="text-links-right">
			<a href="" class="myaccount-button">My Account</a>
			<a href="" class="youwallet-link text-links">YouWallet</a>
			<a href="" class="wishlist-link text-links">Wishlist</a>
		</div>
	</div>
	<div class="header-bottom">
		<div class="header-image-holder-left">
			<img src="images/logo.png" width="100%" height="100%">
		</div>
		<div class="cart-wrapper">
			<p class="shopping-cart-text">Shopping Cart</p>
			<p class="cart-counter">0 items</p>
			<p class="divider">|</p>
			<p class="youwallet-money">P 0.00</p>

		</div>
		<img src="images/add-to-cart.png" class="add-to-cart-img">
		<div class="activities-right">
				<select name="select-search" class="form-style" id="select_search">
						<?php $array = array('Products', 'Services');
								foreach($array as $row) {
									echo '<option name="$array">'.$row.'</option>';
								}
						 ?>
				</select>
				<input type="search" name="search" id="search" class="search-style">
		</div>

	</div>
</div>
