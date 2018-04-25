$(document).ready(function() {
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
		var counter = 0;
		$("#add_inclusion").click(function () {
			if(counter < 3) {
				$("#add_this").append(
					'<input type="number" name="qty" class="input-num append-quantity" min="1" value="1"><p class="ex" id="x-text">&times;</p><input type="text" name="prod-name" placeholder="What is included with your product?" class="input-what append-what">');
				counter++;
			}
		});
		
		$('#delete_inclusion').click(function() {
				$('input[type].append-quantity:last').remove();
				$('p#x-text:last').remove();
				$('input[type].append-what:last').remove();
				if(counter > 0) {
					counter--;
				}
		});


		var spec_counter = 0;
		$("#specs_btn").click(function () {
			if(spec_counter < 3) {
				$('#specs_div').append('<input type="text" name="qty" class="spec spec_title" id="title_spec" placeholder="Specification Title"><input type="text" name="prod-name" id="desc_spec" placeholder="Specification Description" class="desc spec_value">');
				spec_counter++;
			}
		});
		$('#delete_btn').click(function() {
			$('input[type].spec:last').remove();
			$('input[type].desc:last').remove();
			if(spec_counter > 0) {
				spec_counter--;
			}
		});
	});