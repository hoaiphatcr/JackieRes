<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Create</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php
		require 'database-config.php';

		if (isset($_POST["product_name"]) && isset($_POST["product_code"]) && isset($_POST["category"]) && isset($_POST["description"])) {
				$name = $_POST["product_name"];
				$code = $_POST["product_code"];
				$category= $_POST["category"];
				$description= $_POST["description"];

				$sql = "INSERT INTO products(product_name, product_code, category, description) VALUES('".$name."','".$code."','".$category."','".$description."')";

				$result = mysqli_query($conn,$sql);
				if ($result) {

					echo header("location: index.php");
				}else{
					echo "Can not add product. Error: ".mysqli_error($conn);
				}
			}else{
				echo"Invalid product information";
			}
		 ?>
		<!-- Mã html -->
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="product-form">
			<div class="container" style="max-width: 400px;">
				<input type="hidden" name="id" value="<?php echo $row["id"]?>">
				<div class="form-group">
					<label for="name">Product Name</label>
					<input type="text" class="form-control" name="product_name" id="name"
					
				</div>
				<div class="form-group">
					<label for="code">Product Code</label>
					<input type="text" class="form-control" name="product_code" id="code"
					
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<input type="text" class="form-control" name="category" id="category"
					
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description">
					
					</textarea>
				</div>
				<button type="submit" class="btn btn-info" id="edit-btn" style="width: 100%">ADD</button>
			</div>
		</form>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.js"></script>
		<script
		src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		
	</body>
</html>
