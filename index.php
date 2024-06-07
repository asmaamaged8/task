<?php
$servername = "mysql";
$username = "myuser";
$password = "mypassword";
$dbname = "mywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Insert visitor's IP address and visit time into the database
$sql = "INSERT INTO visitors (ip_address, visit_time) VALUES ('$ip_address', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "Hello World! Your IP address is $ip_address and the current time is " . date('Y-m-d H:i:s') . ".";

$conn->close();
?>
