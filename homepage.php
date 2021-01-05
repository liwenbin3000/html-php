<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$db = new database();
$db->connect($hostname,$username,$password,$dbname);
if (isset($_COOKIE["ID"]))	{	
			ini_set("session.cookie_lifetime","3600");
			session_start();
		echo"
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>新闻管理系统</title>
				<link rel='stylesheet' type='text/css' href='homepagestyle?v=1'>
			</head>
			<body>
			<div class='container'>
				<div id='head'>
					<div id='user'>
						<div id='login'>
							<span>"."{$_SESSION["username"]}"."</span>
							<a href='quit.php'><button id='logbutt'>退出登录</button></a>
						</div>
					</div>
				</div>
				<div id='wrapper'>
					<div id='today'>
						今日要闻<br/>";
						
						$db->getNewsTitle();
	echo"	
					</div>
				</div>
				</div>
			</body>
		</html>	
		"	;
}
else{
echo "<html>
		<head>
			<meta charset='UTF-8'>
			<title>新闻管理系统</title>
			<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=1'>
		</head>
		<body>
		<div class='container'>
			<div id='head'>
				<div id='user'>
					<div id='login'>
						<a href='login.php'><button id='logbutt'>登录</button></a>
					</div>
				</div>
			</div>
			<div id='wrapper'>
				<div id='today'>
					今日要闻<br/>";
					$db->getNewsTitle();
	echo"				
				</div>
				
			</div>
			</div>
		</body>
	</html>";
	
	$db->close();
}
