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

        echo "<div class='result'>";

        echo "<h2>Results</h2>";

        echo "<p>Name: $firstname $lastname</p>";
        echo "<p>Age: $age</p>";
        echo "<p>BMI: " . round($bmi, 2) . "</p>";

        if($bmi < 18.5) {
            echo "<p>Status: Underweight</p>";
        }
        elseif($bmi >= 18.5 && $bmi < 24.9) {
            echo "<p>Status: Normal Weight</p>";
        }
        elseif($bmi >= 25 && $bmi < 29.9) {
            echo "<p>Status: Overweight</p>";
        }
        else {
            echo "<p>Status: Obese</p>";
        }

        echo "</div>";
    }

    ?>

</div>

<script src="script.js"></script>

</body>
</html>