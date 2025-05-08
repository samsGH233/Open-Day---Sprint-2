<?php

session_start(); // this either starts a new session or resumes a previous one

// values stored in 'SESSION SUPER GLOABL' after session starts

//display name of the logged in
if (isset($_SESSION["user_id"])) { // check for user id in the session

    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM Signup_staff
            WHERE id = {$_SESSION["user_id"]} " ; // check       

    $result = $mysqli->query($sql) ;

    $user = $result->fetch_assoc();
}


// the id is the same id number stored in the db
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">     
</head>
<body>


    <!-- Nav Bar-->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
    
    <div class="container">
        <a href="https://mi-linux.wlv.ac.uk/~2351031/staff-homepage.php" class="navbar-brand">Open Day</a>

        <button 
        class="navbar-toggler" 
        type="button" data-bs-toggle="collapse" 
        data-bs-target="#navmenu"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        
        
        
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                 <!-- check if user variable is set -->
                 <?php if (isset($user)): ?> <!-- check if user id is set in the session -->

                <li class="nav-item"><a class="nav-link" style="color: black;">Hello <?= htmlspecialchars($user["name"]) ?></a></li>
                <li class="nav-item"><a href="https://mi-linux.wlv.ac.uk/~2351031/staff-homepage.php" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="https://mi-linux.wlv.ac.uk/~2351031/add-event.php" class="nav-link">EVENT</a></li>
                <li class="nav-item"><a class="nav-link">ATTENDANCE</a></li>
                <li class="nav-item"><a href="logout2.php" style="color: black;" class="nav-link">Log out</a></li>
            </ul>
            
            <?php else: ?>
            <!-- if id is not set to user_id, then links will be provided to the login and sign up page -->
            <p><a href="login2.php">Login in</a> or <a href="signupPage2.html">sign up</a> </p>

            <?php endif; ?> 

           

        </div>
    </div>
    </nav>
    
    </body>
    </html>
