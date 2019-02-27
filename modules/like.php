<?php
/*
点赞文件   StatusCode
200  正常
500  数据库操作错误
000  数据传输错误
300  用户未登录
100  喜欢操作前已进行不喜欢选择 先取消不喜欢
400  课程不存在
800  原来已经喜欢了，取消
 */
header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
session_start();
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1) {
    $login = true;
} else {
    $login = false;
}
if ($login) {
    $cid = isset($_POST['ClassID']) ? $_POST['ClassID'] : '';
    if (!empty($cid)) {
        require_once '../modules/MysqliDb.php';
        require_once '../modules/config.php';
        $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
        $db->where("ClassID", $cid);
        if ($db->has('class')) {
            $db->where("UserID", $_SESSION['UserID']);
            $db->where("ClassID", $cid);
            $db->where("isSet", 1);
            if ($db->has('like_table')) {
                $data2 = array();
                $data2['isSet'] = 0;
                $data2['Time'] = $db->now();
                $db->where("UserID", $_SESSION['UserID']);
                $db->where("ClassID", $cid);
                $db->where("isSet", 1);
                $db->update('like_table', $data2);
                $StatusCode = '800';
                goto echoend;
            }
            $db->where("UserID", $_SESSION['UserID']);
            $db->where("ClassID", $cid);
            $db->where("isSet", 1);
            if ($db->has("dislike_table")) {
                $StatusCode = '100';
                goto echoend;
            } else {
                $db->where("UserID", $_SESSION['UserID']);
                $db->where("ClassID", $cid);
                $db->where("isSet", 0);
                if ($db->has("like_table")) {
                    $db->where("UserID", $_SESSION['UserID']);
                    $db->where("ClassID", $cid);
                    $data3['isSet'] = 1;
                    $data3['Time'] = $db->now();
                    $db->update('like_table', $data3);
                    $StatusCode = '200';
                    goto echoend;
                } else {
                    $data = array();
                    $data['UserID'] = $_SESSION['UserID'];
                    $data['ClassID'] = $cid;
                    $data['isSet'] = 1;
                    $data['Time'] = $db->now();
                    $ok = $db->insert('like_table', $data);
                    if ($ok) {
                        $StatusCode = '200';
                        goto echoend;
                    } else {
                        $StatusCode = '500';
                        goto echoend;
                    }
                }
            }
        } else {
            $StatusCode = '400';
            goto echoend;
        }
    } else {
        $StatusCode = '000';
        goto echoend;
    }
} else {
    $StatusCode = '300';
    goto echoend;
}

echoend:
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('StatusCode', $StatusCode);
$dom->appendChild($element);
echo $dom->saveXML();
