<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["product_name"]) && isset($_POST["product_code"])&& isset($_POST["category"])&& isset($_POST["description"]) && isset($_POST["cost"])){

       
        // $product_id = $_POST["id"];
        $name = $_POST["product_name"];
        $code = $_POST["product_code"];
        $category = $_POST["category"];
        $description = $_POST["description"];
        $cost = $_POST["cost"];

        $target_dir = "img/";
        $target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);

        // Move uploaded file to img folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


        $sql = "INSERT INTO products(product_code, product_name, description, cost, image, category_id) VALUES('".$code."','".$name."','".$description."' ,'".$cost."' , '".$target_file."' , '".$category."')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $data["result"] = true;
            $data["message"] =  "Add product successfully";
            // echo header("location: index.php");
            // die();
        }else{
            $data["result"] = false;
            $data["message"] =  "Can not add product. Error: ".mysqli_error($conn);
        }
    }else{
        $data["result"] = false;
        $data["message"] = "Invalid product information";
    }
    echo json_encode($data);
}
 ?>