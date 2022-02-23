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
<style>
    a:link {
      color: white;
      background-color: transparent;
      text-decoration: none;
    }

    a:visited {
      color: white;
      background-color: transparent;
      text-decoration: none;
    }

    a:hover {
      color: red;
      background-color: transparent;
      text-decoration: underline;
    }

    a:active {
      color: yellow;
      background-color: transparent;
      text-decoration: underline;
    }
    </style>
</head>

<?php
    session_start();
    $flag = 0;
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      if($_SESSION['username'] = "admin" && $_SESSION['password'] = "admin")
      {
          $flag = 1;
          //echo '<a href="logout.php?logout">Logout</a>';
      }
      else
      {
          header("location: http://clabsql.clamv.jacobs-university.de/~arathi/");
      }
    }
    else{
      header("location: http://clabsql.clamv.jacobs-university.de/~arathi/");
    }

?>

<?php  if($flag): ?>

<body style="margin: 0; background: #ffffff">
  <input type="hidden" id="anPageName" name="page" value="student-s" />
  <div class="container-center-horizontal">
    <div class="student-s screen">
      <div class="overlap-group1">
        <div class="student-sign-up roboto-normal-white-72px">Admission Application</div>
      </div>
      <div class="overlap-group roboto-normal-black-24px">
        <form action="adm_application.php" method="post">
        <div class="name">Year : <input type="number" placeholder="Enter the year" name="year" required></div>
        <div class="country">Country : <input type="text" placeholder="Enter the text here" name="country"
            required></div>
        <div class="email-id">Department : <input type="text" placeholder="Enter the text here" name="department"
            required></div>
        <div class="university-name">University Name : <input type="text" placeholder="Enter the University applied" name="uni_app"
            required></div>
        <br><br><br>
        <label for="name">Choose degree type:</label>
        <select name="ms_phd" id="type"> //name is here
          <option value="ms">Masters</option>
          <option value="phd">PhD</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
        </form>

        <p>Click the "Submit" button to submit your data.</p>
      </div>
      <?php
              $year = $_POST['year'];
              $uni = $_POST['uni_app'];
              $country = $_POST['country'];
              $department = $_POST['department'];
              $ms_phd = $_POST['ms_phd'];
              //Sending form data to sql db.
              if(isset($year) && isset($uni) && isset($country) && isset($ms_phd)){
                if($connect->connect_error){
                   echo "<script>alert('Connection_Failed');</script>";
                }
                else{
                   mysqli_query($connect,"INSERT INTO ADMIN_APPLICATION (UNI_NAME, YEAR_, COUNTRY, DEPARTMENT, MS_OR_PHD) VALUES ('$uni_app', '$year', '$d_apply', '$department', '$ms_phd');");
                   echo "<script>alert('Success!');</script>";
                }
              }
              
          ?>

      <div class="overlap-group2">
        <div class="rectangle-14"><a href="https://clabsql.clamv.jacobs-university.de/~ssunar/maintenance/php/maintenance-page.php">Back to maintenance page</a> </div>
      </div>
    </div>
  </div>
</body>

<?php endif;?>

</html>
