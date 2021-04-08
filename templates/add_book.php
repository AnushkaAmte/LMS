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
        <form action="add_book.php" method="GET" id='form'>

            <div class="col md-3 align-items-center">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ISBN Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='isbn' required>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='book_name' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='author_name' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Publisher</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='publisher' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='quantity' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='genre' required>
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
    <br>
</body>

</html>