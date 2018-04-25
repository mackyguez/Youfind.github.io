<?php 
	include('database_connection.php');

		$user_id = $_SESSION['customer_user_id'];
		if(isset($_POST['action'])) {
			
			if(@$_POST['action'] == 'load_left_upper') {
				$first_name = '';
				$last_name = '';
				$profile_picture = '';
				$add_city = '';
				$output = '';
				$query = 'SELECT * FROM youfind_user WHERE user_id = '.$user_id.' ';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$profile_picture = $row['profile_picture'];
					$add_city = $row['add_city'];
				}?>
				<div class="user-pic-holder-left">
						<div class="user-pic" id="user_pic">
				<?php 		if($profile_picture == '') { ?>
								<img src="images/user.jpg" class="user-pic-image" data-picture="<?php echo @$user_id; ?>" id="user_picture">
				<?php 		}
				 			else { ?>
								<img src="1.User/profile-pictures/<?php echo @$profile_picture; ?>" class="user-pic-image" data-picture="<?php echo @$user_id; ?>" id="user_picture">
				<?php 		} ?>
							
						</div>
						<form enctype="multipart/form-data" id="form_wall" style="margin: 0;">
							<input type="file" id="upload_profile_picture" name="upload_profile_picture" class="upload-profile-picture">
						</form>
					</div>
					<div class="user-details-holder-right">
						<p class="user-name"><?php echo @$first_name .' '. @$last_name; ?></p>
						<input type="button" class="edit-profile-button" name="edit_profile" data-user_id="<?php echo @$user_id; ?>" id="edit_profile_button" value="Edit profile">
						<p class="user-address"><?php echo @$add_city; ?></p>
					</div>


				
<?php
			}


			if($_POST['action'] == 'update') {
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				if($first_name == '' || $last_name == '') {
					echo 'Both fields are required';
				}
				else {
					$query = 'UPDATE youfind_user SET last_name = :last_name ,first_name = :first_name, account_name = :account_name, account_number = :account_number  where user_id = :user_id';
					$statement = $connect->prepare($query);
					$statement->execute(
						array(
							':last_name'			=> $last_name,
							':first_name'			=> $first_name,
							':account_number'		=> $_POST['account_number'],
							':account_name'		=> $_POST['account_name'],
							':user_id'				=> $user_id
						)
					);
					$result = $statement->rowCount();
					if($result > 0) {
						echo 'Done';
					}
				}
			}
			
		}

 ?>