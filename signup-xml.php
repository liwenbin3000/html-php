<?php
//注册ajax后台
function checkname($str)
{
    $length = strlen($str);
    if ($length > 12 || $length < 6)
        return false;
    for ($i = 0; $i < $length; $i++) {
        if ((ord($str[$i]) <= 122 && ord($str[$i]) >= 97) || (ord($str[$i]) <= 90 && ord($str[$i]) >= 65) || (ord($str[$i]) <= 57 && ord($str[$i]) >= 48) || $str[$i] == "_") {

        } else {
            return false;
        }
    }
    return true;
}
//判断名字是否重复
function checkonlyname($str)
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "class");
    $result1 = mysqli_query($conn, "select * from people");
    for ($i = 0; $i < $result1->num_rows; $i++) {
        $row = $result1->fetch_assoc();
        if ($row["name"] == $str) {
            return false;
        }
    }
    return true;
}
//判断密码是否符合规范
function checkpw($str)
{
    $length = strlen($str);
    if ($length > 16 || $length < 6)
        return false;
    for ($i = 0; $i < $length; $i++) {
        if (ord($str[$i]) <= 57 && ord($str[$i]) >= 48) {

        } else {
            return false;
        }
    }
    return true;
}
//将获得的数据进行处理在将得到的结果传回原页面
$result = '<?xml version="1.0" encoding="utf8"?><item>';
if (isset($_POST["username"])) {
    $result .= '<name>username_1</name>';
    if (!checkname($_POST["username"])) {
        $result .= '<content>6-12个字符（数字字母下划线）</content>';
    } elseif (!checkonlyname($_POST["username"])) {
        $result .= '<content>用户名已存在</content>';
    } else {
        $result .= '<content>用户名有效</content>';
    }
} else if (isset($_POST["password-confirm"])) {
    $result .= '<name>password_confirm_1</name>';
    if (!($_POST["password"] == $_POST["password-confirm"])) {
        $result .= '<content>必须和密码一致</content>';
    } else {
        $result .= '<content>密码有效</content>';
    }
} elseif (isset($_POST["password"])) {
    $result .= '<name>password_1</name>';
    if (!checkpw($_POST["password"])) {
        $result .= '<content>6-16个数字</content>';
    } else {
        $result .= '<content>密码有效</content>';
    }
}
$result .= '</item>';
header('Content-Type:text/xml');
echo $result;
?>