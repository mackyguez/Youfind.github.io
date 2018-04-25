<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$query = '
				SELECT 
	user_installment_success_tbl.*,
	youfind_user.contact_number
FROM user_installment_success_tbl
JOIN youfind_user
WHERE user_installment_success_tbl.customer_user_id = youfind_user.user_id

	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();
?>
	<tr>
		<th width="240px">Account Name
		<th width="240px">Order Number
		<th width="150px">Total Amount
		<th width="150px">Installment Terms
		<th width="150px">Amount to Pay
		<th width="190px">Remaining Balance
		<th width="120px">Remarks
	</tr>
<?php if(@$_POST['action'] == 'fetch_install_app_success') { ?>
<?php 	for($i=0; $i<$count; $i++) { ?>
	<tr>
		<td><?php echo $result[$i]['account_name']; ?>
		<td><?php echo $result[$i]['order_number']; ?>
		<td><?php echo number_format($result[$i]['installment_total_amount'],2); ?>
		<td><?php echo $result[$i]['installment_terms']; ?> Month/s
		<td><?php echo number_format($result[$i]['installment_amount_to_pay'],2); ?>
		<td><?php echo number_format($result[$i]['installment_total_amount'],2); ?>
		<td>Not Fully Paid
	</tr>
<?php 	} ?>
<?php } ?>
 