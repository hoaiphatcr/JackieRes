<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["name"])){

       
        // $product_id = $_POST["id"];
        $name = $_POST["name"];

        $sql = "INSERT INTO categories(name) VALUES('".$name."')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $data["result"] = true;
            $data["message"] =  "Add category successfully";
            // echo header("location: index.php");
            // die();
        }else{
            $data["result"] = false;
            $data["message"] =  "Can not add category Error: ".mysqli_error($conn);
        }
    }else{
        $data["result"] = false;
        $data["message"] = "Invalid category information";
    }
    echo json_encode($data);
}
 ?>