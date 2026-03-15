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
$sql = "CREATE DATABASE IF NOT EXISTS matrimonial";

if ($conn->query($sql) === TRUE) {
    echo "Database 'matrimonial' created successfully.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

/* Select the database */
$conn->select_db("matrimonial");

/* Create biodata table */
$sql = "CREATE TABLE IF NOT EXISTS biodata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255),
    fullname VARCHAR(100),
    dob DATE,
    age INT,
    gender VARCHAR(10),
    height VARCHAR(10),
    marital VARCHAR(50),
    religion VARCHAR(50),
    education VARCHAR(100),
    profession VARCHAR(100),
    income VARCHAR(50),
    father VARCHAR(100),
    mother VARCHAR(100),
    contact VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'biodata' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

/* Close connection */
$conn->close();
