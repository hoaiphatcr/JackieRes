<?php   
	session_start();  
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Jackie Restaurant</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body> 
	<!-- banner -->
	<div class="banner">
		<!-- header -->
		<div class="header">
			<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-left">
						<p>Free home delivery at your doorstep For Above $30</p>
					</div>
					<div class="w3ls-header-right">
						<ul> 
							<li class="head-dpdn">
								<i class="fa fa-phone" aria-hidden="true"></i> Call us: +01 222 33345 
							</li> 
							<li class="head-dpdn">
								<?php
   									if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
								        echo '<a href="loginadm.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>';
								        echo '</li>';
								        echo '<li class="head-dpdn">';
								        echo '<a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>';
								    }
								    else{
								    	echo "<li>Hello ".$_SESSION["name"]." !</li>";
								        echo '<li><a href="logout.php">Logout</a></li>';
								    }
								?>   
							</li> 
							<li class="head-dpdn">
								<a href="offers.php"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
							</li> 
							<li class="head-dpdn">
								<a href="help.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div> 
				</div>
			</div>
			<!-- //header-one -->    
			<!-- navigation -->
			<div class="navigation agiletop-nav">
				<div class="container">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header w3l_logo">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>  
							<h1><a href="index.php">Jackie Restaurant<span>Best Food Collection, Best Choice For Your Hungry</span></a></h1>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php" class="active">Home</a></li>	
								<!-- Mega Menu -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="col-sm-12">
												<ul class="multi-column-dropdown">
													<h6>Food type</h6>  
													<li><a href="menu.php">All Foods</a></li>
													<?php
					                                require 'database-config.php';
					                                $sql = "SELECT categories.id, categories.name, products.image FROM categories, products WHERE products.category_id = categories.id GROUP BY categories.id";

					                                $result = mysqli_query($conn, $sql);
					                                if (!$result) {
					                                die("Can't query data. Error occure.".mysqli_error($conn));
					                                }
					                                if (mysqli_num_rows($result) > 0) {
					                                  while($row = mysqli_fetch_assoc($result)) {
					                                  		echo '<li>';
					                                        echo '<form action="products.php" method="GET">';
					                                        echo '<a href="products.php?id='.$row["id"].'">'.$row["name"].'</a>'; 
					                                        echo '</form>';
					                                        echo '</li>';
					                                  }
					                                }
					                               ?>	 
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li><a href="about.php">About</a></li> 
								<li><a href="blog.php">Blog</a></li> 
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
						<div> 
								<a href="cart.php">
								<button class="w3view-cart" type="button" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
							 	</a>
						</div> 
					</nav>
				</div>
			</div>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Delicious foods from around the world<br> <span>Best Chefs For you.</span></h2> 
			</div>
		</div>
	</div>
	<!-- //banner -->  


	