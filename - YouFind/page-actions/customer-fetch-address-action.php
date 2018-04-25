<?php 
$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
session_start();
$mainQuery = 'SELECT DISTINCT * FROM youfind_user WHERE user_id = '.$_SESSION['customer_user_id'].'';
$statement = $connect->prepare($mainQuery);
$statement->execute();
$result = $statement->fetchAll();

if($_POST['action'] == 'load_addresses') { ?>
	<div class="customer-info" id="address_id_primary" 
			data-address_id_primary="<?php echo $result[0]['user_id']; ?>"
			data-address_first_name="<?php echo $result[0]['first_name']; ?>"
			data-address_last_name="<?php echo $result[0]['last_name']; ?>"
			data-address_add_street="<?php echo $result[0]['add_street']; ?>"
			data-address_add_brgy="<?php echo $result[0]['add_brgy']; ?>"
			data-address_add_city="<?php echo $result[0]['add_city']; ?>"
			data-address_add_province="<?php echo $result[0]['add_province']; ?>"
			data-address_contact_number="<?php echo $result[0]['contact_number']; ?>"
			>
		<p class="customer-name"><?php echo $result[0]['first_name'] .' '. $result[0]['last_name']; ?></p>
		<p class="customer-address">
			<?php echo  $result[0]['add_street'] .' '. $result[0]['add_brgy'] .' '.
			 			$result[0]['add_city']; ?>
				
			</p>
		<p class="customer-number"><?php echo $result[0]['contact_number']; ?></p>
	</div><?php	
}
if($_POST['action'] == 'load_added_addresses') { 
	$fetchAdd = 'SELECT * FROM user_addresses WHERE customer_user_id = '.$_SESSION['customer_user_id'].'';
	$fetchPrepare = $connect->prepare($fetchAdd);
	$fetchPrepare->execute();
	$fetchAddResult = $fetchPrepare->fetchAll();
	$countAddress	= $fetchPrepare->rowCount();

	for($i=0; $i<$countAddress; $i++) {?>
		<div class="customer-info" id="address_id_added<?php echo $i+1; ?>" 
			data-address_id_added="<?php echo $fetchAddResult[$i]['address_id']; ?>"
			data-address_added_first_name="<?php echo $fetchAddResult[$i]['first_name']; ?>"
			data-address_added_last_name="<?php echo $fetchAddResult[$i]['last_name']; ?>"
			data-address_added_add_street="<?php echo $fetchAddResult[$i]['add_street']; ?>"
			data-address_added_add_city="<?php echo $fetchAddResult[$i]['add_city']; ?>"
			data-address_added_add_brgy="<?php echo $fetchAddResult[$i]['add_brgy']; ?>"
			data-address_added_add_province="<?php echo $fetchAddResult[$i]['add_province']; ?>"
			data-address_added_contact_number="<?php echo $fetchAddResult[$i]['contact_number']; ?>"
			>
			<p class="customer-name"><?php echo $fetchAddResult[$i]['first_name'] .' '. $fetchAddResult[$i]['last_name']; ?></p>
			<p class="customer-address">
				<?php echo  $fetchAddResult[$i]['add_street'] .' '. $fetchAddResult[$i]['add_brgy'] .' '.
				 			$fetchAddResult[$i]['add_city']; ?>	
 			</p>
			<p class="customer-number"><?php echo $fetchAddResult[$i]['contact_number']; ?></p>
		</div><?php
	}
}
?>
