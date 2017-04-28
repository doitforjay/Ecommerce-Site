<?php
//connect to db

require"connect_to_php.php";

$sql = "CREATE TABLE admin ( 
 id int(11) NOT NULL auto_increment, 
 username varchar(24) NOT NULL, 
 password varchar(24) NOT NULL, 
 last_log_date date NOT NULL, PRIMARY KEY (id),
 UNIQUE KEY username (username) )";

 if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>