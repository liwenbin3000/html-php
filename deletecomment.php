
<?php
//删除评论后台
include "database.php";
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'class';

$db = new database();
$db->connect($hostname, $username, $password, $dbname);

$newsid = $_GET['newsId'];
$commentid = $_GET['commentId'];
$db->deleteComment2($commentid);
header("Location:news.php?newsId=$newsid");
?>