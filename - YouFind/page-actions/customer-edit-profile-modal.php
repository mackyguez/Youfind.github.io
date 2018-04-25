<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
 ?>

<div id="editProfileModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span id="change_title"></span>Edit Profile</h4>
			</div>
			<div class="modal-body">
				<p class="fname-text" style="margin: 0;">First Name</p>
				<input type="text" id="first_name" class="form-control first-name" value="<?php echo $result[0]['first_name']; ?>">
				<p class="lname-text" style="margin: 0;">Last Name</p>
				<input type="text" id="last_name" class="form-control last-name" value="<?php echo $result[0]['last_name']; ?>">
				<p class="lname-text" style="margin: 10px 0 0 0;">Bank Account Name</p>
				<input type="text" id="account_name" class="form-control last-name" 
						value="<?php echo $result[0]['account_name']; ?>" 
						placeholder="<?php 	if($result[0]['account_name']!= '') {
									echo $result[0]['account_name'];
								}
								else {
									echo 'Not set';
								}
						?>">
				<p class="lname-text" style="margin: 10px 0 0 0;">Account Number</p>
				<input type="text" id="account_number" class="form-control last-name" 
						value="<?php echo $result[0]['account_number']; ?>" 
						placeholder="<?php 	if($result[0]['account_number']!= '') {
									echo $result[0]['account_number'];
								}
								else {
									echo 'Not set';
								}
						?>">
				<input type="button" id="update" value="Update" class="update-button form-control" >
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>