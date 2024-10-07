<!-------------------php scripts for connectivity----------------->
<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/dbconnect.php';

    // Check if sid is set in the POST data
    if (isset($_POST["sid"])) {
        $sid = $_POST["sid"];

        // Check if sid is not equal to 0
        if ($sid != 0) {
            // Use prepared statements to prevent SQL injection
            $sql = "DELETE FROM students WHERE sid = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $sid);
                $result = mysqli_stmt_execute($stmt);

                // Check if any rows were affected
                $rowsAffected = mysqli_stmt_affected_rows($stmt);

                if ($rowsAffected > 0) {
                    $showAlert = true;
                } else {
                    $showError = "Student not found in the database";
                }

                mysqli_stmt_close($stmt);
            } else {
                $showError = "Error preparing statement";
            }
        } else {
            $showError = "Invalid sid value";
        }
    } else {
        $showError = "Sid not set in POST data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        form {
            background: #333;
        }

        .mb-3 {
            color: white;
        }

        .p-3 {
            color: white;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <title>Delete Student</title>
</head>
<body background="images/908/sadmin.jpg"
      style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">

<!-------------------adding nav bar--------------------------->
<?php
session_start();
require 'partial/sidebar.php' ?>
<!------------------- nav bar--------------------------->

<!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">

    <form class="border shadow p-4 rounded " action="/dbproject/delstd.php" method="post" style="width: 450px;">

        <!--------------------------- for Heading ------------------------------------->
        <h4 class="text-center p-3">Delete student</h4>

        <!--------------------------- for user name------------------------------------->
        <div class="mb-3">
            <label for="id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="sid" placeholder="Enter User ID" name="sid" Required>
        </div>

        <!--------------------------- for button ------------------------------------->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit">Delete Student</button>
        </div>

    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-------------------Alert---------------------------------->
<?php
if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Student deleted !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
} else {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
}
?>
</body>
</html>
