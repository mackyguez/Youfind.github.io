<?php 
	session_start();
	//print_r($_SESSION);
	if(!isset($_SESSION['seller_user_id'])) {
		header('location:login.php');
	}

	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
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
				<p class="user-navigation" onclick="location.href='seller-profile.php'">Dashboard</p>
				<p class="user-navigation" onclick="location.href='inventory-seller.php'">Inventory Management</p>
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
					<br><br>
					<input type="file" name="upload_profile_picture" id="upload_profile_picture">
					<br><br>
					<p class="fname-text" style="margin: 0;">First Name</p>

					<input type="text" id="first_name" name="first_name" class="form-control first-name" value="<?php echo $result[0]['first_name']; ?>">

					<p class="lname-text" style="margin: 0;">Last Name</p>

					<input type="text" id="last_name"  name="last_name" class="form-control last-name" value="<?php echo $result[0]['last_name']; ?>">

					<p class="lname-text" style="margin: 10px 0 0 0;">Mobile Number</p>

					<input type="text" id="account_name"  name="contact_number" class="form-control last-name" placeholder="Mobile Number" maxlength="11" value="<?php echo $result[0]['contact_number']; ?>" pattern="\d*">
					<p class="lname-text" style="margin: 10px 0 0 0;">Bank Account Name</p>
					<input type="text" id="account_name" class="form-control last-name" 
							value="<?php echo $result[0]['account_name']; ?>" name="bank_acc_name">
					<p class="lname-text" style="margin: 10px 0 0 0;">Account Number</p>
					<input type="text" id="account_number" class="form-control last-name" 
							value="<?php echo $result[0]['account_number']; ?>" name="bank_acc_number" maxlength="16" pattern="\d*">

					<p class="lname-text" style="margin: 10px 0 0 0;">Address Street</p>
					<input type="text" id="add_street" class="form-control last-name" 
							value="<?php echo $result[0]['add_street']; ?>" name="add_street"  placeholder="<?php if(!isset($result[0]['add_street'])) { echo 'Address Street'; } ?>">

					<p class="lname-text" style="margin: 10px 0 0 0;">Address Barangay</p>
					<input type="text" id="add_brgy" class="form-control last-name" 
							value="<?php echo $result[0]['add_brgy']; ?>" name="add_brgy"  placeholder="<?php if(!isset($result[0]['add_brgy'])) { echo 'Address Barangay'; } ?>">

					<p class="lname-text" style="margin: 10px 0 0 0;">Address City</p>
					<input type="text" id="add_city" class="form-control last-name" 
							value="<?php echo $result[0]['add_city']; ?>" name="add_city"  placeholder="<?php if(!isset($result[0]['add_city'])) { echo 'Address City'; } ?>">

					<p class="lname-text" style="margin: 10px 0 0 0;">Province</p>
					<input type="text" id="add_brgy" class="form-control last-name" 
							value="<?php echo $result[0]['add_province']; ?>" name="add_province"  placeholder="<?php if(!isset($result[0]['add_province'])) { echo 'Province'; } ?>">


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
					<input type="text" id="account_number" class="form-control last-name" 
							placeholder ="not set" name="security_answer" style="display: none;">


						<br><br>

					<p class="dashboard-title">User Identification</p>
					<p class="fname-text" style="margin: 0;">Government-issued ID</p>
					<select class="form-control last-name" name="id_type">
						<option>Student ID</option>
						<option>TIN ID</option>
						<option>Police Clearance</option>
						<option>PAGIBIG ID</option>
					</select>
					<p class="lname-text" style="margin: 0;">ID Number</p>
					<input type="text" id="id_number" class="form-control last-name" 
							placeholder ="Ex. K1129082" name="id_number" value="<?php echo $result[0]['id_number']; ?>" maxlength="8">

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
						url:'page-actions/seller-settings-action.php',
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

		$('#form_wall').on('submit', function() {
			var form_data = new FormData(this);
			$.ajax({
				url:'page-actions/seller-settings-action-extension.php',
				method:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				success:function(data) {
				}
			})
		});

	});
</script>