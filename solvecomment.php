<?php
include "database.php";
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'class';

$newsid = $_POST['newsid'];
$account = $_POST['account'];
$content = $_POST['comment'];
$date = new Datetime();
$time = $date->format("Y-m-d H:i:s");

$db = new database();
$db->connect($hostname, $username, $password, $dbname);
$db->addComment($newsid, $content, $account, $time);
header('Location:news.php?newsId=' . $newsid);
?>