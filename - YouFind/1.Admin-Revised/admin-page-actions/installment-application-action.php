<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	$query = 'SELECT * FROM user_installment_tbl ORDER BY installment_id DESC';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();

 ?>
				<tr>
					<th width="250px">Account Name
					<th width="250px">Order Number
					<th width="150px">Total Amount
					<th width="150px">Installment Terms
					<th width="150px">Amount to Pay
					<th width="150px">Action
				</tr>
 	<?php for($i=0; $i<$count; $i++) { ?>
				<tr>
					<td><?php echo $result[$i]['account_name']; ?>
					<td><?php echo $result[$i]['order_number']; ?>
					<td><?php echo number_format($result[$i]['installment_total_amount'],2); ?>
					<td><?php echo $result[$i]['installment_terms']; ?> Month/s
					<td><?php echo number_format($result[$i]['installment_amount_to_pay'],2); ?>
					<td>
						<button class="accept" title="Accept Application" id="accept_installment" data-accept_id="<?php echo $result[$i]['installment_id']; ?>">&#10004;</button> 
						<button class="reject" title="Reject Application" id="reject_installment" data-reject_id="<?php echo $result[$i]['installment_id']; ?>">&#10006;</button>
						<button style="display: none;" class="view" title="View Information" id="view_files_id" data-user_view_files_id="<?php echo $result[$i]['customer_user_id']; ?>">View</button>
					</td>
				</tr>
	<?php } ?>