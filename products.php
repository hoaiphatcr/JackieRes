<?php 
include 'header.php';
?>
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Dishes</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right"> 
				<div class="product-top">
					<h4>Food Collection</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<form action="products.php" method="get">
								<?php 
									if (isset($_GET['id'])) {
										echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
									}
								?>
				                Search: <input type="text" name="search" />
				                <input type="submit" name="ok" value="search" />
				            </form>
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Food Type<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Breakfast</a></li> 
								<li><a href="#">Lunch</a></li>
								<li><a href="#">Dinner</a></li>  
							</ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
					<!-- Hiển thị thông tin sản phẩm -->
						<?php
						require 'database-config.php';
					    // Hiển thị thông tin sản phẩm theo ID
					    if (isset($_GET['id'])) {
					    	$id = $_GET['id'];
						    // echo "Connected successfully";

					    	// pagefunction
							$sql1 = "SELECT * from products where category_id = $id";


							$result1 = mysqli_query($conn, $sql1);
							
							$result_per_page = 6;
							$number_of_result = mysqli_num_rows($result1);
							$number_of_pages = ceil($number_of_result/$result_per_page);
							if(!isset($_GET['page'])){
								$page=1;
							} else {
								$page = $_GET['page'];
							}
							$this_page_first_result = ($page-1)*$result_per_page;

							// chép bỏ vào select bên dưới: LIMIT " . $this_page_first_result . ',' . $result_per_page;
							// endpagefunction

						    $sql = "SELECT products.id, product_name, product_code, description, categories.name as category, cost, image from products, categories where products.category_id = categories.id and products.category_id = $id LIMIT " . $this_page_first_result . ',' . $result_per_page;
						    //WHERE category_id =".$category_id;
						     
						    $result = mysqli_query($conn, $sql);
						    if (!$result) {
						    die("Can't query data. Error occure.".mysqli_error($conn));
						    }
						    if (isset($_REQUEST['ok'])) 
				        	{
				            // Gán hàm addslashes để chống sql injection
				            $search = addslashes($_GET['search']);
				 
				            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
				            if (empty($search)) {
				                echo "Yeu cau nhap du lieu vao o trong";
				            } 
				            else
				            {
				            	// pagefunction
							$sql1 = "SELECT * from products where category_id = $id";


							$result1 = mysqli_query($conn, $sql1);
							
							$result_per_page = 6;
							$number_of_result = mysqli_num_rows($result1);
							$number_of_pages = ceil($number_of_result/$result_per_page);
							if(!isset($_GET['page'])){
								$page=1;
							} else {
								$page = $_GET['page'];
							}
							$this_page_first_result = ($page-1)*$result_per_page;

							// chép bỏ vào select bên dưới: LIMIT " . $this_page_first_result . ',' . $result_per_page;
							// endpagefunction

			            		$sql = "SELECT * FROM products WHERE category_id = $id and  product_name LIKE '%$search%' LIMIT " . $this_page_first_result . ',' . $result_per_page;
				 
			                // Đếm số đong trả về trong sql.
				                $result = mysqli_query($conn, $sql);
				 
				                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
				                if (mysqli_num_rows($result) > 0 && $search != "") 
				                {
				 
				                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
				                    while ($row = mysqli_fetch_assoc($result)) {
				                        echo '<div class="col-xs-6 col-sm-6 product-grids">';
										echo '<div class="flip-container">';
										echo '<div class="flipper agile-products">';
										echo '<div class="front">';
										echo '<img class="img-responsive" src="'.$row["image"].'">';
										echo '<div class="agile-product-text">';
										echo '<h5>'.$row["product_name"].'</h5> ';
										echo '</div>';
										echo '</div>';
										echo '<div class="back">';
										echo '<h4>'.$row["product_name"].'</h4>';
										echo '<p>'.$row["description"].'</p>';
										echo '<h6>'.$row["cost"].'<sup>VND</sup></h6>';
										echo'<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
										echo'<input type="hidden" name="quantity" value="1"/>';
										echo '<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
										echo '<span class="w3-agile-line"> </span>';
										echo '<a href="product-detail.php?id='.$row["id"].'">More</a>';
										echo '</form>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
				                    }
				                } 
				                else {
				                    echo "Khong tim thay ket qua!";
				                }
				            	
				            }
				        }
						    if (mysqli_num_rows($result) > 0) {
						      while($row = mysqli_fetch_assoc($result)) {
						        echo '<div class="col-xs-6 col-sm-6 product-grids">';
								echo '<div class="flip-container">';
								echo '<div class="flipper agile-products">';
								echo '<div class="front">';
								echo '<img class="img-responsive" src="'.$row["image"].'">';
								echo '<div class="agile-product-text">';
								echo '<h5>'.$row["product_name"].'</h5> ';
								echo '</div>';
								echo '</div>';
								echo '<div class="back">';
								echo '<h4>'.$row["product_name"].'</h4>';
								echo '<p>'.$row["description"].'</p>';
								echo '<h6>'.$row["cost"].'<sup>VND</sup></h6>';
								echo'<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
								echo'<input type="hidden" name="quantity" value="1"/>';
								echo '<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
								echo '<span class="w3-agile-line"> </span>';
								echo '<a href="product-detail.php?id='.$row["id"].'">More</a>';
								echo '</form>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
						      }
						    } 
						else {
							echo "0 result !";
						}
						mysqli_close($conn);
						}else{
							$sql1 = "SELECT * from products";


							$result1 = mysqli_query($conn, $sql1);
							
							$result_per_page = 6;
							$number_of_result = mysqli_num_rows($result1);
							$number_of_pages = ceil($number_of_result/$result_per_page);
							if(!isset($_GET['page'])){
								$page=1;
							} else {
								$page = $_GET['page'];
							}
							$this_page_first_result = ($page-1)*$result_per_page;

							// chép bỏ vào select bên dưới: LIMIT " . $this_page_first_result . ',' . $result_per_page;
							// endpagefunction

						    $sql = "SELECT products.id, product_name, product_code, description, categories.name as category, cost, image from products, categories where products.category_id = categories.id LIMIT " . $this_page_first_result . ',' . $result_per_page;
						    //WHERE category_id =".$category_id;
						     
						    $result = mysqli_query($conn, $sql);

						    if (!$result) {
						    die("Can't query data. Error occure.".mysqli_error($conn));
						    }
						    if (isset($_REQUEST['ok'])) 
				        	{
				            // Gán hàm addslashes để chống sql injection
				            $search = addslashes($_GET['search']);
				 
				            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
				            if (empty($search)) {
				                echo '<h1>Please text something in box</h1>';
				                
				            } 
				            else
				            {
				            	// pagefunction
							$sql1 = "SELECT * from products";


							$result1 = mysqli_query($conn, $sql1);
							
							$result_per_page = 6;
							$number_of_result = mysqli_num_rows($result1);
							$number_of_pages = ceil($number_of_result/$result_per_page);
							if(!isset($_GET['page'])){
								$page=1;
							} else {
								$page = $_GET['page'];
							}
							$this_page_first_result = ($page-1)*$result_per_page;

							// chép bỏ vào select bên dưới: LIMIT " . $this_page_first_result . ',' . $result_per_page;
							// endpagefunction

			            		$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' LIMIT " . $this_page_first_result . ',' . $result_per_page;
				 
			                // Đếm số đong trả về trong sql.
				                $result = mysqli_query($conn, $sql);
				 				
				                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
				                if (mysqli_num_rows($result) > 0 && $search != "") 
				                {
				 
				                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
				                    while ($row = mysqli_fetch_assoc($result)) {
				                        echo '<div class="col-xs-6 col-sm-6 product-grids">';
										echo '<div class="flip-container">';
										echo '<div class="flipper agile-products">';
										echo '<div class="front">';
										echo '<img class="img-responsive" src="'.$row["image"].'">';
										echo '<div class="agile-product-text">';
										echo '<h5>'.$row["product_name"].'</h5> ';
										echo '</div>';
										echo '</div>';
										echo '<div class="back">';
										echo '<h4>'.$row["product_name"].'</h4>';
										echo '<p>'.$row["description"].'</p>';
										echo '<h6>'.$row["cost"].'<sup>VND</sup></h6>';
										echo'<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
										echo'<input type="hidden" name="quantity" value="1"/>';
										echo '<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
										echo '<span class="w3-agile-line"> </span>';
										echo '<a href="product-detail.php?id='.$row["id"].'">More</a>';
										echo '</form>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
				                    }
				                } 
				                else {
				                    echo "Khong tim thay ket qua!";
				                }
				            	
				            }
				        }
						    if (mysqli_num_rows($result) > 0) {
						      while($row = mysqli_fetch_assoc($result)) {
						        echo '<div class="col-xs-6 col-sm-6 product-grids">';
								echo '<div class="flip-container">';
								echo '<div class="flipper agile-products">';
								echo '<div class="front">';
								echo '<img class="img-responsive" src="'.$row["image"].'">';
								echo '<div class="agile-product-text">';
								echo '<h5>'.$row["product_name"].'</h5> ';
								echo '</div>';
								echo '</div>';
								echo '<div class="back">';
								echo '<h4>'.$row["product_name"].'</h4>';
								echo '<p>'.$row["description"].'</p>';
								echo '<h6>'.$row["cost"].'<sup>VND</sup></h6>';
								echo'<form method="post" action="cart.php?action=add&code='.$row["product_code"].'">';
								echo'<input type="hidden" name="quantity" value="1"/>';
								echo '<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>';
								echo '<span class="w3-agile-line"> </span>';
								echo '<a href="product-detail.php?id='.$row["id"].'">More</a>';
								echo '</form>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
						      }
						    } 
						else {
							echo "0 result !";
						}
						mysqli_close($conn);
					}
					?>		

					<div class="clearfix"> </div>
					<?php  
						echo'<div class="pagination">';
						
						if (isset($_GET['id'])) {
							echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
							for($page=1;$page<=$number_of_pages;$page++){
								if (isset($_REQUEST['ok'])) 
					        	{
					            // Gán hàm addslashes để chống sql injection
					            $search = addslashes($_GET['search']);
					            echo '<a href="products.php?id='.$id.'&search='.$search.'&ok=search&page=' . $page . '">'.$page.'</a>';
								}else{
								echo'<a href="products.php?id='.$id.'&page=' . $page . '">'.$page.'</a>';
								}
							}
						}else{
							for($page=1;$page<=$number_of_pages;$page++){
								if (isset($_REQUEST['ok'])) 
					        	{
					            // Gán hàm addslashes để chống sql injection
					            $search = addslashes($_GET['search']);
					            echo '<a href="products.php?search='.$search.'&ok=search&page=' . $page . '">'.$page.'</a>';
								}else{
								echo'<a href="products.php?page=' . $page . '">'.$page.'</a>';
								}
							}
						}

						echo'</div>';		
					?>
				</div>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //products --> 
	<div class="container"> 
		<div class="w3agile-deals prds-w3text"> 
			<h5>Enjoy your meal! If you need anything else just call us, we will serve you as soon as we can .</h5>
		</div>
	</div>
	<!-- dishes -->
	<div class="w3agile-spldishes">
		<div class="container">
			<h3 class="w3ls-title">Special Foods</h3>
			<div class="spldishes-agileinfo">
				<div class="col-md-3 spldishes-w3left">
					<h5 class="w3ltitle">Jackie Specials</h5>
					<p>Merry Christmas. Today, we serve some special food for you. Have a good time! </p>
				</div> 
				<div class="col-md-9 spldishes-grids">
					<!-- Owl-Carousel -->
					<div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
						<?php
						require 'database-config.php';
						$sql = "SELECT products.id, product_name, product_code, description, categories.name as category, cost, image from products, categories where products.category_id = categories.id ORDER BY RAND() LIMIT 5";
						$result = mysqli_query($conn, $sql);
						if(!$result){
							die( "Can't query data".mysqli_error($conn) );
						}
					    // 2. Các dòng dữ liệu
					    if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								echo '<a href="products.php" class="item g1">';
								echo '<img class="lazyOwl" src="'.$row["image"].'" title="Our latest gallery" alt=""/>';
								echo '<div class="agile-dish-caption">';
								echo '<h4>'.$row["product_name"].'</h4>';
								echo '<span>'.$row["description"].'</span>';
								echo '</div>';
								echo '</a>';
								}
							} 
							else {
								echo "0 result !";
							}
							mysqli_close($conn);
						?>		
					</div> 
				</div>  
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //dishes --> 
<?php 
include 'footer.php';
?>