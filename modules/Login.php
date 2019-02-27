<?php
/*
    StatusCode
    000  数据传输错误
    200  登陆成功
    400  用户名或密码错误
    201  已经登陆，刷新页面
*/
session_start();
header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
$StatusCode = "000";
require_once 'config.php';
require_once 'MysqliDb.php';
if(isset($_SESSION['isLogin'])){
    if($_SESSION['isLogin']===1){
        $StatusCode='201';
        goto echoend;
    }
}
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (!empty($username) && !empty($password)) {
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("UserName", $username);
    $db->where("Password", md5($password. $UserSalt));
    if ($db->has("users")) {
        $db->where("UserName", $username);
        $db->where("Password", md5($password.$UserSalt));
        $_SESSION=$db->getOne("users");
        $_SESSION['isLogin']=1;
        $StatusCode = "200";
        goto echoend;
    }
    $db->where("Email", $username);
    $db->where("Password", md5($password. $UserSalt));
    if ($db->has("users")) {
        $db->Where ('Email', $username);
        $db->where("Password", md5($password.$UserSalt));
        $_SESSION=$db->getOne("users");
        $_SESSION['isLogin']=1;
        $StatusCode = "200";
        goto echoend;
    }else{
        $StatusCode = "400";
        goto echoend;
    }
} else {
    $StatusCode = "000";
    goto echoend;
}

echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);
$dom->appendChild($element);
echo $dom->saveXML();