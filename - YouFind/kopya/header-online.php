<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header-styles.css">
</head>
<body>
	<div class="whole-wrapper">
		<div class="top-header-wrapper">
			<div class="top-header-left">
				
			<p class="top-text">Welcome Ariel!</p>
			<p class="sell"><a href="seller-register">Sell on YouFind</a></p>
			
			</div>

			<div class="top-header-right">
				
			<p class="login"><a href="login.php">Wishlist</a></p>
			<p class="register"><a href="login.php">YouWallet</a></p>
			<div class="dropdown">
    			<button class="dropbtn" onclick="myFunction()">My Account</button>
   	 		<div class="dropdown-content" id="myDropdown">
      			<a href="#">My Profile</a>
      			<a href="#">Settings</a>
      			<a href="#">Logout</a>
    		</div>
  			</div> 
			</div>
		</div>

				<div class="middle-header-wrapper">
			<div class="logo-wrapper"><img src="images/logo.png"></div>

			<div class="search-wrapper">
				<div class="selection-search-wrapper">
					<select name="select-search" class="form-style" id="select_search">
						<?php $array = array('Products', 'Services');
								foreach($array as $row) {
									echo '<option name="$array">'.$row.'</option>';
								}
						 ?>
					</select>
				</div>
				<div class="search-bar-wrapper"><input type="search" name="search" id="search" class="search-style"></div>
				<div class="cart-wrapper">
					<div class="cart-icon">
						<img src="images/add-to-cart.png" width="100%" height="100%">
					</div>
					<div class="cart-counter">
						<p>Shopping Cart</p>
						<p class="item-counter" id="item_counter"></p><p class="item-text">items</p>
						<p class="total-counter">P 0.00</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>

</body>
</html>
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