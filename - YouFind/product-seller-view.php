<?php 
	session_start();
	if(!isset($_SESSION['product_id'])) {
		header('location:new-index.php');
	}
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$last_product_id = $_SESSION['product_id'];
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$last_product_id.'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$resultLastProduct = $statement->fetchAll();
	//print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="product-new-styles.css">
</head>

<body>
	<div class="index-whole-wrapper" id="whole_wrapper"></div>
</body>
</html>

<div id="edit_product_modal_holder"></div>
	<div class="index-header-holder"><?php include('new-header.php'); ?></div>

	<div class="directory">
		<a href="#" class="dr-text" id="direct_index">Home</a> / <a class="dr-text" style="cursor: default; color: black"><?php echo @$resultLastProduct[0]['product_category']; ?></a>
		<a href="#" class="dr-text" style="text-decoration: none; color: black; cursor: default;"> / <?php echo @$resultLastProduct[0]['product_name']; ?>
	</div>

<div class="index-middle-wrapper">
	<div class="index-category-left">
			<div class="product-wrapper">Products</div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Gadgets</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Laptops & Computers</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Camera, Photos & Videos</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Headphones & Speakers</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Computer Parts</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Storage Devices</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Accessories</a></div>
					<div class="category-container"><a href="#" class="category-link" style="text-decoration: none; color: black;">Drones</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Home Entertainment</a></div>
					<div class="services-wrapper" style="display: none;">Services</div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Cellphone Repairs</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Update & Upgrade</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Installation</a></div>
					<div class="category-container" style="display: none;"><a href="#" class="category-link">Computer Repairs</a></div>
	</div>
	<div class="index-product-display-right">
		<div class="product-info-holder">
			
		<div class="index-product-name-holder">
			<div class="product-name" id="product_name"><?php echo @$resultLastProduct[0]['product_name']; ?></div>

		</div class="image-desc">
		<div class="img-left">
		</div>
		<div class="product-photo-holder">
			<img src="product-photo/<?php echo @$resultLastProduct[0]['product_photo']; ?>" class="product-photo-large">
		</div>
		<div class="product-overview-holder">
			<p class="product-overview-title">Product Overview</p>
			<p class="product-overview-text" id="edit_product_overview"><?php echo @$resultLastProduct[0]['product_overview']; ?></p>
			<p class="product-price" id="edit_product_price">&#8369; <?php echo number_format(@$resultLastProduct[0]['product_price'], 2); ?></p>
			<p class="original-price" style="display: none;">&#8369; 599.00</p>
			<p class="discount" style="display: none;">15%</p>

			<div class="rating-overview" style="display: none;">
				<div class="star-ratings"><img src="images/5-star.png" width="100%" height="100%"></div>
				<p class="star-counter">(0)</p><br>
				<p class="review-overview">Reviews (0)</p>
			</div>

		</div>
		<div class="seller-action-holder">
		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
					<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$resultLastProduct[0]['product_id']; ?>" style="display: none;">Edit Product</button>
		<?php 	}	 ?>
		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
			<button class="edit-product-button" id="add_product_button" data-edit_product="<?php echo @$resultLastProduct[0]['product_id']; ?>">Add New Product</button>
			<?php 	}	 ?>

		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
					<button class="edit-product-button" id="delete_product_button" data-delete_product="<?php echo @$resultLastProduct[0]['product_id']; ?>">Delete Product</button>	
		<?php 	}	 ?>
		</div>
	</div>

	<div class="product-description-holder" style="display: none;">
		<p class="product-description">Product Description</p>
		<div class="full-description">
			<p class="whats-in-box">Included in the box</p>
			<div class="item-in-box">
				<?php 
					if(isset($resultLastProduct[0]['inc_prod_quantity1']) && isset($resultLastProduct[0]['inc_prod_name1'])) {
						echo '<p class="qty-item">'.$resultLastProduct[0]['inc_prod_quantity1'].' x</p><p class="what-item" style="width: 150px;">'.$resultLastProduct[0]['inc_prod_name1'].'</p>';
					}
					
					if(isset($resultLastProduct[0]['inc_prod_quantity2']) && isset($resultLastProduct[0]['inc_prod_name2'])) {
						echo '<p class="qty-item">'.$resultLastProduct[0]['inc_prod_quantity2'].' x</p><p class="what-item" style="width: 150px;">'.$resultLastProduct[0]['inc_prod_name2'].'</p>';
					}
					if(isset($resultLastProduct[0]['inc_prod_quantity3']) && isset($resultLastProduct[0]['inc_prod_name3'])) {
						echo '<p class="qty-item">'.$resultLastProduct[0]['inc_prod_quantity3'].' x</p><p class="what-item" style="width: 150px;">'.$resultLastProduct[0]['inc_prod_name3'].'</p>';
					}
					if(isset($resultLastProduct[0]['inc_prod_quantity4']) && isset($resultLastProduct[0]['inc_prod_name4'])) {
						echo '<p class="qty-item">'.$resultLastProduct[0]['inc_prod_quantity4'].' x</p><p class="what-item" style="width: 150px;">'.$resultLastProduct[0]['inc_prod_name4'].'</p>';
					}
					
				?>
			</div>
			
			<br>

			<p class="specifications">Specifications</p>
			<?php 
				if(isset($resultLastProduct[0]['spec_title1']) && isset($resultLastProduct[0]['desc_spec1'])) {
					echo '<div class="all-specs">
							<p class="specs-title">'.$resultLastProduct[0]['spec_title1'].'</p><p class="what-specs">'.$resultLastProduct[0]['desc_spec1'].'</p>
						</div>';
				}

				if(isset($resultLastProduct[0]['spec_title2']) && isset($resultLastProduct[0]['desc_spec2'])) {
					echo '<div class="all-specs">
							<p class="specs-title">'.$resultLastProduct[0]['spec_title2'].'</p><p class="what-specs">'.$resultLastProduct[0]['desc_spec2'].'</p>
						</div>';
				}
				if(isset($resultLastProduct[0]['spec_title3']) && isset($resultLastProduct[0]['desc_spec3'])) {
					echo '<div class="all-specs">
							<p class="specs-title">'.$resultLastProduct[0]['spec_title3'].'</p><p class="what-specs">'.$resultLastProduct[0]['desc_spec3'].'</p>
						</div>';
				}
				if(isset($resultLastProduct[0]['spec_title4']) && isset($resultLastProduct[0]['desc_spec4'])) {
					echo '<div class="all-specs">
							<p class="specs-title">'.$resultLastProduct[0]['spec_title4'].'</p><p class="what-specs">'.$resultLastProduct[0]['desc_spec4'].'</p>
						</div>';
				}
			?>
		</div>
	</div>

	<div class="star-rating-holder"></div>

	</div>
