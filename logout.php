<?php


session_start();
unset($_SESSION["setemail"]);
unset($_SESSION['username']);
unset($_SESSION["setpictures"]);
unset($_SESSION["useraccess"]);
session_destroy();
header('Location:index.php');

?>