<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<link rel="stylesheet" type="text/css" href="admin_styles.css">
	<link rel="stylesheet" type="text/css" href="modal_styles.css">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>

<body>

	<div class="whole-wrapper">

		<div class="navbar-left">
			<div class="logo-container">
				<div class="logo-wrapper"><img src="images/logo.png"></div>
				<div class="tagline-wrapper">"Find your satisfaction here"</div>
				<hr>
			</div>

			<div class="account-container">
				<div class="dp-container">
					<div class="dp-wrapper"><img src="images/user-white.png" class="image"></div>
				</div>
				<div class="info-container"><p class="name">John Michael Olangco</p><p class="position">Administrator</p></div>

			</div>
			<hr>

			<div class="navigation-wrapper">
				<ul>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="dashboard.php" style="text-decoration: none; color: #a2a2a2;">Dashboard</a>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="sales-management.php" style="text-decoration: none; color: #a2a2a2;">Sales Management</a>
					<li class="active" sstyle="color: white; font-size: 13px;"><a href="user-management.php" style="text-decoration: none; color: #a2a2a2;">User Management</a>
					<li style="color: #a2a2a2; font-size: 13px;"><a href="inventory-management.php" style="text-decoration: none; color: #a2a2a2;">Inventory Management</a>
				</ul>
			</div>

		</div>

		<div class="content-wrapper">
			<div class="directory-wrapper">
				Home  >  User Management
			</div>

			<div class="table-holder-wrapper">
				<div class="title-wrapper">
					<p class="title">User Management Page</p>
					<hr class="content">
				</div>
				<div class="table-wrapper">
					<div class="categories">
						<ul>
							<li class="first"> All (0)
							<li class="first"> Customers (0)
							<li class="last"> Entrepreneurs (0)
						</ul><br><br><br>
						

						<div class="top-wrapper">
							
						<div class="action-wrapper">
						<select>
							<?php  
							$actions = array('No Action','Verify','Delete', 'Ban');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
						<button>Apply</button>
						<button>Apply to All</button>
						</div>
						<div class="search-wrapper">
						<select>
							<?php  
							$actions = array('All', 'Customer','Verified - Entrepreneurs','Unverified - Entrepreneurs','Banned');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
						<input type="text" name="search" class="searchbar" placeholder="Search">
						<button>Search</button>
						</div>
					</div>
				</div>
				<div class="user-table-wrapper">
					<table>
						<tr>
							<th width="1px"><input type="checkbox" name="selectAll" class="checkbox" id="selectAll">
							<th width="5px">First Name
							<th width="5px">Last Name
							<th width="5px">Email
							<th width="5px">User Type
							<th width="5px">Status
							<th width="5px">Action
						</tr>
						<tr>
							<td style="width: 3%;"><input type="checkbox" name="all" class="checkbox">
							<td style="width: 13%;">John Michael
							<td style="width: 13%;">Olangco
							<td style="width: 20%;">jmolangco@gmail.com
							<td style="width: 10%;">Seller
							<td style="width: 10%;"><p class="notverified">not verified</p>
							<td style="width: 15%; padding-left: 13px;">
								<ul>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/verify.png" width="23px" height="23px;" title="Verify User"></button>
									<li style="float: left; margin-right: -15px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/ban.png" width="23px" height="23px;" title="Ban User"></button>
								</ul>
							</td>
						</tr>

						<tr>
							<td style="width: 3%;"><input type="checkbox" name="all" class="checkbox">
							<td style="width: 13%;">John Michael
							<td style="width: 13%;">Olangco
							<td style="width: 20%;">jmolangco@gmail.com
							<td style="width: 10%;">Seller
							<td style="width: 10%;"><p class="banned">banned</p>
							<td style="width: 15%; padding-left: 13px;">
								<ul>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/verify.png" width="23px" height="23px;" title="Verify User"></button>
									<li style="float: left; margin-right: -15px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/ban.png" width="23px" height="23px;" title="Ban User"></button>
								</ul>
							</td>
						</tr>

						<tr>
							<td style="width: 3%;"><input type="checkbox" name="all" class="checkbox">
							<td style="width: 13%;">John Michael
							<td style="width: 13%;">Olangco
							<td style="width: 20%;">jmolangco@gmail.com
							<td style="width: 10%;">Seller
							<td style="width: 10%;"><p class="verified">verified</p>
							<td style="width: 15%; padding-left: 13px;">
								<ul>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/verify.png" width="23px" height="23px;" title="Verify User"></button>
									<li style="float: left; margin-right: -15px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
									<li style="float: left; margin-right: -15px;"><button class="myBtnClass"><img src="images/ban.png" width="23px" height="23px;" title="Ban User"></button>
								</ul>
							</td>
						</tr>

					</table>		
				</div>

				<div class="save-wrapper">
					<input type="submit" name="submit" class="save-style" value="Save">
				</div>
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		/*****selectAll******/

		var select_all = document.getElementById("selectAll"); //select all checkbox
		var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

		//select all checkboxes
		select_all.addEventListener("change", function(e){
 		   for (i = 0; i < checkboxes.length; i++) { 
  		      checkboxes[i].checked = select_all.checked;
  		  }
		});


		for (var i = 0; i < checkboxes.length; i++) {
   			 checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
      		  //uncheck "select all", if one of the listed checkbox item is unchecked
        		if(this.checked == false){
         		   select_all.checked = false;
      			}
       		 //check "select all" if all checkbox items are checked
      			  if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
        		    select_all.checked = true;
       			 }
   		 });
		}
		/*****end of selectAll******/
	</script>
</body>
</html>