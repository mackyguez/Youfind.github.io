<?php 
	session_start();
	//print_r($_SESSION);
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	$fetchCart = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].' AND product_seller_shopname = "YouFind Corporation"';
	$fetchCartStatement = $connect->prepare($fetchCart);
	$fetchCartStatement->execute();
	$fetchCartResult = $fetchCartStatement->fetchAll();
	$fetchCartCount = $fetchCartStatement->rowCount();
	$totalForYFprod = 0;
		for($f=0; $f<$fetchCartCount; $f++) {
			$totalForYFprod = $totalForYFprod + $fetchCartResult[$f]['product_price'] * $fetchCartResult[$f]['product_quantity'];
		}

		$price = $totalForYFprod;
		$downPayment = $price*0.20;
		$_3mosTotal = ($price - $downPayment)/3;
		$_6mosTotal = ($price - $downPayment)/6;
		$_12mosTotal = ($price - $downPayment)/12;
		$_18mosTotal = ($price - $downPayment)/18;
		$_24mosTotal = ($price - $downPayment)/24;

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="order-payment.css">

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
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid #125965; width: 30px; height: 30px; overflow: hidden; background-color: #93deec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; font-weight: bold;">3</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #125965; font-weight: bold;">Payment</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">4</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Complete</p></div>
				</div>
			</div>

			<div class="whole-payment-wrapper">
				<div class="payment-holder">
					<p class="choose-payment">Choose Payment Method</p>
					<div class="payment-wrapper">
						<button class="payment-btn" id="cash_on_delivery_btn" autofocus="TRUE">Cash on Delivery</button>
						<button class="payment-btn" id="youmoney_btn">YouMoney</button>
						<button class="payment-btn" id="installment_btn">YouFind Installment</button>
					</div>

					<div id="cash_on_delivery" style="display: block;">
						<p class="cash-txt">Pay using our Cash On Delivery service.<br>Full payment is done directly to the courier upon delivery.<br>No partial down payments required.</p>
						<div class="place-order-wrapper2">
							<button class="place-order" id="place_order_btn">Place my order</button>
						</div>
					</div>

					<div id="youmoney"  style="display: none;">
						<div class="youmoney-action-wrapper">
							<a href="wallet.php" style="color: black; text-decoration: none;"><p class="view-my-wallet">View My Wallet</p></a>
							<a href="wallet.php" style="color: black; text-decoration: none;"><p class="cash-in">Cash In</p></a>
						</div>
						<div class="youmoney-wrapper">
							<div class="balance-wrapper">
								<p class="balance-title">Balance: </p>
								<p class="balance-amount">&#8369; <?php echo number_format($result[0]['youwallet'],2); ?></p>
							</div>

							<div class="total-wrapper">
								<p class="total-title">Total Amount: </p>
								<p class="total-fee-amount">&#8369; 
									<?php 
										if($_SESSION['delivery_option'] == 'standard') {
											echo number_format($_SESSION['total_amount'],2); 
										}
										else if($_SESSION['delivery_option'] == 'express') {
											echo number_format(($_SESSION['total_amount']+29),2);
										}
									?>
									
								</p>
							</div>

							<div class="new-balance-wrapper">
								<p class="new-balance-title">New Balance: </p>
								<p class="new-balance-amount">
									<?php  
										if($result[0]['youwallet'] >= $_SESSION['total_amount'] && $_SESSION['delivery_option'] == 'standard') {
											echo '&#8369; '.number_format($result[0]['youwallet'] - $_SESSION['total_amount'],2);
										}
										else if($result[0]['youwallet'] >= $_SESSION['total_amount'] && $_SESSION['delivery_option'] == 'express') {
												echo '&#8369; '.number_format($result[0]['youwallet'] - ($_SESSION['total_amount']+29),2);
										} 
										else if($result[0]['youwallet'] < $_SESSION['total_amount']){
											echo 'Insufficient Balance';
										}
									?></p>
							</div>

							<div class="place-order-wrapper">
								<button class="place-order" id="youwallet_place_order_btn">Place my order</button>
							</div>
						</div>
					</div>

					<div id="installment" style="display: none;">

						<?php if($result[0]['user_status'] == 'verified') { ?>
							<p class="required-true"> &#10004; Account already verified</p>
						<?php } 
							else  { ?>
								<p class="required-false">&#10006; Account is not yet verified.</p>
						<?php 
							}
						?>
						<p class="verify-link" style="display: none;">VERIFY YOUR ACCOUNT NOW!</p>
						<p class="required-true"> &#10004; Only items sold by YouFind, are eligible for installment</p>
						
						<!--<p class="required-false">&#10006; This item/s is not eligible for installment.</p>-->
						<br>
						<div class="balance-wrapper">
								<p class="balance-title" style="margin-right: 10px;">YouMoney Balance: </p>
								<p class="balance-amount">&#8369; <?php echo number_format($result[0]['youwallet'],2); ?></p>
						</div>

						<div class="balance-wrapper">
								<p class="balance-title">Downpayment<br>(20% of total amount): </p>
								<p class="balance-amount"><br>&#8369; <?php echo number_format($downPayment,2); ?></p>
						</div>
						<br>
						<p class="cash-txt"> Select payment term below:	<br><br>

							<select class="select-terms" id="select_terms">
								<option value="1">3 months, P <?php echo number_format($_3mosTotal,2); ?> per month</option>
								<option value="2">6 months, P <?php echo number_format($_6mosTotal,2); ?> per month</option>
								<option value="3">12 months, P <?php echo number_format($_12mosTotal,2); ?> per month</option>
								<option value="4">18 months, P <?php echo number_format($_18mosTotal,2); ?> per month</option>
								<option value="5">24 months, P <?php echo number_format($_24mosTotal,2); ?> per month</option>
							</select>
						</p>

						<p style="margin: 0;">By click the submit button, I agreed to the <a href="terms-and-condition.php">Terms and Condition</a> of YouFind</p>
						<div class="place-order-wrapper2">
						<?php  	if($result[0]['user_status'] == 'verified') { ?>
									<button class="place-order" id="submit_installment">Submit application</button>
						<?php  	} 
								else { ?>
									<button class="place-order" id="submit_installment" disabled="disabled">Submit application</button>
						<?php	}
						?>
						</div>
					</div>
				</div>



				<div class="order-summary-wrapper" id="order_summary">
					<p class="order-summary">Order Summary</p>
					<p class="total-num-items" id="cart"></p>
					<p class="edit-cart" onclick="location.href='cart.php'">Edit</p>
					<br><br>
					<div class="product-tbl" id="product_tbl"></div>

					<div class="sub-total-wrapper">
						<p class="sub-total">Subtotal:</p>
						<p class="sub-amount" id="sub_amount">&#8369; 0.00</p>
					</div>

					<div class="shipping-fee-wrapper">
						<p class="shipping-fee">Shipping Fee:</p>
						<p class="shipping-amount" id="shipping_amount">
							<?php 
								if($_SESSION['delivery_option'] == 'standard') {
									echo '&#8369; 0.00';
								}
								else if($_SESSION['delivery_option'] == 'express') {
									echo '&#8369; 29.00';
								}
							 ?>
						</p>
					</div>

					<div class="total-fee-wrapper">
						<p class="total-fee">Total Amount</p>
						<p class="total-amount" id="total_amount">
							<?php 
								if($_SESSION['delivery_option'] == 'standard') {
									echo '&#8369; '.number_format($_SESSION['total_amount'],2);
								}
								else if($_SESSION['delivery_option'] == 'express') {
									echo '&#8369; '.number_format(($_SESSION['total_amount']+29),2);
								}
							 ?>
						</p>
					</div>
				</div>

				<div class="ship-address-wrapper">
					<div class="shipping-title">
						<p class="shipping-info">Shipping Information</p>
						<p class="edit-cart" onclick="location.href='order-add.php'">Edit</p>
					</div>

					<div class="address-holder">
						<p class="shipping-address">Shipping Address</p>
						<hr>
						<p class="owner-name"><?php echo $_SESSION['first_name'] .' '. $_SESSION['last_name']; ?></p>
						<p class="owner-address">
							<?php echo $_SESSION['add_street'].' '.$_SESSION['add_brgy'].' '.$_SESSION['add_city']; ?>
						</p>
						<p class="owner-number"><?php echo $_SESSION['contact_number']; ?></p>
						<br><br>
						<p class="shipping-address">Delivery Option</p>
						<hr>
						<p class="owner-name">
							<?php 
								if($_SESSION['delivery_option'] == 'standard') {
									echo 'Standard Delivery';
								}
								else if($_SESSION['delivery_option'] == 'express') {
									echo 'Express Delivery';
								}
							 ?>
						</p>
						<p class="owner-address">
							<?php 
								if($_SESSION['delivery_option'] == 'standard') {
									echo '&#8369; 0.00';
								}
								else if($_SESSION['delivery_option'] == 'express') {
									echo '&#8369; 29.00';
								}
							 ?>
						</p>
						<p class="owner-number">Date: Tues 06 March 2018</p>
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
		
	var cashDeliveryBtn = document.getElementById('cash_on_delivery_btn');
	var youmoney_btn = document.getElementById('youmoney_btn');
	var installment_btn = document.getElementById('installment_btn');
	var cash_on_delivery = document.getElementById('cash_on_delivery');
	var youmoney = document.getElementById('youmoney');
	var installment = document.getElementById('installment');

	cashDeliveryBtn.onclick = function() {
		youmoney.style.display = 'none';
		cash_on_delivery.style.display = 'block';
		installment.style.display = 'none';
	}
	youmoney_btn.onclick = function() {
		youmoney.style.display = 'block';
		cash_on_delivery.style.display = 'none';
		installment.style.display = 'none';
	}
	installment_btn.onclick = function() {
		youmoney.style.display = 'none';
		cash_on_delivery.style.display = 'none';
		installment.style.display = 'block';
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
						$('#cart').html('('+data+' item/s)');
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
			
			load_order_summary();
			function load_order_summary() {
				var action = 'load_cart_counter';
				$.ajax({
					url:'page-actions/add-to-cart-action.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#total_num_items').html('('+data+' items)');
					}
				})
			var action_load_product = 'load_product';
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				dataType:'json',
				data:{action_load_product:action_load_product},
				success:function(data) {
					$('#product_tbl').html(data.product_info);
				}
			})
		}
		
		$(document).on('click', '#place_order_btn', function() {
			var action = 'points';
			$.ajax({
				url:'page-actions/points-action.php',
				method:'POST',
				data:{action:action},
				success:function(data){
				}	
			})
			var action = 'complete_transaction';
			$.ajax({
				url:'page-actions/order-payment-complete-transaction.php',
				method:'POST',
				data:{
					action:action
				},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'complete.php';
					}
					else {
						alert(data);
					}
				}
			})
		});

		$(document).on('click', '#youwallet_place_order_btn', function() {
			var action = 'youwallet_transaction';
			$.ajax({
				url:'page-actions/youwallet-transaction-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'order-payment.php';
					}
					else {
						alert(data);
					}
				}
			})
		});


		$(document).on('change', '#select_terms', function() {
			var e = document.getElementById('select_terms');
			var f = e.options[e.selectedIndex].value;

			if($(this).val() == '1') {
				var action = '_3Months';
				var price = '<?php echo $price ?>';
				$.ajax({
					url:'page-actions/installment-application-action.php',
					method:'POST',
					data:{
						action:action,
						price:price
					},
					success:function(data) {
					}
				})
			}
			else if($(this).val() == '2') {
				var action = '_6Months';
				var price = '<?php echo $price ?>';
				$.ajax({
					url:'page-actions/installment-application-action.php',
					method:'POST',
					data:{
						action:action,
						price:price
					},
					success:function(data) {
					}
				})
			}
			
			else if($(this).val() == '3') {
				var action = '_12Months';
				var price = '<?php echo $price ?>';
				$.ajax({
					url:'page-actions/installment-application-action.php',
					method:'POST',
					data:{
						action:action,
						price:price
					},
					success:function(data) {
					}
				})
			}
			else if($(this).val() == '4') {
				var action = '_18Months';
				var price = '<?php echo $price ?>';
				$.ajax({
					url:'page-actions/installment-application-action.php',
					method:'POST',
					data:{
						action:action,
						price:price
					},
					success:function(data) {
					}
				})
			}

			else if($(this).val() == '5') {
				var action = '_24Months';
				var price = '<?php echo $price ?>';
				$.ajax({
					url:'page-actions/installment-application-action.php',
					method:'POST',
					data:{
						action:action,
						price:price
					},
					success:function(data) {
					}
				})
			}	
		});

		$(document).on('click', '#submit_installment', function() {
			var action = 'complete_apply_installment';
			$.ajax({
				url:'page-actions/installment-application-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					window.location = 'installment-complete.php';
				}
			})
		});










		$(document).on('click', '#header_settings_link', function() {
			window.location = 'settings.php';
		});

		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'customer-profile.php';
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location.href = 'logout.php';
		});
		$(document).on('click', '#header_sell_link', function() {
			window.location.href = 'register-seller.php';
		});
		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location = 'cart.php';
		});
		$(document).on('click', '#edit_profile_button', function() {
			$('#editProfileModal').modal('show');
			$('body').removeAttr('style');
		});
	});
	</script>