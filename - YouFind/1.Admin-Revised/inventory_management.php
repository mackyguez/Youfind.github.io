<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$query = 'SELECT * FROM admin_table WHERE admin_id = '.$_SESSION['admin_user_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management</title>
	<link rel="icon" href="images/arrow-icon.png">
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="local-css/inventory_management.css">
	<link rel="stylesheet" type="text/css" href="modal.css">
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
					<li><a href="installment_application.php" class="li-link sales">Installment Application</a></li>
					<li><a href="user_management.php" class="li-link users">User Management</a></li>
					<li class="link-active"><a href="inventory_management.php" class="li-link inventory">Inventory Management</a></li>
					<li><a href="sales_management.php" class="li-link users" style="display: none;">Reports</a></li>
					<li><a href="admin_login.php" class="li-link inventory">
						<img src="images/logout.png" width="20px" height="20px">
						Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right">
			<div class="direction-wrapper">
					<div class="location-wrapper">
						<div class="location-icon"><img src="images/inventory-icon.png" height="100%" width="100%"></div>
						<div class="location-title">INVENTORY MANAGEMENT</div>
						<div class="direction-holder">
							<p class="home" onclick="location.href='admin_dashboard.php'">Home</p>
							<p class="separator">&#10095;</p>
							<p class="dashboard">Inventory Management</p>
						</div>
					</div>
			</div>
			<div class="user-counter-wrapper">
				<p class="pending-applications">YouFind Products</p>
					<ul class="ul-user-counter">
						<li class="all">All</a></li>
						<li class="laptops">Laptops & Computers</a></li>
						<li class="camera">Photo & Video</a></li>
						<li class="headphones">Headphones & Speaker</a></li>
						<li class="parts">Computer Parts</a></li>
						<li class="storage">Storage Devices</a></li>
						<li class="accessories">Accessories</a></li>
						<li class="home">Mobile Phones</a></li>
					</ul>
					<div class="search-wrapper">
							<a href="admin_post.php" style="color: black;"><button class="add-product" id="add_products">Add New Product</button></a>
							<select name="pick_search" id="pick_search" class="pick-search">
								<?php  
								$actions = array('All', 'Gadgets','Laptops & Computers','Camera, Photos & Videos','Headphones & Speakers','Computer Parts','Storage Devices','Accessories','Drone','Mobile Phones');
								foreach ($actions as $choice) {
									echo "<option name='$choice'>".$choice."</option>";
								}
								?>
							</select>
							<input type="text" name="search" class="searchbar" placeholder="Search"  id="search_user">
							<button style="height: 24px; margin: 0;">Search</button>
						</div>
				</div>

				<div class="users-table-content">
					<div class="table-wrapper" id="fetch_products"></div>
				</div>

				<div class="delivery-wrapper">
					<p class="delivery-title">Delivery Options</p>

					<div class="standard-wrapper">
						<div style="width: 100%; overflow: hidden;"><p class="delivery-type">Delivery Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Standard Delivery</p>
						<p class="times">&times;</p></div>
						<p class="delivery-price">Delivery Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;free</p>
					</div>

					<div class="standard-wrapper">
						<div style="width: 100%; overflow: hidden;"><p class="delivery-type">Delivery Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Express Delivery</p>
						<p class="times">&times;</p></div>
						<p class="delivery-price">Delivery Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#8369; 49.00</p>
					</div>

					<button class="add-delivery" style="display: none;">Add Delivery Option</button>

					<div class="delivery-input" style="display: none;">
						<input type="text" name="delivery_type" placeholder="Delivery Type" class="del-type">
						<input type="text" name="delivery_price" placeholder="Delivery Price" class="del-price">
					</div>
				</div>

				<div class="load-wrapper">
					<p class="delivery-title">Generate Load Cards</p>

					<center>
						<p class="your-code">Your code is</p>
						<p class="code" style="font-size: 18px; font-weight: bold;">Y0UF1ND1</p>
					</center>

					<p class="add-value">Add Value</p>
					<input type="text" name="load-amount" placeholder="Amount" class="amount-style">

					<button class="done" style="float: right; margin-top: 0;">Done</button>
					<button class="generate-code" style="float: left; margin-top: 0;">Generate Code</button>
				</div>
		</div>
	</div>

<div id="discount_div" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p class="delivery-title" style="font-size: 18px;">Add Promotions</p>
    <input type="number" id="orig_price" name="orig_price" placeholder="Original Price" class="discount-input">
    <input type="text" id="discount_price" name="orig_price" placeholder="Discount" class="discount-input">
    <input type="text" id="discounted_price" name="orig_price" placeholder="Discounted Price" class="discount-input">

	<button class="done" id="done_btn">Done</button>
</div>


</body>
</html>

<script>
$(document).ready(function() {
	load_admin_products();
	function load_admin_products() {
		var action = 'load_admin_products';
		$.ajax({
			url:'admin-page-actions/inventory_management-fetch-products-action.php',
			method:'POST',
			data:{action:action},
			success:function(data) {
				$('#fetch_products').html(data);
			}
		})
	}
	$(document).on('click', '#discount', function() {
	var product_id = $(this).data('product_id');
	var action = 'fetch_data_for_discount';
	$.ajax({
		url:'admin-page-actions/admin-discount-action.php',
		method:'POST',
		dataType:'json',
		data:{
			action:action,
			product_id:product_id
		},
		success:function(data) {
			$('#orig_price').val(data.orig_price);
			$('#discount_price').val(data.discount_price);
			$('#discounted_price').val(data.discounted_price);
		}
	})
	var action = 'set_session';
	$.ajax({
		url:'admin-page-actions/admin-discount-action.php',
		method:'POST',
		data:{
			action:action,
			product_id:product_id
		},
		success:function(data) {
		}
	})
});

$(document).keyup('#orig_price', function() {
	var action = 'discount_compute';
	var orig_price = $('#orig_price').val();
	var discount_price = $('#discount_price').val();
	if(orig_price != '') {
		$.ajax({
			url:'admin-page-actions/admin-discount-action.php',
			method:'POST',
			data:{
				action:action,
				orig_price:orig_price,
				discount_price:discount_price
			},
			success:function(data) {
				$('#discounted_price').val(data);
			}
		})
	}
});


$(document).on('click', '#done_btn', function() {
	var action = 'complete_discount';
	var orig_price = $('#orig_price').val();
	var discount_price = $('#discount_price').val();

	$.ajax({
		url:'admin-page-actions/admin-discount-action.php',
		method:'POST',
		data:{
			action:action,
			orig_price:orig_price,
			discount_price:discount_price
		},
		success:function(data) {
			if(data == 'Done') {
				modal.style.display = "none";
				load_admin_products();
			}
			else {
				alert(data);
			}
		}
	})
});

$(document).on('click', '#delete_product', function() {
	var action = 'delete_product';
	var delete_product_id = $(this).data('delete_product_id');
	if(confirm('Are you sure you want to delete this product?')) {
		$.ajax({
			url:'admin-page-actions/admin-product-action.php',
			method:'POST',
			data:{
				action:action,
				delete_product_id:delete_product_id
			},
			success:function(data) {
				if(data == 'Done') {
					load_admin_products();
				}
			}
		})
	}
});


});


var modal = document.getElementById('discount_div');
var btn = document.getElementById("discount");
var span = document.getElementsByClassName("close")[0];

$(document).on('click', '#discount', function() {
    modal.style.display = "block";
});

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>