<?php
require_once 'QQMailer.php';
require_once 'MysqliDb.php';
require_once 'config.php';
//error_reporting(0);
header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
// 实例化 QQMailer
$Save = false;
$target = isset($_POST['email']) ? $_POST['email'] : '';
$secret = isset($_POST['secret']) ? $_POST['secret'] : '';
if (!empty($secret) && !empty($target)) {

    $mailer = new QQMailer(false);
// 添加附件
    //$mailer->addFile('20130VL.jpg');
    // 邮件标题

// 邮件内容
    $code = rand('100000', '999999');
    if ($secret == md5($target . $VerifySalt)) {
        if(checkmail()){
            $StatusCode = '700';
            goto echoend;
        }
        $title = '欢迎注册';
        $content = <<< EOF

<h3>欢迎您的注册</h3>
<p>您好，欢迎注册HDU评课社区，您的验证码为：<strong style="font-size:30px;color:red;"> {$code} </strong>，5分钟内有效，感谢您的注册！</p>

EOF;
        if (empty($target)) {$StatusCode = '000';goto echoend;}
        if (!filter_var($target, FILTER_VALIDATE_EMAIL)) {
            //$emailMsg = "非法邮箱格式";
            $StatusCode = '300';
            goto echoend;
        } else {
            //$emailMsg = "正确邮箱格式";
            $StatusCode = '200';
            // 发送QQ邮件
            DB_Save();
            if (!$Save) {goto echoend;}
            $mode = $mailer->send($target, $title, $content);
            //if (!$mode) {$StatusCode = '400';}
            goto echoend;
        }
    }
    if ($secret == md5($target . $ResVerifySalt)) {
        if (checkmail()) {
            $title = '找回密码';
            $content = <<< EOF

            <h3>找回密码</h3>
            <p>您好，您正在找回你的密码，您的验证码为：<strong style="font-size:30px;color:red;"> $code </strong>，5分钟内有效，请勿透露给他人！</p>

EOF;
            if (empty($target)) {$StatusCode = '000';goto echoend;}
            if (!filter_var($target, FILTER_VALIDATE_EMAIL)) {
                //$emailMsg = "非法邮箱格式";
                $StatusCode = '300';
                goto echoend;
            } else {
                //$emailMsg = "正确邮箱格式";
                $StatusCode = '200';
                // 发送QQ邮件

                DB_Save();
                if (!$Save) {goto echoend;}
                $mode = $mailer->send($target, $title, $content);
                //if (!$mode) {$StatusCode = '400';}
            }} else { $StatusCode = '900';goto echoend;}
    } else {
        $StatusCode = '100';
        goto echoend;
    }

} else {
    $StatusCode = '000';
    goto echoend;
}

function DB_Save()
{
    global $dbhost;
    global $dbuser;
    global $dbpwd;
    global $dbname;
    global $target;
    global $code;
    global $StatusCode;
    global $Save;
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("Email", $target);
    if ($db->has("emailverifycode")) {
        $db->where("Email", $target);
        $tg = $db->getOne("emailverifycode");
        $i = strtotime(date('Y-m-d H:i:s'));
        $j = strtotime($tg['Time']);
        if (($i - $j) > 59) {
            $data1 = array();
            $data1["Email"] = $target;
            $data1["Code"] = $code;
            $data1["Time"] = $db->now();
            $data1["isVerify"] = 0;
            $db->where("Email", $target);
            $db->update('emailverifycode', $data1);
            //echo $db->getLastError();
            $Save = true;
        } else {
            $StatusCode = "600";
        }
    } else {
        $data = array();
        $data["Email"] = $target;
        $data["Code"] = $code;
        $data["Time"] = $db->now();
        $data["isVerify"] = 0;
        $id = $db->insert('emailverifycode', $data);
        if ($id) {
            $Save = true;
        } else {
            $StatusCode = '500';
            $Save = false;}
    }

}
function checkmail(){
    global $dbhost;
    global $dbuser;
    global $dbpwd;
    global $dbname;
    global $target;
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("Email", $target);
    if($db->has("users")){
        return true;
    }else{
        return false;
    }
}
/*
错误代码StatusCode
200 正常
300 邮箱格式不正确
400 服务器错误
500 数据库插入错误
600 操作频率太快 60s后操作
000 提交错误，secrets或者邮箱为空
800 secret错误 怀疑重定向
100 type错误
900 找回密码邮箱不存在
700 邮箱已被注册
 */

echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);
$dom->appendChild($element);
echo $dom->saveXML();
