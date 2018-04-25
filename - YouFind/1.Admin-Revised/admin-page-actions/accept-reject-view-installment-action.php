<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action'] == 'accept') {
		$query = 'INSERT INTO user_installment_success_tbl
					SELECT * FROM user_installment_tbl WHERE installment_id = '.$_POST['installment_id'].'
				';
		$statement = $connect->prepare($query);
		$statement->execute();

		$query1 = 'DELETE FROM user_installment_tbl WHERE installment_id = '.$_POST['installment_id'].'';
		$statement1 = $connect->prepare($query1);
		$statement1->execute();
		echo 'Done';
	}

	if(@$_POST['action'] == 'reject') {
		echo $query = 'DELETE FROM user_installment_tbl WHERE installment_id = '.$_POST['installment_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
	}
?>