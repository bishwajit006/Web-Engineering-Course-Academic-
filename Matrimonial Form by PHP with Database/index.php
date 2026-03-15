<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matrimonial Biodata Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Matrimonial Biodata Form</h1>

        <form action="process.php" method="POST" enctype="multipart/form-data">

            <div class="section">
                <h3>Personal Information</h3>

                <label>Upload Photograph:</label>
                <input type="file" name="photo" accept="image/*">

                <label>Full Name:</label>
                <input type="text" name="fullname" required>

                <label>Date of Birth:</label>
                <input type="date" name="dob" required>

                <label>Age:</label>
                <input type="number" name="age" required>

                <label>Gender:</label>
                <div class="radio-group">
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                </div>

                <label>Height:</label>
                <input type="text" name="height">

                <label>Marital Status:</label>
                <select name="marital">
                    <option value="">Select</option>
                    <option>Unmarried</option>
                    <option>Divorced</option>
                    <option>Widow/Widower</option>
                </select>

                <label>Religion:</label>
                <input type="text" name="religion">
            </div>

            <div class="section">
                <h3>Education & Profession</h3>

                <label>Education:</label>
                <input type="text" name="education">

                <label>Profession:</label>
                <input type="text" name="profession">

                <label>Monthly Income:</label>
                <input type="text" name="income">
            </div>

            <div class="section">
                <h3>Family Details</h3>

                <label>Father's Name:</label>
                <input type="text" name="father">

                <label>Mother's Name:</label>
                <input type="text" name="mother">
            </div>

            <div class="section">
                <h3>Contact Details</h3>

                <label>Contact Number:</label>
                <input type="text" name="contact">

                <label>Address:</label>
                <textarea rows="4" name="address"></textarea>
            </div>

            <button type="submit" name="submit">Submit Biodata</button>

        </form>
    </div>

</body>

</html>