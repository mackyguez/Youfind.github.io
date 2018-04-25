<?php 
		$connect = new PDO('mysql:host=localhost;dbname=youfind_database;', 'root', '');
		session_start();

		for($x=0; $x<8; $x++) {	
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$string = '';
		$max = strlen($characters) - 1;
	 		for ($y = 0; $y < 8; $y++) {
	      		$string .= $characters[mt_rand(0, $max)];
 			}
		}

		if(@$_POST['action'] == 'admin_post') {
				$query = '
						INSERT INTO index_newsfeed_tbl(user_id,product_name,product_photo, product_price, product_quantity, product_category, product_overview, inc_prod_quantity1, inc_prod_quantity2, inc_prod_quantity3, inc_prod_quantity4, inc_prod_name1, inc_prod_name2, inc_prod_name3, inc_prod_name4, shopname, spec_title1, spec_title2, spec_title3, spec_title4, desc_spec1, desc_spec2, desc_spec3, desc_spec4, product_code, product_discount)
						VALUES(:user_id,:product_name,:product_photo, :product_price, :product_quantity, :product_category, :product_overview, :inc_prod_quantity1, :inc_prod_quantity2, :inc_prod_quantity3, :inc_prod_quantity4, :inc_prod_name1, :inc_prod_name2, :inc_prod_name3, :inc_prod_name4, :shopname, :spec_title1, :spec_title2, :spec_title3, :spec_title4, :desc_spec1, :desc_spec2, :desc_spec3, :desc_spec4, :product_code, :product_discount)
				';
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':user_id'				=> $_SESSION['admin_user_id'],
						':product_code'			=> @$string,
						':product_discount'		=> @$_POST['product_discount'],
						':product_name'			=> @$_POST['product_name'],
						':product_photo'		=> @$_SESSION['upload_product_photo'],
						':product_price'		=> @$_POST['product_price'],
						':product_quantity'		=> @$_POST['product_quantity'],
						':product_category'		=> @$_POST['category'],
						':product_overview'		=> @$_POST['product_overview'],
						':inc_prod_quantity1'	=> @$_POST['inc_prod0'],	
						':inc_prod_quantity2'	=> @$_POST['inc_prod1'],
						':inc_prod_quantity3'	=> @$_POST['inc_prod2'],
						':inc_prod_quantity4'	=> @$_POST['inc_prod3'],
						':inc_prod_name1'		=> @$_POST['inc_prod_name0'],
						':inc_prod_name2'		=> @$_POST['inc_prod_name1'],
						':inc_prod_name3'		=> @$_POST['inc_prod_name2'],
						':inc_prod_name4'		=> @$_POST['inc_prod_name3'],
						':shopname'				=> 'YouFind Corporation',
						':spec_title1'			=> @$_POST['spec_title1'],
						':spec_title2'			=> @$_POST['spec_title2'],
						':spec_title3'			=> @$_POST['spec_title3'],
						':spec_title4'			=> @$_POST['spec_title4'],
						':desc_spec1'			=> @$_POST['spec_value1'],
						':desc_spec2'			=> @$_POST['spec_value2'],
						':desc_spec3'			=> @$_POST['spec_value3'],
						':desc_spec4'			=> @$_POST['spec_value4']
					)
				);
				echo 'Done';
		}

 ?>