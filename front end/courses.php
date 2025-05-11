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
    
    //STEP 1: Include the relevant PHP files
    include "navbar.php";
    include "connecttodatabaseinfo.php";

    
    //STEP 2: Ensure that the search box is functional
    if (isset($_GET['searchBox'])) { 
            
        $_SESSION['courses_searchBox'] = $_GET['searchBox'];
        }
        
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
    $mysqli = connectToDatabase(); 
    $sql = "SELECT * FROM app_events LIMIT 25";  
    if ($searchBox) { 
        $sql .= " WHERE Course LIKE '%" . $mysqli->real_escape_string($searchBox) . "%'";
    }



    
    $result = $mysqli->query($sql); 
    if ($result && $result->num_rows > 0): ?>
       
     
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
          
                <!-- Displaying data from each column in each row in the db table -->
                <tr>
                    <td><?= $event['Course']?></td>
                    <td><?= $event['Information'] ?></td>
                    <td><?= $event['Time'] ?></td>
                    <td><?= $event['Room_Number'] ?></td>
                    <td>
                        <button class="btn btn-primary add-to-timetable" data-event='<?= json_encode($event) ?>'>Add</button>
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

<div id="notification"></div>

<script>

  
    let timetable = [];

try {
    const storedTimetable = localStorage.getItem("timetable");
    if (storedTimetable) {
        timetable = JSON.parse(storedTimetable);
    }


} catch (error) {
    console.error("Error parsing timetable data from localStorage", error);
}

function renderTimetable() {
    const timetableContainer = document.getElementById('timetable'); // Make sure this element exists
    timetableContainer.innerHTML = ''; // Clear the current timetable

    if (timetable.length === 0) {
        timetableContainer.innerHTML = '<p>Your timetable is empty.</p>';
    } else {
        const list = document.createElement('ul');
        timetable.forEach(event => {
            const listItem = document.createElement('li');
            listItem.textContent = `${event.Course} at ${event.Time}`;
            list.appendChild(listItem);
        });
        timetableContainer.appendChild(list);
    }
}


// Call renderTimetable when the page loads to display existing data
document.addEventListener('DOMContentLoaded', renderTimetable);

document.querySelectorAll('.add-to-timetable').forEach(button => {
    button.addEventListener('click', function () {
        try {
            const event = JSON.parse(this.getAttribute('data-event'));
            let timetable = JSON.parse(localStorage.getItem("timetable")) || [];

            if (!timetable.some(e => e.Course === event.Course)) {
                timetable.push(event);
                localStorage.setItem("timetable", JSON.stringify(timetable));
                alert(`${event.Course} added to your timetable.`);
            } else {
                alert(`${event.Course} is already in your timetable.`);
            }
        } catch (error) {
            console.error("Error adding event to localStorage", error);
            alert("There was an error adding the event.");
        }
    });
});




</script>



   
</body>
</html> 
