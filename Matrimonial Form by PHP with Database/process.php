<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connection.php";

if (isset($_POST['submit'])) {

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

    /* Photo upload */
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    $upload_folder = "images/";

    /* create folder if not exists */
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder);
    }

    move_uploaded_file($temp, $upload_folder . $photo);

    /* Insert query */
    $sql = "INSERT INTO biodata
(photo, fullname, dob, age, gender, height, marital, religion, education, profession, income, father, mother, contact, address)
VALUES
('$photo','$fullname','$dob','$age','$gender','$height','$marital','$religion','$education','$profession','$income','$father','$mother','$contact','$address')";

    if ($conn->query($sql) === TRUE) {

        echo "Biodata submitted successfully";
        echo "<br><a href='view_biodata.php'>View Records</a>";
    } else {

        echo "SQL Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
