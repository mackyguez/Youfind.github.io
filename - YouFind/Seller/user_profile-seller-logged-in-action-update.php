<?php 
	include('../database_connection.php');

	if($_POST['action'] == 'load_left_upper') {
		@$user_id = $_SESSION['seller_user_id'];
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
			}
			if($add_city == null) {
				$add_city = 'Not Set';
			}
			$output = '
				<div class="user-pic-holder-left">
					<div class="user-pic" id="user_pic">';
					if(@$profile_picture == '') {
						$output .= '<img src="../images/user.jpg" class="user-pic-image" data-picture="'.@$user_id.'" id="user_picture">';	
					}
					else {
						$output .= '<img src="../1.User/profile-pictures/'.$profile_picture.'" class="user-pic-image" data-picture="'.@$user_id.'" id="user_picture">';
					}
			$output .= '
					</div>
					<form enctype="multipart/form-data" id="form_wall" style="margin: 0;">
						<input type="file" id="upload_profile_picture" name="upload_profile_picture" class="upload-profile-picture">
					</form>
				</div>
				<div class="user-details-holder-right">
					<p class="user-name">'.@$first_name .' '. $last_name .'</p>
					<input type="button" class="edit-profile-button" name="edit_profile" data-user_id="'.$user_id.'" id="edit_profile_button" value="Edit profile">
					<p class="user-address">'
					.$add_city.'</p>
					<p class="ratings-text">Ratings</p>
					<img src="images/star-ratings.png" class="star-ratings-image">
				</div>
			';
			echo $output;
			$connect = null;
		}

	if($_POST['action'] == 'seller_update_info') {
		$check = '';
		$check_email = 'SELECT DISTINCT email from youfind_user';
		$emailStatement = $connect->prepare($check_email);
		$emailStatement->execute();
		$result = $emailStatement->fetchAll();
		foreach($result as $row) {
			if($_POST['email'] == $row['email']) {
				$check = 'invalid';
				break;
			}
			else {
				$check = 'valid';
			}
		}

			if($check == 'valid') {
				$seller_user_id = $_SESSION['seller_user_id'];
				$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$query = '
					UPDATE youfind_user 
					SET first_name = :first_name, last_name = :last_name,
					email = :email, password = :password, contact_number = :contact_number,
					add_street = :add_street, add_brgy = :add_brgy, add_city = :add_city,
					add_province = :add_province
					WHERE user_id = :user_id
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':first_name'			=> $_POST['first_name'],
						':last_name'			=> $_POST['last_name'],
						':email'				=> $_POST['email'],
						':password'				=> $hash,
						':contact_number'		=> $_POST['contact_number'],
						':add_street'			=> $_POST['add_street'],
						':add_brgy'				=> $_POST['add_brgy'],
						':add_city'				=> $_POST['add_city'],
						':add_province'			=> $_POST['add_province'],
						':user_id'				=> $seller_user_id
					)
				);
				$result = $statement->rowCount();
				if($result > 0) {
					echo 'Done';
				}
			}
			else {
				echo 'inUseEmail';
			}
	$connect = null;
	}
 ?>