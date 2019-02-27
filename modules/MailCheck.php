<?php
header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
require_once 'config.php';
require_once 'MysqliDb.php';

$target = isset($_POST['email']) ? $_POST['email'] : '';
$code = isset($_POST['code']) ? $_POST['code'] : '';
if (!empty($target) && !empty($code)) {
    DB_Query();
} else {
    $StatusCode = '000';
    goto echoend;
}
/*
错误代码StatusCode
200 正常
000 提交错误，code或者邮箱为空
400 验证码错误
800 验证码超时
 */

function DB_Query()
{
    global $dbhost;
    global $dbuser;
    global $dbpwd;
    global $dbname;
    global $target;
    global $code;
    global $StatusCode;

    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("Email", $target);
    $mail = $db->getOne("emailverifycode");
    $i = strtotime(date('Y-m-d H:i:s'));
    $j = strtotime($mail['Time']);
    if (($i - $j) > 300) {
        $StatusCode = "800";
    } else {
        //通过时间戳对比
        if ($code == $mail['Code']) {
            $data1=array();
            $data1['isVerify']=1;
            $db->where('Email', $target);
            $db->update('emailverifycode', $data1);
            $StatusCode = '200';
        } else {
            $StatusCode = '400';
        }
    }
}
echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);

$dom->appendChild($element);
echo $dom->saveXML();
?>