<?php
require_once "../modules/avatar.php";
$avatar=new avatar;
$url=$avatar->make("李");
echo $url;
?>