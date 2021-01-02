
<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';


//实例化对象
$db = new database();
$db->connect($hostname,$username,$password,$dbname);


$id=$_GET['Id'];
$db->getNewsContent($id);
$db->close();




?>