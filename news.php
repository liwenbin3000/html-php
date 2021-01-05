<?php

include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$newsid=$_GET['newsId'];

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
				<link rel='stylesheet' type='text/css' href='homepagestyle.css'>
			</head>
			<body>
				<div id='head'>
					<div id='user'>
						<div id='login'>
							<p>"."{$_SESSION["username"]}"."</p>
							<a href='quit.php'>退出登录</a>
						</div>
					</div>
				</div>
				<div id='wrapper'>
					<div id='today'>";
						
						$db->getNewsContent($newsid);
	echo"	
					</div>
				</div>
				<div id='discussion_area'>";
				    $db->getComments($newsid);
	echo"
				</div>
				
				<div id='comment_area'>
				<form>
				<input type='texteara'></input>
				 <input type='button' value='发表评论' onclick='myFunction()'></input>
				</form>
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
			<link rel='stylesheet' type='text/css' href='homepagestyle.css'>
			<script type='text/javascript'>
			function myFunction(){
				if (".!isset($_COOKIE['ID'])."){
					alert('请先登录再发表评论');
					window.location.href='login.php';
				}
			}
			</script>
		</head>
		<body>
			<div id='head'>
				<div id='user'>
					<div id='login'>
						<a href='login.php'>登录</a>
					</div>
				</div>
			</div>
			<div id='wrapper'>
				<div id='today'>";
					$db->getNewsContent($newsid);
	echo"				
				</div>
				
			</div>
			<div id='discussion_area'>
			</div>
			
			<div id='comment_area'>
			<form>
			 <input type='texteara'></input>
			 <input type='button' value='发表评论' onclick='myFunction()'></input>
			</form>
			</div>
		</body>
	</html>";
	
	$db->close();
}
?>