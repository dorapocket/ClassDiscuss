<?php
    require_once("MysqliDb.php");
    require_once("config.php");
    $name=isset($_GET['name']) ? $_GET['name'] : '';
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname); 
    $data=array();
    $data['name']=$name;
    $data['time']=$db->now();
    $db->insert('water',$data);
?>