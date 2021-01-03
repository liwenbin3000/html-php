<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$account=$_POST["username"];
$account_password=$_POST["password"];

$db = new database();
$db->connect($hostname,$username,$password,$dbname);
if($db->checkPeople($account,$account_password)){
	
}


?>