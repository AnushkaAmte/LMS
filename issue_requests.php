<?php
include('db_connect.php');


mysqli_close($conn);
//print_r($books);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <br>
    <h4 class="center">Issue Requests</h4>
    <div class="row">
        <div class="col">

            <div class="card card-body">
                <table class="table table-sm">
                    <tr>
                        <th>Roll No</th>
                        <th>User Name</th>
                        <th>Book Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Dues</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>
            </div>
        </div>
</body>

</html>