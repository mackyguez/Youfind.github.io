<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	@session_start();
	$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

			foreach($result as $row) {
 ?>
 				<div id="profModal" class="modal fade" role="dialog">
				  <div class="modal-content">
					<div class="modal-header">
						<p class="modal-title-text">Edit Personal Information</p> 
						<span class="close" data-dismiss="modal" style="cursor: pointer;">&times;</span>
					</div>
					<div class="modal-input-content">
					<form id="modal_info_edit_form">
						<div class="first-prod-title">Client Name</div>
						<div class="first-prod-input"><input type="text" name="email-add" id="first_name" placeholder="Enter new name" class="input-style" value="<?php echo @$row['first_name']; ?>"></div>

						<div class="prod-title">Last Name</div>
						<div class="prod-input"><input type="text" name="email-add" id="last_name" placeholder="Enter new email address" class="input-style" value="<?php echo @$row['last_name']; ?>"></div>

						<div class="prod-title">Email Address</div>
						<div class="prod-input"><input type="text" name="email-add" id="email" placeholder="Enter new email address" class="input-style" value="<?php echo @$row['email']; ?>"></div>

						<div class="prod-title">Password</div>
						<div class="prod-input"><input type="password" name="password" id="password" placeholder="Enter new password" class="input-style"></div>

						<div class="prod-title">Re-type Password</div>
						<div class="prod-input"><input type="password" name="password" id="re_password" placeholder="Re-type your password" class="input-style"></div>

						<div class="prod-title">Contact Number</div>
						<div class="prod-input" style="border: 1px solid red;">
							<input type="text" name="contact-num" id="contact_number" placeholder="Enter new contact number" class="input-style" value="<?php echo @$row['contact_number']; ?>" style="border: 1px solid red;">
						</div>

						<div class="prod-title">Address</div>
						<div class="prod-input" style="border: 1px solid red;">
							<input type="text" name="street" placeholder="Street" class="input-style" id="add_street" value="<?php echo @$row['add_street']; ?>">
						</div>
						<div class="prod-input" style="margin-left: 115px;">
							<input type="text" name="barangay" placeholder="Barangay" class="input-style" id="add_brgy" value="<?php echo @$row['add_brgy']; ?>">
						</div>
						<div class="prod-input" style="margin-left: 115px;">
							<input type="text" name="city" placeholder="City" class="input-style" id="add_city" value="<?php echo @$row['add_city']; ?>">
						</div>
						<div class="prod-input" style="margin-left: 115px;">
							<input type="text" name="province" placeholder="Province" class="input-style" id="add_province" value="<?php echo @$row['add_province']; ?>">
						</div>
					</form>
					</div>
					<div class="modal-submit">
						<input type="submit" name="submit" class="input-submit" id="update_user">
					</div>
				  </div>
				</div>





 <?php
			}

 ?>