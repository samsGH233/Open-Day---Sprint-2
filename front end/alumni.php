<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="">
</head>
<body>

<?php
include "connecttodatabaseinfo.php";
include "navbar.php";
$mysqli = connectToDatabase();  // Database connection

// Fetch data from the database
$sql = "SELECT * FROM alumni_wlv";
$result = $mysqli->query($sql);
?>

<!-- Card contains the alumni information -->
<div class="container mt-4">
    <h1 class="text-center">Alumni</h1>
    <p class="text-center">Here are some of the alumni that attended our university!</p>
    <div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) 
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card text-center">';
            echo '<img src="' . $row['image'] . '" class="card-img-top" alt="Alumni Image" style="height: 450px; object-fit: cover;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['Name'] . '</h5>';
            echo '<p class="card-text"><strong>Degree:</strong> ' . $row['Degree'] . '</p>';
            echo '</div>'; 
            echo '</div>'; 
            echo '</div>'; 
        } else {
        echo '<p class="text-center">No alumni found.</p>';
    }
    ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
