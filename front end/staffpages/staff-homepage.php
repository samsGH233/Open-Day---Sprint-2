<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<?php
    
    include "connecttodatabaseinfo.php";
    include "staff-navBar.php";

    $mysqli = connectToDatabase();
    // Fetch events
    $sql = "SELECT * FROM app_events";
    $result = $mysqli->query($sql);
?>


 <div class="homepage-content">
        <h1>Available Courses</h1>
        <div class="course-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="course-card">';
                    echo '<h2>' . htmlspecialchars($row['Course']) . '</h2>';
                    echo '<p><strong>Time:</strong> ' . htmlspecialchars($row['Time']) . '</p>';
                    echo '<p>' . htmlspecialchars($row['Information']) . '</p>';
                    echo '<p><strong>Room:</strong> ' . htmlspecialchars($row['Room_Number']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No courses available.</p>';
            }
            $mysqli->close();
            ?>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>