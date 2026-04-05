<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>Welcome <?php echo $_SESSION['user_name']; ?> 🎉</h2>

    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>