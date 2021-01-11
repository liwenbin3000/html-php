<?php
//管理员管理界面
include "database.php";
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'class';

$db = new database();
$db->connect($hostname, $username, $password, $dbname);
session_start();
echo "
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>新闻管理系统</title>
				<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=2'>
				<script src='myScript.js'></script>
			</head>
			<body>
			<div class='container'>
				<div id='head'>
					<div id='user'>
					<ul>
						<li><a href='#'>" . "{$_SESSION["username"]}" . "</a></li>
						<li><a href='quit.php'>退出登录</a></li>
						<li><a href='homepage.php'>返回主页</a></li>
					</ul>
					</div>
				</div>
			<div id='wrapper'>
			<div id='today'>
				<table>
				<tr><td><h3>新闻管理</h3></td></tr>";
$db->getNewsTitle1();
echo "	
				</table>
				
			</div>
			</div>
			</div>";
?>