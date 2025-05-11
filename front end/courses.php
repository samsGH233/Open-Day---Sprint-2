
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php


include "connecttodatabaseinfo.php"; // connect to database file
include "navbar.php";  // navigation bar file


if (isset($_GET['searchBox'])) { // retrieves value of serachBox param from the URL
// the isset function checks if the parameter exists in the URL to prevent errors 

//  stores retreived value into session variable called courses_searchBox

    $_SESSION['courses_searchBox'] = $_GET['searchBox'];
}

// assgins value of courses_searchBox to the variable $searchBox
//if $_SESSION['courses_searchBox'] is not set, it assigns an empty string instead
// '??' is the null coalescing operator, which checks if the left-hand value is set and not null
// if it is not set, the right hand value is used instead
$searchBox = $_SESSION['courses_searchBox'] ?? '';

?>

<h1 class="text-center my-4">Courses</h1>

<div class="container">

    <form class="d-flex mb-4" method="GET" > <!-- Data sent to server through URL -->
        <input class="form-control" type="text" name="searchBox" placeholder="Search courses" value="<?= $searchBox ?>">
        <button class="btn btn-success ms-2" type="submit">Search</button>
    </form>
</div>
<br>

<div class="container">
    <div class="table-responsive">
    
    <?php
    $mysqli = connectToDatabase(); // whaterver is returned from the connectToDatabase() function is stored in this variable
                                  // This variable is then used for executing database queries

    $sql = "SELECT * FROM app_events LIMIT 25";  // extracting data from the 'app_events' table
    
    
    // dynamically builds and SQL query to search for courses based on user input.
    if ($searchBox) { // this checks if $searchbox contains a value
        // appends to existing SQL query
        // checks for values in Course column that contain the $searchBox value
        $sql .= " WHERE Course LIKE '%" . $mysqli->real_escape_string($searchBox) . "%'";
    }



    // $result variable stores the query result
    $result = $mysqli->query($sql); // SQL query is executed using $mysqli object
    
    // ensures tha the query execution was successful
    // $result->num_rows > 0 -> checks that at least one row was returned
    // num_rows is a property of MySQLi that tells how many rows were returned
    if ($result && $result->num_rows > 0): ?>
       
       <!-- Headers of the columns in the table -->
       <table class="table table-striped"> 
            <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Information</th>
                    <th scope="col">Time</th>
                    <th scope="col">Room</th>
                    <th scope="col">Add to Timetable</th>
                </tr>
            </thead>



            <tbody>
            <?php while ($event = $result->fetch_assoc()): ?>
            <!-- $result is an MySQL  query object from a database query
            - Method 'fetch_assoc() retrieves the next row from the result as an associative array
            - If there are no more rows, fetch_assoc retruns false
            - The while loop above will continue as long as the fetch_assoc() method returns a valid row i.e. true
            - The fetched row is assigned to the variable $event
               
               
            -->
               
               
               
                <tr>
                    <td><?= $event['Course']?></td>
                    <td><?= $event['Information'] ?></td>
                    <td><?= $event['Time'] ?></td>
                    <td><?= $event['Room_Number'] ?></td>
                    <td>
                        <button class="btn btn-primary add-to-timetable" data-event='<?= json_encode($event) ?>'>Add</button>
                        <!-- json_encode($event) ; converts PHP variable into a JSON string -->
                        <!-- The JSON-encoded string is stored inside the data-event attribute -->
                        <!-- The Course, Information, Time, and Room_Number data is stored inside of the data-event attribute --> 
                    
                    </td>
                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    <?php else: ?>
        <p class="text-center">No events found in the database.</p>
    <?php endif;
    $mysqli->close();
    ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
let timetable = JSON.parse(localStorage.getItem("timetable")) || [];
document.querySelectorAll('.add-to-timetable').forEach(button => {
    button.addEventListener('click', function () {
        const event = JSON.parse(this.getAttribute('data-event'));
        timetable.push(event);
        localStorage.setItem("timetable", JSON.stringify(timetable));
        alert(`${event.Course} added to your timetable.`);
        displayTimetable();
    });
});

function displayTimetable() {
    const timetableContent = document.getElementById('timetableContent');
    timetableContent.innerHTML = "";
    if (timetable.length > 0) {
        timetable.forEach((event, index) => {
            timetableContent.innerHTML += `
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">${event.Information}</h5>
                        <p><strong>Course:</strong> ${event.Course}</p>
                        <p><strong>Time:</strong> ${event.Time}</p>
                        <p><strong>Room:</strong> ${event.Room_Number}</p>
                        <button class="btn btn-danger" onclick="removeFromTimetable(${index})">Remove</button>
                    </div>
                </div>`;
        });
    } else {
        timetableContent.innerHTML = "<p>No events added to your timetable.</p>";
    }
}

function removeFromTimetable(index) {
    timetable.splice(index, 1);
    displayTimetable();
}

const timetableModal = new bootstrap.Modal(document.getElementById('timetableModal'));
document.getElementById('timetableModal').addEventListener('shown.bs.modal', displayTimetable);
</script>
</body>
</html>