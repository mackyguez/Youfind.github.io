<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();
		$query = 'SELECT * FROM youfind_user WHERE user_id = '.$_SESSION['seller_user_id'].'';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="user_profile.css">
	<link rel="stylesheet" type="text/css" href="seller-style.css">
	<link rel="stylesheet" type="text/css" href="modal_styles.css">
</head>
<body>

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('../header.php'); ?></div>
		<div class="content-holder">

			<div class="content-left">
				<p class="about-text">About</p>
				<div class="left-upper">
					<div class="user-pic-holder-left">
						<div class="user-pic">
							<img src="images/clang.jpg" class="user-pic-image">
						</div>
					</div>
					<div class="user-details-holder-right">
						<p class="user-name">Clarenz Nina Tolentino</p>
						<input type="button" class="edit-profile-button" name="edit_profile" id="profBtn" value="Edit profile">
						<p class="user-address">Makati City</p>
						<p class="ratings-text">Ratings</p>
						<img src="images/star-ratings.png" class="star-ratings-image">
					</div>
				</div>

				<p class="insight-text">Insights</p>
				<div class="insights-holder">
					<div class="reviews-wrapper">
						<p class="counting-numbers">20</p>
						<p class="text-bottom">Items On-Hand</p>
					</div>
					<div class="items-ordered-wrapper">
						<p class="counting-numbers">50</p>
						<p class="text-bottom">Items Sold</p>
					</div>
					<div class="service-hired-wrapper">
						<p class="counting-numbers">2</p>
						<p class="text-bottom">Service Lent</p>
					</div>
				</div>

				<p class="task-text">Task Management</p>
				<div class="task-holder">
					<div class="table-holder">
						
					<table class="task">
						<tr class="header-style">
							<th style="padding-left: 5px; width: 45%;">Task	
							<th style="padding-left: 5px; width: 17%;">Status
							<th style="padding-left: 5px; width: 38%;">Action
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="pending">Pending</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="done">Done</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td>Laptop Repair <button class="view-more" title="View Full Details"><img src="images/view-more.png" class="view-img"></button>
							<td><p class="overdue">Overdue</p>
							<td>
								<ul>
									<li class="action"><button id="doneBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Mark as Done</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>
					</table>
					<p class="nothing-follows" style="margin: 2px 36%; color: #125965; font-size: 10px;">***Nothing Follows***</p>
					</div>
				</div>
			</div>


			<div class="content-right">


				<p class="sales-text">Sales Monitoring</p>
				<div class="graph-holder">
					<img src="images/bar.png" height="100%" width="100%">
				</div>

				<div class="post-wrapper">
					<p class="advertise-title">Advertise Now!</p>
					<button class="postBtn" onclick="location.href='post-product.php'">Post an item</button>
					<button class="postBtn" onclick="location.href='post-service.php'">Post a service</button>
					<div class="report-holder">
						<div style="margin-bottom: 2px; height: 30px;">
						<p style="float: left;">Notes</p>
						<button style="float: right; font-size: 10px;" id="noteBtn">Add Note</button>
						</div>
						<div style="border-bottom: .5px solid gray; font-size: 10px;">1. Add Stocks for LG Earphones</div>

					</div>
				</div>

				<p class="sales-text">Inventory Management</p>
				<div class="inventory-holder">

					<div class="sort-style">
						<p style="float: left; padding-right: 10px;">Sort by : </p>
						<select>
							<?php  
							$actions = array('All', 'Best-Selling Item','Least-Sold Item','Low Stock Items','Out-Of-Stocks');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
					</div>
					
					<div class="search-inventory">
						<select>
							<?php  
							$actions = array('All', 'Laptops & Computers','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
						<input type="text" name="search" class="searchbar" placeholder="Search">
						<button>Search</button>
					</div>

					<table class="inventory">
						<tr class="inventory-header">
							<th style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="all-items">
							<th style="width: 32%; padding: 3px;">Product Name
							<th style="width: 15%; padding: 3px;">Unit Price
							<th style="width: 10%; padding: 3px;">Qty
							<th style="width: 25%; padding: 3px;">Categories
							<th style="width: 15%; padding: 3px;">Actions
						</tr>

						<tr class="details-style">
							<td style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="this-items">
							<td><a href="#">LG Earphones</a>
							<td>P300.00
							<td>5
							<td>Accessories
							<td>
								<ul>
									<li class="action"><button id="prodBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Edit</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>

						<tr class="details-style">
							<td style="width: 4%; padding: 3px 0 0 10px;"><input type="checkbox" name="this-items">
							<td><a href="#">LG Earphones</a>
							<td>P300.00
							<td>5
							<td>Accessories
							<td>
								<ul>
									<li class="action"><button id="prodBtn" style="background-color: inherit; border: none; border-right: 1px solid black; padding: 0 10px 0 0; height: 15px;">Edit</button>
									<li class="action"><button id="delBtn" style="background-color: inherit; border: none; padding: 0 10px 0 0; height: 15px;">Delete</button>
								</ul>
							</td>
						</tr>
					</table>

					<p class="nothing-follows" style="margin: 2px 43%; color: #125965; font-size: 10px;">***Nothing Follows***</p>

				</div>

			</div>

		</div>
		</div>
	</div>
	<div class="footer-wrapper" style="margin-top: 70px;">
		<?php include('footer.php'); ?>
	</div>




	<!--ALL MODALS AND SCRIPTS-->

			<!--Product-Edit-->
			<div id="prodModal" class="modal">
			  <div class="modal-content">
    			<div class="modal-header">
    				<p class="modal-title-text">Edit Item Information</p> 
    				<span class="close">&times;</span>
    			</div>
    			<div class="modal-input-content">

    				<div class="first-prod-title">Product Code</div>
    				<div class="first-prod-input"><div class="input-style">LGEP01</div></div>

    				<div class="prod-title">Product Name</div>
    				<div class="prod-input"><input type="text" name="prod-name" placeholder="Enter new product name" class="input-style"></div>

    				<div class="prod-title">Unit Price</div>
    				<div class="prod-input"><input type="number" min="1" name="unit-price" placeholder="Enter new unit price" class="input-style"></div>

    				<div class="prod-title">Qty</div>
    				<div class="prod-input"><input type="number" name="prod-qty" min="1" placeholder="Enter new quantity" class="input-style"></div>

    				<div class="prod-title">Product Category</div>
    				<div class="prod-input" style="width: 75%;">
    					<select class="select-style">
							<?php  
							$actions = array('Laptops & Computers','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
					</div>
    			</div>
    			<div class="modal-submit">
					<input type="submit" name="submit" class="input-submit">
    			</div>
  			  </div>
			</div>
		<!--End-->

		<!--Profile-Edit-->
			<div id="profModal" class="modal">
			  <div class="modal-content">
    			<div class="modal-header">
    				<p class="modal-title-text">Edit Personal Information</p> 
    				<span class="close">&times;</span>
    			</div>
    			<div class="modal-input-content">

    				<div class="first-prod-title">Client Name</div>
    				<div class="first-prod-input"><input type="text" name="email-add" placeholder="Enter new name" class="input-style"></div>

    				<div class="prod-title">Email Address</div>
    				<div class="prod-input"><input type="text" name="email-add" placeholder="Enter new email address" class="input-style"></div>

    				<div class="prod-title">Password</div>
    				<div class="prod-input"><input type="text" name="password" placeholder="Enter new password" class="input-style"></div>

    				<div class="prod-title">Re-type Password</div>
    				<div class="prod-input"><input type="text" name="password" placeholder="Re-type your password" class="input-style"></div>

    				<div class="prod-title">Contact Number</div>
    				<div class="prod-input"><input type="text" name="contact-num" placeholder="Enter new contact number" class="input-style"></div>

    				<div class="prod-title">Address</div>
    				<div class="prod-input"><input type="text" name="street" placeholder="Street" class="input-style"></div>
    				<div class="prod-input" style="margin-left: 115px;"><input type="text" name="barangay" placeholder="Barangay" class="input-style"></div>
    				<div class="prod-input" style="margin-left: 115px;"><input type="text" name="city" placeholder="City" class="input-style"></div>
    				<div class="prod-input" style="margin-left: 115px;"><input type="text" name="province" placeholder="Province" class="input-style"></div>
    			</div>
    			<div class="modal-submit">
					<input type="submit" name="submit" class="input-submit">
    			</div>
  			  </div>
			</div>
		<!--End-->

		<!--Add Note-->
			<div id="noteModal" class="modal">
			  <div class="modal-content">
    			<div class="modal-header">
    				<p class="modal-title-text">Add Notes</p> 
    				<span class="close">&times;</span>
    			</div>
    			<div class="modal-input-content">
    				<textarea cols="20" rows="5">Anything you would today?</textarea>
    			</div>
    			<div class="modal-submit">
					<input type="submit" name="submit" class="input-submit" value="Add this note">
    			</div>
  			  </div>
			</div>
		<!--End-->




		<script>

			/*
		var prdmodal = document.getElementById('prodModal');
		var prdbtn = document.getElementById("prodBtn");
		var prdspan = document.getElementsByClassName("prdclose")[0];
		prdbtn.onclick = function() {
    		prdmodal.style.display = "block";
		}
		span.onclick = function() {
    		prdmodal.style.display = "none";
		}
		window.onclick = function(event) {
    		if (event.target == prdmodal) {
        	prdmodal.style.display = "none";
    		}
		}



		var prfmodal = document.getElementById('profModal');
		var prfbtn = document.getElementById("profBtn");
		var span = document.getElementsByClassName("close")[0];
		prfbtn.onclick = function() {
    		prfmodal.style.display = "block";
		}
		span.onclick = function() {
    		prfmodal.style.display = "none";
		}
		window.onclick = function(event) {
    		if (event.target == prdmodal) {
        	prfmodal.style.display = "none";
    		}
		}


		var notemodal = document.getElementById('noteModal');
		var notebtn = document.getElementById("noteBtn");
		var span = document.getElementsByClassName("close")[0];
		notebtn.onclick = function() {
    		notemodal.style.display = "block";
		}
		span.onclick = function() {
    		notemodal.style.display = "none";
		}
		window.onclick = function(event) {
    		if (event.target == prdmodal) {
        	prfmodal.style.display = "none";
    		}
		}
		*/


		$(document).ready(function() {
			$(document).on('click', '#prodBtn', function() {
				alert('Asd');
			});

			$(document).on('click', '#header_logout_link', function() {
				alert();
			});
		});
		</script>

	<!--END-->
</body>
</html>