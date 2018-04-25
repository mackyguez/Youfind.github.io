<?php 
	session_start();
	if(!isset($_SESSION['seller_user_id'])) {
		header('location:../login.php');
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/bootstrap.js"></script>

		<link rel="stylesheet" type="text/css" href="user_profile.css">
		<link rel="stylesheet" type="text/css" href="seller-style.css">
		<link rel="stylesheet" type="text/css" href="modal_styles.css">
	</head>
		<body>

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('../new-header.php'); ?></div>
		<div class="content-holder">

			<div class="content-left">
				<p class="about-text">About</p>
				<div class="left-upper" id="left_upper" style="min-height: 155px;"></div>

				<p class="insight-text">Insights</p>
				<div class="insights-holder">
					<div class="reviews-wrapper">
						<p class="counting-numbers">20</p>
						<p class="text-bottom">Items On-Hand</p>
					</div>
					<div class="items-ordered-wrapper">
						<p class="counting-numbers">50</p>
						<p class="text-bottom">Items Sold</p>
					</div>
					<div class="service-hired-wrapper">
						<p class="counting-numbers">2</p>
						<p class="text-bottom">Service Lent</p>
					</div>
				</div>

				<p class="task-text">Task Management</p>
				<div class="task-holder">
					<div class="table-holder">
						
					<table class="task">
						<tr class="header-style">
							<th style="padding-left: 5px; width: 45%;">Task	
							<th style="padding-left: 5px; width: 17%;">Status
							<th style="padding-left: 5px; width: 38%;">Action
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="pending">Pending</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="done">Done</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="overdue">Overdue</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>
					</table>
					<p class="nothing-follows" style="margin: 2px 36%; color: #125965; font-size: 10px;">***Nothing Follows***</p>
					</div>
				</div>
			</div>


			<div class="content-right">


				<p class="sales-text">Sales Monitoring</p>
				<div class="graph-holder">
					<img src="images/bar.png" height="100%" width="100%">
				</div>

				<div class="post-wrapper">
					<p class="advertise-title">Advertise Now!</p>
					<button class="postBtn" id="seller_post_product">Post an item</button>
					<button class="postBtn" onclick="location.href='post-service.php'">Post a service</button>
					<div class="report-holder">
						<div style="margin-bottom: 2px; height: 30px;">
						<p style="float: left;">Notes</p>
						<button style="float: right; font-size: 10px;" id="noteBtn">Add Note</button>
						</div>
						<div style="border-bottom: .5px solid gray; font-size: 10px;">1. Add Stocks for LG Earphones</div>

					</div>
				</div>

				<p class="sales-text">Inventory Management</p>
				<div class="inventory-holder">
					<div class="sort-style">
						<p style="float: left; padding-right: 10px;">Sort by : </p>
						<select>
							<?php  
							$actions = array('All', 'Best-Selling Item','Least-Sold Item','Low Stock Items','Out-Of-Stocks');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
					</div>
					
					<div class="search-inventory">
						<select>
							<?php  
							$actions = array('All', 'Laptops & Computers','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
						<input type="text" name="search" class="searchbar" placeholder="Search">
						<button>Search</button>
					</div>

					<table class="inventory">
						<tr class="inventory-header">
							<th style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="all-items">
							<th style="width: 32%; padding: 3px;">Product Name
							<th style="width: 15%; padding: 3px;">Unit Price
							<th style="width: 10%; padding: 3px;">Qty
							<th style="width: 25%; padding: 3px;">Categories
							<th style="width: 15%; padding: 3px;">Actions
						</tr>

						<tr class="details-style">
							<td style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="this-items">
							<td><a href="#">LG Earphones</a>
							<td>P300.00
							<td>5
							<td>Accessories
							<td>
								<ul>
									<li class="action"><button id="prodBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Edit</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="this-items">
							<td><a href="#">LG Earphones</a>
							<td>P300.00
							<td>5
							<td>Accessories
							<td>
								<ul>
									<li class="action"><button id="prodBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Edit</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>
					</table>

					<p class="nothing-follows" style="margin: 2px 43%; color: #125965; font-size: 10px;">***Nothing Follows***</p>

				</div>

			</div>

		</div>
		</div>
	</div>
	<div class="footer-wrapper" style="margin-top: 70px;">
		<?php include('../footer1.php'); ?>

	</div>



		</body>
</html>


  <?php include('profModal.php'); ?>



<div id="noteModal" class="modal fade" role="dialog">
		  <div class="modal-content">
			<div class="modal-header">
				<p class="modal-title-text">Add Notes</p> 
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-input-content">
				<textarea cols="20" rows="5">Anything you would today?</textarea>
			</div>
			<div class="modal-submit">
				<input type="submit" name="submit" class="input-submit" value="Add this note" id="add_note_btn">
			</div>
			  </div>
</div>



<script>
	$(document).ready(function() {

		load_left_upper();
			function load_left_upper() {
				var action = 'load_left_upper';
				$.ajax({
					url:'user_profile-seller-logged-in-action-update.php',
					method:'POST',
					data:{action:action},
					success:function(data) {
						$('#left_upper').html(data);
					}
				})
			}

		$(document).on('click', '#edit_profile_button', function() {
			$('#profModal').modal('show');
			$('body').removeAttr('style');
		});

		$(document).on('change', '#upload_profile_picture', function() {
				var upload_profile_picture = document.getElementById('upload_profile_picture').files[0].name;
				var ext = upload_profile_picture.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('upload_profile_picture').files[0]);
				var f = document.getElementById('upload_profile_picture').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 10000000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('upload_profile_picture', document.getElementById('upload_profile_picture').files[0]);
					$.ajax({
						url:'user_profile-seller-logged-in-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#user_pic').fadeIn(5000).html(data);
							$('#form_wall')[0].reset();
						}
					})
				}
			});
		$(document).on('click', '#update_user', function() {
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var re_password = $('#re_password').val();
			var contact_number = $('#contact_number').val();
			var add_street = $('#add_street').val();
			var add_brgy = $('#add_brgy').val();
			var add_city = $('#add_city').val();
			var add_province = $('#add_province').val();

			if(first_name == '' || last_name == '' || email == '' ||
				password == '' || re_password == '' || contact_number == '' ||
				add_street == '' || add_brgy == '' || add_city == '' || add_province == '') {
				alert('All field must not be empty');
			}
			else {
				if(password != re_password) {
					alert('Password does not match');
				}
				else {
					var action = 'seller_update_info';
					$.ajax({
						url:'user_profile-seller-logged-in-action-update.php',
						method:'POST',
						data:{
							action:action,
							first_name:first_name,
							last_name:last_name,
							email:email,
							password:password,
							contact_number:contact_number,
							add_street:add_street,
							add_brgy:add_brgy,
							add_city:add_city,
							add_province:add_province
						},
						success:function(data) {
							if(data == 'Done') {
								alert('Personal Data Updated Sucessfully');
								load_left_upper();
								$('#profModal').modal('hide');
								window.location = 'user_profile-seller-logged-in.php';
								$('#modal_info_edit_form')[0].reset();
							}
							else if(data == 'inUseEmail') {
								alert('Email is Already in use');
							}
						}
					})
				}
			}
		});
		
		$(document).on('click','#noteBtn', function() {
			$('#noteModal').modal('show');
			$('body').removeAttr('style');
		});
		
		$(document).on('click', '#add_note_btn', function() {
			$('#noteModal').modal('hide');
		});

		$(document).on('click', '#prodBtn', function() {
			$('#prodModal').modal('show');
			$('body').removeAttr('style');
		});

		$(document).on('click', '#submit_edit_product', function() {
			$('#prodModal').modal('hide');
		});

		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'user_profile-seller-logged-in.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			alert('Wala pang function');
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = '../logout.php';
		});
		$(document).on('click', '#header_logo', function() {
			window.location = '../new-index.php';
		});
		$(document).on('click', '#seller_post_product', function() {
			var action = 'check_status_seller';
			$.ajax({
				url:'../page-actions/identify-user-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'not verified') {
						alert('You cannot post a product unless you are Verified Seller.');
					}
					else if(data == 'verified') {
						window.location = '../post-product.php';
					}
				}
			})
		});

	});
</script>

