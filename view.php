<?php
include 'connect.php';

$sql = "SELECT * FROM bmi_users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All BMI Records</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>All BMI Records</h1>

<table border="1" width="100%" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Height</th>
    <th>Weight</th>
    <th>BMI</th>
    <th>Status</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

    echo "<tr>";

    echo "<td>".$row['user_id']."</td>";
    echo "<td>".$row['firstname']."</td>";
    echo "<td>".$row['lastname']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['height']."</td>";
    echo "<td>".$row['weight']."</td>";
    echo "<td>".round($row['bmi'],2)."</td>";
    echo "<td>".$row['status']."</td>";

    echo "</tr>";
}

?>

</table>

<br>

<a href="index.php">
    <button>Back</button>
</a>

</div>

</body>
</html>