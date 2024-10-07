
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



<link rel="stylesheet" type="text/css" href="offcanvas.css">

<div class="sidebar-nav">

    <nav class="navbar navbar-dark bg-dark fixed-top">

        <div class="container">

            <!-- Mobile Menu Toggle Button -->

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">

                <span class="navbar-toggler-icon"></span>

            </button>



            <!-- Menus List -->

            <div class="bg-light offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

              <div class="offcanvas-body bg-dark">
                    

              <a class="navbar-brand" href="#">Student Panel</a>
              <hr>

                    <ul class="navbar-nav">



                        <li><a class="nav-link" href="/dbproject/attendview.php"> <span class="item-text">view Attendence</span></a></li>

                        <li><a class="nav-link" href="/dbproject/markview.php"><span class="item-text">view Marks</span></a></li>

                        
                        <li><a class="nav-link" href="/dbproject/coursereg.php"><span class="item-text">Course Registration</span></a></li>
                     
                    
                        <li><hr class="dropdown-divider"></li>

                        <li><a class="nav-link" href="/dbproject/home.php" ><span class="item-text" color="black">Log Out</span></a></li>

                    </ul>

              </div>

            </div>



            <div class="btn-group " >

                <a href="#" class=" text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">

                    
                Account - <?php echo $_SESSION['sid']?>
                    

                </a>

      

            </div>



        </div>

</div>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>