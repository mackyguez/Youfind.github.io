<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="new-header-offline-styles.css">

<div class="header-holder">
	<div class="header-links-top">
		<div class="text-links-left">
			<p class="youfind-user">Welcome visitor!</p>
			<a href="login.php" class="login-link text-links">Login</a>
			<a href="create_account.php" class="create-link text-links">Create an account</a>
			<a href="register-seller.php" class="sell-link text-links">Sell on YouFind</a>
		</div>
		<div class="text-links-right">
			<button href="" class="myaccount-button">My Account</button>
			<a href="" class="youwallet-link text-links">YouWallet</a>
			<a href="" class="wishlist-link text-links">Wishlist</a>
		</div>
	</div>
	<div class="header-bottom">
		<div class="header-image-holder-left">
			<img src="images/logo.png" width="100%" height="100%">
		</div>
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
