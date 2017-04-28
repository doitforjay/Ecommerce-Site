<?php
ob_start();
session_start();

if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}

$managerID =$_SESSION["id"];
$manager = $_SESSION["manager"];
$password = $_SESSION["password"];

include "../Scripts/connect_to_php.php";
$sql = mysqli_query($conn,"SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password'LIMIT 1");
$existCount = mysqli_num_rows($sql);
if($existCount == 0){
	echo "session not in database";
	echo $sql;
	exit();
}
?>

<?php
date_default_timezone_set('America/New_York');
include "../Scripts/connect_to_php.php";
//parse form data and add inventory
if(isset($_POST['product_name'])){
	$product_name=mysqli_real_escape_string($conn,$_POST['product_name']);
	$price=mysqli_real_escape_string($conn,$_POST['price']);
	$category=mysqli_real_escape_string($conn,$_POST['category']);
	$subcategory=mysqli_real_escape_string($conn,$_POST['product_name']);
	$details=mysqli_real_escape_string($conn,$_POST['details']);
	$sql =  mysqli_query($conn, "SELECT id FROM products WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysqli_num_rows($sql);
	if($productMatch > 0){
		echo "item already in Sysetem, <a href='inventory_list.php' return </a> ";
		exit();
	}
	$sql = mysqli_query($conn,"INSERT INTO products(product_name, price, details, category, subcategory, date_added) VALUES('$product_name', '$price', '$details', '$category', '$subcategory', curdate())")or die (mysqli_error($conn));
	$pid = mysqli_insert_id($conn);

	$newname = "$pid.jpg";
	move_uploaded_file($_FILES["fileField"]['temp_name'], "../inventory_images/$newname");
	header("location: inventory_list.php");
	exit();
}

?>

<?php
$productList ="";
$sql = mysqli_query($conn,"SELECT * FROM products");
$productCount = mysqli_num_rows($sql);
if($productCount > 0){
	while($row = mysqli_fetch_array($sql)){
		$id = $row["id"];
		$product_name = $row["product_name"];
		$date_added = date("Y/m/d", strtotime($row["date_added"]));
		$productList .= "$date_added - $id - $product_name &nbsp; &nbsp; <a href='inventory_edit.php?pid='$id'>edit</a> &bull; <a href='inventory_delete.php?pid='$id'>delete</a><br/>";
	}
	
}else{
	$productList .= "you have no products listed in your store";
}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title> inv List</title>
</head>
<body>
<div align="center" id="wrapper">
	<?php include_once("../header.php"); ?>
	<div id="main"> <br/>
	<div align="right" style="margin-left: 32px;"><a href="inventory_list.php#inventoryForm">+ Add new inventory item</a>
	</div>
		<div align="left" style="margin-left: 24px;"> 
		<h2>Inventory List</h2>
		<?php echo $productList; ?>
	</div>
	<br/>
	<br/>
	</div>

	<a name="inventoryForm" id="inventoryForm"></a>
	<h3>
		Add new Inventory item form
	</h3>
	<form action="inventory_list.php" enctype="mulitpart/form-data" name="myForm" method="POST">
	<table width="90%" border="0" cellspacing="0" cellpadding="0"> 
	<tr>
		<td width="20%">Product Name</td>
		<td width="80%"><label>
			<input type="text" name="product_name" id="product_name" size="64"/>
		</label></td>
	</tr>
	<tr>
		<td>Product Price</td>
		<td><label>
			<input type="text" name="price" id="price" size="12"/>
		</label></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><label>
			<select name="category" id="category">
				<option value="Boys">Boys</option>
				<option value="Girls">Girls</option>
			</select>
		</label></td>
	</tr>
	<tr>
		<td>SubCategory</td>
		<td>
				<select name="subcategory" id="subcategory">
				<option value="Hats">Hats</option>
				<option value="Pants">Pants</option>
				<option value="Shirts">Shirts</option>
				<option value="Dresses">dresses</option>
				<option value="Shorts">Shorts</option>
			</select>
		</td>
	</tr>
		<tr>
		<td>Product Details</td>
		<td><label>
			<textarea name="details" id="details" cols="64" rows="5"></textarea>
		</label></td>
	</tr>
		</tr>
		<tr>
		<td>Product Image</td>
		<td><label>
			<input type="file" name="fileField" id="fileField"/>
		</label></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><label>
			<input type="submit" name="button" id="button" value="Add to inventory">

		</label></td>
	</tr>
	</table>
	</form>
	<br/>
	<br/>
	<?php include_once("../header.php"); ?>

</div>
</body>
</html>

