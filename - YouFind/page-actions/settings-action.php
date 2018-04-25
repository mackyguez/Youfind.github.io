<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
		if($_FILES['upload_profile_picture']['tmp_name'] != '') {
			@$user_id = $_SESSION['customer_user_id'];
			$ext = end(explode('.', $_FILES['upload_profile_picture']['name']));
			$name = md5(rand());
			$location = '../1.User/profile-pictures/' .$name.'.'.$ext;
			$profile_picture_name = $name.'.'.$ext;

			$pic_name = '';
			$getPicName = 'SELECT profile_picture FROM youfind_user WHERE user_id = "'.$user_id.'"';
			$statementPicName = $connect->prepare($getPicName);
			$statementPicName->execute();
			$result = $statementPicName->fetchAll();
			foreach($result as $row) {
				$pic_name = $row['profile_picture'];
			}
			if(file_exists('1.User/profile-pictures/'.$pic_name)) {
				@unlink('1.User/profile-pictures/'.$pic_name);
			}
			

			move_uploaded_file($_FILES['upload_profile_picture']['tmp_name'], $location);
			$query = 'UPDATE youfind_user SET profile_picture = :profile_picture WHERE user_id = :user_id';
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':user_id'				=>	$user_id,
					':profile_picture'		=> 	$profile_picture_name
				)
			);
			$image = '';
			$select_profile = 'SELECT profile_picture FROM youfind_user WHERE user_id = "'.$user_id.'"';
			$prepareStatement = $connect->prepare($select_profile);
			$prepareStatement->execute();
			$result = $prepareStatement->fetchAll();
			foreach($result as $row) {
				$image = $row['profile_picture'];
			}
			echo '<img src="1.User/profile-pictures/'.$image.'" class="user-pic-image" width="100%" height="100%">';
			
		}

 ?>