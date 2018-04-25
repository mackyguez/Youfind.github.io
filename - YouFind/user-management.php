<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
</head>

<style type="text/css">

	* {
		padding: 0;
		margin: 0;
	}
	body {
		padding: 0;
		margin: 0;
		font-family: Century Gothic;
	}
	.whole-wrapper { 
		background-color: #e6e6e4;
		height: auto;
		width: 100%;
		overflow: hidden;
	}
	.top-header {
		background-color: #ffdf7c;
		height: 24px;
		width: 100%;
		padding: .2% 5%;
		font-size: 80%;
	}
	.navbar-left{
		background-color: #2d2d2d;
		width: 15%;
		height: 500px;
		padding: 3% 3%;
		float: left;
	}
	.admin-dp{
		border-radius: 50%;
		width: 90%;
		height: 100%;
		border: 3px solid #e6e6e4;
		overflow: hidden;
		margin: 0 auto;
	}
	.dp-container {
		width: 65%;
		height: 120px;
		margin: 0 auto;
	}
	.image {
		width: 100%;
		height: 100%;
		border-radius: 50%;
	}
	.info-container{
		color: white;
		font-size: 13px;
		margin: 15px auto;
	}
	.info-position {
		font-size: 10px; 
		color: #a2a2a2;
	}
	.admin-navigation{
		color: white
	}
	ul {
		list-style-type: none;
		margin: 0;
		padding: 5px;
	}
	li {
		font-size: 13px;
		padding: 10px;
	}
	li.active {
		border-left: 3px solid #a5ffa1;
	}

	/*******/
	.content-wrapper{
		border: 1px solid red;
		width: 76.5%;
		padding: 10px 10px 10px 20px;
		float: right;
	}

	th {
		height: 10px;

	}
	td {
		padding: 4px 0 0 8px;
		border-bottom: 1px solid #adadad;
	}

	table {
		width: 98%;
		border-top: 2px solid #125965;
	}
	button {
		background-color: #125965;
		color: white;
		padding: 2px;
		border: none;
		margin-right: 5px;
	}



	@media screen and (max-width: 1100px) {
		.whole-wrapper {
			width: 1100px;
		}
		.navbar-left {
			width: 17%;
		}
		.content-wrapper{
			width: 72%;
		}
	}

	@media screen and (max-width: 800px) {
		.whole-wrapper {
			width: 800px;
		}
		.navbar-left {
			width: 25%;
		}
		.content-wrapper{
			width: 65%;
		}
		.desc-right {
			width: 90%;
		}
		.icons {
			width: 60%;
		}
		.icon-left{
			width: 90%;
			padding: 10px 10px 0 30px; 
		}
	}

</style>
<body>

	<div class="whole-wrapper">

		<div class="top-header">
		</div>


		<div class="navbar-left">
			<div class="dp-container">
				<div class="admin-dp">
						<img src="images/photo1.jpg" class="image">
				</div>
			</div>

			<div class="info-container">
				<center>
				John Michael Olangco<br>
				<font class="info-position">Database Administrator</font>
				</center>
			</div>

			<div class="admin-navigation">
				<ul>
					<li>Dashboard
					<li>Administrators
					<li class="active">User Management
					<li>Sales Management
					<li>Item Management
				</ul>
			</div>
		</div>

		<div class="content-wrapper">
			<h2>Customer</h2><br>
			<table>
				<tr>
					<th style="width: 2.5%;">ID
					<th style="width: 12%;">Name
					<th style="width: 10%;">Email
					<th style="width: 22%;">Address
					<th style="width: 8%;">Contact
					<th style="width: 10%;">Birthday
					<th style="width: 10%;">Action
				</tr>
				<tr>
					<td>1
					<td>JM Olangco
					<td>jmolangco@gmail.com
					<td>Ampere St., Palanan, Makati City
					<td>099999999
					<td>12/21/1987
					<td> <button>Accept</button><button>Deny</button>
				</tr>
				<tr>
					<td>1
					<td>JM Olangco
					<td>jmolangco@gmail.com
					<td>Ampere St., Palanan, Makati City
					<td>099999999
					<td>12/21/1987
					<td> <button>Edit</button><button>Delete</button>
				</tr>
			</table>
		</div>

		<div class=""></div>

	</div>
</body>
</html>