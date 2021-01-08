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
	$newcontent=$_POST['Content'];
	$db->updateNews($newsid,$newtitle,$newcontent);
	header("Location:admin.php");
	
    }
    else{
		echo "<html>
		      <head>
			  <link rel='stylesheet' type='text/css' href='changestyle.css?v=2'>
			  <script type='text/javascript'>
			  function myFunction(){
			  	if (document.getElementById('newsTitle').value == '' || document.getElementById('Content').value == ''){
			  		alert('内容不能为空');
			  		return false;
			  	}
			  	else{return true;}
			  }
			  </script>
			  </head>
			  <body>
			  <div class='container'>
			  <div id='news'>
		";
		$db->getNewsAll($newsid);
		echo"
		</div>
		</div>
		</body>
		</html>";
		}
}
if($type==2){
	echo "
	<html>
	<head>
	    <link rel='stylesheet' type='text/css' href='changestyle.css?v=2'>
	</head>
	<body>
	<script type='text/javascript'>
	function myFunction(){
		if (document.getElementById('newsTitle').value == '' || document.getElementById('Content').value == ''){
			alert('内容不能为空');
			return false;
		}
		else{return true;}
	}
	</script>
	<div class='container'>
	<div id='news'>
	<form id='newsForm' method='post' onsubmit='return myFunction()'><tr>
			<h3>标题</h3>
	    <td id='newsTitle' ><input name='newsTitle' type=textarea id='newsTitle'></input></td></tr>
		<h3>内容</h3>
		<td id='newsContent'><textarea id='Content' name='Content'></textarea><br>
		<input type=submit value='增加' name='add' id='submit' ></input></td></tr>
		<a href =admin.php><input type=button value='返回管理员界面'></input></a>
	    </tr>
	</form>
	</div>
	</div>
	</body>
	</html>
		";
	if(isset($_POST['add'])){
	$title=$_POST['newsTitle'];
	$content=$_POST['Content'];
	$date=new Datetime();
	$time=$date->format("Y-m-d");
	while($title!='' and $content!=''){
		$db->addNews($title,$content,$time);
		$title='';
		$content='';
		header("Location:admin.php");
		}

	}   
}

?>