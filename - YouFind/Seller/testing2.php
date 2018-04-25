<?php 
	$output = '';
	if(is_array($_FILES)) {
		foreach($_FILES['files']['name'] as $name => $value) {
			if($_FILES['files']['name'][$name]) {
				if($_FILES['files']['name'][$name] < 6) {
					echo $output .= 'asd';
				}
			}
		}
		echo $output;
	}

 ?>