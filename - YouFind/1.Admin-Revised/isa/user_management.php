<!DOCTYPE html>
<html>
	<head>
		<title>User Management</title>
		<link rel="icon" href="images/arrow-icon.png">
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/bootstrap.js"></script>

		<link rel="stylesheet" type="text/css" href="local-css/user_management.css">
	</head>
	<body>

		<div class="whole-wrapper">
			<div class="navigation-left">
				<div class="logo-container">
					<div class="logo-wrapper"><img src="images/logo.png"></div>
					<div class="tagline-wrapper">"Find your satisfaction here"</div>
				</div>
				<div class="account-container">
					<div class="dp-container">
						<div class="dp-wrapper"><img src="images/user-white.png" class="image"></div>
					</div>
					<div class="info-container"><p class="name">John Michael Olangco</p><p class="position">Administrator</p></div>
				</div>
				<div class="navigation-links-holder">
					<ul class="ul-link">
						<li><a href="admin_dashboard.php" class="li-link dashboard">Dashboard</a></li>
						<li><a href="sales_management.php" class="li-link sales">Installment Applications</a></li>
						<li class="link-active"><a href="user_management.php" class="li-link users">User Management</a></li>
						<li><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					</ul>
				</div>
			</div>
			<div class="content-right">
				<div class="direction-wrapper">
					<div class="location-wrapper">
						<div class="location-icon"><img src="images/user-icon.png" height="100%" width="100%"></div>
						<div class="location-title">USER MANAGEMENT</div>
						<div class="direction-holder">
							<p class="home">Home</p>
							<p class="separator">&#10095;</p>
							<p class="dashboard">User Management</p>
						</div>
					</div>
				</div>

				<div class="user-counter-wrapper">
					<ul class="ul-user-counter">
						<li class="all"><a href="#">All (25)</a></li>
						<li class="customer"><a href="#">Customers (15)</a></li>
						<li class="seller"><a href="">Entrepreneurs (10)</a></li>
					</ul>
					<div class="search-wrapper">
							<select name="pick_search" id="pick_search" class="pick-search">
								<?php  
								$actions = array('All', 'Customer','Verified - Entrepreneurs','Unverified - Entrepreneurs','Banned');
								foreach ($actions as $choice) {
									echo "<option name='$choice'>".$choice."</option>";
								}
								?>
							</select>
							<input type="text" name="search" class="searchbar" placeholder="Search"  id="search_user">
							<button style="height: 24px; margin: 0;">Search</button>
						</div>
				</div>
				<div class="users-table-content">
					<div id="table_content" class="table-content">
						<table class="fetch-data-table" id="fetch_data_table" width="980px" style="text-align: center;"></table>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

<!-- EDIT USER INFO MODAL  -->
<div id="edit_user_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span id="change_title"></span>Edit User Profile</h4>
			</div>
			<div class="modal-body" style="overflow: hidden;">
				<p class="fname-text" style="margin: 0;">First Name</p>
				<input type="text" id="first_name" class="form-control first-name">
				<p class="lname-text" style="margin: 0;">Last Name</p>
				<input type="text" id="last_name" class="form-control last-name">
				<p class="lname-text" style="margin: 0;">Email</p>
				<input type="text" id="email" class="form-control email">
				<input type="button" value="Update" id="update_user" class="form-control update-button">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="modal_fetch"></div>

