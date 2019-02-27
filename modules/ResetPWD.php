<?php
header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
require_once 'config.php';
require_once 'MysqliDb.php';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (!empty($email) && !empty($password)) {
    $psmd = md5($password . $UserSalt);
    DB_ResetUserPWD($email, $psmd);
} else {
    $StatusCode = '000';
    goto echoend;
}
/*
错误代码StatusCode
200 正常重置成功
300 邮件验证失败
000 提交错误，有一些为空
 */

function DB_ResetUserPWD($email, $password)
{
    global $dbhost;
    global $dbuser;
    global $dbpwd;
    global $dbname;
    global $StatusCode;
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("Email", $email);
    $tg = $db->getOne("emailverifycode");
    if ($tg['isVerify'] == 1) {
        $data = array();
        $data['Password'] = $password;
        $db->where("Email", $email);
        $db->update('users', $data);
        $StatusCode = '200';
    } else {
        $StatusCode = '300';
    }
}

echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);
$dom->appendChild($element);
echo $dom->saveXML();
