<?php
//run select query to get latest 6 items
date_default_timezone_set('America/New_York');
include "Scripts/connect_to_php.php";
$dynamicList ="";
$sql = mysqli_query($conn,"SELECT * FROM products ORDER BY id DESC LIMIT 6");
$productCount = mysqli_num_rows($sql);
if($productCount > 0){
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
	}
	}else{
		$dynamicList = "we have no products";
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title></title>
</head>
<body>
<p id="name">HAJ Clothing Store</p>
<h3 id="shadow1"> All Shorts BOGO 50% Off</h3>
<div align="center" id="wrapper">
	<?php include_once("header.php"); ?>
	<h3 id="shadow1"> Limited time only: Free Shipping</h3>
	<div id="main">
		<table width="100%" border='0' cellpadding="10">
			<tr>
			 <td width="32%" valign="top">
			 <h5 align="center">Limited Time: In Store & Online </h5>
      <h4><p id="quote">Our most covetable tees, tanks, polos, and more, featuring irresistible patterns and prints and eye-catching details. Wear them your way. Break the rules. Be you. <br/>
      <h6><p align="center">Select styles. Prices as marked.</p></h6>
        </td>
		<td width="53%" valign="top">Recent items added:<p><?php echo $dynamicList ?></p>
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
	<h3 id="middle"><p align="center">IN STORES & ONLINE<br>
40% OFF FUN-IN-THE-SUN STYLES</br></p></h3>
</div>
<div id="win">
	<p>There's always that one summer that changes everything.</p>
	<p>MAKE THIS THAT SUMMER</p>
	<p>by winning 1 of 4 summer-defining grand prizes!</p>
	<p>YOU CHANCE TO WIN <br>
	CONCERT TICKETS </br></p>
	<p>FOR TWO </p>
<p>*NO PURCHASE NECESSARY TO ENTER OR WIN. Must be 14 or older and a resident of the U.S. Void where prohibited. The Quikly will have four (4) Sweepstakes Periods between 4/26/2017 and 5/28/2017. To participate, you must opt in before the Quikly goes live for each Sweepstakes Period. Total ARV value of all prizes: USD $8,400. For full rules, odds, and details on how the Quikly works, visit: http://bit.ly/HCoSummerRules. Sponsor: Abercrombie & Fitch Stores, Inc., 6301 Fitch Path, New Albany, OH 43054.</p>

</div>
<p id="end">ORDER ONLINE<br> & PICK UP IN STORE<br>
<button id="button button3">learn more</button></br></p>


<div id="extra">
	<p>NEED HELP?</p> 
	<p>SIZE CHARTS</p>
	<p>ORDER HELP</p>
	<p>SHIPPING & HANDLING</p>
	<p>RETURN & EXCHANGES</p>
	<p>TRACK AN ORDER</p>
	<p>GIFT CARDS & MERCHANDISE CREDIT</p>
	<p>CUSTOMER SERVICE</p>
	<p>STUDENT DISCOUNT</p>
	<p><a href="../storeAdmin/admin_login.php"> Admin Login</a></p>
</div>

</body>
</html>