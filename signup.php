<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$account=$_POST["username"];
$password1=$_POST["password"];
$date=new Datetime();
$time=$date->format("Y-m-d-H-i-s");
$db = new database();
$db->connect($hostname,$username,$password,$dbname);
$db->addPeople($account,$password1,0,$time);
$db->close();
?>