<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$db = new database();
$db->connect($hostname,$username,$password,$dbname);

if(isset($_POST['submit']))
{
	$newpassword=$_POST['password'];
	session_start();
	$db->changepassword($_SESSION['id'],$newpassword);
	 header("Location:homepage.php");
}
else{
echo"
<html>
<head>
    <meta charset='UTF-8'>
    <title>新闻管理系统</title>
    <link rel='stylesheet' type='text/css' href='mystyle.css?v=2'>
    <script src='myScript.js'></script>

</head>
<body>

<div class='container'>
    <form action='changepassword.php' method='post' class='login-form'>
        <h2>修改密码</h2>      
        <input type='password' name='password' placeholder='新密码' onblur='ajaxRequest1(this)'/>
        <span id='password_1'>&nbsp</span>
        <input type='password' name='password-confirm' placeholder='再次输入一样的密码' onblur='ajaxRequest1(this)'/>
        <span id='password_confirm_1'>&nbsp</span>
        <button type='submit' id='submit' name='submit'>修改</button>
        <a href='homepage.php'>返回主页</a>
    </form>
    <script type='text/javascript'>
        subObj = document.getElementById('submit');
        if (subObj.addEventListener) {
            subObj.addEventListener('click', validateAll1, false)
        } else {
            subObj.attachEvent('onclick', validateAll1)
        }
    </script>
</div>
</body>
</html>
";}
?>