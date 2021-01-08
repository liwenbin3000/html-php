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
	echo "
	<html>
	    <link rel='stylesheet' type='text/css' href='changestyle.css?v=2'>
	</head>
	<body>
	<div class='container'>
	<div id='news'>
	<form id='newsForm' method='post'><tr>
			<h3>标题</h3>
	    <td id='newsTitle' ><input name='newsTitle' type=textarea id='newsTitle'></input></td></tr>
		<h3>内容</h3>
		<td id='newsContent'><textarea id='Content'></textarea><br>
		<input type=submit value='增加' name='add' id='submit'></input></td></tr>
		
	    </tr>
	</form>
	</div>
	</div>
	</body>
	</html>
		";
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