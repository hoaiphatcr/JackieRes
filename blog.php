<?php  
	include 'header.php';
?>
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Blog</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  blog-page -->
	<div class="blog">
		<div class="container"> 
			<?php 
				require 'database-config.php';

				$sql = "SELECT * FROM news";
				$result = mysqli_query($conn, $sql);
				if (!$result) {
					die("Can't query data. Error occure.".mysqli_error($conn));
				}
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo '<div class="news">';
						echo '<form class="new" action="" method="GET">';
						echo '<h3 class="title"><a href="#">'.$row["title"].'</a></h3>';
						echo '<div><img class="image" src="'.$row["image"].'"/></div>';
						echo '<h4 class="recipe">'.$row['recipe'].'</h4>';
						echo '<h5 class="making">'.$row['making'].'</h5>';
						echo '</div>';
					}
				}
			 ?>
		</div>
	</div>
	<!-- //blog-page --> 
	<!-- New Dished -->
	<div class="dished">
		<h2>New Dished</h2>
		<?php 
			require 'database-config.php';
			$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				die("Can't query data. Error occure.".mysqli_error($conn));
			}
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo '<div class="newdished">';
					echo '<img class="img-dished" src="'.$row["image"].'">';
					echo '<h4 class="namedis">'.$row["product_name"].'</h4>';
					echo '<p class="namedes">'.$row["description"].'</p>';
					echo '<h4 class="costdished">'.$row["cost"].'<sup>VND</sup></h4>';
					echo'<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
					echo'<input type="hidden" name="quantity" value="1"/>';
					echo '<button type="submit" class="w3ls-cart pw3ls-cart newcart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
					echo '<span class="w3-agile-line"> </span>';
					echo '<a class="newid" href="product-detail.php?id='.$row["id"].'">More</a>';
					echo '</form>';
					echo '</div>';
				}
			}
		?>
	</div>
	<!-- //New dished -->
<?php  
	include 'footer.php';
?>