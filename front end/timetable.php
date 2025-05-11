
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
    <title>Open Day | Your Timetable</title>
</head>
<body>



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
        function displayTimetable() {
    const storedTimeTable = localStorage.getItem('timetable');
    const tableBody = document.getElementById('timetableBody');

    if (storedTimeTable) {
        const timetable = JSON.parse(storedTimeTable);
        tableBody.innerHTML = ""; // Clear any previous content

        timetable.forEach((event, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${event.Course || 'N/A'}</td>
                <td>${event.Time || 'N/A'}</td>
                <td>${event.Room_Number || 'N/A'}</td>
                <td>
                    <select class="form-select form-select-sm">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm remove-btn">Remove</button>
                </td>
            `;
            tableBody.appendChild(row);

            const selectElement = row.querySelector('select');



selectElement.addEventListener('change', () => {
    const selected = selectElement.value;
    console.log('Sending attendance:', { course: event.Course, attendance: selected });

    fetch('record_attendance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            course: event.Course, 
            attendance: selected 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Attendance for "${event.Course}" recorded as "${selected}".`);
        } else {
            alert(`Error recording attendance: ${data.error}`);
        }
    })
    .catch(error => {
        console.error("Fetch error:", error);
        alert("An error occurred while sending attendance.");
    });
});






// Add event listener to the remove button
            row.querySelector('.remove-btn').addEventListener('click', () => {
                const confirmRemove = confirm(`Remove "${event.Course}" from your timetable?`);
                if (confirmRemove) {
                    timetable.splice(index, 1);
                    localStorage.setItem('timetable', JSON.stringify(timetable));
                    displayTimetable(); // Refresh the table
                }
            });
        });
    } else {
        tableBody.innerHTML = `
            <tr><td colspan="5" class="text-center">No timetable data available.</td></tr>
        `;
    }
}

document.addEventListener("DOMContentLoaded", displayTimetable);




</script>


</body>
</html>
