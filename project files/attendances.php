<?php
session_start();
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/dbconnect.php';

    @$sid = $_POST["sid"];
    @$cid = $_POST["cid"];
    @$pr = $_POST["pr"];
    @$hr = $_POST["hr"];
    @$da = $_POST["da"];

    $checkStudentQuery = "SELECT * FROM students WHERE sid='$sid'";
    $resultStudent = mysqli_query($conn, $checkStudentQuery);

    $checkCourseQuery = "SELECT * FROM courses WHERE cid='$cid'";
    $resultCourse = mysqli_query($conn, $checkCourseQuery);

    if (mysqli_num_rows($resultStudent) > 0 && mysqli_num_rows($resultCourse) > 0) {
       
        $sql = "INSERT INTO `attendances` (`sid`, `cid`, `Presence`, `hours`, `date`) VALUES ('$sid', '$cid', '$pr', '$hr', '$da')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
        }
    } else {
        $showError = "Invalid Student ID or Course ID";
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
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Mark Attendance</title>
</head>
<body background="images/908/Teacher.jpg"
      style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">

<br><br><br>

<?php require 'partial/sidebart.php' ?>

<?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Attendance marked !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
}
?>

<br><br><br>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">

    <form class="border shadow p-4 rounded" action="/dbproject/attendances.php" method="post" style="width: 450px;">

        <h4 class="text-center p-3">Attendance</h4>

        <div class="mb-3">
            <label for="id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="sid" placeholder="Enter Student ID" name="sid" Required>
        </div>

        <div class="mb-3">
            <label for="id" class="form-label">Course ID</label>
            <input type="text" class="form-control" id="cid" placeholder="Enter Course ID" name="cid" Required>
        </div>

        <div class="mb-3">
            <label for="disabledSelect" class="form-label">Date</label>
            <input type="date" class="form-control" name="da">
        </div>

        <div class="mb-3">
            <label for="disabledSelect" class="form-label">Presence</label>
            <select id="pr" class="form-select" name="pr">
                <option>A</option>
                <option>P</option>
                <option>L</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="disabledSelect" class="form-label">No Hours</label>
            <select id="hr" class="form-select" name="hr">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit">Mark Attendance</button>
        </div>

    </form>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
