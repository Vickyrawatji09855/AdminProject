<?php

include('../config.php');

// SQL query to create a table
$sql = "CREATE TABLE table1 (
    id INT(6)  AUTO_INCREMENT PRIMARY KEY,
    namee VARCHAR(50) ,
    email text,
    age INT(3) 
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


?>