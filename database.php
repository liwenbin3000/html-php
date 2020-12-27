<?php

class dataBase{
	private $conn;
	public function connect($localname,$username,$password){
		$conn=mysqli_connect($localname,$username,$password);
		$this->conn=$conn;
		if($conn->connect_error){
			echo "链接失败<br/>";
			exit;
		}
		else{
			echo "链接成功<br/>";
		}
	}
	
	public function close(){
		$res=mysqli_close($this->conn);
		if($res){echo"关闭成功<br/>";}
		else{echo"关闭失败<br/>";}
	}	
	
	public function addArticle($title,$content,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into article (title,content,time) value('$title','$content','$time')";
		mysqli_query($this->conn,$statement);
		
		echo"存入成功";
	}
	
	public function deleteArticle($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `article` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	
	public function addComment($article,$content,$people,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into comment (article,content,people,time) value('$article','$content','$people','$time')";
		mysqli_query($this->conn,$statement);
		
		echo"存入成功";
	}
	
	public function deleteComment($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `comment` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	
	public function addPeople($name,$password,$administrtor,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into comment (name,password,administrtor,time) value('$name','$password','$administrtor','$time')";
		mysqli_query($this->conn,$statement);
		
		echo"存入成功";
	}
	
	public function deletePeople($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `people` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	
	
}


?>