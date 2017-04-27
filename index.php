<?php
//run select query to get latest 6 items
date_default_timezone_set('America/New_York');
include "Scripts/connect_to_php.php";
$dynamicList ="";
$sql = mysqli_query($conn,"SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysqli_num_rows($sql);
if($productCount > 0){
	while($row = mysqli_fetch_array($sql)){
		$id = $row["id"];
		$product_name = $row["product_name"];
		$date_added = date("Y/m/d", strtotime($row["date_added"]));
		$dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
	}
	}else{
		$dynamicList = "we have no products";
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div align="center" id="wrapper">
	<?php include_once("header.php"); ?>
	<div id="main">
		<table width="100%" border='0' cellpadding="10">
			<tr>
			 <td width="32%" valign="top"><h3>What the Hell?</h3>
      <p>This website <br/>
      <p>It is not<br />
        <br />
        This </p>
        </td>
		<td width="53%" valign="top">Newest  items added<p><?php echo $dynamicList ?></p>
		</td>

	</tr>
		</table> 
<!-- 				<tabl
				<td width="23%" valign="top">something else</td>
				<td width="83%" valign="top">
				Product Title<br/>
				Product Price<br/>
				<a href="product.php?">View Product</a>
				</td> -->
	</div>
	<?php include_once("header.php"); ?>
</div>
</body>
</html>