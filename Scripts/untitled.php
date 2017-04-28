<?php

require"connect_to_php.php";

$sql = mysqli_query($conn,"INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('V-Neck Easy Graphic Tee','8.48','Girls','Graphic Tees','pretty',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Stretch Jersey Polo','29.95','Guys','Polos','ummm',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Low-Rise Chino Shorts','$34.95','Girls','Shorts','whatever',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Low-Rise Crop Skinny Jeans','$35.97','Girls','Jeans','They are great',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Slim Straight Jeans','$24.95','Guys','Jeans','they alright',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('V-Neck Icon Sweater','$39.95','Guys','Sweaters','cute',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Twill Jogger Pants','$49.95','Guys','Joggers','they are good',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('T-Shirt Dress','$29.95','Girls','Dresses','pretty cute',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Graphic Banded Sweatpants','$25','Girls','Sweatpants','comfy',curdate());

INSERT INTO products (product_name,price,category,subcategory,details,date_added)
VALUES ('Fit Denim Shorts','$30.95','Guys','Shorts','lads',curdate());
);

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
