<?php 
	include('database_connection.php');
		if(isset($_POST['search_something'])) {
			$output = '';
			
			if($_POST['select_search'] == 'Products') {
				$query = '
					SELECT product_name from product_tbl 
					WHERE product_name LIKE "%":product_name"%"
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':product_name' => $_POST['search_something']
					)
				);
				$count = $statement->rowCount();
				$output = '<ul class="list-unstyled" style="margin="0">';
				if($count > 0) {
					$result = $statement->fetchAll();
					foreach($result as $row) {
						$output .= '<li style="cursor: pointer;"><b>Products</b>&nbsp; - &nbsp;&nbsp;'.$row['product_name'].'</li>';
					}
				}
				else {
					$output .= '<li>Sorry we do not have any product like that.</li>';
				}
				$output .= '</ul>';
				echo $output;
			}


			else if($_POST['select_search'] == 'Services') {
				$query2 = '
					SELECT services_name from services_tbl 
					WHERE services_name LIKE "%":services_name"%"
				';
				$statement2 = $connect->prepare($query2);
				$statement2->execute(
					array(
						':services_name' => $_POST['search_something']
					)
				);
				$count2 = $statement2->rowCount();
				$output = '<ul class="list-unstyled" style="margin="0">';
				if($count2 > 0) {
					$result2 = $statement2->fetchAll();
					foreach($result2 as $row2) {
						$output .= '<li style="cursor: pointer;"><b>Services</b>&nbsp;&nbsp;- &nbsp;&nbsp;'.$row2['services_name'].'</li>';
					}
				}
				else {
					$output .= '<li>Sorry we do not have any service/s like that.</li>';
				}
				$output .= '</ul>';
				echo $output;	
			}
		}

 ?>