<?php
header("Content-Type:application/json");
require 'database-config.php';

if (isset($_POST["name"]) && isset($_POST["code"]) && isset($_POST["category"]) && isset($_POST["description"]) && isset($_POST["cost"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $code = $_POST["code"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];

    

    $sql = "UPDATE products SET product_name='".$name."', product_code='".$code."', description='".$description."', category_id ='".$category."', cost='".$cost."' WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Add product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot add product. Error: ".mysql_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>