<?php 

	$folder = array_filter(glob('*'), 'is_dir');

	mkdir($folder[0].'/JohnOlangco', 0777, true);


 ?>