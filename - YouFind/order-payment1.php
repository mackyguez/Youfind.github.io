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
						<p>Pay using our Cash On Delivery service.<br>Full payment is done directly to the courier upon delivery.<br>No partial down payments required.</p>
						<div class="place-order-wrapper2">
							<button class="place-order">Place my order</button>
						</div>
					</div>

					<div id="youmoney"  style="display: none;">
						<div class="youmoney-action-wrapper">
							<p class="view-my-wallet" onclick="location.href='wallet.php'">View My Wallet</p>
							<p class="cash-in" onclick="location.href='wallet.php'">Cash In</p>
						</div>
						<div class="youmoney-wrapper">
							<div class="balance-wrapper">
								<p class="balance-title">Balance: </p>
								<p class="balance-amount">&#8369; 30000.00</p>
							</div>

							<div class="total-wrapper">
								<p class="total-title">Total Amount: </p>
								<p class="total-fee-amount">&#8369; 399.00</p>
							</div>

							<div class="new-balance-wrapper">
								<p class="new-balance-title">New Balance: </p>
								<p class="new-balance-amount">&#8369; 2399.00</p>
							</div>

							<div class="place-order-wrapper">
								<button class="place-order">Place my order</button>
							</div>
						</div>
					</div>

					<div id="installment" style="display: none;">
						<p>THIS IS FOR INSTALLMENT YEAH</p>

						<div class="place-order-wrapper2">
							<button class="place-order">Place my order</button>
						</div>
					</div>

					<p class="apply-voucher">Apply Voucher</p>
				</div>



				<div class="order-summary-wrapper" id="order_summary">
					<p class="order-summary">Order Summary</p>
					<p class="total-num-items">(3 items)</p>
					<p class="edit-cart" onclick="location.href='cart.php'">Edit</p>
					<br><br>
					<div class="product-tbl">
						<table>
							<tr>
								<th class="product-header" width="64%">Product
								<th class="product-header" width="5%">Quantity
								<th class="product-header" width="30%">Unit Price
							</tr>
							<tr>
								<td class="product-data" width="64%">Product #1
								<td class="product-data" width="5%">3
								<td class="product-data" width="30%">&#8369; 29.00
							</tr>`
							<tr>
								<td class="product-data" width="64%">Product #2
								<td class="product-data" width="5%">1
								<td class="product-data" width="30%">&#8369; 29.00
							</tr>
							<tr>
								<td class="product-data" width="64%">Product #3
								<td class="product-data" width="5%">1
								<td class="product-data" width="30%">&#8369; 29.00
							</tr>
						</table>
					</div>

					<div class="sub-total-wrapper">
						<p class="sub-total">Subtotal:</p>
						<p class="sub-amount">&#8369; 499.00</p>
					</div>

					<div class="shipping-fee-wrapper">
						<p class="shipping-fee">Shipping Fee:</p>
						<p class="shipping-amount">&#8369; 29.00</p>
					</div>

					<div class="sub-total-wrapper">
						<p class="sub-total">Voucher:</p>
						<p class="sub-amount">- &#8369; 0.00</p>
					</div>

					<div class="total-fee-wrapper">
						<p class="total-fee">Total Amount</p>
						<p class="total-amount">&#8369; 528.00</p>
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
						<p class="owner-name">John Michael Olangco</p>
						<p class="owner-address">1234 Ampere St., Palanan, Makati City</p>
						<p class="owner-number">09999918881</p>
						<br><br>
						<p class="shipping-address">Delivery Option</p>
						<hr>
						<p class="owner-name">Express Delivery</p>
						<p class="owner-address">&#8369; 29.00</p>
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
			$(document).on('click', '#header_my_prof_link', function() {
				window.location = 'user_profile-customer-logged-in.php';
			});
			$(document).on('click', '#header_settings_link', function() {
				alert('wala pang function!');
			});
			$(document).on('click', '#header_logout_link', function() {
				window.location.href = 'logout.php';
			});
			$(document).on('click', '#header_sell_link', function() {
				window.location.href = 'register-seller.php';
			});
			$(document).on('click', '#edit_profile_button', function() {
				$('#editProfileModal').modal('show');
				$('body').removeAttr('style');
			});
	});



		
	</script>