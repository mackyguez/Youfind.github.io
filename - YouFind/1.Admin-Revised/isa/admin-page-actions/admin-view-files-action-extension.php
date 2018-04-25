<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(@$_POST['action_view_file'] == 'view_user_files') {
		$_SESSION['view_file'] = $_POST['user_view_files_id'];
	}
	if(@$_POST['action_show_view_modal'] == 'view_modal') {
		echo $_POST['user_view_files_id'];
	}
 ?>