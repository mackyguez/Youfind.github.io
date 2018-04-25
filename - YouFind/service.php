<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="service-style.css">
</head>
<body>

<!--SELLER'S VIEW-->

	<div class="whole-wrapper">
		<div class="header-holder"><?php include('new-header.php'); ?></div>

		<div class="content-holder">
			<div class="directory">
				<a class="direct-a" href="new-index.php">Home</a> / <a class="direct-a" href="#">Cellphone Repairs</a> / iPhone Screen Repair
			</div>

			<div class="category-wrapper" style="margin: 30px 0;">
				<div class="product-wrapper">Products</div>
				<div class="category-container">Gadgets</div>
				<div class="category-container">Laptops & Computers</div>
				<div class="category-container">Camera, Photos & Videos</div>
				<div class="category-container">Headphones & Speakers</div>
				<div class="category-container">Computer Parts</div>
				<div class="category-container">Storage Devices</div>
				<div class="category-container">Accessories</div>
				<div class="category-container">Drones</div>
				<div class="category-container">Home Entertainment</div>
				<br><br><br>
				<div class="product-wrapper">Services</div>
				<div class="category-container">Cellphone Repairs</div>
				<div class="category-container">Update & Upgrade</div>
				<div class="category-container">Installation</div>
				<div class="category-container">Computer Repairs</div>
			</div>


			<div class="left-wrapper">
				
				<div class="service-photo-wrapper">
					<div class="customer-action">
					<p class="service-title">iPhone Screen Repair</p>
					<p class="service-provider">Youfind</p>
						<div style="overflow: hidden;">
							<p style="float: left; width: 150px;">Day Availability:</p>
							<select>
								<option>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
								<option>Saturday</option>
								<option>Sunday</option>
							</select>
						</div>
						<div style="overflow: hidden;">
						<p style="float: left; width: 150px;">Time Availability:</p>
						<input type="number" name="range-1" min="1" max="12" class="input-type-short" value="1">
						<select>
							<option>AM</option>
							<option>PM</option>
						</select>
						</div>

						<div style="overflow: hidden;">
						<p style="float: left; width: 150px;">Location:</p>
						<input type="text" name="your-price" placeholder="Location *" class="input-type">
						</div>
						<div class="book-btn-wrapper">
							<button class="book-btn">Book Now</button>
						</div>
					</div>
				</div>

				<div class="frequently-asked-wrapper">
					<p class="frequently-asked-questions">Frequently Asked Questions</p>
					<p class="faq-title">What is included with this service?</p>
					<p class="faq-texts">
						<ul>
							<li>A tech will come to your home or office as early as tomorrow
							<li>All parts are included in the quoted price
							<li>No charge if device can't be fixed
							<li>User must back up device before service
							<li>Replacement of broken screen
						</ul>
					</p>

					<p class="faq-title">How longs does it take?</p>
					<p class="faq-texts">Repairs typically take between 30-60 minutes, depending on the complexity of the repair and the device involved. Most customers wait while the tech repairs their phone.</p>

					<p class="faq-title">Where can I have my repair done?</p>
					<p class="faq-texts">The tech can meet you at the time and place most convenient to you. You can choose your home, office, or a local coffee shop. Be sure your address is accurate during checkout and we will meet you at your desired location.</p>
				</div>

				<div class="rate-wrapper">
					<p class="rate-and-reviews">Rate and Reviews</p>

					<div class="rate-container">
					
						<p class="rate-title">Average Service Rating</p>
						<div class="rate-this"><img src="images/star-ratings.png" width="200px" height="28px"></div>
						<div class="summary"><p class="review-count">20 Reviews</p><p class="rate-count">10 Rates</p></div>

					</div>

					<div class="star-counter">

						<p class="rate-title">Service Rating Summary</p>

						<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">5 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
						<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">4 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
						<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">3 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
						<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">2 Stars</p><div style="float: left; width: 60px; padding: 8px 10px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 25px">10</p></div>
						<div style="width: 200px; overflow: hidden; height: 30px;"><p style="float: left; padding: 10px;">1 Star</p><div style="float: left; width: 60px; padding: 8px 13px;"><img src="images/star-ratings.png" width="70px" height="15px"></div> <p style="float: left; padding: 10px; margin-left: 30px">10</p></div>
					
					</div>
				</div>


			<div class="review-wrapper" id="review">
				<div class="write-here">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<textarea class="write-your-review"></textarea>
					<button class="post-btn">Post</button>
				</div>
				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>

				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product. This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>

				<div class="review-1">
					<div class="dp-wrapper"><img src="images/user.jpg" width="100%" height="100%"></div>
					<div class="review-holder">
						<p class="acc-name">John Michael Olangco</p>
						<p class="his-review">This item is awesome. Fast Delivery! My friend liked it. Amazing! I will surely order again. I recommend this product.</p>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<div class="footer-wrapper" style="margin-top: 70px;">
		<?php include('footer1.php'); ?>
		</div>


</body>
</html>