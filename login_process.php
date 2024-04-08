<?php
session_start();
require 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role']; 

    switch ($row['role']) {
        case 'Admin':
            header("Location: admin.php");
            break;
        case 'City Administrator':
            header("Location: city_admin.php");
            break;
        case 'City Surveyor':
            header("Location: city_surveyor.php");
            break;
        case 'Contractor':
            header("Location: contractor_application.php");
            break;
        case 'Guest User':
            header("Location: guest.php");
            break;
        default:
            // Handle unknown role
            echo "Unknown role.";
    }
} else {
    echo "Login failed. Invalid username or password.";
}
?>