<script type="text/javascript">
	$(document).ready(function() {
		var pick_search = $('#pick_search').val();
		
		load_all_user_content();
		function load_all_user_content() {
			var pick_search = $('#pick_search').val();
			var action = 'load_table_content';
			$.ajax({
				url:'admin-page-actions/user_management-load-all-user-content.php',
				method:'POST',
				data:{
					action:action,
					pick_search:pick_search
				},
				success:function(data) {
					if(pick_search == 'All') {	
						$('#fetch_data_table').html(data);
					}
				}
			})
		}
		function load_user_action() {
			var pick_search = $('#pick_search').val();
			$.ajax({
				url:'admin-page-actions/user_management-load-users-action.php',
				method:'POST',
				data:{pick_search:pick_search},
				success:function(data) {
					$('#fetch_data_table').html(data);
				}
			})
		}

		$('#pick_search').on('change', function() {
			var pick_search = $('#pick_search').val();
			if(pick_search == 'All') {
				load_all_user_content();
			}
			else if(pick_search == 'Customer') {
				load_user_action();
			}
			else if(pick_search == 'Verified - Entrepreneurs') {
				load_user_action();
			}
			else if(pick_search == 'Unverified - Entrepreneurs') {
				load_user_action();
			}
			else if(pick_search == 'Banned') {
				load_user_action();
			}
		});

		$('#search_user').keyup(function() {
			var action = 'search';
			var query = $(this).val();
			var pick_search = $('#pick_search').val();
				$.ajax({
					url:'admin-page-actions/user_management-search-user-action.php',
					method:'POST',
					data:{
						action:action,
						query:query,
						pick_search:pick_search
						},
					success:function(data) {
						if(pick_search == 'All' && query != '') {
							$('#fetch_data_table').html(data);
						}
						else if(pick_search == 'All' && query == '') {
							load_all_user_content();
						}

						if(pick_search == 'Customer' && query != '') {
							$('#fetch_data_table').html(data);
						}
						else if(pick_search == 'Customer' && query == '') {
							load_user_action();
						}

						if(pick_search == 'Verified - Entrepreneurs' && query != '') {
							$('#fetch_data_table').html(data);
						}
						else if(pick_search == 'Verified - Entrepreneurs' && query == '') {
							load_user_action();
						}

						if(pick_search == 'Unverified - Entrepreneurs' && query != '') {
							$('#fetch_data_table').html(data);
						}
						else if(pick_search == 'Unverified - Entrepreneurs' && query == '') {
							load_user_action();
						}

						if(pick_search == 'Banned' && query != '') {
							$('#fetch_data_table').html(data);
						}
						else if(pick_search == 'Banned' && query == '') {
							load_user_action();
						}
					}//success function end semicolon
				})
		});

		$(document).on('click', '#verify_id', function() {
			var user_verify_id = $(this).data('user_verify_id');
			var pick_search = $('#pick_search').val();
			var action = 'verify_user';
			$.ajax({
				url:'admin-page-actions/user_management-user-action.php',
				method:'POST',
				data:{
					action:action,
					user_verify_id:user_verify_id
				},
				success:function(data) {
					alert(data);
					load_all_user_content();
				}
			})
		});

		$(document).on('click', '#edit_id', function() {
			$('#edit_user_modal').modal('show');
			$('body').removeAttr('style');
			var action = 'send_user_id';
			var edit_user_id = $(this).data('edit_user_id');
			var edit_user_first_name = $(this).data('edit_user_first_name');
			var edit_user_last_name = $(this).data('edit_user_last_name');
			var edit_user_email = $(this).data('edit_user_email');
			$('#first_name').val(edit_user_first_name);
			$('#last_name').val(edit_user_last_name);
			$('#email').val(edit_user_email);
			$.ajax({
				url:'admin-page-actions/user_management-user-crud-action.php',
				method:'POST',
				data:{
					action:action,
					edit_user_id:edit_user_id
				},
				success:function(data) {
				}
			})
		});

		$(document).on('click', '#update_user', function() {
			var action = 'update_user';
			var update_first_name = $('#first_name').val();
			var update_last_name = $('#last_name').val();
			var update_email = $('#email').val();
			var pick_search = $('#pick_search').val();
			if(update_first_name != '' && update_last_name != '' && update_email != '') {
				$.ajax({
					url:'admin-page-actions/user_management-user-crud-action.php',
					method:'POST',
					data:{
						action:action,
						update_email:update_email,
						update_last_name:update_last_name,
						update_first_name:update_first_name
					},
					success:function(data) {
						if(data == 'Done' && pick_search == 'All') {
							load_all_user_content();
							$('#edit_user_modal').modal('hide');
							alert('User Updated Successfully');
						}
						else if(data == 'Done' && pick_search == 'Customer') {
							load_user_action();
							$('#edit_user_modal').modal('hide');
							alert('User Updated Successfully');
						}
						else if(data == 'Done' && pick_search == 'Verified - Entrepreneurs') {
							load_user_action();
							$('#edit_user_modal').modal('hide');
							alert('User Updated Successfully');
						}
						else if(data == 'Done' && pick_search == 'Unverified - Entrepreneurs') {
							load_user_action();
							$('#edit_user_modal').modal('hide');
							alert('User Updated Successfully');
						}
						else if(data == 'Done' && pick_search == 'Banned') {
							load_user_action();
							$('#edit_user_modal').modal('hide');
							alert('User Updated Successfully');
						}
					}
				})
			}
		});

		$(document).on('click', '#delete_id', function() {
			var user_delete_id  = $(this).data('user_delete_id');
			var pick_search = $('#pick_search').val();
			var action = 'delete_user';
			if(confirm('Are you sure you want to delete this user?')) {
				$.ajax({
					url:'admin-page-actions/user_management-user-crud-action.php',
					method:'POST',
					data:{
						user_delete_id:user_delete_id,
						action:action
					},
					success:function(data) {
						if(data == 'Done' && pick_search == 'All') {
							alert('User Deleted Successfully');
							load_all_user_content();
						}
						else if(data == 'Done' && pick_search == 'Customer') {
							alert('User Deleted Successfully');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Verified - Entrepreneurs') {
							alert('User Deleted Successfully');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Unverified - Entrepreneurs') {
							alert('User Deleted Successfully');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Banned') {
							alert('User Deleted Successfully');
							load_user_action();
						}
					}
				})
			}
		});
		$(document).on('click', '#ban_id', function() {
			var user_ban_id = $(this).data('user_ban_id');
			var pick_search = $('#pick_search').val();
			var action = 'ban_user';
			if(confirm('Are you sure you want to ban this user?')) {
				$.ajax({
				url:'admin-page-actions/user_management-user-crud-action.php',
				method:'POST',
				data:{
					user_ban_id:user_ban_id,
					action:action
				},
				success:function(data) {
					if(data == 'Done' && pick_search == 'All') {
							alert('User Successfully Banned');
							load_all_user_content();
						}
						else if(data == 'Done' && pick_search == 'Customer') {
							alert('User Successfully Banned');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Verified - Entrepreneurs') {
							alert('User Successfully Banned');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Unverified - Entrepreneurs') {
							alert('User Successfully Banned');
							load_user_action();
						}
						else if(data == 'Done' && pick_search == 'Banned') {
							alert('User Successfully Banned');
							load_user_action();
						}
				}
			})
			}
		});


		$(document).on('click', '#view_files_id', function() {
			var action_view_file = 'view_user_files';
			var pick_search = $('#pick_search').val();
			var user_view_files_id = $(this).data('user_view_files_id');
			
			$.ajax({
				url:'admin-page-actions/admin-view-files-action.php',
				method:'POST',
				data:{
					action_view_file:action_view_file,
					user_view_files_id:user_view_files_id
				},
				success:function(data) {
					$('#modal_fetch').html(data);
					$('#view_files_modal').modal('show');
					$('body').removeAttr('style');
				}
			})

		});
			
	});
</script>