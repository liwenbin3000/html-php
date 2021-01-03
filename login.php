<?php
if(isset($_POST["submit"])){
	include "database.php";
	$hostname='localhost';
	$username='root';
	$password='';
	$dbname='class';

	$account=$_POST["username"];
	$account_password=$_POST["password"];

	$db = new database();
	$db->connect($hostname,$username,$password,$dbname);
	if($db->checkPeople($account,$account_password)=="用户名不存在"){
		$tip="用户名不存在";
	}else if($db->checkPeople($account,$account_password)=="密码错误"){
		$tip="密码错误";
	}else{
		$id=$db->checkPeople($account,$account_password);
	     header("Location:homepage.html?ID=$id");
	}
	
echo 
"		<html>
		<head>
		    <meta charset='UTF-8'>
		    <title>新闻管理系统</title>
		    <link rel='stylesheet' type='text/css' href='mystyle.css'>
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
}else{
echo 
"<html>
<head>
    <meta charset='UTF-8'>
    <title>新闻管理系统</title>
    <link rel='stylesheet' type='text/css' href='mystyle.css'>
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