<?php include "navbar.php"
 
 ?>


<html lang="en">
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

 <!-- Showcase-->

 <section class="showcase-sec bg-dark text-light p-5 text-center">
    <div class="container">
        <!-- Flexbox-->
        <div class="d-sm-flex justify-content-between">
            <div>
                <h1>Why join a university open day ?</h1>
                <ul style="margin-top: 90px; text-align: left;">
                    <li>Learn about the university</li>
                    <li>Gain understanding about desired course & modules</li>
                    <li>Tour the facilities</li>
                    <li>Interactions with staff & lecturers</li>
                    <li>Meet other students</li>
                </ul>
            </div>
            <iframe class="img-fluid w-50" style="margin-top: 30px;" src="https://www.youtube.com/embed/QDNxCMspP0g"></iframe>
        </div>
    </div>
</section>


<!-- Boxes -->

<!--
<section class="py-5">
    
    <div class="container" style="margin-top: 100px;" >
      <div class="row" style="height: 400px; width: 300px; ">
        <button type="button" class="btn btn-primary mb-3">Button 1</button>
        <button type="button" class="btn btn-secondary mb-3">Button 2</button>
        <button type="button" class="btn btn-success">Button 3</button>
      </div>
    </div>

</section>

-->

<!--
<section class="p-5">
    <div class="container" >
    <div class="row text-center fs-2" style="margin-top: 100px; gap: 15px;">
        
        <a href="https://mi-linux.wlv.ac.uk/~2351031/alumni.php"><button type="button" class="col-md btn-primary mb-3 ">ALUMNI</button></a>
        <a href="https://mi-linux.wlv.ac.uk/~2351031/tips.php"><button type="button" class="col-md btn-secondary mb-3 ">TIPS</button></a>
        <a href="https://mi-linux.wlv.ac.uk/~2351031/feedbackpage.php"><button type="button" class="col-md btn-success mb-3 ">FEEDBACK</button></a>
        </div>
    </div>
</section>
!-->

<!--  Boxes -->
  
<section class="p-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md">
                <div class="card bg-primary text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 class="title mb-3">
                            ALUMNI
                        </h3>
                        <p class="card-text">
                            Discover inspiring stories from past students, see where they are now, and learn how university shaped their careers.
                        </p>
                        <a href="https://mi-linux.wlv.ac.uk/~2351031/alumni.php" class="btn btn-dark">Visit Page</a>
                    </div>
                </div>
            </div>
            <div class="col-md">
            <div class="col-md">
                <div class="card bg-warning text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3 class="title mb-3">
                            TIPS
                        </h3>
                        <p class="card-text">
                        Get practical advice on how to plan your visit, what to ask staff, and how to make the most of your Open Day experience.
                        </p>
                        <a href="https://mi-linux.wlv.ac.uk/~2351031/tips.php" class="btn btn-dark">Visit Page</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md">
            <div class="col-md">
                <div class="card bg-success text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        <i class="fa-solid fa-comment"></i>
                        </div>
                        <h3 class="title mb-3">
                            FEEDBACK
                        </h3>
                        <p class="card-text">
                            Share how you felt your Open Day experience was, bring any ideas to help in elevating and improving future open days.
                        </p>     
                        <a href="https://mi-linux.wlv.ac.uk/~2351031/feedbackpage.php" class="btn btn-dark">Visit Page</a>
                    </div>
                </div>
            </div>
            </div>

    </div>
        </div>
            </div>
 </section>


         

<!--
<img src="campus-map.jpg" usemap="#map" class="img-fluid">
<map name="map">
  <area shape="rect" coords="34,44,270,350" href="building-info.php?building=harrison" alt="Harrison Building">
  <area shape="circle" coords="400,200,60" href="building-info.php?building=wulfruna" alt="Wulfruna Building">
</map>


<!-- Directions Section Implemented in Homepage -->

<div style="text-align: center;">
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1g0zn1xMtnvfWsHsTk5M0x1VI_Hv2bXw&ehbc=2E312F" width="640" height="480"></iframe>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>
            -->




</body>
</html>

<style>
    .card:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
</style>