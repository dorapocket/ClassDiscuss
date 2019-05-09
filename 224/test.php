<?php
require_once "modules/weather.php";
$w=new weather;
$w->get();
$w->getDayWeather(1);
?>