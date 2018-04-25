<?php 

	$connect = new PDO('mysql:host=localhost;dbname=photos', 'root', '');

	$userId = 1;
	$query = 'SELECT * FROM images where id = :id';
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':id' => $userId
		)
	);
	$result = $statement->fetchAll();
	foreach($result as $row) {

	}
 ?>
<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>

<br><br>
<form action="testing_action.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" id="image"><button type="button" id="submit">Upload</button>
	<div id="image_data"></div>
</form>


<script>
	$(document).ready(function() {

		$(document).on('click', '#submit', function() {
			var form_data = new FormData();
			if(image != '') {
				form_data.append("image", document.getElementById('image').files[0]);
				$.ajax({	
					url:'testing_action.php',
					type:'POST',
					data:form_data,
					contentType:false,
					cache:false,
					processData:false,
					beforeSend:function() {
						
					},
					success:function(data) {
						$('#image_data').html(data);
					}
				})
			}
			else {

			}
		});

	});
</script>