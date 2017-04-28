<?php
require "connect_to_php.php";
$sql = "CREATE TABLE products ( 
 id int(11) NOT NULL auto_increment, 
 product_name varchar(225) NOT NULL, 
 price varchar(24) NOT NULL, 
 details text NOT NULL,
 category varchar(64) NOT NULL, 
 subcategory varchar(64) NOT NULL, 
 date_added date NOT NULL, 
 PRIMARY KEY(id),
 UNIQUE KEY product_name (product_name)
 )";

 if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?>