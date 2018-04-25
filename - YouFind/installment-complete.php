<?php 
	$connect = new PDO('mysql:host=localhost;dname=youfind_database;', 'root', '');
	session_start();
	//print_r($_SESSION);
	$fetchCart = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$fetchCartStatement = $connect->prepare($fetchCart);
	$fetchCartStatement->execute();
	$fetchResult = $fetchCartStatement->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="complete.css">
	<link rel="stylesheet" type="text/css" href="print_style.css">

	<style type="text/css">
		
		@media print{
			.non-printable{
				display: none;
			}
			.printable {
				display: block;
				width: 100%;
			}
			a[href]:after {
   				content: " (" attr(href) ")";
			}
		}
	</style>

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="progress-bar-wrapper" style="width: 14%; margin: 30px 0 0 70px; float: left;">
				
				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">1</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Shopping Cart</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">2</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Address</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">3</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Payment</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid #125965; width: 30px; height: 30px; overflow: hidden; background-color: #93deec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; font-weight: bold;">4</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #125965; font-weight: bold;">Complete</p></div>
				</div>
			</div>

			<div class="complete-wrapper" id="print_div">

				<div class="congratulation-wrapper">
					<img src="images/congrats.png" class="congrats-icon non-printable">
					<p class="congrats-title non-printable">Congratulations!</p><br><br><br>
					<p class="order-number-title">Order Number</p>
					<p class="order-number"><?php echo $_SESSION['installment_order_number']; ?></p>
				</div>

				<p class="complete-txt">You have successfully ordered the following items:</p>
				<div class="order-summary-wrapper">
					<p class="order-summary-title printable order-print">Order Summary</p>
					<button class="print-wrapper non-printable" onclick="printDiv('print_div')" style="background-color: white;
														border: none; 
														border-bottom: 1px solid #b3b3b3;">
						<img src="images/printer-icon.png" class="print-icon">
						<p class="print">Print</p>
					</button>


					<div class="left-side non-printable">
						<div class="side-container">
							<div class="ship-add-wrapper">
								<p class="add-owner"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></p>
								<p class="ship-add"><?php echo $_SESSION['add_street'].' '.$_SESSION['add_brgy']; ?><br><?php echo $_SESSION['add_city'].' '.$_SESSION['add_province']; ?></p>
								<p class="ship-add" style="margin-bottom: 10px;"><?php echo $_SESSION['contact_number']; ?></p>
							</div>

							<div class="ship-add-wrapper">
								<p class="add-owner" style="margin-top: 20px;">Express Delivery</p>
								<p class="ship-add">&#8369; <?php 
									if($_SESSION['delivery_option'] == 'standard') {
										echo '0.00';
									}
									else if($_SESSION['delivery_option'] == 'express') {
										echo '29.00';
									}
								 ?></p>
								<p class="ship-add" style="margin-bottom: 10px;">Date: Tues 06 March 2018</p>
							</div>
						</div>

						<button class="cont-btn" onclick="location.href='new-index.php'">Continue Shopping</button>
					</div>


					<div class="order-table-wrapper printable">
						<!--item-header-->
						<p class="item-header">Items</p>
						<p class="qty-header">Quantity</p>
						<p class="price-header">Price</p><br>
						<hr>

						<div id="item_holder"></div>

						<hr>

						<div class="total-wrapper">
							<div class="subtotal-wrapper">
								<p class="subtotal-title">Subtotal</p>
								<p class="subtotal-amount"><?php echo "&#8369; " .number_format($_SESSION['total_amount'],2); ?></p>
							</div>
							<div class="subtotal-wrapper">
								<p class="subtotal-title">Shipping Fee</p>
								<p class="subtotal-amount">&#8369; <?php 
									if($_SESSION['delivery_option'] == 'standard') {
										echo '0.00';
									}
									else if($_SESSION['delivery_option'] == 'express') {
										echo '29.00';
									}
								 ?></p>
							</div>
						</div>

							<div class="total-holder">
								<p class="total-title">SUBTOTAL</p>
						<p class="total-amount" style="text-decoration: line-through;">&#8369; 
							<?php 
								if($_SESSION['delivery_option'] == 'standard') {
									echo number_format($_SESSION['total_amount'],2);
								}
								else if($_SESSION['delivery_option'] == 'express') {
									echo number_format(($_SESSION['total_amount']+29),2);
								}
							 ?>	
						</p>
						<p class="total-title">Amount to pay</p>
						<p class="total-amount"><?php echo number_format($_SESSION['installment_amount_to_pay'],2); ?></p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-wrapper">
			<?php include('footer1.php');?>
		</div>
</body>
</html>
<script>
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
							}
						})
				}

				load_products();
				function load_products() {
					var action = 'load_products';
					$.ajax({
						url:'page-actions/complete-page-action.php',
						method:'POST',
						data:{action:action},
						success:function(data) {
							$('#item_holder').html(data);
						}
					})
				}

				$(document).on('click', '#header_logout_link', function() {
					window.location = 'logout.php';
				});
				$(document).on('click', '#header_my_prof_link', function() {
					window.location = 'customer-profile.php';
				});
				$(document).on('click', '#header_settings_link', function() {
					window.location = 'settings.php';
				});


});











function myFunction() {
		document.getElementById("header_my_acc_dropdown").classList.toggle("show");
	}
	

	function printDiv(print) {
      	var printContents = document.getElementById(print).innerHTML;     
   		var originalContents = document.body.innerHTML;       
   		document.body.innerHTML = printContents;      
   		window.print();      
   		document.body.innerHTML = originalContents;
   }
</script>