<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["user_type"])){

       
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user_type = $_POST["user_type"];

        $sql = "UPDATE users SET username='".$username."', password='".$password."', user_type='".$user_type."' WHERE id = ".$id;

        $result = mysqli_query($conn, $sql);
        if($result){
            $data["result"] = true;
            $data["message"] =  "Edit user successfully";
            // echo header("location: index.php");
            // die();
        }else{
            $data["result"] = false;
            $data["message"] =  "Can not edit user. Error: ".mysqli_error($conn);
        }
    }else{
        $data["result"] = false;
        $data["message"] = "Invalid user information";
    }
    echo json_encode($data);
}
 ?>