<?php
/*
错误代码 StatusCode
000  数据传输错误
200  正常
300  用户未登录
500  数据库错误
*/ 
//error_reporting(0);
session_start();
header("Content-type: application/xml;charset=utf-8");
$StatusCode='000';
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1) {
    $login = true;
} else {
    $login = false;
}
if($login){
    require_once 'MysqliDb.php';
    require_once 'config.php';
    date_default_timezone_set('Asia/Shanghai');
    $CommitID=isset($_POST['CommitID']) ? $_POST['CommitID'] : '';
    if(!empty($CommitID)){
        $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
        $data=array();
        $data['UserID']=$_SESSION['UserID'];
        $data['CommitID']=$CommitID;
        $data['Time']=$db->now();
        $data['Deal']=false;
        $data['DealReason']="";
        $data['DealTime']=$db->now();
        $data['DealUser']="";
        $data['DealIP']="";
        $id = $db->insert('jb_table', $data);
        if ($id) {
            $StatusCode='200';
            goto echoend;
        } else {
            $StatusCode = '500';
            goto echoend;
        }
    }else{
        $StatusCode='000';
        goto echoend; 
    }
}else{
    $StatusCode='300';
    goto echoend;
}



echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);
$dom->appendChild($element);
echo $dom->saveXML();
?>