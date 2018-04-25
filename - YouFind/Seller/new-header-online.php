<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		@session_start();
		if(isset($_SESSION['seller_user_id'])) {
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
			<p class="youfind-user">Welcome <?php echo @$row[0]['first_name']; ?>!</p>
			<!--
				<a href="" class="sell-link text-links">Sell on YouFind</a> 
			-->
		</div>
		<div class="text-links-right">
			<div class="dropdown">
			<button type="button" class="dropbtn" onclick="myFunction()">My Account</button>
			<div class="dropdown-content" id="myDropdown">
      			<a href="#">My Profile</a>
      			<a href="#">Settings</a>
      			<a href="../logout.php">Logout</a>
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

	</script>