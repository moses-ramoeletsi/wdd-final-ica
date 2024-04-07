<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "vus";

$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}

?>
