<?php 
header("Content-Type:application/json");
require "database-config.php";

$sql = "SELECT products.id, product_name, product_code, description, categories.name as category, cost, image, category_id from products, categories WHERE products.category_id = categories.id";

$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	       $json[] = $row;
	    }
	    $data["products"] = $json;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 product";
		$data["result"] = false;
	}
}
$data["products"] = $json;

mysqli_close($conn);
echo json_encode($data);
?>