<?php
session_start();
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM sellers WHERE email='$email'");

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            if (isset($_POST['remember'])) {
                setcookie("email", $email, time() + (60 * 1), "/");
            }

            header("Location: dashboard.php");
            exit();
        } else {
            $message = "❌ Wrong password!";
        }
    } else {
        $message = "❌ User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Seller Login</h2>

    <?php echo $message; ?>

    <form method="POST">
        <input type="email" name="email"
        placeholder="Enter Email"
        value="<?php echo $_COOKIE['email'] ?? ''; ?>" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label><br><br>

        <button type="submit">Login</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        No account? <a href="signup.php">Signup</a>
    </p>
</div>

</body>
</html>