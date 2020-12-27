<?php
$db=new database;
$db->connect("localhost","root1","");

class database
{
    function connect($servername,$username,$password){
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            echo "连接失败";
        }else{
            echo "连接成功";
        }
    }
}