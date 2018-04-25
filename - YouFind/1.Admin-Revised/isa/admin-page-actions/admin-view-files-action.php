<?php 
	session_start();
	$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
	
 ?>
<div id="view_files_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span id="change_title"></span>User Information</h4>
			</div>
			<div class="modal-body" style="overflow: hidden;">
				<div class="user-holder">
					<div class="user-dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="user-info-wrapper">
						<p class="user-name">John Michael Olangco</p>
						<p class="user-address">1234 Ampere St., Brgy. Palanan, Makati City, Metro Manila</p>
						<p class="user-phone">0912221122</p>
					</div>
				</div>
				<hr class="user-line">
				<div class="personal-wrapper">
					<p class="account-information">Account Information</p>
					<div class="info-holder">
						<p class="type-title">Account Type:</p>
						<p class="type-text">Seller</p>
					</div>
					<div class="info-holder">
						<p class="email-title">Email:</p>
						<p class="email-text">jmolangco@gmail.com</p>
					</div>
					<div class="info-holder">
						<p class="status-title">Status:</p>
						<p class="status-text">Verified</p>
					</div>
				</div>


				<hr class="user-line">
				<div class="personal-wrapper">
					<p class="account-information">Bank Information</p>
					<div class="info-holder">
						<p class="acc-name-title">Account Name:</p>
						<p class="acc-name-text">John Michael Olangco</p>
					</div>
					<div class="info-holder">
						<p class="acc-num-title">Account Number:</p>
						<p class="acc-num-text">129029827891278</p>
					</div>
					<div class="info-holder">
						<p class="bank-name-title">Bank Name:</p>
						<p class="bank-name-text">Bank of the Philippine Islands</p>
					</div>
				</div>

				<hr class="user-line">

				<div class="id-wrapper">
					<p class="account-information">ID Information</p>
					<div class="info-holder">
						<p class="id-type-title">ID Type:</p>
						<p class="id-type-text">Student ID</p>
					</div>
					<div class="info-holder">
						<p class="id-num-title">ID Number:</p>
						<p class="id-num-text">K1140055</p>
					</div>
						<div class="id-photo-wrapper" style="margin-left: 12%;"><img src="images/date-wrapper.jpg" width="100%" height="100%" style="border-radius: 4px;"></div>
						<div class="id-photo-wrapper"><img src="images/date-wrapper.jpg" width="100%" height="100%" style="border-radius: 4px;"></div>
						<p class="front">Front</p>
						<p class="back">Back</p>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>