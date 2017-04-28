<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE products (
product_id int NOT NULL AUTO_INCREMENT,
product_name VARCHAR(30),
price decimal(10,3),
category VARCHAR(30),
sub_category VARCHAR(30),
details VARCHAR(50),
PRIMARY KEY (product_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql1 = "CREATE TABLE users (
user_id int NOT NULL AUTO_INCREMENT,
uname VARCHAR(30),
password VARCHAR(30),
fname VARCHAR(30),
lname VARCHAR(30),
PRIMARY KEY (user_id)
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
  }
$conn->close();
?>
INSERT INTO users (user_id,uname,password,fname,lname)
VALUES ('1','amani','amani','Amani','Konduru');

INSERT INTO users (user_id,uname,password,fname,lname)
VALUES ('2','jay','jay','Jay','Brooks');

INSERT INTO users (user_id,uname,password,fname,lname)
VALUES ('3','heenali','heenali','Heenali','Patel');


INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('V-Neck Easy Graphic Tee','8.48','Girls','Graphic Tees','pretty');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Stretch Jersey Polo','29.95','Guys','Polos','ummm');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Low-Rise Chino Shorts','$34.95','Girls','Shorts','whatever');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Low-Rise Crop Skinny Jeans','$35.97','Girls','Jeans','They are great');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Slim Straight Jeans','$24.95','Guys','Jeans','they alright');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('V-Neck Icon Sweater','$39.95','Guys','Sweaters','cute');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Twill Jogger Pants','$49.95','Guys','Joggers','they are good');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('T-Shirt Dress','$29.95','Girls','Dresses','pretty cute');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Graphic Banded Sweatpants','$25','Girls','Sweatpants','comfy');

INSERT INTO products (product_name,price,category,sub_category,details)
VALUES ('Fit Denim Shorts','$30.95','Guys','Shorts','lads');
