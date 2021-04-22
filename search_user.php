<?php
$result = [];
$users;
include('db_connect.php');
if (isset($_GET['roll_no'])) {
    if (count($_GET) > 0) {
        $roll_no = $_GET['roll_no'];
        $get_users = "SELECT * FROM `users` WHERE  roll_no = $roll_no";
        $result = mysqli_query($conn, $get_users);
        $users = mysqli_fetch_assoc($result);
    } else {
        echo "No such user exists. Make sure you entered the correct roll no.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico">
</head>
<html>

<body>
    <?php include('navbar.php'); ?>
    <div class="card card-body">
        <table class="table table-sm">
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Email</th>

            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['roll_no']); ?></td>
                    <td><?php echo htmlspecialchars($user['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($user['department']); ?></td>
                    <td><?php echo htmlspecialchars($user['semester']); ?></td>
                    <td><?php echo htmlspecialchars($user['email_id']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>