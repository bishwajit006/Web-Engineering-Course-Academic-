<?php
include("db_connect.php");

/* Check filter */
$region = $_GET['region'] ?? '';

if (!empty($region)) {
    $region = mysqli_real_escape_string($conn, $region);
    $sql = "SELECT * FROM agronomist WHERE region = '$region'";
} else {
    $sql = "SELECT * FROM agronomist";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

/* Get unique regions , for filter by region*/
$regionQuery = "SELECT DISTINCT region FROM agronomist WHERE region IS NOT NULL AND region != ''";
$regionResult = mysqli_query($conn, $regionQuery);

if (!$regionResult) {
    die("Region Query Failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agronomists</title>
    <link rel="stylesheet" href="agronomist.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <img src="assets/dashboard.png">
    <h1>Agronomist</h1>
</div>

<div class="container">

    <!-- FI"LTER -->
<div class="filter">
    <form method="GET">
        <select name="region" onchange="this.form.submit()">
            <option value="">All</option>

            <?php 
            while($r = mysqli_fetch_assoc($regionResult)) { 
                $selected = (isset($_GET['region']) && $_GET['region'] == $r['region']) ? 'selected' : '';
            ?>
                <option value="<?php echo htmlspecialchars($r['region']); ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($r['region']); ?>
                </option>
            <?php } ?>

        </select>
    </form>
</div>

    <!-- LIST -->
    <?php 
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { 
    ?>
        
        <div class="card">

            <div class="profile">
                <div class="avatar"></div>

                <div class="info">
                    <h3><?php echo htmlspecialchars($row['fullname']); ?></h3>
                    <p><?php echo htmlspecialchars($row['specialized']); ?></p>

                    <div class="meta">
                        ⭐ <?php echo $row['rating'] ?? '4.5'; ?>  
                        📍 <?php echo htmlspecialchars($row['contact']); ?>
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="follow">Follow</button>
                <a href="view_agronomist.php?id=<?php echo $row['id']; ?>">
                    <button class="view">View Details</button>
                </a>
            </div>

        </div>

    <?php 
        }
    } else {
        echo "<p>No agronomists found.</p>";
    }
    ?>

</div>

</body>
</html>