<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		$query = 'SELECT * FROM index_newsfeed_tbl WHERE shopname = "Youfind Corporation" ORDER BY product_id DESC';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();

		$total = 0;
?>
<table>
	<tr>
		<th width="270px">Product Name
		<th width="270px">Category
		<th width="150px">Unit Price
		<th width="100px">Quantity
		<th width="190px">Status
		<th width="250px">Action
	</tr>
<?php for($i=0; $i<$count; $i++) { ?>
	<tr>
		<td><?php echo $result[$i]['product_name']; ?></td>
		<td><?php echo $result[$i]['product_category']; ?></td>
		<td style="overflow: hidden;">
			<p class="" style="margin: 0; font-size: 15px; margin-bottom: 5px;">
				&#8369; 
				<?php 
						if($result[$i]['product_discount'] > 0) {
							$discounted = $result[$i]['product_price'] * $result[$i]['product_discount'];
							$total = $result[$i]['product_price'] - $discounted;
							echo number_format($total, 2);
						}
						else {
							echo number_format($result[$i]['product_price'],2);
						}
				 ?>
			</p>
			<p class="" style="margin: 0; float: left; text-decoration: line-through; font-size: 11px;">
					<?php 
						if($result[$i]['product_discount'] == 0) {
							
						}
						else if($result[$i]['product_discount'] > 0) {
							echo '&#8369; '.number_format($result[$i]['product_price'],2);
						}
					 ?>
			</p>
			<p class="" style="margin: 0; font-size: 11px; float: right;">
				<?php 
					if($result[$i]['product_discount'] == 0) {
							
					}
					else if($result[$i]['product_discount'] > 0) {
						echo '&#8369; '.number_format($result[$i]['product_discount'],2);
					}
				?>		
			</p>
		</td>
		<td style="text-align: center;"><?php echo $result[$i]['product_quantity']; ?></td>
		<td><p style="color: red;">Nearly Out of Stock</p></td>
		<td>
			<button class="accept" title="Edit Product" onclick="location.href='admin_edit.php'" data-edit_product_id="<?php echo $result[$i]['product_id']; ?>" id="edit_product">Edit</button> 
			<button class="reject" title="Delete Product" data-delete_product_id="<?php echo $result[$i]['product_id']; ?>" id="delete_product">Delete</button>
			<button class="view" title="Add Promotions" id="discount" data-product_id="<?php echo $result[$i]['product_id']; ?>">Discount</button>
		</td>
	</tr>

<?php } ?>
</table>
