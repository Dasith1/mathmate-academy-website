<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'mma') or die("Database Connection Failed");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>