<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(!isset($_SESSION['admin_user_id'])) {
		header('location:admin_login.php');
	}

	$query = 'SELECT * FROM admin_table WHERE admin_id = '.$_SESSION['admin_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Installment Applications</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/installment_application.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="navigation-left">
			<div class="logo-container">
				<div class="logo-wrapper"><img src="images/logo.png"></div>
				<div class="tagline-wrapper">"Find your satisfaction here"</div>
			</div>
			<div class="account-container">
				<div class="dp-container">
					<div class="dp-wrapper"><img src="1.AdminImages/<?php echo $result[0]['admin_photo']; ?>" class="image"></div>
				</div>
				<div class="info-container"><p class="name">John Michael Olangco</p><p class="position">Administrator</p></div>
			</div>
			<div class="navigation-links-holder">
				<ul class="ul-link">
					<li><a href="admin_dashboard.php" class="li-link dashboard">Dashboard</a></li>
					<li class="link-active"><a href="installment_application.php" class="li-link sales">Installment Application</a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					<li><a href="sales_management.php" class="li-link inventory" style="display: none;">Reports</a></li>
					<li><a href="admin_login.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right">
			<div class="direction-wrapper">
				<div class="location-wrapper">
					<div class="location-icon"><img src="images/installment-icon.png" height="100%" width="100%"></div>
					<div class="location-title">INSTALLMENT APPLICATIONS</div>
					<div class="direction-holder">
						<p class="home">Home</p>	
						<p class="separator">&#10095;</p>
						<p class="dashboard">Installment Applications</p>
					</div>
				</div>
			</div>

			<div class="installment-wrapper">
				<p class="pending-applications">Pending Installment Applications</p>

				<div class="table-wrapper">
					<table id="fetch_install_app"></table>
				</div>
			</div>

			<div class="installment-wrapper">
				<p class="pending-applications">Installment Table</p>
				<div class="table-wrapper">
					<table id="fetch_install_app_success"></table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<div id="modal_fetch"></div>

<script type="text/javascript">
	$(document).ready(function() {

		fetch_install_app();
		function fetch_install_app() {
			var action = 'fetch_install_app';
			$.ajax({
				url:'admin-page-actions/installment-application-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#fetch_install_app').html(data);
				}
			})
		}
		fetch_install_app_success();
		function fetch_install_app_success() {
			var action = 'fetch_install_app_success';
			$.ajax({
				url:'admin-page-actions/installment-application-success-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#fetch_install_app_success').html(data);
				}
			})
		}


		$(document).on('click', '#accept_installment', function() {
			var action = 'accept';
			var installment_id = $(this).data('accept_id');
			$.ajax({
				url:'admin-page-actions/accept-reject-view-installment-action.php',
				method:'POST',
				data:{
					action:action,
					installment_id:installment_id
				},
				success:function(data) {
					fetch_install_app();
					fetch_install_app_success();
				}
			})
		});
		$(document).on('click', '#reject_installment', function() {
			var action = 'reject';
			var installment_id = $(this).data('reject_id');
			$.ajax({
				url:'admin-page-actions/accept-reject-view-installment-action.php',
				method:'POST',
				data:{
					action:action,
					installment_id:installment_id
				},
				success:function(data) {
					fetch_install_app();
					fetch_install_app_success();
				}
			})
			
		});

	});
</script>