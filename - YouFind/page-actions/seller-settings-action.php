<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
		if($_FILES['upload_profile_picture']['tmp_name'] != '') {
			$user_id = $_SESSION['seller_user_id'];
			$ext = end(explode('.', $_FILES['upload_profile_picture']['name']));
			$name = md5(rand());
			$location = '../1.User/profile-pictures/' .$name.'.'.$ext;
			$profile_picture_name = $name.'.'.$ext;
			
			if(move_uploaded_file($_FILES['upload_profile_picture']['tmp_name'], $location)) {
				$getPicName = 'SELECT profile_picture FROM youfind_user WHERE user_id = "'.$user_id.'"';
				$statementPicName = $connect->prepare($getPicName);
				$statementPicName->execute();
				$result = $statementPicName->fetchAll();
				
				if(file_exists('../1.User/profile-pictures/'.$result[0]['profile_picture'])) {
					@unlink('../1.User/profile-pictures/'.$result[0]['profile_picture']);
				}
				$query = 'UPDATE youfind_user SET profile_picture = :profile_picture WHERE user_id = '.$_SESSION['seller_user_id'].'';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':profile_picture' => $profile_picture_name
					)
				);
				echo '<img src="1.User/profile-pictures/'.$profile_picture_name.'" class="user-pic-image" width="100%" height="100%">';
			}
				
			
		}

 ?>