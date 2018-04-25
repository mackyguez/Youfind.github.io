<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	if(@$_POST['action_load_product'] == 'load_product') {
		$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.$_SESSION['customer_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();

		$item = '<table width="100%">
				<tr>
					<th class="product-header" width="64%">Product</th>
					<th class="product-header" width="5%">Quantity</th>
					<th class="product-header" width="30%">Unit Price</th>
				</tr>';

		for($i=0; $i<$count; $i++) {
		$item .= '	
			<tr>
				<td class="product-data" width="64%">'.$result[$i]['product_name'].'</th>
				<td class="product-data" width="5%">'.$result[$i]['product_quantity'].'</th>
				<td class="product-data" width="30%">&#8369; '.number_format($result[$i]['product_price'],2).'</th>
			</tr>';
		}
		$item .= '</table>';

		$array = array(
			'product_info' => $item
		);
		echo json_encode($array);
	}

	if(@$_POST['action'] == 'load') {
		$_SESSION['delivery_option'] = 'standard';
		$query = 'SELECT * FROM user_cart_tbl WHERE user_id = '.@$_SESSION['customer_user_id'].'';
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$count = $statement->rowCount();
			$total = '';
			foreach($result as $row) {
				$total += $row['product_price'] * $row['product_quantity'];
			}
			if($count > 0) {
				echo number_format($total, 2);
				$_SESSION['total_amount'] = $total;
			}
			else {
				echo '0.00';
			}
	}
	if(@$_POST['action_pick_address'] == 'address_primary') {
		$_SESSION['address_id'] = $_POST['address_id_primary'];
		$_SESSION['first_name'] = $_POST['address_first_name'];
		$_SESSION['last_name'] = $_POST['address_last_name'];
		$_SESSION['add_street'] = $_POST['address_add_street'];
		$_SESSION['add_brgy'] = $_POST['address_add_brgy'];
		$_SESSION['add_city'] = $_POST['address_add_city'];
		$_SESSION['add_province'] = $_POST['address_add_province'];
		$_SESSION['contact_number'] = $_POST['address_contact_number'];
		echo 'Done';
	}
	if(@$_POST['action_pick_address'] == 'address_added1') {
		$_SESSION['address_id'] = $_POST['address_id_added1'];
		$_SESSION['first_name'] = $_POST['address_first_name'];
		$_SESSION['last_name'] = $_POST['address_last_name'];
		$_SESSION['add_street'] = $_POST['address_add_street'];
		$_SESSION['add_brgy'] = $_POST['address_add_brgy'];
		$_SESSION['add_city'] = $_POST['address_add_city'];
		$_SESSION['add_province'] = $_POST['address_add_province'];
		$_SESSION['contact_number'] = $_POST['address_contact_number'];
		echo 'Done';
	}
	if(@$_POST['action_pick_address'] == 'address_added2') {
		$_SESSION['address_id'] = $_POST['address_id_added2'];
		$_SESSION['first_name'] = $_POST['address_first_name'];
		$_SESSION['last_name'] = $_POST['address_last_name'];
		$_SESSION['add_street'] = $_POST['address_add_street'];
		$_SESSION['add_brgy'] = $_POST['address_add_brgy'];
		$_SESSION['add_city'] = $_POST['address_add_city'];
		$_SESSION['add_province'] = $_POST['address_add_province'];
		$_SESSION['contact_number'] = $_POST['address_contact_number'];
		echo 'Done';
	}
	if(@$_POST['action_pick_address'] == 'address_added3') {
		$_SESSION['address_id'] = $_POST['address_id_added3'];
		$_SESSION['first_name'] = $_POST['address_first_name'];
		$_SESSION['last_name'] = $_POST['address_last_name'];
		$_SESSION['add_street'] = $_POST['address_add_street'];
		$_SESSION['add_brgy'] = $_POST['address_add_brgy'];
		$_SESSION['add_city'] = $_POST['address_add_city'];
		$_SESSION['add_province'] = $_POST['address_add_province'];
		$_SESSION['contact_number'] = $_POST['address_contact_number'];
		echo 'Done';
	}

	
 ?>