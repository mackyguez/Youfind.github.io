<?php 
	session_start();
	//print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="order-add.css">

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
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid #125965; width: 30px; height: 30px; overflow: hidden; background-color: #93deec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; font-weight: bold;">2</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #125965; font-weight: bold;">Address</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">3</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Payment</p></div>
				</div>

				<div class="progress-data-wrapper" style="width: 100%; height: auto; overflow: hidden;">
					<div class="progress-num-wrapper" style="border-radius: 50%; border: 1px solid gray; width: 30px; height: 30px; overflow: hidden; background-color: #ececec; float: left;"><p class="progress-num" style="padding: 3px 10px; font-size: 15px; color: #8c8c8c;">4</p></div>
					<div class="progress-name-wrapper" style="float: left;"><p class="progress-name" style="padding: 5px 10px; font-size: 15px; color: #8c8c8c;">Complete</p></div>
				</div>
			</div>

			<div class="whole-address-wrapper">
				<div class="address-holder">
					<p class="select-address">Select Shipping Address</p>

					<div class="all-address" id="fetch_addresses"></div>
					<div class="all-address" id="fetch_added_addresses"></div>

					<div class="add-address-wrapper">
						<button class="add-address" id="add_address" data-customer_user_id="<?php echo $_SESSION['customer_user_id']; ?>">
							<p class="plus-sign">+</p>
							<p class="add-text" id="add_text">Add another address</p>
						</button>
						<button class="add-address" id="cancel_button" style="display: none;">
							<p class="add-text" id="cancel_text">Cancel</p>
						</button>
					</div>

					<div id="add_function" style="display: none;">
						<form id="form_wall">
						<div class="enter-details">
							<p class="add-label">First Name</p>
							<input type="text" name="your-name" placeholder="First Name" class="add-input" id="first_name">
						</div>
						<div class="enter-details">
							<p class="add-label">Last Name</p>
							<input type="text" name="your-name" placeholder="Last Name" class="add-input" id="last_name">
						</div>
						<div class="enter-details">
							<p class="add-label">House No. & Street Name</p>
							<input type="text" name="your-house" placeholder="House No., Street Name" class="add-input" id="add_street">
						</div>
						<div class="enter-details">
							<p class="add-label">Barangay</p>
							<input type="text" name="your-barangay" placeholder="Barangay" class="add-input" id="add_brgy">
						</div>
						<div class="enter-details">
							<p class="add-label">City</p>
							<input type="text" name="your-city" placeholder="City" class="add-input" id="add_city">
						</div>
						<div class="enter-details">
							<p class="add-label">Province</p>
							<input type="text" name="your-province" placeholder="Province" class="add-input" id="add_province">
						</div>
						<div class="enter-details">
							<p class="add-label">Mobile Number</p>
							<input type="text" name="your-num" placeholder="Mobile Number" class="add-input" maxlength="11" id="contact_number">
						</div>
					</form>
					</div>

					<p class="delivery-options">Delivery Options</p>
					<div class="all-delivery-options">
						<form>
							<div class="option-wrapper">
								<input type="radio" name="delivery_option" id="delivery_standard" class="delivery-radio" checked="TRUE" value="standard_delivery">
								<p class="delivery-text"><b>Standard Delivery</b><br>&#8369; 0.00<br>Delivery Date: Mon, 5 - Fri, 9 March 2018</p>
								
							</div>
							<div class="option-wrapper">
								<input type="radio" name="delivery_option" id="delivery_express" class="delivery-radio" value="express_delivery">
								<p class="delivery-text"><b>Express Delivery</b><br>&#8369; 29.00<br>Delivery Date: Tues, 6 March 2018</p>
							</div>

						</form>
					</div>

					<button class="continue-btn" id="continue_btn" onclick="location.href='order-payment.php';">Continue</button>
					<!--location.href='order-payment.php';-->
				</div>

				<div class="order-summary-wrapper">
					<p class="order-summary">Order Summary</p>
					<p class="total-num-items" id="total_num_items">(0 items)</p>
					<p class="edit-cart" onclick="location.href='cart.php'">Edit</p>
					
					<br><br>
					<div class="product-tbl" id="product_tbl"></div>

					<div class="sub-total-wrapper">
						<p class="sub-total">Subtotal:</p>
						<p class="sub-amount" id="sub_amount">&#8369; 0.00</p>
					</div>

					<div class="shipping-fee-wrapper">
						<p class="shipping-fee">Shipping Fee:</p>
						<p class="shipping-amount" id="shipping_amount">&#8369; 0.00</p>
					</div>

					<div class="total-fee-wrapper">
						<p class="total-fee">Total Amount</p>
						<p class="total-amount" id="total_amount">&#8369; 0.00</p>
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
<script type="text/javascript">
	$(document).ready(function() {

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
			var action = 'load_cart_total';
			$.ajax({
				url:'page-actions/add-to-cart-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#sub_amount').html(data);
					$('#total_amount').html(data);
				}
			})
			
		}

		$(document).on('click', '#address_id_primary', function() {
			var address_id = $(this).data('address_id_primary');
			$('#address_id_primary').css({
				'border':'2px solid #125965',
				'background-color':'#ececec'
			});
			$('#address_id_added1').css({
				'border':'none',
				'background-color':'#fff'
			});
			$('#address_id_added2').css({
				'border':'none',
				'background-color':'#fff'
			});
			$('#address_id_added3').css({
				'border':'none',
				'background-color':'inherit'
			});
		});
		$(document).on('click', '#address_id_added1', function() {
			$('#address_id_primary').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added1').css({
				'border':'2px solid #125965',
				'background-color':'#ececec'
			});
			$('#address_id_added2').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added3').css({
				'border':'none',
				'background-color':'inherit'
			});
		});
		$(document).on('click', '#address_id_added2', function() {
			$('#address_id_primary').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added1').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added2').css({
				'border':'2px solid #125965',
				'background-color':'#ececec'
			});
			$('#address_id_added3').css({
				'border':'none',
				'background-color':'inherit'
			});
		});
		$(document).on('click', '#address_id_added3', function() {
			$('#address_id_primary').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added1').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added2').css({
				'border':'none',
				'background-color':'inherit'
			});
			$('#address_id_added3').css({
				'border':'2px solid #125965',
				'background-color':'#ececec'
			});
		});



		load_cart_counter();
		load_cart_total();
		load_addresses();
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
		function load_addresses() {
			var action = 'load_addresses';
			$.ajax({
				url:'page-actions/customer-fetch-address-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#fetch_addresses').html(data);
				}
			})
		}
		load_added_addresses();
		function load_added_addresses() {
			var action = 'load_added_addresses';
			$.ajax({
				url:'page-actions/customer-fetch-address-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#fetch_added_addresses').html(data);
				}
			})
		}
		$(document).on('click', '#add_address', function() {
			var action = 'check_address';
			$.ajax({
				url:'page-actions/add-address-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'applicable') {
						$('.plus-sign').html('');
						$('#add_text').html('Done');
						$('#add_address').attr('id', 'done_button');
						$('#add_function').css('display', 'block');
						$('#cancel_button').css('display', 'inline');
					}
					else {
						alert(data);
					}
				}
			})	
		});
		$(document).on('click', '#done_button', function() {
			var customer_user_id = $(this).data('customer_user_id');
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var add_street = $('#add_street').val();
			var add_city = $('#add_city').val();
			var add_brgy = $('#add_brgy').val();
			var add_province = $('#add_province').val();
			var contact_number = $('#contact_number').val();
				if(first_name == '' || last_name == '' || add_street == '' || add_brgy == '' || add_province == '' || contact_number == '') {
					alert('All fields must be filled');
				}
				else {
					var action = 'add_address';
					$.ajax({
						url:'page-actions/add-address-action.php',
						method:'POST',
						data:{
							action:action,
							customer_user_id:customer_user_id,
							first_name:first_name,
							last_name:last_name,
							add_street:add_street,
							add_brgy:add_brgy,
							add_city:add_city,
							add_province:add_province,
							contact_number:contact_number
						},
						success:function(data) {
							if(data == 'Done') {
								$('#form_wall')[0].reset();
								$('.plus-sign').html('+');
								$('#add_text').html('Add another address');
								$('.add-address-wrapper').css('padding', '0');
								$('#done_button').attr('id', 'add_address');
								$('#cancel_button').css('display', 'none');
								$('#add_function').css('display', 'none');
								load_added_addresses();
							}
							else {
								alert(data);
							}
						}
					})
				}
		});
		$(document).on('click', '#cancel_button', function() {
			$('.plus-sign').html('+');
			$('#add_text').html('Add another address');
			$('.add-address-wrapper').css('padding', '0');
			$('#done_button').attr('id', 'add_address');
			$('#cancel_button').css('display', 'none');
			$('#add_function').css('display', 'none');
		});

		load();
		function load() {
			var action = 'load';
			var delivery_standard = $('#delivery_standard').val();
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				data:{
					action:action,
					delivery_standard:delivery_standard
				}
			})
		}

		$(document).on('click', '#address_id_primary', function() {
			var action_pick_address = 'address_primary';
			var address_id_primary = $(this).data('address_id_primary');
			var address_first_name = $(this).data('address_first_name');
			var address_last_name = $(this).data('address_last_name');
			var address_add_street = $(this).data('address_add_street');
			var address_add_brgy = $(this).data('address_add_brgy');
			var address_add_city = $(this).data('address_add_city');
			var address_add_province = $(this).data('address_add_province');
			var address_contact_number = $(this).data('address_contact_number');
			
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				data:{
					action_pick_address:action_pick_address,
					address_id_primary:address_id_primary,
					address_first_name:address_first_name,
					address_last_name:address_last_name,
					address_add_street:address_add_street,
					address_add_brgy:address_add_brgy,
					address_add_city:address_add_city,
					address_add_province:address_add_province,
					address_contact_number:address_contact_number
				},
				success:function(data) {
					if(data != 'Done') {
						alert('There was an error occured');
						alert(data);
					}
				}
			})
		});
		$(document).on('click', '#address_id_added1', function() {
			var action_pick_address = 'address_added1';
			var address_id_added1 = $(this).data('address_id_added');
			var address_first_name = $(this).data('address_added_first_name');
			var address_last_name = $(this).data('address_added_last_name');
			var address_add_street = $(this).data('address_added_add_street');
			var address_add_brgy = $(this).data('address_added_add_brgy');
			var address_add_city = $(this).data('address_added_add_city');
			var address_add_province = $(this).data('address_added_add_province');
			var address_contact_number = $(this).data('address_added_contact_number');
			
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				data:{
					action_pick_address:action_pick_address,
					address_id_added1:address_id_added1,
					address_first_name:address_first_name,
					address_last_name:address_last_name,
					address_add_street:address_add_street,
					address_add_brgy:address_add_brgy,
					address_add_city:address_add_city,
					address_add_province:address_add_province,
					address_contact_number:address_contact_number
				},
				success:function(data) {
					if(data != 'Done') {
						alert('There was an error occured');
					}
				}
			})
		});
		$(document).on('click', '#address_id_added2', function() {
			var action_pick_address = 'address_added2';
			var address_id_added2 = $(this).data('address_id_added');
			var address_first_name = $(this).data('address_added_first_name');
			var address_last_name = $(this).data('address_added_last_name');
			var address_add_street = $(this).data('address_added_add_street');
			var address_add_brgy = $(this).data('address_added_add_brgy');
			var address_add_city = $(this).data('address_added_add_city');
			var address_add_province = $(this).data('address_added_add_province');
			var address_contact_number = $(this).data('address_added_contact_number');
			
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				data:{
					action_pick_address:action_pick_address,
					address_id_added2:address_id_added2,
					address_first_name:address_first_name,
					address_last_name:address_last_name,
					address_add_street:address_add_street,
					address_add_brgy:address_add_brgy,
					address_add_city:address_add_city,
					address_add_province:address_add_province,
					address_contact_number:address_contact_number
				},
				success:function(data) {
					if(data != 'Done') {
						alert('There was an error occured');
					}
				}
			})
		});
		$(document).on('click', '#address_id_added3', function() {
			var action_pick_address = 'address_added3';
			var address_id_added3 = $(this).data('address_id_added');
			var address_first_name = $(this).data('address_added_first_name');
			var address_last_name = $(this).data('address_added_last_name');
			var address_add_street = $(this).data('address_added_add_street');
			var address_add_brgy = $(this).data('address_added_add_brgy');
			var address_add_city = $(this).data('address_added_add_city');
			var address_add_province = $(this).data('address_added_add_province');
			var address_contact_number = $(this).data('address_added_contact_number');
			
			$.ajax({
				url:'page-actions/order-add-action.php',
				method:'POST',
				data:{
					action_pick_address:action_pick_address,
					address_id_added3:address_id_added3,
					address_first_name:address_first_name,
					address_last_name:address_last_name,
					address_add_street:address_add_street,
					address_add_brgy:address_add_brgy,
					address_add_city:address_add_city,
					address_add_province:address_add_province,
					address_contact_number:address_contact_number
				},
				success:function(data) {
					if(data != 'Done') {
						alert('There was an error occured');
					}
				}
			})
		});

		$(document).on('click', '#delivery_standard', function() {
			var action = 'set_session_delivery_standard';
			$.ajax({
				url:'page-actions/order-add-action-extension.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#total_amount').html('&#8369; '+data);
					$('#shipping_amount').html('&#8369; 0.00');
				}
			})
		});

		$(document).on('click', '#delivery_express', function() {
			var action = 'set_session_delivery_express';
			$.ajax({
				url:'page-actions/order-add-action-extension.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#total_amount').html(data);
					$('#shipping_amount').html('&#8369; 29.00');
				}
			})
		});


		$(document).on('click', '#header_shop_cart_holder', function() {
			window.location = 'cart.php';
		});
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