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
    <div class="wrapper">
      <div class="title">
Login Form</div>
<form action="#">
        <div class="field">
          <input type="text" required>
          <label></label>
        </div>
<div class="field">
          <input type="password" required>
          <label>Password</label>
        </div>
<div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div>
<div class="field">
          <input type="submit" value="Login">
        </div>
<div class="signup-link">
Not a member? <a href="#">Signup now</a></div>
</form>
</div>
</body>
</html>
