<?php

session_start();

if(isset($_SESSION['lib_id']))
{
	unset($_SESSION['lib_id']);

}

header("Location: index.php");
die;