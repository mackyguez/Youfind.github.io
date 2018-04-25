<?php  
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');


	if(isset($_SESSION['customer_user_id'])) {
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
	}

	if(isset($_SESSION['seller_user_id'])) {
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
	}
	//print_r($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="wallet.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="nav-bar-wrapper">
				<p class="user-name"><?php echo $result[0]['first_name']. ' '.$result[0]['last_name']; ?></p>
				<p class="user-verification">Verified</p>
				<p class="user-navigation" onclick="location.href='customer-profile.php'">Dashboard</p>
				<p class="user-navigation" style="font-weight: bold; color: #125965;">YouWallet</p>
				<p class="user-navigation" onclick="location.href='cart.php'">Shopping Cart</p>
				<p class="user-navigation" onclick="location.href='wishlist.php'" style="display: none;">Wishlist</p>
				<p class="user-navigation" onclick="location.href='settings.php'">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<div class="wallet-wrapper">
					<center>
						<p class="wallet-balance">Your YouWallet Balance</p>
						<p class="balance-amount" id="balance_amount" style="min-height: 73px;"></p>
						<p class="currency">Currency: &#8369; (Pesos)</p>
					</center>

					<div class="cash-in-btn-wrapper"><button class="cash-in-btn" id="cash_in_btn">Cash in</button></div>
					
					<div id="cash_in" class="cash-in-class">
						<!--<p class="successful">You have successfully added &#8369; 100.00 on your account</p>-->
						<div class="input-wrapper">
							<p class="code-instruction">Enter the 8-digit code found on your Youfind load card.</p>
							<input type="text" name="code" placeholder="Ex. Y0UF1ND8" class="cash-in-input" id="input_code">
							<button class="enter-btn" id="btn_enter">Enter</button>
							<p><b>Instruction:</b></p>
							<p>1. Scratch Your YouFind Load card.</p>
							<p>2. Enter the 8-character given to your Load card.</p>
							<p>3. Please click "Enter" to continue the process and wait for the confirmation</p>
							<p></p>
						</div>
						<div class="input-sample">
							<img src="images/loadcard-sample.png" width="100%" height="200px">
						</div>
					</div>
				</div>

				<div class="points-wrapper" style="width: 100%;">
					<p class="points-title">Points-and-Redeem</p>

					<div class="accumulated-wrapper" style="margin: 0 auto;">
						<p class="accumulated-title">Accumulated Points</p>
						<center><p class="accumulated-points" id="points">0.00</p>
							<p class="points-bottom">Total Points</p></center>

						<div class="redeem-btn-wrapper" id="redeem_btn"><button class="redeem-btn" id="redeem">Redeem</button></div>

						<div id="redeem_div" style="display: none; padding: 20px 0 0 20px; border-top: 1px solid #b3b3b3;">
							<p>How many points do you want to redeem?</p>
							<input type="number" name="code" placeholder="Enter number of points" class="cash-in-input" id="redeem_quantity" max="500">
							<button class="redeem-action-btn" id="redeem_test">Redeem</button>
						</div>

						<p class="point-rule">
							Note:<br><br>
							1. You will receive one (1) point for every &#8369; 50.00 worth of purchase or 10% rebate.<br><br>
							2. One (1) point is equal to one (1) peso.<br><br>
							3. Points can only be converted to YouMoney.<br><br>
						</p>
					</div>

					<div class="recent-transactions-wrapper" style="display: none;">
						<p class="recent-title">Recent Transactions</p>
						<table width="100%">
							<tr style="background-color: #ececec;">
								<th width="180px" style="padding: 8px;">Transaction Date
								<th width="150px" style="padding: 8px;">Total Purchased
								<th width="150px" style="padding: 8px;">Points Accumulated
							</tr>
							<tr style="border-bottom: 1px solid #b3b3b3;">
								<td style="padding: 8px;">December 28, 2017
								<td style="padding: 8px;">P300.00
								<td style="padding: 8px;">6.00
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>

		<div class="footer-wrapper">
			<?php include('footer1.php');?>
		</div>

</body>

<script>
		
	var cashInBtn = document.getElementById('cash_in_btn');
	var redeemBtn = document.getElementById('redeem_btn');
	var cash_in = document.getElementById('cash_in');
	var redeem_div = document.getElementById('redeem_div');

	cashInBtn.onclick = function() {
		cash_in.style.display = 'block';
		cashInBtn.style.display ='none';

	}
	redeemBtn.onclick = function() {
		redeem_div.style.display = 'block';
		redeemBtn.style.display ='none';
	}

	$(document).ready(function() {
		load_cart_counter();
		load_cart_total();
		function load_cart_counter() {
				var action = 'load_cart_counter';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_counter').html(data);
					}
				})
			}
			function load_cart_total() {
				var action = 'load_cart_total';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#cart_total').html(data);
						$('#sub_amount').html(data);
					}
				})
			}

			load_wallet();
			function load_wallet() {
				var action = 'load_wallet';
				$.ajax({
					url:'page-actions/wallet-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#balance_amount').html(data);
					}
				})
			}

			$(document).on('click', '#btn_enter', function() {
				var code = $('#input_code').val();
				var action = 'get_code';
				$.ajax({
					url:'page-actions/load-card-code-action.php',
					method:'POST',
					data:{
						code:code,
						action:action
					},
					success:function(data) {
						if(data == 'Done') {
							load_wallet();
						}
						else {
							alert(data);
						}
					}
				})
			});

			load_points();
			function load_points() {
				var action = 'load_points';
				$.ajax({
					url:'page-actions/load-card-code-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#points').html(data);
					}
				})
			}

			$(document).on('click', '#redeem_test', function() {
				var action = 'redeem_points';
				var redeem_quantity = $('#redeem_quantity').val();
				$.ajax({
					url:'page-actions/load-card-code-action.php',
					method:'POST',
					data:{
						action:action,
						redeem_quantity:redeem_quantity
					},
					success:function(data) {
						if(data == 'Done') {
							$('#redeem_quantity').val('');
							load_points();
							load_wallet();

						}
						else {
							alert(data);
						}
					}
				})
			});


		$(document).on('click', '.header-wishlist', function() {
			window.location = 'wishlist.php';
		});
		$(document).on('click', '#header_my_prof_link', function() {
			if('<?php echo $result[0]['user_type'] ?>' == 'Customer') {
				window.location = 'customer-profile.php';
			}
			else if('<?php echo $result[0]['user_type'] ?>' == 'Seller'){
				window.location = 'seller-profile.php';
			}
		});


		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location = 'cart.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			window.location = 'settings.php';
		});

	});


</script>
</html>