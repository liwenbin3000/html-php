<?php
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
					<div id='today'>
						今日要闻
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
			<link rel='stylesheet' type='text/css' href='homepagestyle.css'>
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
				<div id='today'>
					今日要闻
				</div>
				
			</div>
		</body>
	</html>";
}
?>