<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root' ,'');
	session_start();

	if(@$_POST['action'] == 'get_date') {
		echo 1523547647309;
	}

	if(@$_POST['action'] == 'deduct_youwallet') {
		$query = 'SELECT * FROM test WHERE id=1';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		echo $result[0]['youwallet'];
	}

 ?>