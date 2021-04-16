<?php
include('db_connect.php');
if (isset($_POST['delete'])) {

    $id_to_delete = $_POST['id_to_delete'];

    $sql = "DELETE FROM users WHERE roll_no = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
$get_users = 'SELECT * FROM users ORDER BY roll_no ASC';
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
                        <th>Email</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['roll_no']); ?></td>
                            <td><?php echo htmlspecialchars($user['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['department']); ?></td>
                            <td><?php echo htmlspecialchars($user['semester']); ?></td>
                            <td><?php echo htmlspecialchars($user['email_id']); ?></td>

                            <td><a href="update_users.php?id=<?php echo $user['roll_no'] ?>" class="btn btn-sm btn-outline-primary">Update</a></td>
                            <td>
                                <form action="users.php" method="POST">
                                    <input type="hidden" name="id_to_delete" value="<?php echo $user['roll_no']; ?>">
                                    <input type="submit" name="delete" value="Delete" class="btn btn-sm btn-outline-danger">
                                </form>
                            </td>
                            <!-- <td><a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal">Delete</a></td> -->
                        </tr>
                        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the user?<br>
                                        Please make sure all issues and dues are cleared!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <form action="users.php" method="POST">
                                            <input type="hidden" name="id_to_delete" value="<?php echo $user['roll_no']; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
</body>

</html>