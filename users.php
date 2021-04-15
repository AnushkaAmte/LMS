<?php
include('db_connect.php');

$get_users = 'SELECT * FROM users';
$users_data = mysqli_query($conn, $get_users);
$users = mysqli_fetch_all($users_data, MYSQLI_ASSOC);

mysqli_free_result($users_data);
mysqli_close($conn);
//print_r($books);
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

    <div class="row">
        <div class="col">
            <h5>Users:</h5>

            <div class="card card-body">
                <table class="table table-sm">
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Dues</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['roll_no']); ?></td>
                            <td><?php echo htmlspecialchars($user['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['department']); ?></td>
                            <td><?php echo htmlspecialchars($user['semester']); ?></td>
                            <td></td>
                            <!-- add dues -->
                            <td><a href="update_users.php?id=<?php echo $user['roll_no'] ?>" class="btn btn-sm btn-outline-primary">Update</a></td>
                            <td><a href="" class="btn btn-sm btn-outline-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>