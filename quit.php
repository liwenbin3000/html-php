<?php
//退出登录后台
setcookie("ID", "");

session_start();
session_unset();
session_destroy();
header("Location:homepage.php");
?>