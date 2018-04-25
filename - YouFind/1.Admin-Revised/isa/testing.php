<?php 
	
	$a = array('asd', 'asd');

	$b = array();

	foreach ($a as $key => $values) {
		$b[$key] = $values;
	}

	foreach($b as $row => $values) {
		echo $values;
	}

 ?>