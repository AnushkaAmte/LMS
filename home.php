<?php
include('db_connect.php');

$get_books = 'SELECT * FROM books LIMIT 10';
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

    <title>Document</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <br>
    <h4 class="center">Popular Books</h4>
    <div class="container">
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($book['book_name']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($book['author']); ?></h6>
                            <p class="card-text"> <?php echo htmlspecialchars($book['publisher']); ?></p>
                            <p class="card-text"> <?php echo htmlspecialchars($book['genre']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>