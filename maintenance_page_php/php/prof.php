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
        <div class="overlap-group1"><div class="student-sign-up roboto-normal-white-72px">Professor Form</div></div>
        <div class="overlap-group roboto-normal-black-24px">
	<form action = "https://clabsql.clamv.jacobs-university.de/~bpanthi/maintenance/php/prof.php" method = "post">
          <div class="name">Name : <input type="text"  placeholder="Enter full name" name="full_name" required ></div>
          <div class="university-name">University Name : <input type="text" placeholder="Enter Uni name" name="uni_name" required></div>
          <div class="email-id">Country: <input type="text"  placeholder="Enter text here" name="country" required ></div>
          <br><br>
          <input type="submit" value="Submit">
          </form>

          <p>Click the "Submit" button to submit your data.</p>
         </div>
         <?php
                $name = $_POST['full_name'];
                $uni = $_POST['uni_name'];
                $country = $_POST['country'];
                //Sending form data to sql db.
                if(isset($_POST['full_name']) && isset($_POST['uni_name']) && isset($_POST['country'])){
                  if (mysqli_connect_errno()){
                      echo "<script>alert('Connection_Failed');</script>";
                  }
                  else{
                      mysqli_query($connect,"INSERT INTO PROFESSOR_DETAILS (PROF_NAME, UNI_NAME, COUNTRY) VALUES ('$name', '$uni', '$country');");
                     echo "<script>alert('Success!');</script>";
                  }
                }
          ?>
         
        <div class="overlap-group2">
          <div class="rectangle-14"> <a href="https://clabsql.clamv.jacobs-university.de/~ssunar/maintenance/php/maintenance-page.php">Back to maintenance page</a>   </div>
        </div>
      </div>
    </div>
  </body>

  <?php endif;?>

</html>


