<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="">
</head>
<body>

<?php
include "connecttodatabaseinfo.php";
include "navBar.php";
$mysqli = connectToDatabase();  // Database connection

// Fetch tips from the database
$sql = "SELECT * FROM tips_wlv";
$result = $mysqli->query($sql);
?>

<div class="container">
<h1 class = "text-center">Tips</h1>
<p class = "text-center">Here are tips and tricks to navigating university!</p>
    <div class="accordion" id="tipsAccordion">
        <?php
        if ($result->num_rows > 0) {
            $counter = 1; // Counter for accordion ID uniqueness
            while ($row = $result->fetch_assoc()) {
                $title = $row['tips_id'];
                $content = $row['information'];

                // Accordion Item
                echo '<div class="accordion-item">';
                echo '<h2 class="accordion-header" id="heading' . $counter . '">';
                echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $counter . '" aria-expanded="false" aria-controls="collapse' . $counter . '">';
                echo $title;
                echo '</button>';
                echo '</h2>';
                echo '<div id="collapse' . $counter . '" class="accordion-collapse collapse" data-bs-parent="#tipsAccordion">';
                echo '<div class="accordion-body">';
                echo $content;
                echo '</div>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
        } else {
            echo '<p class="text-center">No tips found.</p>';
        }

        $mysqli->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
