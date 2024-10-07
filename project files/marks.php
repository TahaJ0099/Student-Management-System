<!-------------------php scripts for connectivity----------------->
<?php
session_start();
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    @$sid = $_POST["sid"];
    @$cid = $_POST["cid"];
   @$mid_1_marks = $_POST["mid_1_marks"];   
   @$mid_2_marks = $_POST["mid_2_marks"];   
   @$Assigment_1 = $_POST["Assigment_1"];
   @$Assigment_2 = $_POST["Assigment_2"];
   @$project = $_POST["project"];
   @$Final = $_POST["Final"];
      

    $exists=false;
    if($exists==false){
       $sql = "INSERT INTO `marks` ( `sid`, `cid`,`mid_1_marks`,`mid_2_marks`,`Assigment_1`,`Assigment_2`,`project`,`Final`) VALUES ( '$sid', '$cid','$mid_1_marks', '$mid_2_marks', '$Assigment_1','$Assigment_2','$project','$Final')";
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

    <title>Marks Upload</title>
  </head>
  <body background="images/908/Teacher.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
    
  <?php require 'partial/sidebart.php' ?>

  <!-------------------Alert---------------------------------->
  <br><br><br>



    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/marks.php" method="post" style="width: 450px;"  >
 
     <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3">Upload Marks</h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >Student ID</label>
      <input type="text" class="form-control" id="sid" placeholder="Enter Student ID" name="sid" Required>
      </div>
 
      
     <!--------------------------- for course name------------------------------------->
     <div class="mb-3">
      <label for="id" class="form-label" >Course ID</label>
      <input type="text" class="form-control" id="cid" placeholder="Enter Course ID" name="cid" Required>
      </div>
 
       <!--------------------------- mid1 ------------------------------------->
       <div class="mb-3">
      <label for="id" class="form-label" >Mid 1 Marks</label>
      <input type="text" class="form-control" id="mid1" placeholder="Enter Mid 1 Marks" name="mid_1_marks">
      </div>
 
      <!--------------------------- mid2 ------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >Mid 2 Marks</label>
      <input type="text" class="form-control" id="mid2" placeholder="Enter Mid 2 Marks" name="mid_2_marks">
      </div>

     <!---------------------------  Assigment1 ------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label" >Assigment 1 Marks</label>
      <input type="text" class="form-control" id="Assigment_1" placeholder="Enter Assigment 1 Marks" name="Assigment_1">
      </div>
 
     <!---------------------------  Assigment2 ------------------------------------->
     <div class="mb-3">
      <label for="id" class="form-label" >Assigment 2 Marks</label>
      <input type="text" class="form-control" id="Assigment_2" placeholder="Enter Assigment 2 Marks" name="Assigment_2">
      </div>
 
         <!---------------------------  project ------------------------------------->
         <div class="mb-3">
      <label for="id" class="form-label" > Project Marks</label>
      <input type="text" class="form-control" id="mid1" placeholder="Enter Project Marks" name="project">
      </div>

          <!---------------------------  Final ------------------------------------->
          <div class="mb-3">
      <label for="id" class="form-label" >Final Marks</label>
      <input type="text" class="form-control" id="mid1" placeholder="Enter Final Marks" name="Final">
      </div>
 
        

    <!--------------------------- for button ------------------------------------->
    <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" > Upload Mark </button>
      </div> 
      
 
     </form>
 
  </div>



  <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Marks are uploaded
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>
