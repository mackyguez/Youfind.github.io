<?php 
	if($_FILES['image']['tmp_name']) {
		$test = explode('.', $_FILES["image"]["name"]);
 		$ext = end($test);
 		$name = rand(100, 999) . '.' . $ext;
 		$location = './upload/' . $name;  
 		move_uploaded_file($_FILES["image"]["tmp_name"], $location);
 		echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
	}

 ?>