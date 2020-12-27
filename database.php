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
	
	public function add($dbname,$statement){
		mysqli_select_db($conn,$dbname);
		mysqli_query($conn,$statement);
	}
}


?>