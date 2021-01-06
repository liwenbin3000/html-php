<?php

include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$newsid=$_GET['newsId'];

$db = new database();
$db->connect($hostname,$username,$password,$dbname);
//登陆后界面
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
					<div id='today'>";
						
						$db->getNewsContent($newsid);
	echo"	
					</div>
				</div>
				<div id='discussion_area'>
	                <table>
	                <tr>
	                <td>
	                <p>评论</p>
</td>
</tr>";

				    $db->getComments($newsid);
	echo"
                    </table>
				</div>
				
				<div id='comment_area'>
				<form action='solvecomment.php' method='post'>
				<input type='texteara' name='comment'></input>
				<input type='hidden' name='newsid' value=".$newsid."></input>
				<input type='hidden' name='account' value=".$_SESSION["username"]."></input>
				
				<input type='submit' value='发表评论'></input>
				</form>
				</div>
				</div>
				<div>
					<a href='homepage.php?ID=".$newsid."'>返回主页</a>
				</div>
			</body>
		</html>	
		"	;
}
//未登录界面
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
					window.location.href='login.php?type=$newsid';
				}
			}
			</script>
		</head>
		<body>
		<div class='container'>
			<div id='head'>
				<div id='user'>
					<div id='login'>
						<a href='login.php?'><button id='logbutt'>登录</button></a>
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
			<table>
	                <tr>
	                <td>
	                <p>评论</p>
	                </td>
	                </tr>";
    $db->getComments($newsid);
    echo"</table></div>
			
			<div id='comment_area'>
			<form>
			 <input type='texteara' id='comment_text'></input>
			 <input type='button' value='发表评论' onclick='myFunction()'></input>
			</form>
			</div>
			</div>
			<div>
				<a href='homepage.php'>返回主页</a>
			</div>
		</body>
	</html>";
	
	$db->close();
}
?>