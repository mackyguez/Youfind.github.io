$(document).ready(function() {
	$(document).on('click', '#direct_index', function() {
		var action = 'direct_index';
		$.ajax({
			url:'page-actions/post-product-action.php',
			method:'POST',
			data:{action:action},
			success:function(data) {
				if(data == 'Done') {
					window.location = 'new-index.php';
				}
			}
		})
	});

	$(document).on('click', '#edit_product_button', function() {
		var action = 'load_edit_product_modal';
		var edit_product_id = $(this).data('edit_product');
		$.ajax({
			url:'page-actions/edit-product-modal-action.php',
			method:'POST',
			data:{
				action:action,
				edit_product_id
			},
			success:function(data) {
				$('#edit_product_modal_holder').html(data);
				$('#editProductModal').modal('show');
				$('body').removeAttr('style');
			}
		})
	});


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

	$(document).on('click', '#edit_modal_done',function() {
		var product_category = $('#category').val();
		var product_name = $('#edit_product_name').val();
		var product_price = $('#product_price').val();
		var product_quantity = $('#product_quantity').val();
		var product_overview = $('#product_overview').val();


		var inc_prod_quantity1 = $('#inc_prod_quantity1').val();
		var inc_prod_name1 = $('#inc_prod_name1').val();

		var inc_prod_quantity2 = $('input[type].input-num:eq(1)').val();
		var inc_prod_name2 = $('input[type].input-what:eq(1)').val();

		var inc_prod_quantity3 = $('input[type].input-num:eq(2)').val();
		var inc_prod_name3 = $('input[type].input-what:eq(2)').val();

		var inc_prod_quantity4 = $('input[type].input-num:eq(3)').val();
		var inc_prod_name4 = $('input[type].input-what:eq(3)').val();

		var spec_title1 = $('#title_spec1').val();
		var desc_spec1 = $('#desc_spec1').val();

		var spec_title2 = $('input[type].spec:eq(0)').val();
		var desc_spec2 = $('input[type].desc:eq(0)').val();

		var spec_title3 = $('input[type].spec:eq(1)').val();
		var desc_spec3 = $('input[type].desc:eq(1)').val();

		var spec_title4 = $('input[type].spec:eq(2)').val();
		var desc_spec4 = $('input[type].desc:eq(2)').val();
		var action = 'update_product';
		$.ajax({
			url:'page-actions/edit-product-action.php',
			method:'POST',
			data:{
				action:action,
				product_category:product_category,
				product_name:product_name,
				product_price:product_price,
				product_quantity:product_quantity,
				product_overview:product_overview,
				inc_prod_quantity1:inc_prod_quantity1,
				inc_prod_name1:inc_prod_name1,
				inc_prod_quantity2:inc_prod_quantity2,
				inc_prod_name2:inc_prod_name2,
				inc_prod_quantity3:inc_prod_quantity3,
				inc_prod_name3:inc_prod_name3,
				inc_prod_quantity4:inc_prod_quantity4,
				inc_prod_name4:inc_prod_name4,
				spec_title1:spec_title1,
				desc_spec1:desc_spec1,
				spec_title2:spec_title2,
				desc_spec3:desc_spec3,
				spec_title3:spec_title3,
				desc_spec4:desc_spec4,
				spec_title4:spec_title4,
				desc_spec1:desc_spec1,
				counter:counter,
				spec_counter:spec_counter
			},
			success:function(data) {
				if(data == 'Done') {
					
				}
				else {
					alert(data);
				}
			}
		})

	});

	{
		$(document).on('click', '#header_my_prof_link', function() {
			window.location = 'Seller/user_profile-seller-logged-in.php';
		});
		$(document).on('click', '#header_settings_link', function() {
			alert('Wala pang function');
		});
		$(document).on('click', '#header_logout_link', function() {
			window.location = 'logout.php';
		});
		$(document).on('click', '#header_logo', function() {
			window.location = 'new-index.php';
		});
		$(document).on('click', '#add_product_button', function() {
			window.location = 'post-product.php';
		});
	}

	$(document).on('change', '#upload_product_photo', function() {
			var upload_product_photo = document.getElementById('upload_product_photo').files[0].name;
			var ext = upload_product_photo.split('.').pop().toLowerCase();
			var form_data = new FormData();
			if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				alert('Invalid image file');
				$('#form_wall')[0].reset();
			}
			var ofReader = new FileReader();
			ofReader.readAsDataURL(document.getElementById('upload_product_photo').files[0]);
			var f = document.getElementById('upload_product_photo').files[0];
			var fsize = f.size || f.fileSize;
			if(fsize > 10000000) {
				alert('Image is too large');
				$('#form_wall')[0].reset();
			}
			else {
				form_data.append('upload_product_photo', document.getElementById('upload_product_photo').files[0]);
				$.ajax({
					url:'page-actions/edit-product-modal-upload-action.php',
					method:'POST',
					data:form_data,
					contentType:false,
					cache:false,
					processData:false,
					success:function(data) {
						$('#item_preview').html(data);
					}
				})
			}
	});
});