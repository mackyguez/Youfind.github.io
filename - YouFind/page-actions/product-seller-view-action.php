<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	session_start();
	$last_product_id = $_SESSION['product_id'];
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$last_product_id.'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$resultLastProduct = $statement->fetchAll();
 ?>
<div class="index-header-holder"><?php include('../new-header.php'); ?></div>

<div class="directory">
	<a href="#" class="dr-text" id="direct_index">Home</a> / <a class="dr-text" style="cursor: pointer;"><?php echo @$resultLastProduct[0]['product_category']; ?></a>
	<a href="#" class="dr-text"> / <?php echo @$resultLastProduct[0]['product_name']; ?></div>

<div class="index-middle-wrapper">
	<div class="index-category-left">
			<div class="product-wrapper">Products</div>
			<div class="category-container"><a href="#" class="category-link">Gadgets</a></div>
			<div class="category-container"><a href="#" class="category-link">Laptops & Computers</a></div>
			<div class="category-container"><a href="#" class="category-link">Camera, Photos & Videos</a></div>
			<div class="category-container"><a href="#" class="category-link">Headphones & Speakers</a></div>
			<div class="category-container"><a href="#" class="category-link">Computer Parts</a></div>
			<div class="category-container"><a href="#" class="category-link">Storage Devices</a></div>
			<div class="category-container"><a href="#" class="category-link">Accessories</a></div>
			<div class="category-container"><a href="#" class="category-link">Drones</a></div>
			<div class="category-container"><a href="#" class="category-link">Home Entertainment</a></div>
			<div class="services-wrapper">Services</div>
			<div class="category-container"><a href="#" class="category-link">Cellphone Repairs</a></div>
			<div class="category-container"><a href="#" class="category-link">Update & Upgrade</a></div>
			<div class="category-container"><a href="#" class="category-link">Installation</a></div>
			<div class="category-container"><a href="#" class="category-link">Computer Repairs</a></div>
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
			<p class="original-price">&#8369; 599.00</p>
			<p class="discount">15%</p>

			<div class="rating-overview">
				<div class="star-ratings"><img src="images/5-star.png" width="100%" height="100%"></div>
				<p class="star-counter">(0)</p><br>
				<p class="review-overview">Reviews (0)</p>
			</div>

		</div>
		<div class="seller-action-holder">
		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
					<button class="edit-product-button" id="edit_product_button" data-edit_product="<?php echo @$resultLastProduct[0]['product_id']; ?>">Edit Product</button>
		<?php 	}	 ?>
		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
			<button class="edit-product-button" id="add_product_button" data-edit_product="<?php echo @$resultLastProduct[0]['product_id']; ?>">Add New Product</button>
			<?php 	}	 ?>

		<?php 	if($resultLastProduct[0]['user_id'] == @$_SESSION['seller_user_id']) { ?>
					<button class="edit-product-button" id="delete_product_button" data-delete_product="<?php echo $resultLastProduct[0]['product_id']; ?>">Delete Product</button>	
		<?php 	}	 ?>
		</div>
	</div>

	<div class="product-description-holder">
		<p class="product-description">Product Description</p>
		<div class="full-description">
			<p class="whats-in-box">Included in the box</p>
			<div class="item-in-box">
				<?php 
					if($resultLastProduct[0]['inc_prod_quantity1'] != '' && $resultLastProduct[0]['inc_prod_name1']) {
						echo '<p class="qty-item">'.$resultLastProduct[0]['inc_prod_quantity1'].' x</p><p class="what-item">'.$resultLastProduct[0]['inc_prod_name1'].'</p>';
					}
				?>
			</div>
			
			<br>

			<p class="specifications">Specifications</p>
			<div class="all-specs">
				<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
			</div>
			<div class="all-specs">
				<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
			</div>
			<div class="all-specs">
				<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
			</div>
			<div class="all-specs">
				<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
			</div>
			<div class="all-specs">
				<p class="specs-title">Screen</p><p class="what-specs">5" LCD Screen</p>
			</div>
		</div>
	</div>

	<div class="star-rating-holder"></div>

	</div>
</div>

<div class="index-footer-wrapper"><?php include('../footer1.php'); ?></div>