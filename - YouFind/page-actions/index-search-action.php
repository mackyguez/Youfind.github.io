<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database','root', '');
	session_start();

		if(@$_POST['action'] == 'search') {
			$output = '';
			$query = 'SELECT DISTINCT product_name FROM index_newsfeed_tbl WHERE product_name LIKE "%'.$_POST['query'].'%"';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();

			$output = '<ul class="list-unstyled">';
			if($count > 0) {
				for($i=0; $i<$count; $i++) {
					$output .= '<li class="search-item">'.$result[$i]['product_name'].'</li>';
				}
			}
			else {
				$output .= '<li class="search-item">Product not found</li>';
			}
			$output .= '</ul>';
			echo $output;
		}
