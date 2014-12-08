<?php
include('credentials.php');
// Create connection
$con = mysqli_connect($host, $user, $pwd);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE OverTime";
if ($con->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $con->error . "<br>";
}


include('connect.php');
include('table.php');

// Create table
$sql = "CREATE TABLE $table(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
pid CHAR(20),
name CHAR(100),
rank CHAR(20),
phone CHAR(20),
updated CHAR(50)
)";
// Execute query
if (mysqli_query($con,$sql)) {
  echo "Table $table created successfully<br>";
} else {
  echo "Error creating $table: " . mysqli_error($con) . "<br>";
}

// Create table2
$sql = "CREATE TABLE $table2(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
pid CHAR(20),
name CHAR(100),
rank CHAR(20),
phone CHAR(20),
date CHAR(100)
)";
// Execute query
if (mysqli_query($con,$sql)) {
  echo "Table $table created successfully <br>";
} else {
  echo "Error creating $table: " . mysqli_error($con) . "<br>";
}

?>
