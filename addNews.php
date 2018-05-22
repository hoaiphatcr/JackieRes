<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"]) && isset($_POST["recipe"]) && isset($_POST["making"])){

       
        // $product_id = $_POST["id"];
        $title = $_POST["title"];
        $recipe = $_POST["recipe"];
        $making = $_POST["making"];

        $target_dir = "img/";
        $target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);

        // Move uploaded file to img folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $sql = "INSERT INTO news(title, recipe, making, image) VALUES('".$title."','".$recipe."' ,'".$making."' , '".$target_file."')";

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