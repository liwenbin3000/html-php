<?php

class dataBase{
	private $conn;
	//链接数据库
	public function connect($localname,$username,$password){
		$conn=mysqli_connect($localname,$username,$password);
		$this->conn=$conn;
		if($conn->connect_error){
			echo "链接失败<br/>";
			exit;
		}
		
	}
	//关闭数据库
	public function close(){
		$res=mysqli_close($this->conn);
		if($res){echo"关闭成功<br/>";}
		else{echo"关闭失败<br/>";}
	}	
	//增加新的新闻 参数为 标题 内容 时间
	public function addNews($title,$content,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into news (title,content,time) value('$title','$content','$time')";
		mysqli_query($this->conn,$statement);
	}
	//根据id删除新闻
	public function deleteNews($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `news` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	//获取询问标题并且按照顺序输出
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
	//获取相应id的新闻内容
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
	//增加评论 参数为 对应新闻 内容 评论人名字 时间
	public function addComment($news,$content,$people,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into comment (news,content,people,time) value('$news','$content','$people','$time')";
		mysqli_query($this->conn,$statement);
	}
	//根据id删除评论
	public function deleteComment($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `comment` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	//增加用户 参数为 用户名 密码 是否为管理员 注册时间
	public function addPeople($name,$password,$administrator,$time){
		mysqli_select_db($this->conn,"class");
		
		$statement="insert into people (name,password,administrator,time) values ('$name','$password','$administrator','$time')";
		mysqli_query($this->conn,$statement);

	}
	//根据id删除用户
	public function deletePeople($id){
		mysqli_select_db($this->conn,"class");
		$statement="delete from `people` where id='$id'";
		if(mysqli_query($this->conn,$statement)){
		            echo "删除数据成功！";
		        } else {
		            echo "删除数据失败：".mysqli_error();
		        }
	}
	//登陆时检验 参数为 用户名 密码 用户名不存在返回0 密码错误返回1 登陆检验通过返回2
	public function checkPeople($account,$password){
		mysqli_select_db($this->conn,"class");
		$statement="SELECT * FROM `people` where name='$account'";
		$res=mysqli_query($this->conn,$statement);
		$flag="用户名不存在";
		while($row = mysqli_fetch_array($res))
		{
			$flag="密码错误";
			$statement1="SELECT * FROM `people` where name='$account'and password='$password'";
			$res1=mysqli_query($this->conn,$statement1);
			while($row = mysqli_fetch_array($res1))
			{
				$flag=$row["id"];
			}
	    }
		return $flag;
	}
}


?>