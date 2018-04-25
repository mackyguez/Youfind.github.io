<?php 
	
	session_start();

	//print_r($_SESSION);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youfind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="register-seller-account-verify.css">
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
				<p class="review-title"></p>
			</div>

			<form method="POST" enctype="multipart/form-data" id="form_wall">
				<div class="error-message" style="clear: both; text-align: center; color: red; font-size: 16px;"></div>
				<div class="register-inputs-wrapper">
					<div class="upload-id-cert-wrapper">Upload ID or Certificate</div>
					<div class="upload-id-warning">ID or Certificate is needed for security purposes</div>
					<div class="selection-right">
						<div class="front-text">Front</div>
						<input type="file" name="upload_front_id" id="upload_front_id" class="upload-front-id">
						<div class="back-text">Back</div>
						<input type="file" name="upload_back_id" id="upload_back_id">
						<div class="id-type-text">ID Type</div>
						<div class="select-id-type">
							<select name="select_id" class="form-control select-form" id="select_id" style="border: 2px solid #b1b1b1;">
								<?php $array = array('Student ID', 'TIN ID', 'Police Clearance');
									foreach($array as $row) {
										echo '<option name="$array">'.$row.'</option>';
									}
							 	?>
							</select>
						</div>
						<div class="id-number-text">ID Number</div>
						<input type="text" name="id_number" id="id_number" class="form-control id-number" style="float: right;border: 2px solid #b1b1b1;width: 48.9%;margin: 1px 0 10px 0;">
				</div>
				<div class="button-back-wrapper">
							<input type="button" name="button_back" id="button_back" class="button-back" value="Back">
				</div>
			</div>

			<div class="bank-account-right">
						<div class="bank-acc-wrapper">Bank Account</div>
						<div class="bank-acc-warning">Bank Account is required for transfering of payment</div>
						<div class="bank-inner-wrapper">
							<div class="account-name-text">Account Name</div>
							<input type="text" name="account_name" id="account_name" class="form-control account-name" placeholder="Account Name" style="float: right;width: 48.9%;margin: 1px 0 5px 0;border: 2px solid #b1b1b1;">
							<div class="account-number-text">Account Number</div>
							<input type="text" name="account_number" id="account_number" class="form-control account-number" placeholder="Account Number" style="float: right;border: 2px solid #125965;width: 48.9%;margin: 1px 0 5px 0;border: 2px solid #b1b1b1;">
							<div class="expi-date-text">Expiration Date</div>
							<input type="text" name="expi_month" id="expi_month" class="form-control expi-month"  placeholder="Month" style="float: left;border: 2px solid #b1b1b1;width: 132px;margin: 1px 0 25px 10px;;">
							<input type="text" name="expi_year" id="account_number" class="form-control expi-year" placeholder="Year" style="float: right;border: 2px solid #b1b1b1;width: 132px;margin: 1px 0 25px 0;">
					</div>
					<div class="button-next-wrapper">
								<input type="submit" name="button_next" id="button_next" class="button-next" value="Next">
						</div>
				</div>
			</form>
		</div>
		<div class="footer-wrapper">
			<?php include('footer1.php'); ?>
		</div>
	</div>
</body>
</html>


<script>
	$(document).ready(function() {

		$('#form_wall').on('submit', function(event) {
			event.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				url:'account-verify-action.php',
				method:'POST',
				data:formData,
				contentType:false,
				cache:false,
				processData:false,
				success:function(data) {
					if(data == 'Done') {
						window.location = 'register-seller-review.php';
					}
					else {
						alert(data);
					}
					$('.error-message').html(data);
				}
			})
		});
		$(document).on('click', '#button_back', function() {
			window.location = 'register-seller.php';
		});
		$(document).on('click', '#header_seller_link', function() {
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