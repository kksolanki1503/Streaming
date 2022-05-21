<?php
include 'connect.php';


$lemail_error = false;
if(isset($_POST['submit']))
{ echo 'start';
 
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
  $result = mysqli_query($con,$sql);
  echo "123";
  if($result ->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    session_start();
    echo "hello";
    $_SESSION['username'] =  $row['user'];
    $_SESSION['loggined'] = true;
    header("Location: ../user.php");
  }
  else{
    $lemail_error = true;
  }

}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
     if($lemail_error){
      echo '<div class="alert">
      <p>Email and password not matched</p>
    </div>';
    }
    ?>
    <a href="../index.html"><i class="fa fa-times" aria-hidden="true"></i></a>
    <div class="center">
      <h1>Login</h1>
      <form  action="" method="post">
        <div class="txt_field">
          <input type="text" name="email"required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="signup_page.php">Signup</a>
        </div>
      </form>
    </div>

    
  </body>
</html>
