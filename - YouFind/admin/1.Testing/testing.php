<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<?php 
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database', 'root', '');
	$query = '
		SELECT * FROM youfind_user
	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		echo '<button style="border: none; background-color: #fff;" data-product_id="'.$row["user_id"].'" id="edit_button"><img src="images/edit.png" width="40" height="40"></button><br>';
	}

 ?>


<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '#edit_button', function() {
			var edit_button = $(this).data('product_id');
			alert(edit_button);
		});
	});
</script>