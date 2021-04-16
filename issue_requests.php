<?php
include('db_connect.php');
if (isset($_POST['delete'])) {

    $id_to_delete = $_POST['id_to_delete'];

    $sql = "DELETE FROM issues WHERE roll_no = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
$get_issue = 'SELECT issues.*,books.*, users.* FROM issues,books,users WHERE books.isbn_no=issues.isbn_no AND users.roll_no=issues.roll_no';

$issue_data = mysqli_query($conn, $get_issue);

$issues = mysqli_fetch_all($issue_data, MYSQLI_ASSOC);


mysqli_free_result($issue_data);


mysqli_close($conn);

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
                        <th>Clear</th>
                    </tr>
                    <?php foreach ($issues as $issue) :
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($issue['roll_no']); ?></td>
                            <td><?php echo htmlspecialchars($issue['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($issue['book_name']); ?></td>
                            <td><?php echo htmlspecialchars($issue['issue_date']); ?></td>
                            <td><?php echo htmlspecialchars($issue['due_date']); ?></td>
                            <td><?php echo htmlspecialchars($issue['return_date']); ?></td>
                            <td><?php echo htmlspecialchars($issue['dues']); ?></td>
                            <td>
                                <form action="issue_requests.php" method="POST">
                                    <input type="hidden" name="id_to_delete" value="<?php echo $issue['roll_no']; ?>">
                                    <input type="submit" name="delete" value="Clear" class="btn btn-sm btn-outline-primary">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>