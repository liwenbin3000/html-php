<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$db = new database();
$db->connect($hostname,$username,$password,$dbname);

$newsid=$_GET["newsid"];
$type=$_GET["type"];
if($type==0){
	$db->deleteComment($newsid);
	$db->deleteNews($newsid);
	
	header("Location:admin.php");
}
if($type==1){
	if(isset($_POST['change'])){
	$newtitle=$_POST['newsTitle'];
	$newcontent=$_POST['newsContent'];
	$db->updateNews($newsid,$newtitle,$newcontent);
	header("Location:admin.php");
	
    }
    else{$db->getNewsAll($newsid);}
	
}
if($type==2){
	echo "<form method='post'><tr>";
	    echo "标题";
	    echo "<td id='newsTitle' ><input name='newsTitle' type=textarea ></input></td></tr>";
		echo "内容";
		echo "<td id='newsContent'><input name='newsContent' type=textarea ></input></td></tr>";
		echo "<td><input type=submit value='增加' name='add'></input></td>";
	echo "</tr></form>";
	if(isset($_POST['add'])){
	$title=$_POST['newsTitle'];
	$content=$_POST['newsContent'];
	$date=new Datetime();
	$time=$date->format("Y-m-d");
	while($title!='' and $content!=''){
		$db->addNews($title,$content,$time);
		$title='';
		$content='';
		}
    header("Location:admin.php");
	}   
}

?>