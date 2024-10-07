
<?php
@$login = false;
@$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    @$tid = $_POST["tid"];
    @$password = $_POST["password"];
     
    @$sql = "Select * from teachers where tid='$tid'  AND password='$password' ";
    @$result = mysqli_query($conn, $sql);
    @$num = mysqli_num_rows($result);
    if (@$num == 1){
        @$login = true;
        session_start();
        @$_SESSION['loggedin'] = true;
        @$_SESSION['tid'] = $tid;
        header("location: teacherspanel.php");

    } 
    else{
        @$showError = "Invalid Credentials";
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

    <title>Login Teacher</title>
  </head>
  <body background="images/908/teacher2.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
    <?php require 'partial/_nav.php' ?>



    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded " action="/dbproject/logintech.php" method="post" style="width: 450px;" >
 
     <!--------------------------- for Heading of login form------------------------------------->
      
      <h4 class="text-center p-3">Teacher Login</h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >User ID</label>
      <input type="text" class="form-control" id="tid" placeholder="Enter User ID" name="tid" Required>
      </div>
 
      <!--------------------------- for password------------------------------------->
      <div class="mb-3">
      <label for="password" class="form-label" >Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" Required>
      </div>
 
     
   
      
     <!--------------------------- for button ------------------------------------->
      <div class="mb-3">
     <a> <button type="submit" class="btn btn-primary" >Login</button></a>
      </div> 
      
 
     </form>
 
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
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
    </div> ';
    }
    ?> 
</body>
</html>