</div>

<div class="index-footer-wrapper"><?php include('footer1.php'); ?></div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
	
		$(document).on('click', '#direct_index', function() {
			var action = 'direct_index';
			$.ajax({
				url:'page-actions/post-product-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(data == 'Done') {
						window.location = 'new-index.php';
					}
				}
			})
		});

		$(document).on('click', '#edit_product_button', function() {
			var action = 'load_edit_product_modal';
			var edit_product_id = $(this).data('edit_product');
			$.ajax({
				url:'page-actions/edit-product-modal-action.php',
				method:'POST',
				data:{
					action:action,
					edit_product_id
				},
				success:function(data) {
					$('#edit_product_modal_holder').html(data);
					$('#editProductModal').modal('show');
					$('body').removeAttr('style');
				}
			})
		});


		var counter = 0;
		$("#add_inclusion").click(function () {
			if(counter < 3) {
				$("#add_this").append(
					'<input type="number" name="qty" class="input-num append-quantity" min="1" value="1"><p class="ex" id="x-text">&times;</p><input type="text" name="prod-name" placeholder="What is included with your product?" class="input-what append-what">');
				counter++;
			}
		});
			
		$('#delete_inclusion').click(function() {
				$('input[type].append-quantity:last').remove();
				$('p#x-text:last').remove();
				$('input[type].append-what:last').remove();
				if(counter > 0) {
					counter--;
				}
		});

		var spec_counter = 0;
		$("#specs_btn").click(function () {
			if(spec_counter < 3) {
				$('#specs_div').append('<input type="text" name="qty" class="spec spec_title" id="title_spec" placeholder="Specification Title"><input type="text" name="prod-name" id="desc_spec" placeholder="Specification Description" class="desc spec_value">');
				spec_counter++;
			}
		});

		$('#delete_btn').click(function() {
			$('input[type].spec:last').remove();
			$('input[type].desc:last').remove();
			if(spec_counter > 0) {
				spec_counter--;
			}
		});

		$(document).on('click', '#edit_modal_done',function() {
			var product_category = $('#category').val();
			var product_name = $('#edit_product_name').val();
			var product_price = $('#product_price').val();
			var product_quantity = $('#product_quantity').val();
			var product_overview = $('#product_overview').val();


			var inc_prod_quantity1 = $('#inc_prod_quantity1').val();
			var inc_prod_name1 = $('#inc_prod_name1').val();

			var inc_prod_quantity2 = $('input[type].input-num:eq(1)').val();
			var inc_prod_name2 = $('input[type].input-what:eq(1)').val();

			var inc_prod_quantity3 = $('input[type].input-num:eq(2)').val();
			var inc_prod_name3 = $('input[type].input-what:eq(2)').val();

			var inc_prod_quantity4 = $('input[type].input-num:eq(3)').val();
			var inc_prod_name4 = $('input[type].input-what:eq(3)').val();

			var spec_title1 = $('#title_spec1').val();
			var desc_spec1 = $('#desc_spec1').val();

			var spec_title2 = $('input[type].spec:eq(0)').val();
			var desc_spec2 = $('input[type].desc:eq(0)').val();

			var spec_title3 = $('input[type].spec:eq(1)').val();
			var desc_spec3 = $('input[type].desc:eq(1)').val();

			var spec_title4 = $('input[type].spec:eq(2)').val();
			var desc_spec4 = $('input[type].desc:eq(2)').val();
			var action = 'update_product';
			$.ajax({
				url:'page-actions/edit-product-action.php',
				method:'POST',
				data:{
					action:action,
					product_category:product_category,
					product_name:product_name,
					product_price:product_price,
					product_quantity:product_quantity,
					product_overview:product_overview,
					inc_prod_quantity1:inc_prod_quantity1,
					inc_prod_name1:inc_prod_name1,
					inc_prod_quantity2:inc_prod_quantity2,
					inc_prod_name2:inc_prod_name2,
					inc_prod_quantity3:inc_prod_quantity3,
					inc_prod_name3:inc_prod_name3,
					inc_prod_quantity4:inc_prod_quantity4,
					inc_prod_name4:inc_prod_name4,
					spec_title1:spec_title1,
					desc_spec1:desc_spec1,
					spec_title2:spec_title2,
					desc_spec3:desc_spec3,
					spec_title3:spec_title3,
					desc_spec4:desc_spec4,
					spec_title4:spec_title4,
					desc_spec1:desc_spec1,
					counter:counter,
					spec_counter:spec_counter
				},
				success:function(data) {
					if(data == 'Done') {
						
					}
					else {
						alert(data);
					}
				}
			})
		});

		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'seller-profile.php';
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = 'logout.php';
		});
		$(document).on('click', '#header_logo', function() {
			window.location = 'new-index.php';
		});
		$(document).on('click', '#add_product_button', function() {
			window.location = 'post-product.php';
		});

		$(document).on('change', '#upload_product_photo', function() {
				var upload_product_photo = document.getElementById('upload_product_photo').files[0].name;
				var ext = upload_product_photo.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('upload_product_photo').files[0]);
				var f = document.getElementById('upload_product_photo').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 10000000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('upload_product_photo', document.getElementById('upload_product_photo').files[0]);
					$.ajax({
						url:'page-actions/edit-product-modal-upload-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#item_preview').html(data);
						}
					})
				}
		});

		$(document).on('click', '#delete_product_button', function() {
				var action = 'delete_product';
				var product_id = $(this).data('delete_product');
				$.ajax({
					url:'page-actions/post-product-review-action.php',
					method:'POST',
					data:{
						action:action,
						product_id:product_id
					},
					success:function(data) {
						if(data == 'Done') {
							window.location = 'inventory-seller.php';
						}
					}
				})
		});

		

});
</script>