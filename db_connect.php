<?php
$conn = mysqli_connect('localhost', 'anushka', 'anushka', 'lms');

if (!$conn) {
    echo 'SQL connection failed ' . mysqli_connect_error();
}
