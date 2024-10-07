<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/dbconnect.php';
    @$cid = $_POST["cid"];
    @$cname = $_POST["cname"];

    
    $sql = "INSERT INTO `course` (`cid`, `cname`) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $cid, $cname);

       
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $showAlert = true;
        } else {
            
            if (mysqli_errno($conn) == 1062) {
                $showError = "Course ID already exists. Please choose a different Course ID.";
            } else {
                $showError = "Error adding course record";
            }
        }

        mysqli_stmt_close($stmt);
    } else {
        $showError = "Error preparing statement";
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
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add course</title>
  </head>
  <body background="images/908/sadmin.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  
  <?php
        session_start();
        // $id = $_SESSION['id'];
  require 'partial/sidebar.php' ?>
    
  
   
 


<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/addcourse.php" method="post" style="width: 450px;"  >
 
      
      <h4 class="text-center p-3">ADD Course</h4> 
     

 
      <div class="mb-3">
      <label for="id" class="form-label" >Course ID</label>
      <input type="text" class="form-control" id="cid" placeholder="Enter User ID" name="cid" Required>
      </div>
 
      
     <div class="mb-3">
      <label for="fname" class="form-label" >Course Name</label>
      <input type="text" class="form-control" id="cname" placeholder="Enter First Name" name="cname" Required>
      </div>


      <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" >ADD Course</button>
      </div> 
      
      
      
 
     </form>
 
  </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> new course added
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