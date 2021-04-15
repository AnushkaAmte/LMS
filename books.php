<?php
include('db_connect.php');

$get_books = 'SELECT * FROM books  LIMIT 10';
$books_data = mysqli_query($conn, $get_books);
$books = mysqli_fetch_all($books_data, MYSQLI_ASSOC);

mysqli_free_result($books_data);
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
            <h5>Books📚:</h5>

            <div class="card card-body">
                <table class="table table-sm">
                    <tr>
                        <th>ISBN No</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Genre</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['isbn_no']); ?></td>
                            <td><?php echo htmlspecialchars($book['book_name']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td><?php echo htmlspecialchars($book['publisher']); ?></td>
                            <td><?php echo htmlspecialchars($book['genre']); ?></td>
                            <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                            <td><a href="update_books.php?id=<?php echo $book['isbn_no'] ?>" class="btn btn-sm btn-outline-primary">Update</a></td>
                            <td><a href="" class="btn btn-sm btn-outline-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>