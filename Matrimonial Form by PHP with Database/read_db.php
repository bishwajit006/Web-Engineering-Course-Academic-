<?php
include "db_connection.php";

$sql = "SELECT * FROM biodata ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Biodata List</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f3;
        }

        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        img {
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .btn-edit {
            background: green;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-delete {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>

</head>

<body>

    <h2 style="text-align:center;">Matrimonial Biodata List</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Height</th>
            <th>Marital</th>
            <th>Religion</th>
            <th>Education</th>
            <th>Profession</th>
            <th>Income</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . $row['id'] . "</td>";

                echo "<td><img src='images/" . $row['photo'] . "'></td>";

                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['height'] . "</td>";
                echo "<td>" . $row['marital'] . "</td>";
                echo "<td>" . $row['religion'] . "</td>";
                echo "<td>" . $row['education'] . "</td>";
                echo "<td>" . $row['profession'] . "</td>";
                echo "<td>" . $row['income'] . "</td>";
                echo "<td>" . $row['father'] . "</td>";
                echo "<td>" . $row['mother'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";

                echo "<td>
<a class='btn-edit' href='update_db.php?id=" . $row['id'] . "'>Update</a>
</td>";

                echo "<td>
<a class='btn-delete' href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Delete this record?')\">Delete</a>
</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='18'>No records found</td></tr>";
        }

        $conn->close();

        ?>

    </table>

</body>

</html>