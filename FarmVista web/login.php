<?php 
include("db_connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - FarmVista</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container">
        <form action="login_process.php" method="POST" class="card">

            <h2>Welcome Back</h2>
            <p class="subtitle">Glad to see you, <span>FarmVista</span></p>

            <!-- ROLE -->
            <div class="role-toggle">
                <input type="radio" id="farmer" name="role" value="farmer" checked>
                <label for="farmer">Farmer</label>

                <input type="radio" id="agronomist" name="role" value="agronomist">
                <label for="agronomist">Agronomist</label>
            </div>

            <!-- EMAIL -->
            <input type="text" name="contact" placeholder="Email or Phone" required>

            <!-- PASSWORD -->
            <div class="password-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span onclick="togglePassword()">👁</span>
            </div>

            <p class="forgot">Forgot your password?</p>

            <button type="submit" class="btn">Login</button>

            <p class="signup-link">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </p>

        </form>
    </div>

    <script>
        function togglePassword() {
            let field = document.getElementById("password");
            field.type = field.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>