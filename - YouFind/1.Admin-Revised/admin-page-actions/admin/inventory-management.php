<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management</title>
	<link rel="stylesheet" type="text/css" href="admin_styles.css">
	<link rel="stylesheet" type="text/css" href="modal_styles.css">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<style type="text/css">
		a{
			text-decoration: none;
			
		}
	</style>
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
					<li style="color: white; font-size: 13px;"><a href="user-management.php" style="text-decoration: none; color: #a2a2a2;">User Management</a>
					<li class="active" style="color: #a2a2a2; font-size: 13px;"><a href="inventory-management.php" style="text-decoration: none; color: #a2a2a2;">Inventory Management</a>
					
				</ul>
			</div>

		</div>

		<div class="content-wrapper">
			<div class="directory-wrapper">
				Home  >  Inventory Management
			</div>

			<div class="table-holder-wrapper">
				<div class="title-wrapper">
					<p class="title">Inventory Management Page</p>
					<hr class="content">
				</div>
				<div class="table-wrapper">
					<div class="categories">
						<ul>
							<li class="first"> All (99+)
							<li class="first"> Laptops & Computers (0)
							<li class="first"> Camera & Photography (0)
							<li class="first"> Smart Phones & Tablets (0)
							<li class="first"> TV & Audio (0) 
							<li class="first"> Car Electronics & GPS (0)
							<li class="first"> Drones (0)
							<li class="last"> Accessories (0)
						</ul><br><br><br>
						

						<div class="top-wrapper">
							
						<div class="action-wrapper">
						<select>
							<?php  
							$actions = array('No Action', 'Add Stock', 'Delete');
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
							$actions = array('All', 'Laptops & Computers','Camera & Photography','Smart Phones & Tablets', 'TV & Audio', 'Car Electronics & GPS', 'Drones', 'Accessories');
							foreach ($actions as $choice) {
								echo "<option name='$actions'>".$choice."</option>";
							}
							?>
						</select>
						<input type="text" name="search" class="searchbar" placeholder="Search">
						<button>Search</button>
						<button style="margin-left: 40px;" id="addBtn">Add New Item</button>
						</div>
					</div>
				</div>
				<div class="user-table-wrapper">
					<table>
						<tr>
							<th style="width: 3%;"><input type="checkbox" name="all" class="checkbox" id="selectAll">
							<th style="width: 10%;">Product Code
							<th style="width: 30%">Product Name
							<th style="width: 10%;">Unit Price
							<th style="width: 7%;">Stocks
							<th style="width: 19%;">Category
							<th style="width: 19%;">Action
						</tr>
						<tr>
							<td><input type="checkbox" name="selectThis" class="checkbox">
							<td><a href="#">LGEP01</a>
							<td>LG Earphone
							<td>P400.00
							<td>10
							<td>Accessories
							<td style="padding-bottom: 3px; padding-left: 15px;">
								<ul>
									<li style="float: left; margin-right: -10px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/add_stock.png" width="25px" height="25px;" title="Add Stock"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
								</ul>
							</td>
						</tr>

						<tr>
							<td><input type="checkbox" name="selectThis" class="checkbox">
							<td><a href="#">LGEP01</a>
							<td>LG Earphone
							<td>P400.00
							<td>10
							<td>Accessories
							<td style="padding-bottom: 3px; padding-left: 15px;">
								<ul>
									<li style="float: left; margin-right: -10px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/add_stock.png" width="25px" height="25px;" title="Add Stock"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
								</ul>
							</td>
						</tr>

						<tr>
							<td><input type="checkbox" name="selectThis" class="checkbox">
							<td><a href="#">LGEP01</a>
							<td>LG Earphone
							<td>P400.00
							<td>10
							<td>Accessories
							<td style="padding-bottom: 3px; padding-left: 15px;">
								<ul>
									<li style="float: left; margin-right: -10px;"><button id="myBtn" class="myBtnClass"><img src="images/edit.png" width="20px" height="20px;" title="Edit"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/add_stock.png" width="25px" height="25px;" title="Add Stock"></button>
									<li style="float: left; margin-right: -10px;"><button class="myBtnClass"><img src="images/delete.png" width="20px" height="20px;" title="Delete"></button>
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

		<!--Modal-Edit-->
			<div id="myModal" class="modal">
			  <div class="modal-content">
    			<div class="modal-header">
    				<p class="modal-title-text">Edit Item Information</p> 
    				<span class="close">&times;</span>
    			</div>
    			<div class="modal-input-content">

    				<div class="first-prod-title">Product Code</div>
    				<div class="first-prod-input"><div class="input-style">LGEP01</div></div>

    				<div class="prod-title">Product Name</div>
    				<div class="prod-input"><input type="text" name="prod-code" placeholder="Enter new product name" class="input-style"></div>

    				<div class="prod-title">Unit Price</div>
    				<div class="prod-input"><input type="text" name="prod-code" placeholder="Enter new unit price" class="input-style"></div>

    				<div class="prod-title">Product Category</div>
    				<div class="prod-input" style="width: 66.5%;">
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

				<!--Modal-Add-->
			<div id="addModal" class="modal">
			  <div class="modal-content">
    			<div class="modal-header">
    				<p class="modal-title-text">Add New Item</p> 
    				<span class="closeThis">&times;</span>
    			</div>
    			<div class="modal-input-content">

    				<div class="first-prod-title">Product Code</div>
    				<div class="first-prod-input"><input type="text" name="prod-code" placeholder="Enter new product code" class="input-style"></div>

    				<div class="prod-title">Product Name</div>
    				<div class="prod-input"><input type="text" name="prod-code" placeholder="Enter new product name" class="input-style"></div>

    				<div class="prod-title">Unit Price</div>
    				<div class="prod-input"><input type="text" name="prod-code" placeholder="Enter new unit price" class="input-style"></div>

    				<div class="prod-title">Product Category</div>
    				<div class="prod-input" style="width: 66.5%;">
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


		<script>

		/*******modal**********/
		var modal = document.getElementById('myModal');
		var btn = document.getElementById("myBtn");
		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
    		modal.style.display = "block";
		}

		span.onclick = function() {
    		modal.style.display = "none";
		}

		window.onclick = function(event) {
    		if (event.target == modal) {
        	modal.style.display = "none";
    		}
		}

		/******end of modal********/

		/*******modal2**********/
		var addmodal = document.getElementById('addModal');
		var addbtn = document.getElementById("addBtn");
		var span = document.getElementsByClassName("closeThis")[0];

		addbtn.onclick = function() {
    		addmodal.style.display = "block";
		}

		span.onclick = function() {
    		addmodal.style.display = "none";
		}

		window.onclick = function(event) {
    		if (event.target == addmodal) {
        	addmodal.style.display = "none";
    		}
		}

		/******end of modal********/

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

	</div>
</body>
</html>