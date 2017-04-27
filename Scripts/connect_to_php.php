<?php 
//db hostname
$db_host = "localhost:8889";
//user usernam
$db_user = "admin";
//user password
$db_pass = "admin";
//name of db
$db_name = "inventory";

//run connection
$conn = mysqli_connect("$db_host:8889", "$db_user", "$db_pass","$db_name");

//mysql_connect("$db_host", "$db_user", "$db_pass") or die ("could not connect"); //die exits scripts
//mysql_select_db("$db_name");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>