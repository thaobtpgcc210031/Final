<?php
// Establish a database connection
$conn = mysqli_connect('localhost', 'root', '', 'final1');

// Check the connection and handle errors if it fails
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>