	<?php

	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	function get_string_between($string, $start, $end)
	{
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}

	function dd( $var )
	{
		echo '<pre>';
		var_dump( $var );
		echo '</pre>';
		echo '<hr />';
	}

	$dbhost = 'localhost';
	$dbuser = 'tregtt_user_01';
	$dbpass = 'qMsu337#';
	$conn   = mysql_connect($dbhost, $dbuser, $dbpass);

	$target_dir = "../assets/img/uploads/";

	if(! $conn )
		die('Could not connect: ' . mysql_error());
	else
		$db = mysql_select_db('oso_qasim1', $conn);


	// $query123 = mysql_query('SELECT image FROM trtt_products LIMIT 20');
	// while($row = mysql_fetch_assoc($query123)){
	// 	echo '<img src="'.$row['image'] . '" />';
	// }

	// exit;

	if( $_SERVER['REQUEST_METHOD'] == 'POST' && count( $_POST ) > 0 )
	{
		if( session_id() == $_POST['token_id'] )
		{
			//dd( $_POST );
			$currency       = $_POST['currency'];
			// $titles         = $_POST['title'];
			// $prices         = $_POST['price'];
			$categorys      = $_POST['category'];
			for($i=0; $i<count($categorys);$i++)
			{
				$str1 = $_FILES["product_image"]["name"][$i];
				$sql = 'INSERT INTO `trtt_products` (title, description, price, image) VALUES ';
				if( strpos($str1, '(') !== false )
				{
					$str2 = '(' . get_string_between($str1, '(', ')') . ')';
					$str3 = str_replace( ',', '-', $str2 );
					$str4 = str_replace($str2, $str3, $str1);
					$exp1 = explode(',', $str4);
					//dd( $exp1 );
					$product_title = str_replace($str3, $str2, $exp1[0]);
					if( strpos($exp1[1], '$') !== false )
						$product_price = trim(str_replace('.jpg','',$exp1[1]));
					else
						$product_price = trim(str_replace('.jpg','',$exp1[2]));
				} else 
				{
					$exp1 = explode(',', $str1);
					$product_title = $exp1[0];
					if( strpos($exp1[1], '$') !== false )
						$product_price = trim(str_replace('.jpg','',$exp1[1]));
					else
						$product_price = trim(str_replace('.jpg','',$exp1[2]));
					//dd( $exp1 );
				}
				
				// $product_title = $titles[$i];
				// $product_price = $currency . $prices[$i];
				$product_categ = $categorys[$i];
				$target_file   = $target_dir . basename($_FILES["product_image"]["name"][$i]);
				//$file_path     = str_replace('../public', '.', $target_file);
				$file_path = $target_file;
				$sql           .= "('$product_title','$product_title','$product_price', '$file_path')";

				echo $sql;
		
				if (move_uploaded_file($_FILES["product_image"]["tmp_name"][$i], $target_file)) {
			        $query = mysql_query($sql);
					$last_insert_id = mysql_insert_id();
					if( $last_insert_id )
					{
						$query2 = mysql_query('INSERT INTO `trtt_products_categories` (product_id,category_id) VALUES ('.$last_insert_id.','.$product_categ.')');
						var_dump( $query2 );
						echo " The file ". basename( $_FILES["product_image"]["name"][$i]). " has been uploaded.";
			        echo "<br />";
					}
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }

			}
			echo '<hr />';
			dd( $_POST );
			dd( $_FILES );
			exit;
		}
	}

	$query = mysql_query('SELECT id, title FROM trtt_categories');
	$query1 = mysql_query('SELECT id, title FROM trtt_categories');
	?>
	<style>
		div{
			margin-bottom: 10px;
		}
	</style>
	<form action="#" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
		<input type="hidden" name="token_id" value="<?= session_id() ?>">
		<input type="hidden" name="currency" value="$">
		<div>
			<label for="sameCats">Same All Cats</label>
			<input type="checkbox" name="sameCats" id="sameCats">
			<select name="to-same" id="to-same">
				<?php while( $row = mysql_fetch_assoc($query) ): ?>
					<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div>
			<label for="">Num of Appends</label>
			<input type="number" id="numofapppend" maxlength="20" max="20">
		</div>
		<div>
			<!-- <input type="text" name="title[]" placeholder="Enter Product Title">
			<input type="text" name="price[]" placeholder="Enter Product Price"> -->
			<span style="font-size: 24px">1</span>
			<span id="cats-select">
				<select name="category[]">
					<option value="">SELECT CATEGORY</option>
					<?php while( $row2 = mysql_fetch_assoc($query1) ): ?>
						<option value="<?= $row2['id'] ?>"><?= $row2['title'] ?></option>
					<?php endwhile; ?>
				</select>
			</span>
			<input type="file" name="product_image[]" accept="image/*" placeholder="Upload Product Image">
		</div>
		<div id="vir"></div>
		<button type="button" id="append">APPEND</button>
		<button type="submit">CREATE</button>
	</form>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

	<script>
		$(function(){
			var ix = 1;
			$('#append').on('click', function(){
				$('#vir').html('');
				for(var ix = 2; ix <=$('#numofapppend').val(); ix++)
				{
					console.log(ix);
					if( ix <= 20)
					{
					$('#vir').append('<div><span style="font-size: 24px">'+ix+'</span>'+ $('#cats-select').html() +'<input type="file" name="product_image[]" accept="image/*" placeholder="Upload Product Image"></div>');
					} else
					{
						alert('Max. 20 Allowed!');
						break;
					}
				}
				
			});
			$('#sameCats').on('change', function(){
				//console.log();
				$.each( $('select[name="category[]"]') , function(index, value){
					$(value).val( $('#to-same').val() );
				});
			});
		});
	</script>
	<?php

	mysql_close($conn);

	?>