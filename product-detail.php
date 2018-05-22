<?php  
	include 'header.php';
?>

<?php  
	require 'database-config.php';
	$id = $_GET['id'];
	$sql = "SELECT products.id, product_name, product_code, description, categories.name as category, cost, image from products, categories where products.category_id = categories.id and products.id = $id";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
	die("Can't query data. Error occure.".mysqli_error($conn));
	}
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    		echo '<div class="col-md-5 modal_body_left">';
				echo '<img src="'.$row["image"].'" alt=" " class="img-relative">';
			echo '</div>';
			echo '<div class="col-md-7 modal_body_right single-top-right">'; 
				echo '<h3 class="item_name">'.$row["product_name"].'</h3>';
				echo '<div class="single-rating">';
					echo '<ul class="stars" id="item_1">';
						echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
						echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
						echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
						echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
						echo '<li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>';
						echo '<li class="rating">20 reviews</li>';
						echo '<li><a href="#">Add your review</a></li>';
					echo '</ul>';
				echo '</div>';
				echo '<div class="single-price">';
					echo '<ul>';
						echo '<h2>'.$row["cost"].'<sup>VND</sup></h2>';
					echo '</ul>';	
				echo '</div>'; 
				echo '<p class="single-price-text">'.$row["description"].'</p>';
				echo '<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
				echo'<input type="hidden" name="quantity" value="1"/>';
				echo '<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
				echo '<span class="w3-agile-line"> </span>';
				echo '</form>';
				echo '<div class="single-page-icons social-icons">'; 
					echo '<ul>';
						echo '<li><h4>Share on</h4></li>';
						echo '<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>';
						echo '<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>';
						echo '<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>';
						echo '<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>';
						echo '<li><a href="#" class="fa fa-rss icon rss"> </a></li> ';
					echo '</ul>';
				echo '</div>'; 
			echo '</div>'; 
			echo '<div class="clearfix"> </div>';
			echo '<br>';
			echo '<br>';
			}
		}
?>
<?php  
	include 'footer.php';
?>