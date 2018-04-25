<?php 
	/*
	if(isset($_POST['btnSubmit'])) {
		$image_name = addslashes($_FILES['image']['name']);
		$image = addslashes($_FILES['image']['tmp_name']);
		$image = file_get_contents($_FILES['image']['tmp_name']);
		$image = base64_encode($image);

		echo '<img src="data:image/jpeg;base64,'.$image.'" height="150" width="150">';
		echo $image_name;

	}
*/

 ?>


<script src="js/jquery-3.1.0.js"></script>
  <link rel="css/bootstrap.min.css" />
  <script src="js/bootstrap.min.js"></script>

  	<form id="form_wall">
		<input type="file" name="image" id="image">
		<input type="submit" name="btnSubmit" id="btnSubmit">
  	</form>
<div id="image_data"></div>


<script>
	$(document).ready(function() {
		$(document).on('click', '#btnSubmit', function(event) {
			event.preventDefault();
			var image = new FormData();
			if(image != '') {
				image.append('image', document.getElementById('image').files[0]);
				$.ajax({
					url:'testing_moto_action.php',
					type:'POST',
					data:image,
					contentType:false,
					cache:false,
					processData:false,
					success:function(data) {
						$('#form_wall')[0].reset();
						$('#image_data').html(data);
					}

				})
			}
			
		});
	});
</script>
 <!-- <img src="" style="border: 1px solid red; height: 150px; width: 150px;"> -->