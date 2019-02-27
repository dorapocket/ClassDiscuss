<?php 
require_once 'db.php';
require_once 'MysqliDb.php';
date_default_timezone_set('Asia/Shanghai');
$target="99354977@qq.com";
$code="1";
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("Email", $target);
    if ($db->has("emailverifycode")) {
        echo "1";
        $db->where("Email", $target);
        $tg = $db->getOne("emailverifycode");
        $i = strtotime(date('Y-m-d H:i:s'));
        $j = strtotime($tg['Time']);
        echo "2<br>";
        echo $i.'<br>';
        echo $j.'<br>';
        if (($i - $j) > 59) {
            echo "3";
            $data1 = array();
            $data1["Email"] = $target;
            $data1["Code"] = $code;
            $data1["Time"] = $db->now();
            $db->update('emailverifycode', $data1);
            echo $db->getLastError();
            $Save = true;
            echo "4";
        } else {
            echo "5";
            $StatusCode = "600";
        }
    } else {
        echo "6";
        $data = array();
        $data["Email"] = $target;
        $data["Code"] = $code;
        $data["Time"] = $db->now();
        $id = $db->insert('emailverifycode', $data);
        if ($id) {
            $Save = true;
            echo "7";
        } else {
            $StatusCode = '500';
            $Save = false;
            echo "8";}
    }
    ?>
