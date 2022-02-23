<?php include './connect.php';?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1440, maximum-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
  <meta name="og:type" content="website" />
  <meta name="twitter:card" content="photo" />
  <link rel="stylesheet" type="text/css" href="css/student-s.css" />
  <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
  <link rel="stylesheet" type="text/css" href="css/globals.css" />
  <meta name="author" content="AnimaApp.com - Design to code, Automated." />
</head>

<body style="margin: 0; background: #ffffff">
  <input type="hidden" id="anPageName" name="page" value="student-s" />
  <div class="container-center-horizontal">
    <div class="student-s screen">
      <div class="overlap-group1">
        <div class="student-sign-up roboto-normal-white-72px">Test Details</div>
      </div>
      <div class="overlap-group roboto-normal-black-24px">
        <form action="test.php" method="post">
        <div class="name">Name of Test : <input type="text" placeholder="Enter text here" name="test_name" required>
        </div>
        <div class="country">Country : <input type="text" placeholder="Country Name" name="country_name" required></div>
        <div class="email-id">Mean Score : <input type="number" placeholder="Enter number here" name="mean_score"
            required></div>
        <br><br>
        <input type="submit" value="Submit">
        </form>

        <p>Click the "Submit" button to submit your data.</p>
      </div>
      <?php
              $test_name = $_POST['test_name'];
              $country_name = $_POST['country_name'];
              $mean_score = $_POST['mean_score'];
              //Sending form data to sql db.
              if($connect->connect_error){
                  echo "<script>alert('Connection_Failed');</script>";
              }
              else{
                  mysqli_query($connect,"INSERT INTO Tests (Name_of_Tests, Country, mean_test_score) VALUES ('$test_name', '$country_name', '$mean_score ');");
                  echo "<script>alert('Success!');</script>";
              }
              
          ?>

      <div class="overlap-group2">
        <div class="rectangle-14"></div>
      </div>
    </div>
  </div>
</body>

</html>
