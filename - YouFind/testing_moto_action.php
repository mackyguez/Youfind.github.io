<?php 
	$connect = new PDO('mysql:host=localhost;dbname=photos', 'root', '');

	if($_FILES['image']['tmp_name']) {

		$image_name = addslashes($_FILES['image']['name']);
		$image = addslashes($_FILES['image']['tmp_name']);
		$image = file_get_contents($_FILES['image']['tmp_name']);
		$image = base64_encode($image);
		
		$test = explode('.', $_FILES["image"]["name"]);
 		$ext = end($test);
 		$name = rand(100, 999) . '.' . $ext;
 		$location = 'upload/' . $image_name;  
 		if(move_uploaded_file($_FILES["image"]["tmp_name"], $location)) {
 			$query = '
 				INSERT INTO images(image)
 				VALUES(:image)
 			';
 			$statement = $connect->prepare($query);
 			$statement->execute(
 				array(
 					':image' => $image_name
 				)
 			);
 			$result = $statement->fetchAll();
 			if(isset($result)) {
 				$query = 'SELECT * FROM images where id =1';
 				$statement = $connect->prepare($query);
 				$statement->execute();
 				$result = $statement->fetchAll();
 				foreach($result as $row) {
 					echo '<img src="upload/'.$row['image'].'">';
 				}
 			}

 		}
		
		/*
		$query = '
			INSERT INTO images(image)
			VALUES(:image_name)
		';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':image_name' => $name
			)
		);
		$display = 'SELECT * FROM images where id = 1';
		$statement = $connect->prepare($display);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			echo '<img src="upload/'.$row['image'].'">';
		}
		*/

	}

 ?>