
<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/dbconnect.php';
    @$tid = $_POST["tid"];
    @$password = $_POST["password"];
    @$fname = $_POST["fname"];
    @$lname = $_POST["lname"];
    @$city = $_POST["city"];
    @$cnic = $_POST["cnic"];
    @$pno = $_POST["pno"];

    $sql = "INSERT INTO `teachers` (`tid`, `fname`, `password`, `lname`, `cnic`, `pno`, `city`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "issssss", $tid, $fname, $password, $lname, $cnic, $pno, $city);

       
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $showAlert = true;
        } else {
            if (mysqli_errno($conn) == 1062) {
                $showError = "User ID already exists. Please choose a different User ID.";
            } else {
                $showError = "Error adding teacher record";
            }
        }

        mysqli_stmt_close($stmt);
    } else {
        $showError = "Error preparing statement";
    }
}
?>


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
    <!doctype html>
    <html lang="en">
    
    <head>
      <title>Title</title>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    </head>
    
    <body background="images/908/sadmin.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">

      <header>
  <?php
        session_start();
        // $id = $_SESSION['id'];
  require 'partial/sidebar.php' ?>
    

      </header>
      <main>
    

   



<div class="container d-flex justify-content-center align-items-center mt-3 " style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/addtech.php" method="post" style="width: 450px;"  >
 
      <h4 class="text-center p-3">ADD Teacher</h4> 
     

 
      <div class="mb-3">
      <label for="id" class="form-label" >User ID</label>
      <input type="text" class="form-control" id="tid" placeholder="Enter User ID" name="tid" Required>
      </div>
 
      <div class="mb-3">
      <label for="password" class="form-label" >Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" Required>
      </div>

      
     <div class="mb-3">
      <label for="fname" class="form-label" >First Name</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" Required>
      </div>
   
      
     <div class="mb-3">
      <label for="lname" class="form-label" >Last Name</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" Required>
      </div>
     

     <div class="mb-3">
      <label for="city" class="form-label" >city</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city" Required>
      </div>

     <div class="mb-3">
      <label for="cnic" class="form-label" >Cnic</label>
      <input type="text" class="form-control" id="cnic" placeholder="Enter cnic" name="cnic" Required>
      </div>

     <div class="mb-3">
      <label for="phone" class="form-label" >Phone</label>
      <input type="text" class="form-control" id="pno" placeholder="Enter phone no" name="pno" Required>
      </div>


      <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" >ADD Teacher</button>
      </div> 
      
      
      
 
     </form>
 
  </div>

      </main>
      <footer>
       
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
      </script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
    </body>
    
    </html>

  <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> teacher record added successfully !!! 
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
