<!-------------------php scripts for connectivity----------------->
<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    @$tid = $_POST["tid"];
    @$password = $_POST["password"];
    @$fname = $_POST["fname"];
    @$lname = $_POST["lname"];
    @$city = $_POST["city"];
    @$cnic = $_POST["cnic"];
    @$pno = $_POST["pno"];

    
    $exists=false;
    if($exists==false){
       $sql = "UPDATE `teachers` SET `fname`='$fname',`lname`='$lname',`cnic`='$cnic',`pno`='$pno',`city`='$city',`password`='$password' WHERE `tid`='$tid'";
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

    <title>Update student</title>
  </head>
  <body background="images/908/sadmin.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
  <?php
        session_start();
        // $id = $_SESSION['id'];
  require 'partial/sidebar.php' ?>
    
  <!------------------- nav bar--------------------------->
   




    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/updatetech.php" method="post" style="width: 450px;"  >
 
     <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3">Update Teacher Record</h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >Enter ID</label>
      <input type="text" class="form-control" id="tid" placeholder="Enter Teacher ID" name="tid" Required>
      </div>
 
      <h4 class="text-center p-3">->Fill those blanks which you want to Update : </h4> 
     

      <!--------------------------- for password------------------------------------->
      <div class="mb-3">
      <label for="password" class="form-label" >Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
      </div>

      
     <!--------------------------- for First name------------------------------------->
     <div class="mb-3">
      <label for="fname" class="form-label" >First Name</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
      </div>
   
      
     <!--------------------------- Last name------------------------------------->
     <div class="mb-3">
      <label for="lname" class="form-label" >Last Name</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
      </div>
     

     <!--------------------------- city name------------------------------------->
     <div class="mb-3">
      <label for="city" class="form-label" >city</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city">
      </div>

      <!--------------------------- cnic ------------------------------------->
     <div class="mb-3">
      <label for="cnic" class="form-label" >Cnic</label>
      <input type="text" class="form-control" id="cnic" placeholder="Enter cnic" name="cnic">
      </div>

      <!--------------------------- cellphone ------------------------------------->
     <div class="mb-3">
      <label for="phone" class="form-label" >Phone</label>
      <input type="text" class="form-control" id="pno" placeholder="Enter phone no" name="pno">
      </div>


      <!--------------------------- for button ------------------------------------->
      <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" >Update</button>
      </div> 
      
      
      
 
     </form>
 
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-------------------Alert---------------------------------->
  <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> teacher record updated !!!
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
