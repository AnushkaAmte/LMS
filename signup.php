<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$lib_name = $_POST['lib_name'];
		$lib_pass = $_POST['lib_pass'];

		if(!empty($lib_name) && !empty($lib_pass) && !is_numeric($lib_name))
		{

			//save to database
			$lib_id = random_num(20);
			$query = "insert into librarian (lib_id,lib_name,lib_pass) values ('$lib_id','$lib_name','$lib_pass')";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <style>
        body {
  				background-image: url('bg.jpg');
				background-repeat: no-repeat;
  				background-attachment: fixed;
				background-size: cover;
                
                
                
			 }
</style>
    <div class="wrapper">
      <div class="title">
Sign Up</div>
<form action="home.php">
        <div class="field">
          <input type="text" required>
          <label>Name</label>
        </div>
<div class="field">
          <input type="password" required>
          <label>Password</label>
        </div>

<div class="field">
          <input type="submit" value="Sign Up">
        </div>

</form>
</div>
</body>
</html>
