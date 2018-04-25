<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.js"></script>





<script type="text/javascript">
	$(document).ready(function() {
		var now = new Date();
		var setMonth = now.setMonth((now.getMonth() + 1));
		var setMonthToString = new Date(setMonth).toString();

		alert(setMonthToString);
	});
</script>