<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
  </head>
  <?php include "navbar.php"; ?>
  <body>
  <!-- Feedback form -->
  <form method="POST" action="feedback.php">
    <div class="container">
      <h1 class = "text-center">Feedback</h1>
      <p class = "text-center">Please let us know if you enjoyed your Open Day here at the university.</p>
      
      <label for="username"><b>On a scale of 1 - 10, how did you find this day</b></label>
      <input type="text" placeholder="" name="num_rate" required> <!-- Fixed name -->

      <label for="email"><b>What did you enjoy about the Open Day?</b></label>
      <input type="text" placeholder="" name="comment1" required> <!-- Fixed name -->

      <label for="psw"><b>What can be improved on for future Open Days? </b></label>
      <input type="text" placeholder="" name="comment2" required> <!-- Fixed name -->

      <div class="clearfix">
        <button type="button" class="btn btn-danger" onclick="window.location.href='homePage.php'">Cancel</button>
        <button type="submit" class="btn btn-success"onclick="window.location.href=">Submit</button>
      </div>
    
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
