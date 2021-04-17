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

			//read from database
			$query = "select * from librarian where lib_name = '$lib_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['lib_pass'] === $lib_pass)
					{

						$_SESSION['lib_id'] = $user_data['lib_id'];
						header("Location: home.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
Login Form</div>
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
          <input type="submit" value="Login">
        </div>
<div class="signup-link">
Not a member? <a href="signup.php">Signup now</a></div>
</form>
</div>
</body>
</html>