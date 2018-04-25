<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	if(isset($_POST['pick_search'])) {
		
		if($_POST['pick_search'] == 'Customer') {
			$output = '
				<tr style="font-weight: bold; height: 30px; background-color: #f3f4d1;">
					<td class="td-header fname" width="152.25px">First Name</td>
					<td class="td-header lname" width="152.25px">Last Name</td>
					<td class="td-header email" width="253.75">Email</td>
					<td class="td-header" width="101.5px">User Type</td>
					<td class="td-header" width="152.25px">Status</td>
					<td class="td-header action" width="152.25px">Action</td>
				</tr>
			';
				$query = 'SELECT * FROM youfind_user WHERE user_type = "Customer" ORDER BY email ASC';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					$output .= '
						<tr height="50px" style="border-bottom: 1px solid black;">
							<td>'.@$row['first_name'].'</td>
							<td>'.@$row['last_name'].'</td>
							<td>'.@$row['email'].'</td>
							<td>'.@$row['user_type'].'</td>
					';
					if($row['user_status'] == 'verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #53d65f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'not verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="notverified" style="padding: 5px; background-color: #acadac;
									border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'banned') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="banned" style="background-color: #f33f3f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else {
						$output .= '<td>'.@$row['user_status'].'</td>';
					}
					$output .= '
							<td style=" padding: 10px;">
								<input type="button" id="verify_id" class="btn-default verify" value="Verify User" style="border: none;" data-user_verify_id="'.$row['user_id'].'">
								<input type="button" id="edit_id" class="btn-default edit" value="Edit" style="border: none;" data-user_edit_id="'.$row['user_id'].'">
								<input type="button" id="delete_id" class="btn-default delete" value="Delete" style="border: none;" data-user_delete_id="'.$row['user_id'].'">
								<input type="button" id="ban_id" class="btn-default ban" value="Ban User" style="border: none;" data-user_ban_id="'.$row['user_id'].'">
								<input type="button" id="view_files_id" class="btn-default view-files" value="View Files" style="border: none;" data-user_view_files_id="'.$row['user_id'].'">
							</td>
						</tr>
					';
				}//foreach end
		echo $output;
		}
		if($_POST['pick_search'] == 'Verified - Entrepreneurs') {
			$output = '
				<tr style="font-weight: bold; height: 30px; background-color: #f3f4d1;">
					<td class="td-header fname" width="152.25px">First Name</td>
					<td class="td-header lname" width="152.25px">Last Name</td>
					<td class="td-header email" width="253.75">Email</td>
					<td class="td-header" width="101.5px">User Type</td>
					<td class="td-header" width="152.25px">Status</td>
					<td class="td-header action" width="152.25px">Action</td>
				</tr>
			';
				$query = 'SELECT * FROM youfind_user WHERE user_type = "Seller" AND user_status = "verified" ORDER BY email ASC';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					$output .= '
						<tr height="50px" style="border-bottom: 1px solid black;">
							<td>'.@$row['first_name'].'</td>
							<td>'.@$row['last_name'].'</td>
							<td>'.@$row['email'].'</td>
							<td>'.@$row['user_type'].'</td>
					';
					if($row['user_status'] == 'verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #53d65f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'not verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="notverified" style="padding: 5px; background-color: #acadac;
									border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'banned') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="banned" style="background-color: #f33f3f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else {
						$output .= '<td>'.@$row['user_status'].'</td>';
					}
					$output .= '
							<td style=" padding: 10px;">
								<input type="button" id="verify_id" class="btn-default verify" value="Verify User" style="border: none;" data-user_verify_id="'.$row['user_id'].'">
								<input type="button" id="edit_id" class="btn-default edit" value="Edit" style="border: none;" data-user_edit_id="'.$row['user_id'].'">
								<input type="button" id="delete_id" class="btn-default delete" value="Delete" style="border: none;" data-user_delete_id="'.$row['user_id'].'">
								<input type="button" id="ban_id" class="btn-default ban" value="Ban User" style="border: none;" data-user_ban_id="'.$row['user_id'].'">
								<input type="button" id="view_files_id" class="btn-default view-files" value="View Files" style="border: none;" data-user_view_files_id="'.$row['user_id'].'">
							</td>
						</tr>
					';
				}//foreach end
		echo $output;
		}
		if($_POST['pick_search'] == 'Unverified - Entrepreneurs') {
			$output = '
				<tr style="font-weight: bold; height: 30px; background-color: #f3f4d1;">
					<td class="td-header fname" width="152.25px">First Name</td>
					<td class="td-header lname" width="152.25px">Last Name</td>
					<td class="td-header email" width="253.75">Email</td>
					<td class="td-header" width="101.5px">User Type</td>
					<td class="td-header" width="152.25px">Status</td>
					<td class="td-header action" width="152.25px">Action</td>
				</tr>
			';
				$query = 'SELECT * FROM youfind_user WHERE user_type = "Seller" AND user_status = "not verified" ORDER BY email ASC';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					$output .= '
						<tr height="50px" style="border-bottom: 1px solid black;">
							<td>'.@$row['first_name'].'</td>
							<td>'.@$row['last_name'].'</td>
							<td>'.@$row['email'].'</td>
							<td>'.@$row['user_type'].'</td>
					';
					if($row['user_status'] == 'verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #53d65f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'not verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="notverified" style="padding: 5px; background-color: #acadac;
									border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'banned') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="banned" style="background-color: #f33f3f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else {
						$output .= '<td>'.@$row['user_status'].'</td>';
					}
					$output .= '
							<td style=" padding: 10px;">
								<input type="button" id="verify_id" class="btn-default verify" value="Verify User" style="border: none;" data-user_verify_id="'.$row['user_id'].'">
								<input type="button" id="edit_id" class="btn-default edit" value="Edit" style="border: none;" data-user_edit_id="'.$row['user_id'].'">
								<input type="button" id="delete_id" class="btn-default delete" value="Delete" style="border: none;" data-user_delete_id="'.$row['user_id'].'">
								<input type="button" id="ban_id" class="btn-default ban" value="Ban User" style="border: none;" data-user_ban_id="'.$row['user_id'].'">
								<input type="button" id="view_files_id" class="btn-default view-files" value="View Files" style="border: none;" data-user_view_files_id="'.$row['user_id'].'">
							</td>
						</tr>
					';
				}//foreach end
		echo $output;
		}
		if($_POST['pick_search'] == 'Banned') {
			$output = '
				<tr style="font-weight: bold; height: 30px; background-color: #f3f4d1;">
					<td class="td-header fname" width="152.25px">First Name</td>
					<td class="td-header lname" width="152.25px">Last Name</td>
					<td class="td-header email" width="253.75">Email</td>
					<td class="td-header" width="101.5px">User Type</td>
					<td class="td-header" width="152.25px">Status</td>
					<td class="td-header action" width="152.25px">Action</td>
				</tr>
			';
				$query = 'SELECT * FROM youfind_user WHERE user_type = "Seller" AND user_status = "banned" ORDER BY email ASC';
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					$output .= '
						<tr height="50px" style="border-bottom: 1px solid black;">
							<td><input type="checkbox" name="input_checkbox" id="input_checkbox"></td>
							<td>'.@$row['first_name'].'</td>
							<td>'.@$row['last_name'].'</td>
							<td>'.@$row['email'].'</td>
							<td>'.@$row['user_type'].'</td>
					';
					if($row['user_status'] == 'verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="verified" style="background-color: #53d65f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'not verified') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="notverified" style="padding: 5px; background-color: #acadac;
									border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else if($row['user_status'] == 'banned') {
						$output .= '
							<td width="5px" style="padding:5px;"><p class="banned" style="background-color: #f33f3f; padding: 5px; border-radius: 20px;">'.@$row['user_status'].'</p>
							</td>';
					}
					else {
						$output .= '<td>'.@$row['user_status'].'</td>';
					}
					$output .= '
							<td style=" padding: 10px;">
								<input type="button" id="verify_id" class="btn-default verify" value="Verify User" style="border: none;" data-user_verify_id="'.$row['user_id'].'">
								<input type="button" id="edit_id" class="btn-default edit" value="Edit" style="border: none;" data-user_edit_id="'.$row['user_id'].'">
								<input type="button" id="delete_id" class="btn-default delete" value="Delete" style="border: none;" data-user_delete_id="'.$row['user_id'].'">
								<input type="button" id="ban_id" class="btn-default ban" value="Ban User" style="border: none;" data-user_ban_id="'.$row['user_id'].'">
								<input type="button" id="view_files_id" class="btn-default view-files" value="View Files" style="border: none;" data-user_view_files_id="'.$row['user_id'].'">
							</td>
						</tr>
					';
				}//foreach end
		echo $output;
		}
	}
 ?>