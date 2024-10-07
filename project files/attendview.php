
<?php   
 include 'partial/dbconnect.php'; 

session_start();




 $sid = $_SESSION['sid'];


 $query = "select s.sid,s.cid,c.cname,s.Presence,s.hours,s.date from attendances s,course c where sid='$sid' AND c.cid=s.cid";  //join
 $run = mysqli_query($conn,$query);  
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

    <title>view attendance</title>
  </head>
  <body background="images/908/student3.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
    

  <?php require 'partial/sidebarstd.php' ?>


  <br><br><br>
    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "    >
 
     
    
         <!--------------------------- for user name------------------------------------->
         <div class="mb-3">
      <label for="id" class="form-label" >Your ID : </label>  <?php echo "$sid"; ?> 
     
      <!-- <input type="text" class="form-control" id="sid" placeholder="Enter your ID" name="sid"> -->
      </div>
 
      
      
     <!--------------------------- for button ------------------------------------->
      <!-- <div class="mb-3">
     <a> <button type="submit" class="btn btn-primary" >Enter</button></a>
      </div>  -->
      
    
    
    <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3">Attendence </h4> 
      
     
      <div class="mb-3">
      <table border="6" cellspacing="0" cellpadding="0" class="table table-light table-striped">  
      <tr class="mb3">  
           <th class="mb3">SNo</th>  
           <!-- <th class="mb3">SID</th>   -->
           <th class="mb3">CID</th>
           <th class="mb3">Cname</th>  
           <th class="mb3">Presence</th>  
           <th class="mb3">Hour</th>  
           <th class="mb3">Date</th>  
          
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['cid']."</td>  
                               <td>".$result['cname']."</td>  
                               <td>".$result['Presence']."</td>  
                               <td>".$result['hours']."</td>  
                               <td>".$result['date']."</td>    
                          </tr>  
                     ";  
                }  
           }  
      ?>  
 </table>  


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
    
</body>
</html>