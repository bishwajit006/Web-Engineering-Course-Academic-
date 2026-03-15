<?php
include "db_connection.php";

/* Get record ID */
if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM biodata WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

/* Update record */
if (isset($_POST['update'])) {

    $id = (int)$_POST['id'];

    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $marital = $_POST['marital'];
    $religion = $_POST['religion'];
    $education = $_POST['education'];
    $profession = $_POST['profession'];
    $income = $_POST['income'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE biodata SET 
        fullname=?,
        dob=?,
        age=?,
        gender=?,
        height=?,
        marital=?,
        religion=?,
        education=?,
        profession=?,
        income=?,
        father=?,
        mother=?,
        contact=?,
        address=?
        WHERE id=?");

    $stmt->bind_param(
        "ssisssssssssssi",
        $fullname,
        $dob,
        $age,
        $gender,
        $height,
        $marital,
        $religion,
        $education,
        $profession,
        $income,
        $father,
        $mother,
        $contact,
        $address,
        $id
    );

    if ($stmt->execute()) {
        header("Location: read_db.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Biodata</title>
</head>

<body>

    <h2>Update Biodata</h2>

    <form method="POST">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        Full Name:
        <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"><br><br>

        DOB:
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>"><br><br>

        Age:
        <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>

        Gender:
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>

        Height:
        <input type="text" name="height" value="<?php echo $row['height']; ?>"><br><br>

        Marital Status:
        <input type="text" name="marital" value="<?php echo $row['marital']; ?>"><br><br>

        Religion:
        <input type="text" name="religion" value="<?php echo $row['religion']; ?>"><br><br>

        Education:
        <input type="text" name="education" value="<?php echo $row['education']; ?>"><br><br>

        Profession:
        <input type="text" name="profession" value="<?php echo $row['profession']; ?>"><br><br>

        Income:
        <input type="text" name="income" value="<?php echo $row['income']; ?>"><br><br>

        Father:
        <input type="text" name="father" value="<?php echo $row['father']; ?>"><br><br>

        Mother:
        <input type="text" name="mother" value="<?php echo $row['mother']; ?>"><br><br>

        Contact:
        <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br><br>

        Address:
        <textarea name="address"><?php echo $row['address']; ?></textarea><br><br>

        <button type="submit" name="update">Update</button>

    </form>

</body>

</html>