<?php

$servername = "localhost";
$username = "root";
$password = "";

/* Create connection */
$conn = new mysqli($servername, $username, $password);

/* Check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Create database */
$sql = "CREATE DATABASE IF NOT EXISTS farmvista";

if ($conn->query($sql) === TRUE) {
    echo "Database 'farmvista' created successfully.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

/* Select database */
$conn->select_db("farmvista");

/* Farmer table */
$sql1 = "CREATE TABLE IF NOT EXISTS farmer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    contact VARCHAR(100),
    dob DATE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table 'farmer' created successfully.<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

/* Agronomist table (same structure) */
$sql2 = "CREATE TABLE IF NOT EXISTS agronomist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    contact VARCHAR(100),
    specialized VARCHAR(100),
    experienced VARCHAR(100),
    region VARCHAR(100),
    dob DATE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table 'agronomist' created successfully.<br>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>