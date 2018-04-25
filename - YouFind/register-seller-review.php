<?php 
	include('database_connection.php');
	/*if(!isset($_SESSION['last_id'])) {
		header('location:register-seller.php');
	}*/
	@$last_id = $_SESSION['last_id'];
	$first_name = '';
	$last_name = '';
	$shopname = '';
	$select_id = '';
	$id_number = '';
	$query = 'SELECT * FROM temp_database where id = "'.$last_id.'"';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$shopname = $row['shopname'];
		$select_id = $row['select_id'];
		$id_number = $row['id_number'];
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="register-seller-review.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="top-nav">
			<?php include('new-header.php'); ?>
		</div>
		<div class="middle-wrapper">
			<div class="register-text">
				<h4 style="margin: 0;">Sell on Youfind?</h4>
				<br>
				 * Required Fields
			</div>
			<div class="progress-wrapper">
				<p class="personal-title">Personal Information</p>
				<p class="follows1">></p>
				<p class="account-title">Account Verification</p>
				<p class="follows2">></p>
				<p class="review-title">Review</p>
			</div>

			<div class="register-inputs-wrapper">
				<h4 style="margin: 0;">Please confirm the following information</h4>

				<table class="review-client-table">
					<tr>
						<td class="review-client-text">Client Name</td>
						<td class="review-colon">:</td>
						<td class="review-name" id="client-name"><?php echo @$first_name .' '. @$last_name; ?></td>
					</tr>
					<tr>
						<td class="review-client-text">Shop Name</td>
						<td class="review-colon">:</td>
						<td class="review-name" id="shopname"><?php echo @$shopname; ?></td>
					</tr>
					<tr>
						<td class="review-client-text">Address</td>
						<td class="review-colon">:</td>
						<td class="review-name" id="address">Not set (you can set address on your profile)</td>
					</tr>
					<tr>
						<td class="review-client-text">ID Type</td>
						<td class="review-colon">:</td>
						<td class="review-name" id="id_type"><?php echo @$select_id; ?></td>
					</tr>
					<tr>
						<td class="review-client-text">ID Number</td>
						<td class="review-colon">:</td>
						<td class="review-name" id="id_number"><?php echo @$id_number; ?></td>
					</tr>
				</table>

				<div class="select-profile-right">
					<div class="user-image-holder"><img src="images/user.jpg" class="user-image-right" style="width: 100%; height: 100%;"></div>
					
					<form method="POST" id="form_wall" enctype="multipart/form-data">
						<div class="button-file-holder">
							<input type="file" name="profile_image" id="profile_image" class="profile-image">
						</div>
						<div class="error-image" id="error_image" style="margin: 2px 0 0 5px; color: red; text-align: center; display: none;">Invalid Image File</div>
					</form>

				</div>
				<div class="notice-holder">
					<div class="notice">
						<p style="margin: 0 0 0;" class="notice-text1">By clicking the button below, I confirm that all information are accurate and correct and that I agree to the</p>
						<p style="margin: 0;" class="notice-text2"><a href="#" style="text-decoration: none;color:blue;" class="notice-text2-inner">Terms and Conditions</a></p> 
						<p style="margin: 0;" class="notice-text3">of YouFind.</p>
					</div>
				</div>
				<div class="button-final-holder">
					<button type="button" class="create-button" id="create_button">Create my Account</button>
				</div>
			</div>
		</div>
		<div class="footer-wrapper">
			<?php include('footer1.php'); ?>
		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function() {

		$(document).on('change', '#profile_image', function() {
			var name = document.getElementById('profile_image').files[0].name;
			var form_data = new FormData();
			var ext = name.split('.').pop().toLowerCase();
			if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				$('#error_image').show(500);
				$('#form_wall')[0].reset();
			}
			else {
				$('#error_image').hide(500);
			}
			var ofReader = new FileReader();
			ofReader.readAsDataURL(document.getElementById('profile_image').files[0]);
			var f = document.getElementById('profile_image').files[0];
			var fsize = f.size || f.fileSize;
			
			if(fsize > 2000000000000) {
				alert('Image is too large');
				$('#form_wall')[0].reset();
			}
			else {
				form_data.append('profile_image', document.getElementById('profile_image').files[0]);
				$.ajax({
					url:'register-seller-review-upload.php',
					method:'POST',
					data:form_data,
					contentType:false,
					cache:false,
					processData:false,
					success:function(data) {
						$('.user-image-holder').html(data);
					}
				})
			}

		});

		$(document).on('click', '#create_button', function() {
			var action = 'create';
			var profile_image = $('#profile_image').val();
			$.ajax({
				url:'register-seller-review-action.php',
				method:'POST',
				data:{
					action:action,
					profile_image:profile_image
				},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'seller-profile.php';
					}
				}
			})
		});

		$(document).on('click', '#header_sell_link', function() {
			window.location = 'register-seller.php';
		});
		$(document).on('click', '#header_create_account', function() {
			window.location = 'create_account.php';
		});
		$(document).on('click', '#header_login', function() {
			window.location = 'login.php';
		});
	});	
</script>