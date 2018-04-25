<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database', 'root', '');
		if(isset($_POST['action'])) { ?> 
			<table style="margin: 0; width: 100%;">
				<tr>
					<th width="1px"><input type="checkbox" name="selectAll" class="checkbox" id="selectAll"></th>
					<th width="5px">First Name</th>
					<th width="5px">Last Name</th>
					<th width="5px">Email</th>
					<th width="5px">User Type</th>
					<th width="5px">Status</th>
					<th width="5px">Action</th>
				</tr>
<?php 	
			if($_POST['action'] == 'load_users') {
				$output = '';
				$query = '
				SELECT * FROM youfind_user ORDER BY user_id DESC
				';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();

				foreach($result as $row) {
					$output .= '
						<tr>
							<td width="1px"><input type="checkbox" name="all" class="checkbox"></td>
							<td width="5px" data-id="'.$row['user_id'].'">'.$row['first_name'].'</td>
							<td width="5px">'.$row['last_name'].'</td>
							<td width="2px">'.$row['email'].'</td>
							<td width="5px">'.$row['user_type'].'</td>
					';
					if($row['user_status'] == 'None') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #c1f0c5; padding: 5px; border-radius: 5px;">'.$row['user_status'].'</p>
							</td>';
					}
					if($row['user_status'] == 'verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #53d65f; padding: 5px; border-radius: 5px;">'.$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'not verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="notverified" style="padding: 5px; background-color: #acadac; border-radius: 5px;">'.$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'banned') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="banned" style="background-color: #f33f3f; padding: 5px; border-radius: 5px;">'.$row['user_status'].'</p>
							</td>';
					}
					
					$output .=  '
							<td width="7px" style="padding: 0 0 0 8px;">
								<button id="edit_button" class="myBtnClass" data-user_id="'.$row['user_id'].'">
									<img src="images/edit.png" width="20px" height="20px;" title="Edit">
								</button>
								<button id="delete_button" class="myBtnClass" data-user_id="'.$row['user_id'].'">
									<img src="images/delete.png" width="20px" height="20px;" title="Delete">
								</button>
								<button id="ban_button" class="myBtnClass" data-user_id="'.$row['user_id'].'">
									<img src="images/ban.png" width="20px" height="20px;" title="Ban">
								</button>
							</td>';
					$output .= '</tr>';
				}
				$output .= '</table>';
				echo $output;
			}//end action load_users
		}//end ISSET 
?>
<?php 

/**

*/

 ?>