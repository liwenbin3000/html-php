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
	
	public function addNews($title,$content,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into news (title,content,time) value('$title','$content','$time')";
		mysqli_query($this->conn,$statement);
		
		echo"存入成功";
	}
	
	public function deleteNews($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `news` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	
	public function getNewsTitle(){
		mysqli_select_db($this->conn,"class");
		$statement="SELECT * FROM `news` ";
		$res=mysqli_query($this->conn,$statement);
		while($row = mysqli_fetch_array($res))
		{
			echo "<tr>";
				echo "<td><a href=news.php?Id=".$row['id'].">" . $row['title'] . "</a></td>";
			echo "</tr><br/>";

		}
	}
	public function getNewsContent($id){
		mysqli_select_db($this->conn,"class");
		$statement="SELECT * FROM `news` where id='$id' ";
		$res=mysqli_query($this->conn,$statement);
		while($row = mysqli_fetch_array($res))
		{
			echo "<tr>";
				echo "<td>" . $row['content'] . "</td>";
			echo "</tr><br/>";
		
	}
	}
	
	public function addComment($news,$content,$people,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into comment (news,content,people,time) value('$news','$content','$people','$time')";
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
	
	public function addPeople($name,$password,$administrator,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into people (name,password,administrator,time) values ('$name','$password','$administrator','$time')";
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