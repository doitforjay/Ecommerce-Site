<?php

date_default_timezone_set('America/New_York');
include "Scripts/connect_to_php.php";
$dynamicList ="";
$dynamicTable ="";
$i =0;
$sql = mysqli_query($conn,"SELECT * FROM products");
$productCount = mysqli_num_rows($sql);
if($productCount > 0){
	 $dynamicTable .= '<table width="50%" border="0" cellspacing="1" cellpadding="3">';
	while($row = mysqli_fetch_array($sql)){
		$id = $row["id"];
		$product_name = $row["product_name"];
		$price = $row["price"];
		$date_added = date("Y/m/d", strtotime($row["date_added"]));
		$dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';

      if($i % 4 == 0){
      	$dynamicTable .= '<tr>
          <td width="330px" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="1970px" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>';
      } else {
      	$dynamicTable .= '<td width="1970px" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="470px" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>';
      } 
      $i++;
	}
	$dynamicTable .= '</tr></table>';
	}else{
		$dynamicList = "we have no products";
	}
	mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php include_once("header.php"); ?>
<div>
<?php echo $dynamicTable ?></p>
</div>
<div> 
</div>
</body>
</html>

