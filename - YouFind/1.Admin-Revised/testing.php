<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.js"></script>



<br>
<center>
	<select id="ins_term">
		<option name="val1">3 Months</option>
		<option name="val2">6 Months</option>
		<option name="val3">12 Months</option>
		<option name="val4">18 Months</option>
		<option name="val5">24 Months</option>
	</select>
	<br><br><br>
	<input type="button" name="" id="button" value="Button">

	<br><br><br>

	<div id="display"></div>
	<div id="display_yw"></div>

</center>





<script type="text/javascript">
	$(document).ready(function() {

		var pick = 3;
		$(document).on('change', '#ins_term', function() {
			if($('#ins_term').val() == '3 Months') {
				pick = 3;
			}
			if($('#ins_term').val() == '6 Months') {
				pick = 6;
			}
			if($('#ins_term').val() == '12 Months') {
				pick = 12;
			}
			if($('#ins_term').val() == '18 Months') {
				pick = 18;
			}
			if($('#ins_term').val() == '24 Months') {
				pick = 24;
			}
		});


		function setDate(setDate) {
			var now = new Date();
			var setDate = now.setDate((now.getDate()+30));
			return setDate;
		}
		
		$(document).on('click', '#button', function() {
			var action = 'get_date';
			var now = new Date();
			$.ajax({
				url:'testing2.php',
				method:'POST',
				data:{action:action},
				success:function(data) {
					if(now > data) {
						alert(now);
					}
					else if(now < data) {
						alert();
					}
				}
			})
		});

	});
</script>