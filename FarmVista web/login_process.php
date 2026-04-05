<?php
session_start();
include("db_connect.php");

/* Get form data */
$contact = $_POST['contact'];
$password = $_POST['password'];
$role = $_POST['role'];

/* Decide table */
$table = ($role == "farmer") ? "farmer" : "agronomist";

/* Prepared statement (secure) */
$stmt = $conn->prepare("SELECT * FROM $table WHERE contact=?");
$stmt->bind_param("s", $contact);
$stmt->execute();
$result = $stmt->get_result();

/* Check user */
if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();

    /* Verify password */
    if (password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $user['fullname'];

        /* Redirect based on role */
        if ($role == 'farmer') {
            header("Location: dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();

    } else {
        echo "❌ Wrong password!";
    }

} else {
    echo "❌ User not found!";
}

$conn->close();
?>