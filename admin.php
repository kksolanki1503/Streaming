<?php
//database details. You have created these details in the third step. Use your own.
include('login_page/connect.php');
//check connection if it is working or not

if(isset($_POST['submit']))
{
    $nam = $_POST['nam'];
    $src = $_POST['src'];
    

    $sql = "SELECT * FROM anime WHERE nam ='$nam'";
    $result = mysqli_query($con,$sql);
  if(!$result -> num_rows > 0)
  {
    $sql = "INSERT INTO anime(nam,src)
        VALUES('$nam','$src')";
    $result = mysqli_query($con, $sql);
    if($result){
    echo"<script>alert('regestration successfull')</script>";
    }
    else{
    echo"<script>alert('Something went wront')</script>";

    }
  }
  else{
    echo"<script>alert('anime already exiest')</script>";
  }
}



?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="admin.php" method="POST">
        <label for="nam">Name:</label>
        <input type="text" name="nam" value="">
        <br>
        <label for="src">Img-src:</label>
        <input type="text" name="src" value="">
        <br>
        <input type="submit" name="submit" value="Create">
        </form>
        <script></script>
       
    </body>
</html>