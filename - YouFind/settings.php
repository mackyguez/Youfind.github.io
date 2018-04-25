<?php 
	session_start();
	
	if(!isset($_SESSION['customer_user_id'])) {
		header('location:login.php');
	}
	
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="settings.css">

</head>
<body>

	<div class="whole-wrapper">
		
		<div class="header-wrapper">
			<?php include('new-header.php'); ?>
		</div>

		<div class="content-wrapper">
			<div class="nav-bar-wrapper">
				<p class="user-name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
				<p class="user-verification"><?php echo ucfirst($result[0]['user_status']); ?></p>
				<p class="user-navigation" onclick="location.href='customer-profile.php'">Dashboard</p>
				<p class="user-navigation" onclick="location.href='wallet.php'">YouWallet</p>
				<p class="user-navigation" onclick="location.href='cart.php'">Shopping Cart</p>
				<p class="user-navigation" onclick="location.href='wishlist.php'" style="display: none;">Wishlist</p>
				<p class="user-navigation" style="font-weight: bold; color: #125965;">Settings</p>
				<p class="user-navigation" onclick="location.href='login.php'">Logout</p>
			</div>

			<div class="right-content-wrapper">
				<p class="dashboard-title">Account Settings</p>
				<div class="profile_preview_holder" style="border: 1px solid #b3b3b3; width: 150px; height: 150px; padding: 2px;">
					<div class="profile_picture_holder" id="profile_picture_holder" style="height: 100%; width: 100%; border-radius: 4px;">
						<?php 
							if($result[0]['profile_picture'] != '') {
								echo '<img src="1.User/profile-pictures/'.$result[0]["profile_picture"].'" width="100%" height="100%">';
							}
							else {
								echo '<img src="images/user.jpg" width="100%" height="100%">';
							}
						 ?>
					</div>
				</div>
				<form id="form_wall" enctype="multipart/form-data" method="POST">
				<input type="file" name="upload_profile_picture" id="upload_profile_picture" style="color: transparent; width: 80px; margin: 10px 0 20px 35px;">
				<p class="fname-text" style="margin: 0;">First Name</p>
				<input type="text" id="first_name" name="first_name" class="form-control first-name" value="<?php echo $result[0]['first_name']; ?>">
				<p class="lname-text" style="margin: 0;">Last Name</p>
				<input type="text" id="last_name" name="last_name" class="form-control last-name" value="<?php echo $result[0]['last_name']; ?>">
				<p class="lname-text" style="margin: 10px 0 0 0;">Bank Account Name</p>
				<input type="text" class="form-control last-name" 
						value="<?php echo $result[0]['account_name']; ?>" id="bank_acc_name" placeholder="<?php if($result[0]['account_name'] == '') {echo 'Not set';} ?>" name="bank_acc_name">
				<p class="lname-text" style="margin: 10px 0 0 0;">Account Number</p>
				<input type="text" pattern="[0-9]{16}$" class="form-control last-name" 
						value="<?php echo $result[0]['account_number']; ?>" id="bank_acc_number" placeholder="<?php if($result[0]['account_number'] == '') {echo 'Not set';} ?>" name="bank_acc_number" title="Enter 16 digit numbers" maxlength="16">


						<br><br>

				<p class="dashboard-title" style="display: none;">Account Security</p>
				<p class="fname-text" style="margin: 0; display: none;">Set security question</p>
				<select class="form-control last-name" name="security_question" style="display: none;">
					<option>What is the name of your first dog?</option>
					<option>What is the name of your first grade teacher?</option>
					<option>What is your nickname?</option>
					<option>What is your favorite hobby?</option>
					<option>What is the title of my favorite book?</option>
				</select>
				<p class="lname-text" style="margin: 0; display: none;">Answer</p>
				<input type="text" id="" class="form-control last-name" 
						placeholder ="not set" name="security_answer" style="display: none;">


					<br><br>

				<p class="dashboard-title">User Identification</p>
				<p class="fname-text" style="margin: 0;">Government-issued ID</p>
				<select class="form-control last-name" name="select_id" id="select_id">
					<option>Student ID</option>
					<option>TIN ID</option>
					<option>Police Clearance</option>
					<option>PAGIBIG ID</option>
				</select>
				<p class="lname-text" style="margin: 0;">ID Number</p>
				<input type="text" id="id_number" class="form-control last-name" 
						placeholder ="Ex. K1129082" name="id_number" value="<?php echo $result[0]['id_number']; ?>" id="id_number">

				<br><br>
					<p class="lname-text" style="margin: 0; margin-right: 20px;">Front ID</p>
					<input type="file" name="front">
					<br>
					<p class="lname-text" style="margin: 0; margin-right: 20px;">Back ID</p>
					<input type="file" name="back">


				<br><br>
				<input type="submit" id="update" value="Update" class="update-button form-control" >
				</form>
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
						url:'page-actions/settings-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#profile_picture_holder').html(data);
							$('#form_wall')[0].reset();
						}
					})
				}
			});

			$('#form_wall').on('submit', function(event) {
			event.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				url:'page-actions/settings-action-extension.php',
				method:'POST',
				data:formData,
				contentType:false,
				cache:false,
				processData:false,
				success:function(data) {
					window.location = 'settings.php';
				}
			})
		});

			$(document).on('click', '#header_sell_link', function() {
				window.location = 'register-seller.php';
			});
	});
</script>