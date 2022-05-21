<?php
session_start();
$_SESSION['loggined'] =false;
session_unset();
session_destroy();

header('location:login_page.php');
exit;


?>