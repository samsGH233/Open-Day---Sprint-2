
<!-- Display Timetable Page -->
<!-- linking navigation bar to home page -->

<?php 
    include "navbar.php";
    include "connecttodatabaseinfo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Timetable</title>
</head>
<body>

<!-- linking navigation bar to home page -->



<div class="container-sm">
    <h2 class="text-center">Your Timetable</h2>
    <table class="table table-striped">
        <thead>
            
                <th>Course Name</th>
                <th>Time</th>
                <th>Room</th>
                <th>Attended</th>
            </tr>
        </thead>
        <tbody id="timetableBody">
            <!-- Timetable rows will be dynamically added here -->
        </tbody>
    </table>
</div>




    <script>
        // Retrieve timetable data from localStorage

        function displayTimetable( ) {
        let storedTimeTable = localStorage.getItem('timetable');

        if(storedTimeTable){
            let timetable = JSON.parse(storedTimeTable);
            let tableBody = document.getElementById('timetableBody');

         // Clear previous table content
        tableBody.innerHTML = "";

       // populate table 
       timetable.forEach((event, index) => {
            let row = document.createElement('tr');
            row.innerHTML = `
                <td>${event.Course || 'N/A'}</td>
                <td>${event.Time ||'N/A'}</td>
                <td>${event.Room_Number || 'N/A'}</td>
                <td>
                    <select class="dropdown-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td><button class="remove-btn btn-danger">Remove</button></td>
            ` ;
            tableBody.appendChild(row);

             // Add event listener to the remove button
             row.querySelector(".remove-btn").addEventListener("click", () => {
            let confirmation = confirm(`Are you sure you want to remove "${event.Course}"?`);
        
                if (confirmation) {
                timetable.splice(index, 1); // Remove from the $POST array
                localStorage.setItem("timetable", JSON.stringify(timetable)); // Update local storage
                row.remove(); // Remove the row from the table
                showNotification(`"${event.Course}" has been removed.`);
            
            }
        
        });
 
       });

       
        document.body.appendChild(notification);


    } else {
        document.body.innerHTML += "<p style="margin-left:10px;">No timetable data available. </p>";
    }
}


    // Run the function when the page loads
    document.addEventListener("DOMContentLoaded", displayTimetable);

    </script>
</body>
</html>