<?php
require_once("weather.php");
$w=new weather;
$w->get();
$data=array();
$data['daytemp']=$w->getDayTemp(0);
$data['dayweather']=$w->getDayWeather(0);
$data['nighttemp']=$w->getNightTemp(0);
$data['nightweather']=$w->getNightWeather(0);
$data['date']=$w->getDate(0);
$data['week']=$w->getWeek(0);
echo json_encode($data,JSON_UNESCAPED_UNICODE);
?>