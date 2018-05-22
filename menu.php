<?php 
include 'header.php';
?>
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Menu</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- menu list -->   	
	<div class="wthree-menu">  
		<img src="images/i2.jpg" class="w3order-img" alt=""/>
		<div class="container">
			<h3 class="w3ls-title"><a href="products.php">Menu</a></h3>
			<p class="w3lsorder-text">Here your Staple Food Varieties</p>
			<div class="menu-agileinfo">  
					<?php
                                require 'database-config.php';
                                $sql = "SELECT categories.id, categories.name, products.image FROM categories, products WHERE products.category_id = categories.id GROUP BY categories.id";

                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                die("Can't query data. Error occure.".mysqli_error($conn));
                                }
                                if (mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">';
                                        echo '<form action="products.php" method="GET">';
                                        echo '<a href="products.php?id='.$row["id"].'"><img class="imgmenu" src="'.$row["image"].'"><br>'.$row["name"].'</a>'; 
                                        echo '</form>';
                                        echo '</div>';
                                  }
                                }
                               ?>	 
				<div class="clearfix"> </div> 
			</div> 
		</div> 
	</div>
	<!-- //menu list -->    
	<!-- add-products -->
	<div class="add-products">  
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Today's Offers</h3>
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="products.php"> 
						<h4>Get <span>10%<br>Cashback</span></h4>
						<h5>Special Offer Today Only</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-right">
					<a href="products.php"> 
						<h4>GET Upto<span><br>5% Offer</span></h4>
						<h5>On Order Lunch Today</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<div class="clearfix"> </div> 
			</div>  	 
		</div>
	</div>
	<!-- //add-products --> 
<?php 
include 'footer.php';
?>