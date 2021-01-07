<?php

//包含数据库操作类文件
include "database.php";

//设置传入参数
$hostname='localhost';
$username='root';
$password=b'';
$dbname='class';
$id=1;
$title="alp";
$content="aaaa";
$time="2020-12-27";

//实例化对象
$db = new database();
$db->connect($hostname,$username,$password,$dbname);
$db->updateNews(2,"alp2","abababab");
$db->close();
?>