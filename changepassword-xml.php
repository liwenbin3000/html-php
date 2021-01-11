<?php
//修改密码ajax
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

$result = '<?xml version="1.0" encoding="utf8"?><item>';
if (isset($_POST["password-confirm"])) {
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