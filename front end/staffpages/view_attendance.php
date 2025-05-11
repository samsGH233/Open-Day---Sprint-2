<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Open Day | Attendance Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include "connecttodatabaseinfo.php"; 

$mysqli = connectToDatabase();
$sql = "
    SELECT 
        attendance.attendance_id,
        signup.name AS student_name,
        attendance.attended,
        app_events.Course AS course_name
    FROM attendance
    JOIN signup ON attendance.id = signup.id
    JOIN app_events ON attendance.event_id = app_events.event_id
";


$result = $mysqli->query($sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Attendance Records</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                
                        <thead class="table-dark">
                <tr>
                    <th>Attendance ID</th>
                    <th>Name</th>
                    <th>Attended</th>
                    <th>Event Name</th>
                </tr>
            </thead>
            <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['attendance_id']) ?></td>
                <td><?= htmlspecialchars($row['student_name']) ?></td>
                <td><?= htmlspecialchars($row['attended']) ?></td>
                <td><?= htmlspecialchars($row['course_name']) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>

            </table>
        </div>
    <?php else: ?>
        <p class="text-center">No attendance records found.</p>
    <?php endif; ?>

    <?php $mysqli->close(); ?>
</div>

</body>
</html>
