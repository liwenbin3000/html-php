<?php
//登陆后台
if (isset($_POST["submit"])) {
    include "database.php";
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'class';

    $account = $_POST["username"];
    $account_password = $_POST["password"];
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    $db = new database();
    $db->connect($hostname, $username, $password, $dbname);
	//判断登录是否有效
    if ($db->checkPeople($account, $account_password) == "用户名不存在") {
        $tip = "用户名不存在";
    } else if ($db->checkPeople($account, $account_password) == "密码错误") {
        $tip = "密码错误";
    } else {
        $id = $db->checkPeople($account, $account_password);
        ini_set("session.cookie_lifetime", "3600");
        session_start();
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $db->getPeopleName($id);
        setcookie("ID", session_id(), time() + 3600);
        if ($type == 0) {
            header("Location:homepage.php");
        } else {
            header("Location:news.php?newsId=$type");
        }
    }
  //输入登陆错误信息界面
    echo
    "		<html>
		<head>
		    <meta charset='UTF-8'>
		    <title>新闻管理系统</title>
		    <link rel='stylesheet' type='text/css' href='mystyle.css?v=2'>
			<script src='myScript.js'></script>
		</head>
		<body>
		    <div class='container'>
		        <form action='' method='post' class='login-form'>
		            <h2>登陆</h2>
		                <input type='text' name='username' placeholder='用户名'>
		                <span>&nbsp</span>
		                <input type='password' name='password' placeholder='密码'/>
		                <span id='tip'>$tip</span>
		                <button type='submit' name='submit'>登录</button>
		                <a href='signup.html'>注册</a>
		        </form>
		    </div>
		</body>
		</html>";
}
 //输入登录信息的界面
 else {
    echo
    "<html>
<head>
    <meta charset='UTF-8'>
    <title>新闻管理系统</title>
    <link rel='stylesheet' type='text/css' href='mystyle.css?v=2'>
	<script src='myScript.js'></script>
</head>
<body>
    <div class='container'>
        <form action='' method='post' class='login-form'>
            <h2>登陆</h2>
                <input type='text' name='username' placeholder='用户名'>
                <span>&nbsp</span>
                <input type='password' name='password' placeholder='密码'/>
                <span id='tip'>&nbsp</span>
                <button type='submit' name='submit'>登录</button>
                <a href='signup.html'>注册</a>
        </form>
    </div>
</body>
</html>";
}
?>