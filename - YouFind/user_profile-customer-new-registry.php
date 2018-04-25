<?php 
	include('database_connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>YouFind</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="user_profile-new-registry.css">
</head>
<body>
	<div class="whole-wrapper">
		<div class="header-holder"><?php include('header-customer-new-logged-in.php'); ?></div>
		<div class="content-holder">
			<div class="content-left">
				<p class="about-text">About</p>
				<div class="left-upper">
					<div class="user-pic-holder-left">
						<div class="user-pic" id="user_pic">
							<img src="1.User/profile-pictures/<?php echo @$profile_image; ?>" class="user-pic-image" data-picture="<?php echo @$user_id; ?>" id="user_picture">
						</div>
						<form enctype="multipart/form-data" id="form_wall" style="margin: 0;">
							<input type="file" id="upload_profile_picture" class="upload-profile-picture">
						</form>
					</div>
					<div class="user-details-holder-right">
						<p class="user-name"><?php echo @$header_first_name .' '. @$header_last_name; ?></p>
						<input type="button" class="edit-profile-button" name="edit_profile" data-user_id="<?php echo @$user_id; ?>" id="edit_profile_button" value="Edit profile">
						<p class="user-address"><?php echo $header_add_city; ?></p>
						<p class="ratings-text">Ratings</p>
						<img src="images/star-ratings.png" class="star-ratings-image">
					</div>
				</div>
				<p class="insight-text">Insights</p>
				<div class="insights-holder">
					<div class="reviews-wrapper">
						<p class="counting-numbers">20</p>
						<p class="text-bottom">Reviews</p>
					</div>
					<div class="items-ordered-wrapper">
						<p class="counting-numbers">50</p>
						<p class="text-bottom">Items Ordered</p>
					</div>
					<div class="service-hired-wrapper">
						<p class="counting-numbers">2</p>
						<p class="text-bottom">Service Hired</p>
					</div>
				</div>
				<p class="wishlist-text">Wishlist</p>
				<div class="wishlist-holder">
						<div class="product-image-holder"><img src="images/clang.jpg" class="product-image"></div>
						<p class="product-name">Earphone</p>
						<p class="delete-button">&times;</p>
						<p class="shop-name">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="product-star-ratings">
						<p class="product-description">This is a product which can be more than putangina.</p>
						<div class="wishlist-add-to-cart-holder">
							<input type="button" name="add_to_cart" class="wishlist-add-to-cart" value="Add to Cart">
						</div>
				</div>
			</div>
			<div class="content-right">
				<p class="activities-text">Activities</p>
				<div class="reviewed-division">
					<a class="activities-user-name">John Michael Olangco</a><p class="reviewed-text">reviewed an item</p>
					<p class="activities-date">01/09/2018</p>
					<div class="product-information">
						<img src="images/clang.jpg" class="activities-product-image">
						<p class="activities-product-name">Motherboard</p>
						<p class="activities-shopname">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="activities-star-ratings">
						<p class="activities-title-review">Title of the review</p>
						<p class="activities-product-description">This is the description of the product where the product has a description and a description has a product thats relies on the description of the product.</p>
					</div>
				</div>
				<div class="reviewed-division">
					<a class="activities-user-name">John Michael Olangco</a><p class="reviewed-text">reviewed an item</p>
					<p class="activities-date">01/09/2018</p>
					<div class="product-information">
						<img src="images/clang.jpg" class="activities-product-image">
						<p class="activities-product-name">Motherboard</p>
						<p class="activities-shopname">Juan's Enterprise</p>
						<img src="images/star-ratings.png" class="activities-star-ratings">
						<p class="activities-title-review">Title of the review</p>
						<p class="activities-product-description">This is the description of the product where the product has a description and a description has a product thats relies on the description of the product.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-holder" style="margin: 2px 0 0 0;"><?php include('footer.php'); ?></div>
	</div>
</body>
</html>

<div id="editProfileModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span id="change_title">Edit Profile</span></h4>
			</div>
			<div class="modal-body">
				<input type="text" id="first_name">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
		$(document).ready(function() {

			$(document).on('click', '#edit_profile_button', function() {
				$('#editProfileModal').modal('show');
				$('body').removeAttr('style');
			});

			$(document).on('change', '#upload_profile_picture', function() {
				$('.user-pic').html('<img src="images/clang.jpg" class="user-pic-image">');
				var upload_profile_picture = document.getElementById('upload_profile_picture').files[0].name;
				var ext = upload_profile_picture.split('.').pop().toLowerCase();
				var form_data = new FormData();
				if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid image file');
					$('#form_wall')[0].reset();
				}
				var ofReader = new FileReader();
				ofReader.readAsDataURL(document.getElementById('upload_profile_picture').files[0]);
				var f = document.getElementById('upload_profile_picture').files[0];
				var fsize = f.size || f.fileSize;
				if(fsize > 10000000) {
					alert('Image is too large');
					$('#form_wall')[0].reset();
				}
				else {
					form_data.append('upload_profile_picture', document.getElementById('upload_profile_picture').files[0]);
					$.ajax({
						url:'user_profile-customer-logged-in-action.php',
						method:'POST',
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(data) {
							$('#user_pic').html(data);
							$('#form_wall')[0].reset();
						}
					})
				}

			});

			$('#search').keyup(function() {
				var search_something = $('#search').val();
				var select_search = $('#select_search').val();
				if(search_something != '') {
					$.ajax({
						url:'search_action.php',
						method:'POST',
						data:{
							search_something:search_something,
							select_search
						},
						success:function(data) {
							$('#search_success').fadeIn(0);
							$('#search_success').html(data);
						}
					})
				}
				else if(search_something == '') {
					$('#search_success').fadeOut(200);
				}
			});
			$(document).on('click', 'li', function() {
				$('#search').val($(this).text());
				$('#search_success').fadeOut();
			});
				
		});
</script>