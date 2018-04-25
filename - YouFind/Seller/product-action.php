<?php 
	include('../database_connection.php');

	$output = '';
	$last_product_id = $_SESSION['last_product_id_insert'];
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$last_product_id.'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	if(@$_POST['action'] == 'load_last_product_insert') {
		foreach($result as $row) {
			echo $row['product_title'];
		}
	}
	if(@$_POST['action_directory'] == 'load_directory_product_title') {
		foreach($result as $row) {
			echo $row['product_title'];
		}
	}
	if(@$_POST['action_image'] == 'load_product_image') {
		foreach($result as $row) {
			echo '<img src="../product-photo/'.$row['product_photo'].'" width="100%" height="100%">';
		}
	}
	if(@$_POST['action_prod_overview'] == 'load_product_overview') {
		foreach($result as $row) {
			echo $row['product_overview'];
		}	
	}
	if(@$_POST['action_prod_price'] == 'load_product_price') {
		foreach($result as $row) {
			$product_price = preg_replace('/[^0-9.]+/', '', $row['product_price']);
			echo 'P'.@number_format($product_price,2);
		}	
	}
	if(@$_POST['action'] == 'action_prod_title_edit') {
		foreach($result as $row) {
			echo '<input type="text" class="form-control" placeholder="'.$row['product_title'].'" style="width: 100%;">';
		}
	}
	if(@$_POST['action'] == 'change_product_title') {
		if($_POST['edit_product_title'] == '') {
			echo 'Product Title must not be empty';
		}
		else {
			$query = '
				UPDATE index_newsfeed_tbl 
				SET product_title = :product_title, product_overview = :product_overview, product_price = :product_price,
					in_box1 = :in_box1, in_box2 = :in_box2, in_box3 = :in_box3, in_box4 = :in_box4, specs1 = :specs1, specs2 = :specs2, specs3 = :specs3, specs4 = :specs4
				WHERE product_id = :product_id';
			$statement = $connect->prepare($query);
			$statement->execute(
			array(
				':product_title'		=> $_POST['edit_product_title'],
				':product_overview'		=> $_POST['product_overview'],
				':product_price'		=> $_POST['product_price'],
				':in_box1'				=> $_POST['in_box1'],
				':in_box2'				=> $_POST['in_box2'],
				':in_box3'				=> $_POST['in_box3'],
				':in_box4'				=> $_POST['in_box4'],
				':specs1'				=> $_POST['specs1'],
				':specs2'				=> $_POST['specs2'],
				':specs3'				=> $_POST['specs3'],
				':specs4'				=> $_POST['specs4'],
				':product_id'			=> $last_product_id
			)
			);
			$result = $statement->fetchAll();
			if($result > 0) {
				echo 'Done';
			}
		}
	}
	if(@$_POST['action'] == 'product_price_edit') {
		$product_price = $_POST['product_price'];
		$output = '';
		if(@$product_price[0] > 0 || @$product_price[0] == 'P') {
			$output = preg_replace('/[^0-9.]+/', '', $product_price);
		}
		else {
			$output = 0;
		}
		echo 'P'.@number_format($output, 2);
	}
	if(@$_POST['action_load_in_box'] == 'load_in_box') {
		$output = '';
		foreach($result as $row) {
			$output = '<p class="desc-details">';
			if($row['in_box1'] == '') {
				$output .= '<p id="in_box1" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="in_box1" style="margin: 0;">'.$row['in_box1'].'</p>';	
			}
			if($row['in_box2'] == '') {
				$output .= '<p id="in_box2" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="in_box2" style="margin: 0;">'.$row['in_box2'].'</p>';	
			}
			if($row['in_box3'] == '') {
				$output .= '<p id="in_box3" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="in_box3" style="margin: 0;">'.$row['in_box3'].'</p>';	
			}
			if($row['in_box4'] == '') {
				$output .= '<p id="in_box4" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="in_box4" style="margin: 0;">'.$row['in_box4'].'</p>';	
			}
		}
			$output .= '</p>';
			echo $output;
	}

	if(@$_POST['action_load_specs'] == 'load_specs') {
		$output = '';
		foreach($result as $row) {
			$output = '<p class="desc-details">';
			if($row['specs1'] == '') {
				$output .= '<p id="specs1" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="specs1" style="margin: 0;">'.$row['specs1'].'</p>';	
			}
			if($row['specs2'] == '') {
				$output .= '<p id="specs2" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="specs2" style="margin: 0;">'.$row['specs2'].'</p>';	
			}
			if($row['specs3'] == '') {
				$output .= '<p id="specs3" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="specs3" style="margin: 0;">'.$row['specs3'].'</p>';	
			}
			if($row['specs4'] == '') {
				$output .= '<p id="specs4" style="margin: 0;">'.'Not set'.'</p>';
			}
			else {
				$output .= '<p id="specs4" style="margin: 0;">'.$row['specs4'].'</p>';	
			}
		}
			$output .= '</p>';
			echo $output;
	}
 ?>