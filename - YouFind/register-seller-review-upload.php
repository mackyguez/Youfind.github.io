<?php 
	include('database_connection.php');
	if($_FILES['profile_image']['name'] != '') {
		$last_id = $_SESSION['last_id'];
		$test = end(explode('.', $_FILES['profile_image']['name']));
		$name = md5(rand());
		$location = '1.User/profile-pictures/' .$name.'.'.$test;

		if(!file_exists($location)) {
			@unlink('1.User/profile-pictures/'.$_SESSION['photo_old_name']);
		}

		move_uploaded_file($_FILES['profile_image']['tmp_name'], $location);
		$_SESSION['photo_old_name'] = $name.'.'.$test;
		echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail prof-image" />';
		
		/*******************************************/
		$dp_name = $name .'.'.$test;
		$query = '
			UPDATE temp_database set profile_picture = :profile_picture WHERE id = :user_id
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':profile_picture'		=> $dp_name,
				':user_id'				=> $last_id
			)
		);
		

	}
	else {
		echo 'None';
	}
 ?>