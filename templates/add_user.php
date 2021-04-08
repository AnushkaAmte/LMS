<?php?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>



<body>
    <?php include('../components/navbar.php'); ?>
    <div class="card" style="width: 30rem; margin:auto; padding: 10px;">
        <form action="add_user.php" method="GET" id='form'>

            <div class="col md-3 align-items-center">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name='user_email' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='user_name' required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Roll Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='roll_no' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Department</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='department' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='semester' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Dues</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='dues' required>
                </div>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
            <br>
        </form>
    </div>
    <br>

</body>

</html>