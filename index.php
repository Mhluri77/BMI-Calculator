<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>BMI Calculator</h1>

    <form method="POST">

        <label>First Name</label>
        <input type="text" name="firstname" required>

        <label>Last Name</label>
        <input type="text" name="lastname" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Height (meters)</label>
        <input type="number" step="0.01" name="height" required>

        <label>Weight (kg)</label>
        <input type="number" step="0.1" name="weight" required>

        <button type="submit" name="calculate">
            Calculate BMI
        </button>

    </form>

<?php

if(isset($_POST['calculate'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $bmi = $weight / ($height * $height);

    if($bmi < 18.5){
        $status = "Underweight";
    }
    elseif($bmi >= 18.5 && $bmi < 24.9){
        $status = "Normal Weight";
    }
    elseif($bmi >= 25 && $bmi < 29.9){
        $status = "Overweight";
    }
    else{
        $status = "Obese";
    }

    $sql = "INSERT INTO bmi_users 
    (firstname, lastname, age, height, weight, bmi, status)
    VALUES
    ('$firstname', '$lastname', '$age', '$height', '$weight', '$bmi', '$status')";

    if(mysqli_query($conn, $sql)){

        echo "<div class='result'>";
        echo "<h2>Result Saved Successfully</h2>";
        echo "<p>Name: $firstname $lastname</p>";
        echo "<p>BMI: " . round($bmi, 2) . "</p>";
        echo "<p>Status: $status</p>";
        echo "</div>";

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<br>

<a href="view.php">
    <button>View All Records</button>
</a>

</div>

</body>
</html>