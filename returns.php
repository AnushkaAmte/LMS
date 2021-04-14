<?php
/* DELIMITER && CREATE PROCEDURE UpdateBookCount (IN isbn_no VARCHAR(100)) BEGIN
UPDATE qunatity = quantity -1
FROM books
WHERE books.isbn_no = isbn_no
END && DELIMITER; */
include('db_connect.php');
$roll_no = '';
$isbn_no = '';
$return_date = '';
$get_issue_data = 'SELECT dues,due_date FROM issues';
$data = mysqli_query($conn, $get_issue_data);
$dues_dates = mysqli_fetch_all($data, MYSQLI_ASSOC);
$errors = array('roll_no' => '', 'isbn_no' => '', 'return_date' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST['roll_no'])) {
        $errors['roll_no'] = "Roll number is required  <br />";
    } else {
        $roll_no = $_POST['roll_no'];
    }
    if (empty($_POST['isbn_no'])) {
        $errors['isbn_no'] = "ISBN Number is required  <br />";
    } else {
        $isbn_no = $_POST['isbn_no'];
    }
    if (empty($_POST['return_date'])) {
        $errors['return_date'] = "Return Date is required  <br />";
    } else {
        $return_date = $_POST['return_date'];
    }

    if (array_filter($errors)) {
        echo 'Please fill a valid response';
    } else {
        $roll_no = $_POST['roll_no'];
        $isbn_no =  $_POST['isbn_no'];
        $return_date = $_POST['return_date'];
        $duedate = strtotime($dues_dates['due_date']);
        $total_dues = $dues_dates['dues'];
        $retrundate = strtotime($return_date);
        $diff = $retrundate - $duedate / (3600 * 24);
        if ($diff > 0) {
            $total_dues = 10;
        }



        $sql = "UPDATE `issues` SET return_date='$return_date',dues='$total_dues' WHERE issues.roll_no= '$roll_no' AND issues.isbn_no='$isbn_no'
               
        ";
        //$sql1 = "CALL UpdateBookCount('$isbn_no')";
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'An error occured: ' . mysqli_error($conn);
        }
    }
}
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
        <form action="returns.php" method="POST" id='form'>

            <div class="col md-3 align-items-center">
                <div class="mb-3">
                    <label for="roll_no" class="form-label">Roll No</label>
                    <input type="number" class="form-control" id="roll_no" name='roll_no' value="<?php echo htmlspecialchars($roll_no); ?>" required>
                    <div class="invalid-feedback"><?php echo $errors['roll_no']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="isbn_no" class="form-label">ISBN No</label>
                    <input type="text" class="form-control" id="isbn_no" name='isbn_no' value="<?php echo htmlspecialchars($isbn_no); ?>" required>
                    <div class="invalid-feedback"><?php echo $errors['isbn_no']; ?></div>


                </div>
                <div class="mb-3">
                    <label for="return_date" class="form-label">Return Date</label>
                    <input type="text" class="form-control" name='return_date' value="<?php echo htmlspecialchars($return_date); ?>" required>
                    <div class="invalid-feedback"><?php echo $errors['return_date']; ?></div>

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