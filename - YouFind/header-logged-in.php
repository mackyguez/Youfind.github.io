<?php 
/*
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		@$customer_register_last_id = $_SESSION['customer_register_last_id'];
		$first_name = '';
		$last_name = '';
		$add_city = '';
		$query = '
			SELECT * FROM youfind_user where user_id = :user_id
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'		=> $customer_register_last_id
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$add_city = $row['add_city'];
			$profile_picture = $row['profile_picture'];
		}
		*/
 ?>
<link rel="stylesheet" type="text/css" href="header-logged-in.css">

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
			<div class="sell-on-youfind-wrapper"><a href="register-seller-logged-in.php" class="text-links">Sell on youfind</a></div>
			<div class="logout-holder"><a href="logout.php" class="text-links logout">Logout</a></div>
			<div class="name-logo-holder"><a href="user_profile-customer-new-registry.php" class="text-links name" id="username">Hello <?php echo @$first_name; ?></a>
			<img src="images/user-white.png" class="user-icon">
			</div>
		</div>
	<div class="bottom-nav">
		<div class="logo-wrapper"><img src="images/logo.png" class="youfind-logo"></div>
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