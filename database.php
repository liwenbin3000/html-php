<?php

class dataBase{
	
	public function connect($localname,$username,$password,$dbname){
		$conn=mysqli_connect($localname,$username,$password);
		if($conn->connect_error){
			echo "链接失败";
			exit;
		}
		else{
			echo "链接成功";
		}
		mysqli_select_db($conn,$dbname);
		
	}
}


?>