<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Open Day | Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<style>
.card-img-top {
    height: 430px;
    object-fit: cover;
}
</style>


<?php
include "navbar.php";
include "connecttodatabaseinfo.php";

$mysqli = connectToDatabase();  // Database connection

// Fetch data from the database
$sql = "SELECT * FROM alumni_wlv";
$result = $mysqli->query($sql);
?>

<div class="container mt-4">
    <h1 class="text-center">Alumni</h1>
    <p class="text-center">Here are some of the alumni that attended our university!</p>
    <div class="row">
        <?php
        // Check if any results were returned
        if ($result->num_rows > 0) {
            // Loop through the results and display them
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card h-100">';
                
                // Display image if it exists
                if (!empty($row['Image_URL'])) {
                    echo '<img src="' . htmlspecialchars($row['Image_URL']) . '" class="card-img-top" alt="Photo of ' . htmlspecialchars($row['Name']) . '">';
                }
                
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['Name']) . '</h5>';
                echo '<p class="card-text"><strong>Degree:</strong> ' . htmlspecialchars($row['Degree']) . '</p>';
                echo '<p class="card-text"><strong>Year Graduated:</strong> ' . htmlspecialchars($row['Year_Graduated']) . '</p>';
                
                // Display quote if it exists
                if (!empty($row['Quote'])) {
                    echo '<blockquote class="blockquote mt-3">';
                    echo '<p class="mb-0">"' . htmlspecialchars($row['Quote']) . '"</p>';
                    echo '</blockquote>';
                }
                
                echo '</div>'; // End of card-body
                echo '</div>'; // End of card
                echo '</div>'; // End of col-md-4
            }
        } else {
            echo '<p class="text-center">No alumni found.</p>';
        }

        // Close database connection
        $mysqli->close();
        ?>
    </div> <!-- End of row -->
</div> <!-- End of container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
