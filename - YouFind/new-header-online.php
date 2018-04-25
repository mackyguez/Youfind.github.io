<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	
	if(isset($_SESSION['customer_user_id'])) {
		$customer_user_id = $_SESSION['customer_user_id'];
		$query = 'SELECT DISTINCT * FROM youfind_user WHERE user_id = '.$customer_user_id.'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$row = $statement->fetchAll();
	}
	else if(isset($_SESSION['seller_user_id'])) {
		$seller_user_id = $_SESSION['seller_user_id'];
		$query = 'SELECT DISTINCT * FROM youfind_user WHERE user_id = '.$seller_user_id.'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$row = $statement->fetchAll();
	}
 ?>
<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="new-header-styles.css">

<div class="header-holder">
	<div class="header-links-top">
		<div class="text-links-left">
			<p class="youfind-user" id="youfind_user" style="cursor: pointer;">Welcome <?php echo @$row[0]['first_name']; ?>!</p>
			<?php 	if(!isset($_SESSION['seller_user_id'])) { ?>
						<a href="create_account.php" class="sell-link text-links">Sell on YouFind</a>
			<?php	}	?>

		</div>
		<div class="text-links-right">
			<div class="dropdown">
			<button type="button" class="dropbtn" onclick="myFunction()" id="dropbtn">My Account</button>
			<div class="dropdown-content" id="myDropdown">
      			<a href="#">My Profile</a>
      			<a href="#">Settings</a>
      			<a href="logout.php">Logout</a>
    		</div>
			</div>
			<a href="" class="youwallet-link text-links">YouWallet</a>
			<a href="" class="wishlist-link text-links">Wishlist</a>
		</div>
	</div>
	<div class="header-bottom">
		<div class="header-image-holder-left">
			<img src="images/logo.png" width="100%" height="100%">
		</div>
		<?php 
				if(isset($_SESSION['seller_user_id'])) { ?>
					<div class="cart-wrapper">
						<p class="shopping-cart-text">Shopping Cart</p>
						<div class="counter-item-holder">
							<p class="cart-counter1" id="cart_counter"></p><p class="cart-counter">item/s</p>
							<p class="divider">|</p>
							<p class="youwallet-money" id="cart_total">&#8369; 0.00</p>
						</div>
					</div>
					<img src="images/add-to-cart.png" class="add-to-cart-img">

		<?php 	}  ?>
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
<script>
	function myFunction() {
    	document.getElementById("myDropdown").classList.toggle("show");
	}

	window.onclick = function(e) {
  		if (!e.target.matches('.dropbtn')) {
    		var myDropdown = document.getElementById("myDropdown");
	      	if (myDropdown.classList.contains('show')) {
	        	myDropdown.classList.remove('show');
	      	}
  		}
	}
	</script>
	<?php 
			if(isset($_SESSION['customer_user_id'])) { ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$(document).on('click', '#youfind_user', function() {
							window.location = 'user_profile-customer-logged-in.php';
						});
					});
				</script>
	<?php	}
	 ?>