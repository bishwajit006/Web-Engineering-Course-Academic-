<?php
include "db_connection.php";

$id = $_GET['id'];

$sql = "DELETE FROM biodata WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record";
}

$conn->close();

header("Location:read_db.php");
