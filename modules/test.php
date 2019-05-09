<?php
require_once 'MysqliDb.php';
require_once 'config.php';
global $dbhost;
global $dbuser;
global $dbpwd;
global $dbname;
$db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
$sql2="select a.Name,b.TeacherName,a.ClassID from class a,teacher b where a.TeacherID=b.TeacherID and a.Name='".'大学物理1'."'";
    $sameteacher=$db->rawQuery($sql2);
    print_r($sameteacher);
?>