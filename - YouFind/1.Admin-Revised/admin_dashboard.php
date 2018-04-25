<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();

	if(!isset($_SESSION['admin_user_id'])) {
		header('location:admin_login.php');
	}
	$registered = 'SELECT * FROM youfind_user WHERE user_status = "verified"';
	$fetchRegistered = $connect->prepare($registered);
	$fetchRegistered->execute();
	$fetchRegisteredCount = $fetchRegistered->rowCount();

	$numItems = 'SELECT * FROM index_newsfeed_tbl WHERE shopname = "YouFind Corporation"';
	$numItemsStatement = $connect->prepare($numItems);
	$numItemsStatement->execute();
	$numItemsCount = $numItemsStatement->rowCount();

	$query = 'SELECT * FROM admin_table WHERE admin_id = '.$_SESSION['admin_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/admin_dashboard.css">
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
				<div class="info-container"><p class="name"><?php echo $result[0]['admin_first_name'].' '.$result[0]['admin_last_name']; ?></p><p class="position">Administrator</p></div>

			</div>
			<div class="navigation-links-holder">
				<ul class="ul-link">
					<li class="link-active"><a href="admin_dashboard.php" class="li-link dashboard">Dashboard</a></li>
					<li><a href="installment_application.php" class="li-link sales">Installment Application </a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					<li><a href="sales_management.php" class="li-link users" style="display: none;">Reports</a></li>
					<li><a href="admin-logout.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
				</ul>
			</div>
		</div>

		<div class="content-right">
			<div class="direction-wrapper">
				<div class="location-wrapper">
					<div class="location-icon"><img src="images/dashboard.png" height="100%" width="100%"></div>
					<div class="location-title">DASHBOARD</div>
					<div class="direction-holder">
						<p class="home">Home</p>
						<p class="separator">&#10095;</p>
						<p class="dashboard">Dashboard</p>
					</div>
				</div>
			</div>

			<div class="summary-wrapper">
				<div class="user-wrapper">
					<div class="text-wrapper">
						<p class="summary-title">Registered <b>Users</b></p>
						<p class="summary-ctr"><?php echo $fetchRegisteredCount; ?></p>
						<p class="summary-this">
							Today : <?php echo $fetchRegisteredCount; ?> <br>
							This Week : <?php echo $fetchRegisteredCount+5; ?> <br>
						</p>
					</div>
					<div class="view-all" style="background-color: #a89aff;" onclick="location.href='user_management.php'">View All &#10095;</div>
				</div>

				<div class="new-sign-up-wrapper">
					<div class="text-wrapper">
						<p class="summary-title">New <b>Sign Ups</b></p>
						<p class="summary-ctr">100</p>
						<p class="summary-this">
							Today : 10 <br>
							This Week : 20 <br>
						</p>
					</div>
					<div class="view-all" style="background-color: #feaeae;" onclick="location.href='user_management.php'">View All &#10095;</div>
				</div>

				<div class="items-wrapper">
					<div class="text-wrapper">
						<p class="summary-title">Number of <b>Items</b></p>
						<p class="summary-ctr"><?php echo $numItemsCount; ?></p>
						<p class="summary-this">
							Today : 10 <br>
							This Week : 20 <br>
						</p>
					</div>
					<div class="view-all" style="background-color: #72d8b5;" onclick="location.href='inventory_management.php'">View All &#10095;</div>
				</div>

				<div class="revenue-wrapper">
					<div class="text-wrapper">
						<p class="summary-title">Total <b>Sales</b></p>
						<p class="summary-ctr">100</p>
						<p class="summary-this">
							Currency : &#8369; (Ph Peso)<br>
							This Week : 20 <br>
						</p>
					</div>
					<div class="view-all" style="background-color: #84fa78;" onclick="location.href='installment_application.php'">View All &#10095;</div>
				</div>

				<div class="date-wrapper">
					<div class="text-wrapper">
						<?php   
    						date_default_timezone_set('Asia/Manila');
							$date = date('F j, Y');
							$time = date('g:i a');
							$day = date('l');

							$greetday = date('g:i a');;
							$greetday  = strtotime($greetday);
								if (date('H', $greetday) < 12){
									 $greet = "Good Morning!";
								} 
								else if (date('H', $greetday) > 12 && date('H', $greetday) < 6){
									$greet = "Good Afternoon!";
								}
								else {
									  $greet = "Good Evening";
								}
    					?>
    					<center>
						<p class="today-is"><?php echo $greet .' '. $result[0]['admin_first_name']; ?></p>
						<p class="day-text"><?php echo $day;?></p>
						<p class="date-text"><?php echo $date;?></p>
						<p class="day-text"><?php echo $time;?></p>
						</center>
					</div>
				</div>
			</div>

			<div class="middle-wrapper">
				<div class="verification-wrapper" style="width: 90%;">
					<p class="verification-title">Pending Verification Requests</p>

					<div class="table-head">
						<p class="user-name" style="width: 120px;">Name</p>
						<p class="user-type" style="width: 80px;">Account</p>
						<p class="action" style="width: 90px;">Action</p>
					</div>

					<div id="all_user_holder"></div>

				</div>

				<div class="right-div">
					<div class="goal-wrapper">
						<p class="goal-title">Goal Completion</p>
						<div class="progress-wrapper">
							<p class="progress-title">Sales</p>
							<p class="counter">10,000/200,000</p>
						</div>
						<div class="progress">
							<?php
								$allItems = 10000;
								$progress = $allItems/200000;
								$progress = $progress*100;
							?>
							<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progress;?>"
							  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress;?>%;">
							    <?php echo $progress;?>%
							</div>
						</div>
					</div>
					<div class="top-products-wrapper">
						<p class="top-products-title">Top Products By Revenue</p>

						<div class="product-wrapper">
							<div class="image-wrapper"><img src="images/date-wrapper.jpg" width="100%" height="100%"></div>
							<center><p class="product-name">1. Product Name</p></center>
							<div class="revenue-holder">
								<p class="total-revenue-title">Total Revenue: </p>
								<p class="total-revenue-amount">&#8369; 10000.00</p>
							</div>
						</div>
						<div class="product-wrapper">
							<div class="image-wrapper"><img src="images/date-wrapper.jpg" width="100%" height="100%"></div>
							<center><p class="product-name">2. Product Name</p></center>
							<div class="revenue-holder">
								<p class="total-revenue-title">Total Revenue: </p>
								<p class="total-revenue-amount">&#8369; 10000.00</p>
							</div>
						</div>
						<div class="product-wrapper">
							<div class="image-wrapper"><img src="images/date-wrapper.jpg" width="100%" height="100%"></div>
							<center><p class="product-name">3. Product Name</p></center>
							<div class="revenue-holder">
								<p class="total-revenue-title">Total Revenue: </p>
								<p class="total-revenue-amount">&#8369; 10000.00</p>
							</div>
						</div>
					</div>
			</div>
			
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	var accept_btn = document.getElementById('accept_btn');
	var all_div = document.getElementById('all_div');



	$(document).ready(function() {
		load_user();
		function load_user() {
			var action = 'load_user';
			$.ajax({
				url:'admin-page-actions/admin-dashboard-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#all_user_holder').html(data);
				}
			})
		}

	$(document).on('click', '#accept_btn', function() {
			var action = 'verify_user';
			var user_verify_id = $(this).data('user_verify_id');
				$.ajax({
					url:'admin-page-actions/admin-dashboard-accept-action.php',
					method:'POST',
					data:{
						action:action,
						user_verify_id:user_verify_id
					},
					success:function(data) {
						load_user();
					}
				})
		});



	});
</script>