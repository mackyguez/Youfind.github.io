<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		$query = 'SELECT * FROM youfind_user WHERE user_status = "not verified"';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
 ?>

<?php  		if(@$_POST['action'] == 'load_user') { ?>
<?php 			for($i=0; $i<$count; $i++) { ?>
				<div class="all-users" id="all_div">
					<div class="user-info-wrapper">
						<p class="user-name" style="width: 120px;"><?php echo $result[$i]['first_name'].' '.$result[$i]['last_name']; ?></p>
						<p class="user-type" style="width: 80px;"><?php echo $result[$i]['user_type']; ?></p>
						<div class="action-wrapper" style="width: 90px;"> 
							<button class="accept" title="Verify User" id="accept_btn" data-user_verify_id="<?php echo $result[$i]['user_id']; ?>">&#10004;</button> 
							<button class="reject" title="Reject Application" style="display: none;">&#10006;</button>
							<button class="view" title="View Information">View</button>
						</div>
					</div>
				</div>
<?php  			} ?>
<?php  		} ?>



	

