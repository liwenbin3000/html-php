<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$db = new database();
$db->connect($hostname,$username,$password,$dbname);
session_start();
echo"
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>新闻管理系统</title>
				<script src='myScript.js'></script>
			</head>
			<body>
			<div class='container'>
				<div id='head'>
					<div id='user'>
						<span>"."{$_SESSION["username"]}"."</span>
						<a href='quit.php'><button id='logbutt' onclick=''>退出登录</button></a>
						<a href='homepage.php'><button id='homebutt'>返回主页</button></a>
					</div>
				</div>
			</div>
			<div id='wrapper'>
				<div>";
					$db->getNewsTitle1();
echo"	
				</div>
				
			</div>";
?>