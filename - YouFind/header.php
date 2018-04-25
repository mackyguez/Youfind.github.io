<link rel="stylesheet" type="text/css" href="header.css">

<div class="top-nav">
	<div class="nav-left">
		<div class="mobile-icon-text">
			<div class="mobile-icon-wrapper"><img src="images/phone-icon.png" class="mobile-icon"></div>
			<div class="mobile-text-wrapper"><p class="text-links">09993114949</p></div>
		</div>
		<div class="mail-icon-text">
			<div class="mail-icon-wrapper"><img src="images/mail-icon.png" class="mail-icon"></div>
			<div class="mail-text-wrapper"><a href="#" class="text-links">youfind@gmail.com</a></div>
		</div>
	</div>
	<div class="nav-right">
		<div class="sell-on-youfind-wrapper"><a href="register-seller.php" class="text-links">Sell on youfind</a></div>
		<img src="images/user-white.png" class="user-icon">
		<div class="login-text-wrapper"><a href="login.php" class="text-links" id="username">Login</a></div>
		<img src="images/register-icon.png" class="kandado-icon">
		<div class="create-account-text-wrapper" id="create_account"><a href="create_account.php" class="text-links create-text">Create an Account</a>
		</div>
	</div>
	<div class="bottom-nav">
		<div class="logo-left">
			<div class="logo-wrapper"><img src="images/logo.png" class="logo"></div>
		</div>
		<div class="search-and-users-activity-right">
			<div class="selection-search-wrapper">
					<select name="select-search" class="form-control" id="select_search">
						<?php $array = array('Products', 'Services');
								foreach($array as $row) {
									echo '<option name="$array">'.$row.'</option>';
								}
						 ?>
					</select>
			</div>
			<div class="search-bar-wrapper"><input type="search" name="search" id="search" class="form-control"></div>
			<div class="wishlist-wrapper"><img src="images/wishlist-white.png" class="heart-icon"></div>
			<div class="cart-wrapper"><img src="images/cart.png" class="cart-icon">
				<div align="right" class="cart-counter-wrapper"><div class="text-links cart-counter" id="cart_counter"></div></div>
			</div>
			<div class="youwallet-wrapper"><p class="text-links ywallet-text">$100.00</p></div>
			<div id="search_success"></div>
		</div>
	</div>
</div>