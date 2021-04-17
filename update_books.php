<?php
include('db_connect.php');
$isbn_no = '';
$book_name = '';
$author = '';
$publisher = '';
$genre = '';
$quantity = 0;
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM `books` WHERE isbn_no='$id'";
    $result = mysqli_query($conn, $sql);
    $old_book = mysqli_fetch_assoc($result);


    $isbn_no = $old_book['isbn_no'];
    $book_name = $old_book['book_name'];
    $author = $old_book['author'];
    $publisher = $old_book['publisher'];
    $genre = $old_book['genre'];
    $quantity = (int)$old_book['quantity'];
}
$errors = array('isbn_no' => '', 'book_name' => '', 'author' => '', 'publisher' => '', 'genre' => '', 'quantity' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST['isbn_no'])) {
        $errors['isbn_no'] = "ISBN Number is required  <br />";
    } else {
        $isbn_no = $_POST['isbn_no'];
    }
    if (empty($_POST['book_name'])) {
        $errors['book_name'] = "Book name is required  <br />";
    } else {
        $book_name = $_POST['book_name'];
    }
    if (empty($_POST['author'])) {
        $errors['author'] = "Author's name is required  <br />";
    } else {
        $author = $_POST['author'];
    }
    if (empty($_POST['publisher'])) {
        $errors['publisher'] = "Publisher's name is required  <br />";
    } else {
        $publisher = $_POST['publisher'];
    }
    if (empty($_POST['genre'])) {
        $errors['genre'] = "Genre's name is required  <br />";
    } else {
        $genre = $_POST['genre'];
    }
    if (empty($_POST['quantity'])) {
        $errors['quantity'] = "Total amount of books available is required  <br />";
    } else {
        $quantity = $_POST['quantity'];
    }
    if (array_filter($errors)) {
        echo 'Please fill a valid response';
    } else {
        $isbn_no = mysqli_real_escape_string($conn, $_POST['isbn_no']);
        $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $quantity =  $_POST['quantity'];
        $genre = mysqli_real_escape_string($conn, $_POST['genre']);

        $sql = "UPDATE `books` SET book_name='$book_name',author='$author',publisher='$publisher',genre='$genre',quantity=$quantity WHERE isbn_no='$id'";

        if (mysqli_query($conn, $sql)) {
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
        <form action="update_books.php?id=<?php echo $id ?>" method="POST" id='form'>

            <div class="col md-3 align-items-center">
                <div class="mb-3">
                    <label for="isbn_no" class="form-label">ISBN Number</label>
                    <input type="text" class="form-control" name="isbn_no" value="<?php echo htmlspecialchars($isbn_no); ?>">
                    <div class="invalid-feedback"><?php echo $errors['isbn_no']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="book_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="book_name" value="<?php echo htmlspecialchars($book_name); ?>">
                    <div class="invalid-feedback"><?php echo $errors['book_name']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" value="<?php echo htmlspecialchars($author); ?>">
                    <div class="invalid-feedback"><?php echo $errors['author']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" name="publisher" value="<?php echo htmlspecialchars($publisher); ?>">
                    <div class="invalid-feedback"><?php echo $errors['publisher']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                    <div class="invalid-feedback"><?php echo $errors['quantity']; ?></div>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" name="genre" value="<?php echo htmlspecialchars($genre); ?>">
                    <div class="invalid-feedback"><?php echo $errors['genre']; ?></div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block" name='submit' value="submit">Update</button>
                </div>
            </div>
            <br>
        </form>
    </div>
    <br>
    <br>
</body>

</html>