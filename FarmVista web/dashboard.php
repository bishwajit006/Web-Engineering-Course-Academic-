<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <!-- OVERLAY -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <h2>🌱 FarmVista</h2>
        <a class="active">🏠 Home</a>
        <a>🌿 Farms</a>
        <a href="agronomist.php">👨‍🌾 Agronomists</a>
        <a>💊 Medicine</a>
        <a>👤 Profile</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content" id="content">

        <!-- NAVBAR -->
        <div class="navbar">
            <span class="menu-btn" onclick="toggleSidebar()">☰</span>
            <span>☁️ 39°</span>
            <div>
                <span class="icon">🔔</span>
                <span class="icon">👤</span>
            </div>
        </div>

        <!-- HEADER IMAGE -->
        <div class="header">
            <img src="assets/dashboard.png">
        </div>



        <!-- STATS -->
        <div class="stats">
            <div class="card">🌾<br>10 Crops</div>

            <!-- agronomist count -->
            <?php
            include("db_connect.php");

            $countQuery = "SELECT COUNT(*) AS total FROM agronomist";
            $countResult = mysqli_query($conn, $countQuery);

            if (!$countResult) {
                die("Count Failed: " . mysqli_error($conn));
            }

            $countData = mysqli_fetch_assoc($countResult);
            $totalAgronomists = $countData['total'];
            ?>

            <div class="card">
                👨‍🌾<br>
                <a href="agronomist.php">
                    <?php echo $totalAgronomists; ?> Agronomists
                </a>
            </div>

            
            <?php
            /* Count farmers */

            $farmerQuery = "SELECT COUNT(*) AS total FROM farmer";
            $farmerResult = mysqli_query($conn, $farmerQuery);

            if (!$farmerResult) {
                die("Farmer Count Failed: " . mysqli_error($conn));
            }

            $farmerData = mysqli_fetch_assoc($farmerResult);
            $totalFarmers = $farmerData['total'];
            ?>

            <div class="card">
                👨‍🌾<br>
                <?php echo $totalFarmers; ?> Farmers
            </div>

            <div class="card">💊<br>10 Medicine</div>
        </div>




        <!-- AGRONOMIST -->
        <?php
        include("db_connect.php");

        /* Fetch only agronomists */
        $sql = "SELECT id, fullname FROM agronomist LIMIT 10";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Fetch Failed: " . mysqli_error($conn));
        }
        ?>

        <div class="section">
            <div class="section-header">
                <h3>Agronomist</h3>
                <span>
                    <a href="agronomist.php" class="view-btn">View all...</a>
                </span>
            </div>

            <div class="scroll">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <a href="view_agronomist.php?id=<?php echo $row['id']; ?>" class="avatar-card">
                            <div class="avatar"></div>
                            <p><?php echo htmlspecialchars($row['fullname']); ?></p>
                        </a>

                <?php
                    }
                } else {
                    echo "<p>No agronomists found</p>";
                }
                ?>

            </div>
        </div>

        <!-- MEDICINE -->
        <div class="section">
            <div class="section-header">
                <h3>Medicine</h3>
                <span> <a href="agronomist.php" class="view-btn"> View all...</a></span>
            </div>

            <div class="scroll">
                <div class="pill">💊</div>
                <div class="pill">💊</div>
                <div class="pill">💊</div>
                <div class="pill">💊</div>
            </div>
        </div>

        <!-- FARMS -->
        <div class="section">
            <div class="section-header">
                <h3>Active Farm</h3>
                <span> <a href="agronomist.php" class="view-btn"> View all...</a></span>
            </div>

            <div class="scroll">
                <div class="pill">💊</div>
                <div class="pill">💊</div>
                <div class="pill">💊</div>
                <div class="pill">💊</div>
            </div>
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("overlay").classList.toggle("active");
        }
    </script>

</body>

</html>