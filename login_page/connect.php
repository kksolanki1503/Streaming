<?php
//database details. You have created these details in the third step. Use your own.
$host = "localhost";
$username = "root";
$pass = "5200";
$dbname = "anime_db";
//create connection
$con = mysqli_connect($host, $username, $pass, $dbname,8111);
//check connection if it is working or not
if (!$con)
{
echo "<script>alert('connection failed!')</script>";
}

?>