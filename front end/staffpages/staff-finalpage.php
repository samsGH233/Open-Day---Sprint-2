<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thank you!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="feedback.css">
  </head>
<body>
<?php include "staff-navBar.php" ?>
<!-- The final page after the event is added
-->
    <h1 class="text-center my-4">Thank you!</h1> 
    <div class = "container mt-3">
        <p class="text-center">The event has been added. Return to the home page to see the events you added!</p>
        <button type="submit" class="btn btn-success"onclick="window.location.href='staff-homePage.php'">Return</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>