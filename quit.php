<?php
setcookie("ID", "");

session_start();
session_unset();
session_destroy();
header("Location:homepage.php");
?>