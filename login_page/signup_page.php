<?php

include "connect.php";
$r_success = false;
$r_error = false;
$remail_error = false;
$rpass_error = false;
$ruser_error = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  session_start();
$user = $_POST['user'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
$_SESSION['username']=  $user;
// $_SESSION['loggined'] = false;

if($password == $cpassword)
{ $sql =  "SELECT * FROM user WHERE user='$user'";
  $result = mysqli_query($con,$sql);
  if(!$result -> num_rows > 0){
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($con,$sql);
    if(!$result -> num_rows > 0)
      {
        $sql = "INSERT INTO user(user,email,pass,dt)
        VALUES('$user','$email','$password',current_timestamp())";
        $result = mysqli_query($con, $sql);
        if($result){
           $r_success = true;
            // $_SESSION['loggined'] = true;
            // sleep(2);
            // header("Location: ../user.php");
          }
          else{
            $r_error = true;
            }
          }
        else{
          $remail_error = true;
        } 
      }
      else{
        $ruser_error = true;
      }
  }
  else{
    $rpass_error = true;
  }
}
  
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c59ef8aa5a.js" crossorigin="anonymous"></script>
    <style>
        .alert
        {
          height: 25px;
           width: 100%;
          background: rgb(164, 255, 164);
        } 
        .alert p{
          position:relative;
          left: 30px;
        }  
      </style>
  </head>
  <body>

     <?php
     if($r_error){
      echo '<div class="alert">
      <p>Something went wrong </p>
    </div>';
    }
      if($r_success){
        echo '<div class="alert">
        <p> Regestration successfull </p>
      </div>';
      }
      if($ruser_error){
        echo '<div class="alert">
        <p> User already exist</p>
      </div>';
      }
      if($remail_error){
        echo '<div class="alert">
        <p> email already exist </p>
      </div>';
      }
      if($rpass_error){
        echo '<div class="alert">
        <p> Password Not Matched </p>
      </div>';
      }
      
    ?>
    <a href="../index.html"><i class="fa fa-times" aria-hidden="true"></i></a>

    <div class="center">
      <h1>SignUp</h1>
      <form  action="" method="post">
      <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>User</label>
        </div>
        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="cpassword" required>
          <span></span>
          <label>Conform Password</label>
        </div>

        <input type="submit" name="submit" value="Create">
        <div class="signup_link">
          Already have account? <a href="login_page.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>
