<?php
session_start();

if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}

$managerID = $_SESSION["id"]; // filter everything but numbers and letters
$manager = $_SESSION["manager"]; // filter everything but numbers and letters
$password = $_SESSION["password"];


include "../Scripts/connect_to_php.php";
$sql = mysqli_query($conn, "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password'LIMIT 1");
$existCount = mysqli_num_rows($sql);
if($existCount == 0){
	echo "session not in database";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<title>store admin</title>
</head>
<body>
<div align="center" id="wrapper">
	<?php include_once("../header.php"); ?>
	<div id="main"> <br/>
		<div align="left" style="margin-left: 24px;"> Hello admin, what would you like to do today? <br/>
		<a href="inventory_list.php"> Manage inventory</a> <br/>
		<a href=""> Mangage something else </a><br/>
		<a href="logout.php">Log out</a>
		 </div>
	</div>
	<?php include_once("../header.php"); ?>
</div>
</body>
</html>

