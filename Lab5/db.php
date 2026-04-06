<?php
$conn = new mysqli("localhost", "root", "", "daraz_seller");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>