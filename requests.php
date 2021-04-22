<?php
/* 
DELIMITER $$

CREATE TRIGGER IF NOT EXISTS update_book_count
AFTER INSERT
ON issues FOR EACH ROW
BEGIN
    UPDATE books SET quantity=quantity-1 WHERE books.isbn_no=issues.isbn_no;
    
END$$

DELIMITER ;
 */
include('db_connect.php');
$roll_no = '';
$isbn_no = '';
$issue_date = '';
$due_date = '';
$errors = array('roll_no' => '', 'isbn_no' => '', 'issue_date' => '');
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
    if (empty($_POST['issue_date'])) {
        $errors['issue_date'] = "Issue Date is required  <br />";
    } else {
        $issue_date = $_POST['issue_date'];
        $date = new DateTime($issue_date);
        $date->modify('+7 day');
        $due_date = $date->format('Y-m-d');
    }

    if (array_filter($errors)) {
        echo 'Please fill a valid response';
    } else {
        $roll_no = $_POST['roll_no'];
        $isbn_no =  $_POST['isbn_no'];
        $issue_date = $_POST['issue_date'];
        $date = new DateTime($issue_date);
        $date->modify('+7 day');
        $due_date = $date->format('Y-m-d');


        /* $sql = " DELIMITER $$ 
        CREATE TRIGGER `update_book_count`
        AFTER INSERT
        ON `issues`
        BEGIN
            UPDATE `books` SET quantity= quantity-1 WHERE books.isbn_no=issues.isbn_no;
            
        END
        $$

        DELIMITER ;
        "; */
        //mysqli_query($conn, $sql);
        $sql1 = "INSERT INTO `issues` (roll_no,isbn_no,issue_date,due_date) VALUES ('$roll_no','$isbn_no','$issue_date','$due_date');";
        //$sql1 = "CALL UpdateBookCount('$isbn_no')";
        if (mysqli_query($conn, $sql1)) {
            header('Location: home.php');
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
        <form action="requests.php" method="POST" id='form'>

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
                    <label for="roll_no" class="form-label">Issue Date</label>
                    <input type="text" class="form-control" name='issue_date' value="<?php echo htmlspecialchars($issue_date); ?>" required>
                    <div class="invalid-feedback"><?php echo $errors['issue_date']; ?></div>

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