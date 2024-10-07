<!-------------------php scripts for connectivity----------------->
<?php
 session_start();
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    $sid = $_SESSION['sid'];
    $cid = $_POST["cid"];

    
    $exists=false;
    if($exists==false){
       $sql = "INSERT INTO `course_reg` ( `sid`, `cid`) VALUES ( '$sid', '$cid')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }

    }
    else{
        $showError = "Error";
    }


    
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        form{
            background:#333;
        }
        .mb-3{
            color:white;
        }
        .p-3{
            color:white;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> course Registration</title>
  </head>
  <body background="images/908/student3.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
    
  <?php require 'partial/sidebarstd.php' ?>


    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/coursereg.php" method="post" style="width: 450px;"  >
 
     <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3"> Course Registration </h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >Student ID : </label> <?php 
      $sid = $_SESSION['sid'];
      echo "$sid"; ?>
      <!-- <input type="text" class="form-control" id="sid" placeholder="Enter teacher ID" name="sid"> -->
      </div>
 
      
     <!--------------------------- for First name------------------------------------->
     <div class="mb-3">
      <label for="fname" class="form-label" >Course ID</label>
      <input type="text" class="form-control" id="cid" placeholder="Enter First Name" name="cid" Required>
      </div>


      <!--------------------------- for button ------------------------------------->
      <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" >Register</button>
      </div> 
      
      
      
 
     </form>
 
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<body>
    
  <!-------------------Alert---------------------------------->
 <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';}
   ?>


</body>
</html>