<?php 
header("Content-Type:application/json");
require "database-config.php";

$sql = "SELECT * FROM news";

$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	       $json[] = $row;
	    }
	    $data["news"] = $json;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 news";
		$data["result"] = false;
	}
}
$data["news"] = $json;

mysqli_close($conn);
echo json_encode($data);
?>