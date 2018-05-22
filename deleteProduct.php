<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM products WHERE id =".$id;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Delete product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot del product. Error: ".mysql_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>