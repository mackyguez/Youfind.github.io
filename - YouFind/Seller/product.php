<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="product-style.css">
</head>
<body>

<!--SELLER'S VIEW-->

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('header-seller-logged-in.php'); ?></div>
		<div class="content-holder">

			<div class="directory">
				<a class="direct-a" href="../index.php">Home</a> / <a class="direct-a" href="#">Others</a> / 
				<a href="product.php" style="text-decoration: none; color: black;" id="directory_product_title"></a>
			</div>

			<div class="category-wrapper" style="background-color: #f0f1f4; float: left; width: 20%; margin-top: 30px;">
				<p>Categories</p>
			</div>


			<div class="left-wrapper">
				
			<div class="prod-wrapper">
				
			<div class="top-info">
				<div class="title-edit">
				<p class="prod-title" id="prod_title"></p>
				<button class="edit-prod" id="edit_product">Edit Product</button>
				</div>
			</div>

			<div class="bottom-info">

					<div class="item-photos">
							
						<div class="item-list">
							<ul>
								<li class="photo-list"><img src="images/photo1.jpg" width="50px" height="50px">
								<li class="photo-list"><img src="images/photo1.jpg" width="50px" height="50px">
								<li class="photo-list"><img src="images/photo1.jpg" width="50px" height="50px">
							</ul>
						</div>
						<div class="item-preview" id="item_preview" style="padding: 2px;"></div>
					</div>

					<div class="item-info">
						<div class="item-overview">
							<p class="overview-title" style="height: auto;">Product Overview</p>
							<p id="product_overview" class="product-overview"></p>
						</div>

						<div class="price-wrapper" id="price_wrapper">
							<p class="price" id="product_price"></p>
						</div>

						<div class="title-rate">
							<div class="ratings"><img src="images/star-ratings.png" width="85px" height="15px" class="img-rate"><p class="rate-counter">(10)</p></div>
							<div class="reviews">
								<p class="writeReview">Reviews (20)</p>
							</div>
						</div>

					</div>	
				</div>
			</div>
		

			<div class="prod-description">
				<p class="desc-title">Product Description and Specification</p>
				<div class="desc-div">
					<p class="desc-what">What's in the box?</p>
					<div id="desc_details"></div>
				</div>

				<div class="desc-div">
					<p class="desc-what">General Features / Specifications</p>
					<div id="specs"></div>
				</div>
			</div>

			<div class="revrate-wrapper">
				<p class="desc-title">Product Reviews and Ratings</p>

				<div class="rate-container">
					
				<p class="rate-title">Average Product Rating</p>
				<div class="rate-this"><img src="images/star-ratings.png" width="200px" height="28px"></div>
				<div class="summary"><p class="review-count">20 Reviews</p><p class="rate-count">10 Rates</p></div>

				</div>

				<div class="star-counter">

					<p class="rate-title">Product Rating Summary</p>

					<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">5 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
					<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">4 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
					<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">3 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
					<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">2 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
					<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">1 Star</p><div style="float: left; width: 60px; padding: 8px 13px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 30px">10</p></div>
				</div>
			</div>

		</div>
		</div>
	</div>

		<div class="footer-wrapper" style="margin-top: 70px;"><?php include('footer.php'); ?></div>
</body>
</html>

