<?php
include('db_connect.php');
$get_issue = 'SELECT issues.*,books.*, users.* FROM issues,books,users WHERE books.isbn_no=issues.isbn_no AND users.roll_no=issues.roll_no';
/* $get_user = 'SELECT user_name FROM users INNER JOIN ON issues ON users.roll_no=issues.roll_no';
$get_book = 'SELECT book_name FROM books INNER JOIN ON issues ON books.isbn_no=issues.isbn_no'; */
$issue_data = mysqli_query($conn, $get_issue);
/* $book_data = mysqli_query($conn, $get_book);
$user_data = mysqli_query($conn, $get_user); */
$issues = mysqli_fetch_all($issue_data, MYSQLI_ASSOC);
/* $book_names = mysqli_fetch_all($book_data, MYSQLI_ASSOC);
$user_names = mysqli_fetch_all($user_data, MYSQLI_ASSOC); */

mysqli_free_result($issue_data);
/* mysqli_free_result($book_data);
mysqli_free_result($user_data); */

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
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>