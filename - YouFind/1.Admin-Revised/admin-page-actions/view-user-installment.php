<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action'] == 'accept') {
		echo $_POST['installment_id'];
	}
?>
<?php
	if(@$_POST['action_view_file'] == 'view_user_files') {

		$id = $_POST['user_view_files_id'];
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$id.'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		$photo = '';
		if($result[0]['profile_picture'] == '') {
			$photo = '../images/user.jpg';
		}	?>

		<div id="view_files_modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" id="close_view_files-x" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><span id="change_title"></span>User Information:</h4>
					</div>
					<div class="modal-body" style="overflow: hidden;">
						<div class="user-holder">
							<div class="user-dp-wrapper"><img src="<?php if($result[0]['profile_picture'] == '') { echo '../images/user.jpg'; } else {echo '../1.User/profile-pictures/'.$result[0]['profile_picture']; } ?>" width="100%" height="100%"></div>
							<div class="user-info-wrapper">
								<p class="user-name" id="user_name"><?php echo $result[0]['first_name'].' '.$result[0]['last_name']; ?></p>
								<p class="user-address" id="user_address">
									<?php 
											if($result[0]['add_street']== '' || $result[0]['add_brgy'] == '' || $result[0]['add_city'] == '' || $result[0]['add_province'] == '') {
												echo 'Not set';
											}
											else {
												echo $result[0]['add_street'].' '.$result[0]['add_brgy'].' '.$result[0]['add_city'].' '.$result[0]['add_province'];
											}
									 ?>
								</p>
								<p class="user-phone" id="contact_number"><?php echo $result[0]['contact_number']; ?></p>
							</div>
						</div>
						<hr class="user-line">
						<div class="personal-wrapper">
							<p class="account-information">Account Information</p>
							<div class="info-holder">
								<p class="type-title">Account Type:</p>
								<p class="type-text" id="user_type"><?php echo $result[0]['user_type']; ?></p>
							</div>
							<div class="info-holder">
								<p class="email-title">Email:</p>
								<p class="email-text" id="email"><?php echo $result[0]['email']; ?></p>
							</div>
							<div class="info-holder">
								<p class="status-title">Status:</p>
								<p class="status-text" id="user_status"><?php echo ucfirst($result[0]['user_status']); ?></p>
							</div>
						</div>


						<hr class="user-line">
						<div class="personal-wrapper">
							<p class="account-information">Bank Information</p>
							<div class="info-holder">
								<p class="acc-name-title">Account Name:</p>
								<p class="acc-name-text" id="full_name"><?php echo $result[0]['account_name']; ?></p>
							</div>
							<div class="info-holder">
								<p class="acc-num-title">Account Number:</p>
								<p class="acc-num-text"><?php echo $result[0]['account_number']; ?></p>
							</div>
							<div class="info-holder">
								<p class="bank-name-title">Bank Name:</p>
								<p class="bank-name-text">Bank of the Philippine Islands</p>
							</div>
						</div>

						<hr class="user-line">

						<div class="id-wrapper">
							<p class="account-information">ID Information</p>
							<div class="info-holder">
								<p class="id-type-title">ID Type:</p>
								<p class="id-type-text"><?php echo $result[0]['select_id']; ?></p>
							</div>
							<div class="info-holder">
								<p class="id-num-title">ID Number:</p>
								<p class="id-num-text"><?php echo $result[0]['id_number'];?></p>
							</div>
								<div class="id-photo-wrapper" style="margin-left: 12%;"><img src="../upload/<?php echo $result[0]['front_id']; ?>" width="100%" height="100%" style="border-radius: 4px;"></div>
								<div class="id-photo-wrapper"><img src="../upload/<?php echo $result[0]['back_id']; ?>" width="100%" height="100%" style="border-radius: 4px;"></div>
								<p class="front">Front</p>
								<p class="back">Back</p>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="close_view_files" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
	<?php } ?>
 	

