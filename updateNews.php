<?php
header("Content-Type:application/json");
require 'database-config.php';

if (isset($_POST["title"]) && isset($_POST["recipe"]) && isset($_POST["making"])) {

    $id = $_POST["id"];
    $title = $_POST["title"];
    $recipe = $_POST["recipe"];
    $making = $_POST["making"];

    $sql = "UPDATE news SET title='".$title."', recipe='".$recipe."', making='".$making."' WHERE id = ".$id;
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