<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	$query = 'SELECT * FROM index_newsfeed_tbl WHERE product_id = '.$_POST['edit_product_id'].'';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
 ?>

 <style type="text/css">
 	<?php include('..\1.Admin-Revised\modal.css');?>
 	.input-wrapper::-webkit-scrollbar {
 		display: none;
 	}
 	.input-wrapper:hover::-webkit-scrollbar {
 		display: block;
 		width: 5px;
 	}
 	.input-wrapper::-webkit-scrollbar-thumb {
 		background: #b3b3b3; 
    	-webkit-border-radius: 8px;
    	width: 2px;
 	}
 </style>

 <div class="modal fade" id="editProductModal" role="dialog">
	<div class="modal-dialog" style="width: 777px;">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #125965;">
				<p style="margin: 0; float: left; font-size: 20px; font-weight: bold; color: white;">Edit Product</p>
				<button type="button" class="close" data-dismiss="modal" style="font-size: 30px; color: white; margin: 0; float: right;">&times;</button>
			</div>
			<div class="modal-body" style="width: 777px;">
				<div class="input-wrapper" style="overflow-y: scroll; max-height: 570px;">

				<p class="item-progress-title">Product Images</p>
				<div class="item-preview-wrapper">	
					<div class="item-preview" id="item_preview">
						<img src="product-photo/<?php echo $result[0]['product_photo']; ?>" width="100%" height="100%">
					</div>
				</div>

				<div class="input-upload">
					<form id="form_wall" enctype="multipart/form-data">
						<input type="file" name="file" id="upload_product_photo">
					</form>
				</div>
   				
					
				<p class="item-progress-title">Product Category</p>
		      	<div class="input-forms">
					<div class="categories">
						<select class="allCategories" id="category">
								<?php  
								$actions = array('Laptops & Computers','Camera & Photography','Smart Phones & Tablets','TV & Audio','Car Electronics & GPS','Drones','Accessories');
								foreach ($actions as $key => $value) {
									echo "<option name='$actions' value='$value'>".$value."</option>";
								}
								?>
						</select>

		      			<p class="item-progress-title">Product Information</p>

						<input type="text" name="prod-name" id="edit_product_name" placeholder="Product Name *" class="input-type" value="<?php echo $result[0]['product_name']; ?>">
						<input type="text" name="your-price" placeholder="Your Price *" class="input-type" id="product_price" value="<?php echo $result[0]['product_price']; ?>">
						<input type="number" name="stock" class="input-type" min="1" value="1" id="product_quantity" value="<?php echo $result[0]['product_quantity']; ?>">

						<textarea cols="135" rows="3" class="overview" maxlength="300" placeholder="Product Overview.            NOTE: Maximum of 300 characters." id="product_overview" style="margin-bottom: 30px;"><?php echo $result[0]['product_overview']; ?></textarea>

		  				<p class="item-progress-title">Product Inclusion</p>

			  			<button class="add-inclusion" id="add_inclusion">Add Inclusion</button>
			  			<button class="add-inclusion" id="delete_inclusion">Remove</button>
			  			<div class="add-more-item" id="add_this">
			  				<input type="number" name="qty" class="input-num" min="1" value="1" id="inc_prod_quantity1">
			  				<p class="ex">&times;</p>
			  				<input type="text" name="prod-name" id="inc_prod_name1" placeholder="What is included with your product?" class="input-what">
						</div>

					<div class="space">  space  </div>
					<p class="item-progress-title">Product Specifications</p>

			  			<button class="add-inclusion" id="specs_btn">Add Specifications</button>
			  			<button class="add-inclusion" id="delete_btn">Remove</button>

			  			<div class="add-more-item" id="specs_div">
			  				<input type="text" name="qty" class="spec_title" id="title_spec1" placeholder="Specification Title">
			  				<input type="text" name="prod-name" id="desc_spec1" placeholder="Specification Description" class="spec_value">
						</div>
			</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="edit_modal_done">Done</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	{
		if('<?php echo $result[0]['product_category']; ?>' == 'Laptops & Computers') {
			$('#category').val('Laptops & Computers');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'Camera & Photography') {
			$('#category').val('Camera & Photography');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'Smart Phones & Tablets') {
			$('#category').val('Smart Phones & Tablets');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'TV & Audio') {
			$('#category').val('TV & Audio');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'Car Electronics & GPS') {
			$('#category').val('Car Electronics & GPS');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'Drones') {
			$('#category').val('Drones');
		}
		if('<?php echo $result[0]['product_category']; ?>' == 'Accessories') {
			$('#category').val('Accessories');
		}
	}
</script>