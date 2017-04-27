<?php
session_start();

if(isset($_SESSION["manager"])){
	header("location: index.php");
	exit();
}

if(isset($_POST["username"])&&isset($_POST["password"])){
	$manager = $_POST["username"]; // filter everything but numbers and letters
    $password = $_POST["password"]; // filter everything but numbers and letters
    // Connect to the MySQL database  

	include "../Scripts/connect_to_php.php";
	$sql = mysqli_query($conn,"SELECT id FROM admin WHERE username='$manager' AND password='$password'LIMIT 1");
	$existCount = mysqli_num_rows($sql);
	if($existCount==1){
		while($row = mysqli_fetch_array($sql)){
			$id=$row["id"];
		}
	$_SESSION['id'] = $id;
	$_SESSION['manager'] =$manager;
	$_SESSION['password']=$password;
	header("location: index.php");
	exit();

	} else {
	echo "information is incorrect, try again";
	echo "<a href='index.php'>return</a>";

	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>store admin</title>
</head>
<body>
<div align="center" id="wrapper">
	<?php include_once("../header.php"); ?>
	<div id="main"> <br/>
	<h2>Log in</h2>
	<form id="form1" name="form1" method="post" action="admin_login.php">
		User Name: <br/>
		<input name="username" type="text" id="username" size="40"/>
		<br/><br/>
		Password: <br/>
		<input type="text" name="password" id="password" size="40"/><br/><br/>
		<input type="submit" name="button" id="button" value="Log in">
	</form>
	<p></p>
	</div>
	<?php include_once("../header.php"); ?>
</div>
</body>
</html>

