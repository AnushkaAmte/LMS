<?php
include('db_connect.php');
/* $email_id = '';
$user_name = '';
$roll_no = '';
$department = '';
$semester = '';
$errors = array('email_id' => '', 'user_name' => '', 'roll_no' => '', 'department' => '', 'semester' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST['email_id'])) {
        $errors['email_id'] = "Email ID is required  <br />";
    } else {
        $email_id = $_POST['email_id'];
    }
    if (empty($_POST['user_name'])) {
        $errors['user_name'] = "User name is required  <br />";
    } else {
        $user_name = $_POST['user_name'];
    }
    if (empty($_POST['roll_no'])) {
        $errors['roll_no'] = "Roll Number is required  <br />";
    } else {
        $roll_no = $_POST['roll_no'];
    }
    if (empty($_POST['department'])) {
        $errors['department'] = "Department's name is required  <br />";
    } else {
        $department = $_POST['department'];
    }
    if (empty($_POST['semester'])) {
        $errors['semester'] = "Semester is required  <br />";
    } else {
        $semester = $_POST['semester'];
    }

    if (array_filter($errors)) {
        echo 'Please fill a valid response';
    } else {
        $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $roll_no = $_POST['roll_no'];
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $semester =  $_POST['semester'];


        $sql = "INSERT INTO `users` (email_id,user_name,roll_no,department,semester) VALUES ('$email_id','$user_name','$roll_no','$department','$semester')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'An error occured: ' . mysqli_error($conn);
        }
    }
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>
    <?php include('navbar.php'); ?>
    <div class="card" style="width: 30rem; margin:auto; padding: 10px;">
        <form action="requests.php" method="POST" id='form'>

            <div class="col md-3 align-items-center">
                <div class="mb-3">
                    <label for="roll_no" class="form-label">Roll No</label>
                    <input type="number" class="form-control" id="roll_no" name='roll_no' value="" required>

                </div>
                <div class="mb-3">
                    <label for="isbn_no" class="form-label">ISBN No</label>
                    <input type="text" class="form-control" id="isbn_no" name='isbn_no' value="" required>


                </div>
                <div class="mb-3">
                    <label for="roll_no" class="form-label">Issue Date</label>
                    <input type="text" class="form-control" name='issue_date' value="" required>

                </div>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                </div>
            </div>
            <br>
        </form>
    </div>
    <br>

</body>

</html>