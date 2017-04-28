<?php

require"connect_to_php.php";

$sql = "INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('V-Neck Easy Graphic Tee','8.48','Girls','Graphic Tees','pretty',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Stretch Jersey Polo','29.95','Guys','Polos','ummm',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Low-Rise Chino Shorts','34.95','Girls','Shorts','whatever',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Low-Rise Crop Skinny Jeans','35.97','Girls','Jeans','They are great',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Slim Straight Jeans','24.95','Guys','Jeans','they alright',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('V-Neck Icon Sweater','39.95','Guys','Sweaters','cute',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Twill Jogger Pants','49.95','Guys','Joggers','they are good',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('T-Shirt Dress','29.95','Girls','Dresses','pretty cute',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Graphic Banded Sweatpants','25','Girls','Sweatpants','comfy',curdate());";

$sql.="INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Fit Denim Shorts','30.95','Guys','Shorts','lads',curdate());";


if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
