<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM sellers WHERE email='$email'");

    if ($check->num_rows > 0) {
        $message = "❌ Email already exists!";
    } else {
        $conn->query("INSERT INTO sellers (name, email, password)
                      VALUES ('$name', '$email', '$password')");
        $message = "✅ Signup successful! <a href='login.php'>Login</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Seller Signup</h2>

    <?php echo $message; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Sign Up</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        Already have account? <a href="login.php">Login</a>
    </p>
</div>

</body>
</html>