<?php include "navbar.php"
 
 ?>


<html lang="en">
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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


<section class="p-5">
    <div class="container" >
    <div class="row text-center fs-2" style="margin-top: 100px; gap: 15px;">
        
        <a href="https://mi-linux.wlv.ac.uk/~2351103/alumni.php"><button type="button" class="col-md btn-primary mb-3 ">ALUMNI</button></a>
        <a href="https://mi-linux.wlv.ac.uk/~2351103/tips.php"><button type="button" class="col-md btn-secondary mb-3 ">TIPS</button></a>
        <a href="https://mi-linux.wlv.ac.uk/~2351103/feedbackpage.php"><button type="button" class="col-md btn-success mb-3 ">FEEDBACK</button></a>
        </div>
    </div>
</section>



<img src="campus-map.jpg" usemap="#map" class="img-fluid">
<map name="map">
  <area shape="rect" coords="34,44,270,350" href="building-info.php?building=harrison" alt="Harrison Building">
  <area shape="circle" coords="400,200,60" href="building-info.php?building=wulfruna" alt="Wulfruna Building">
</map>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>





</body>
</html>