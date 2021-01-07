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
	$admin=$db->getAdmin($_SESSION["id"]);
		echo"
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>新闻管理系统</title>
				<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=2'>
			</head>
			<body>
			<div class='container'>
				<div id='head'>	
				<div id='homebutt'>		
				<ul>
						<li>
						<a href='homepage.php'>返回主页</a>
</li></ul></div>
				
					<div id='user'>
						<div id='login'>
							<ul>
						<li>
						<a href='#'>"."{$_SESSION["username"]}"."</a>
    </li>
    <li><a href='quit.php'>退出登录</a></li>
    </ul>
						</div>
					</div>
				</div>
				<div id='wrapper'>
					<div id='today'>";
						
						$db->getNewsContent($newsid);
	echo"	
					</div>
				</div>
				<div id='discussion_area'><table>
	                <tr>
	                <td>
	                <p>评论</p>
</td>
</tr>";
                if ($admin==0){
				    $db->getComments($newsid);}
				else{$db->getCommentsAdmin($newsid);}
	echo"
                    </table>
				</div>
				
				<div id='comment_area'>
				<form action='solvecomment.php' method='post'>
				<textarea name='comment' id='comment_text'></textarea>
				<input type='hidden' name='newsid' value=".$newsid."></input>
				<input type='hidden' name='account' value=".$_SESSION["username"]."></input>
				
				<input type='submit' value='发表评论' id='commentbutt'></input>
				</form>
				</div>
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
			<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=2'>
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
						<div id='homebutt'>
						<ul>
						<li>
						<a href='homepage.php'>返回主页</a>
</li></ul>
				
			</div>
				<div id='user'>
					<div id='login'>
						                        <ul><li>
                        <a href='login.php'>登录</a>
                        </li></ul>
					</div>
				</div>
			</div>
			<div id='wrapper'>
				<div id='today'>";
					$db->getNewsContent($newsid);
	echo"				
				</div>
				
			</div>
			<div id='discussion_area'><table>
	                <tr>
	                <td>
	                <p>评论</p>
	                </td>
	                </tr>";
    $db->getComments($newsid);
    echo"</table></div>
			
			<div id='comment_area'>
			<form>
			 <textarea id='comment_text'></textarea>
			 <input type='button' value='发表评论' onclick='myFunction()' id='commentbutt'></input>
			</form>
			</div>
			</div>

		</body>
	</html>";
	
	$db->close();
}
?>