<script>
	$(document).ready(function() {
		load_last_product_insert();
		function load_last_product_insert() {
			var action = 'load_last_product_insert';
			var action_directory = 'load_directory_product_title';
			var action_image = 'load_product_image';
			var action_prod_overview = 'load_product_overview';
			var action_prod_price = 'load_product_price';
			var action_load_in_box = 'load_in_box';
			var action_load_specs = 'load_specs';
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					$('#prod_title').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_directory:action_directory},
				success:function(data) {
					$('#directory_product_title').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_image:action_image},
				success:function(data) {
					$('#item_preview').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_prod_overview:action_prod_overview},
				success:function(data) {
					$('#product_overview').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_prod_price:action_prod_price},
				success:function(data) {
					//$('#product_price').css({'padding':'0 0 0 15px'});
					$('#product_price').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_load_in_box:action_load_in_box},
				success:function(data) {
					$('#desc_details').html(data);
				}
			})
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{action_load_specs:action_load_specs},
				success:function(data) {
					$('#specs').html(data);
				}
			})
		}
		
		$(document).on('click', '#edit_product', function() {
			$('#prod_title').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'border': '1px solid #b3d1ff',
			});
			$('#product_overview').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'border': '1px solid #b3d1ff',
			});
			$('#product_price').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'border': '1px solid #b3d1ff',
			});
			$('#in_box1').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'border': '2px solid #b3d1ff',
			});
			$('#in_box2').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#in_box3').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#in_box4').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#specs1').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'border': '2px solid #b3d1ff',
			});
			$('#specs2').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#specs3').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#specs4').css({
				"border-radius": "4px",
				'padding': '0 0 0 15px',
				'margin': '2px 0 0 0',
				'border': '2px solid #b3d1ff',
			});
			$('#prod_title').attr('contenteditable', 'true');
			$('#product_overview').attr('contenteditable', 'true');
			$('#product_price').attr('contenteditable', 'true');
			$('#in_box1').attr('contenteditable', 'true');
			$('#in_box2').attr('contenteditable', 'true');
			$('#in_box3').attr('contenteditable', 'true');
			$('#in_box4').attr('contenteditable', 'true');
			$('#specs1').attr('contenteditable', 'true');
			$('#specs2').attr('contenteditable', 'true');
			$('#specs3').attr('contenteditable', 'true');
			$('#specs4').attr('contenteditable', 'true');
			$('#edit_product').html('Done');
			$('#edit_product').attr('id', 'edit_done');
		});

		$(document).on('blur', '#product_price', function() {
			var product_price = $('#product_price').text();
			var action = 'product_price_edit';
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{
					action:action,
					product_price:product_price
				},
				success:function(data) {
					$('#product_price').html(data);
				}
			})
		});

		$(document).on('click', '#edit_done', function() {
			var edit_product_title = $('#prod_title').text();
			var product_overview = $('#product_overview').text();
			var product_price = $('#product_price').text();
			var in_box1 = $('#in_box1').text();
			var in_box2 = $('#in_box2').text();
			var in_box3 = $('#in_box3').text();
			var in_box4 = $('#in_box4').text();
			var specs1 = $('#specs1').text();
			var specs2 = $('#specs2').text();
			var specs3 = $('#specs3').text();
			var specs4 = $('#specs4').text();
			var action = 'change_product_title';
			$.ajax({
				url:'product-action.php',
				method:'POST',
				data:{
					action:action,
					edit_product_title:edit_product_title,
					product_overview:product_overview,
					product_price:product_price,
					in_box1:in_box1,
					in_box2:in_box2,
					in_box3:in_box3,
					in_box4:in_box4,
					specs1:specs1,
					specs2:specs2,
					specs3:specs3,
					specs4:specs4
				},
				success:function(data) {
					if(data == 'Done') {
						$('#prod_title').attr('contenteditable', 'false');
						$('#prod_title').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#product_overview').attr('contenteditable', 'false');
						$('#product_overview').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#product_price').attr('contenteditable', 'false');
						$('#product_price').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0"
						});
						$('#in_box1').attr('contenteditable', 'false');
						$('#in_box2').attr('contenteditable', 'false');
						$('#in_box3').attr('contenteditable', 'false');
						$('#in_box4').attr('contenteditable', 'false');
						$('#in_box1').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#in_box2').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#in_box3').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#in_box4').css({
							"background": "inherit", 
							'border': 'none',
							"border-radius": "0",
							'padding': '0'
						});
						$('#edit_done').html('Edit Product');
						$('#edit_done').attr('id', 'edit_product');
						load_last_product_insert();
					}
					else {
						alert(data);
					}
				}
			})
		});
		
	});
</script>