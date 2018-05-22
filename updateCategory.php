<?php
header("Content-Type:application/json");
require 'database-config.php';

if (isset($_POST["name"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];

    $sql = "UPDATE categoies SET name='".$name."' WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Add product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot add news. Error: ".mysql_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>