
<?php 
include 'header.php';
?>

<!-- chức năng cart    -->

	<?php
require_once("database-cart.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE product_code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["product_code"]=>array('name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["product_code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["cost"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["product_code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["product_code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

?>


<div id="shopping-cart" style="padding-bottom: 50px;">
<div class="txt-heading"><h1 style="color:#008000;padding-top:30px;padding-bottom:30px;text-align: center;">Shopping Cart</h1> </div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1" class="table table-striped">
<tbody>
<tr>
<th style="text-align:left;"><h4><strong>Dished</strong></h4></th>
<th style="text-align:left;"><h4><strong>Code</strong></h4></th>
<th style="text-align:right;"><h4><strong>Quantity</strong></h4></th>
<th style="text-align:right;"><h4><strong>Price</strong></h4></th>
<th style="text-align:center;"><h4><strong>Action</strong></h4></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo number_format($item["price"])." VND"; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction" style="color:red;">Delete</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<!-- <td colspan="7" ></td>
<td>

</td> -->
</tr>

</tbody>
</table>	
<h3 style="text-align: center;"><strong>Total:</strong> <?php echo number_format($item_total)." VND"; ?></h3>
<div align=right style="padding-right: 50px;">
	
<a id="btnEmpty" href="cart.php?action=empty"><button class="btn-danger">Empty Cart</button></a>
</div>
  <?php
}
?>
</div>


	<!-- end chức năng cart -->

<?php 
include 'footer.php';
?>
