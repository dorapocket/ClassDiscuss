<?php
class weather{
    private $key='987778feefdb8e902da368d23876f8b9';
    private $abcode='330104';
    private $apiurl='https://restapi.amap.com/v3/weather/weatherInfo?';
    private $extensions='all';//all天气预报 base实况
    private $output='JSON';
    private $data='';
    private $_city='';
    private $_reporttime='';
    private $_cast_date=array();
    private $_cast_week=array();
    private $_cast_dayweather=array();
    private $_cast_nightweather=array();
    private $_cast_daytemp=array();
    private $_cast_nighttemp=array();
    function get(){
        $ch=curl_init();
        $url= $this->apiurl.'key='.$this->key.'&city='.$this->abcode.'&extensions='.$this->extensions.'&output='.$this->output;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $this->data =curl_exec($ch);
        curl_close($ch);
        $w=json_decode($this->data,true);
        $this->_city=$w['forecasts'][0]['city'];
        $this->_reporttime=$w['forecasts'][0]['reporttime'];
        $this->_cast_date[0]=$w['forecasts'][0]['casts'][0]['date'];
        $this->_cast_date[1]=$w['forecasts'][0]['casts'][1]['date'];
        $this->_cast_date[2]=$w['forecasts'][0]['casts'][2]['date'];
        $this->_cast_date[3]=$w['forecasts'][0]['casts'][3]['date'];
        $this->_cast_week[0]=$w['forecasts'][0]['casts'][0]['week'];
        $this->_cast_week[1]=$w['forecasts'][0]['casts'][1]['week'];
        $this->_cast_week[2]=$w['forecasts'][0]['casts'][2]['week'];
        $this->_cast_week[3]=$w['forecasts'][0]['casts'][3]['week'];
        $this->_cast_dayweather[0]=$w['forecasts'][0]['casts'][0]['dayweather'];
        $this->_cast_dayweather[1]=$w['forecasts'][0]['casts'][1]['dayweather'];
        $this->_cast_dayweather[2]=$w['forecasts'][0]['casts'][2]['dayweather'];
        $this->_cast_dayweather[3]=$w['forecasts'][0]['casts'][3]['dayweather'];
        $this->_cast_nightweather[0]=$w['forecasts'][0]['casts'][0]['nightweather'];
        $this->_cast_nightweather[1]=$w['forecasts'][0]['casts'][1]['nightweather'];
        $this->_cast_nightweather[2]=$w['forecasts'][0]['casts'][2]['nightweather'];
        $this->_cast_nightweather[3]=$w['forecasts'][0]['casts'][3]['nightweather'];
        $this->_cast_daytemp[0]=$w['forecasts'][0]['casts'][0]['daytemp'];
        $this->_cast_daytemp[1]=$w['forecasts'][0]['casts'][1]['daytemp'];
        $this->_cast_daytemp[2]=$w['forecasts'][0]['casts'][2]['daytemp'];
        $this->_cast_daytemp[3]=$w['forecasts'][0]['casts'][3]['daytemp'];
        $this->_cast_nighttemp[0]=$w['forecasts'][0]['casts'][0]['nighttemp'];
        $this->_cast_nighttemp[1]=$w['forecasts'][0]['casts'][1]['nighttemp'];
        $this->_cast_nighttemp[2]=$w['forecasts'][0]['casts'][2]['nighttemp'];
        $this->_cast_nighttemp[3]=$w['forecasts'][0]['casts'][3]['nighttemp'];
    }
    function show(){
        echo $this->data;
    }
    function getDate($n){
        return $this->_cast_date[$n];
    }
    function getWeek($n){
        $hz='';
        switch($this->_cast_week[$n]){
            case 1:$hz='星期一';break;
            case 2:$hz='星期二';break;
            case 3:$hz='星期三';break;
            case 4:$hz='星期四';break;
            case 5:$hz='星期五';break;
            case 6:$hz='星期六';break;
            case 7:$hz='星期日';break;
        }
        return $hz;
    }
    function getDayWeather($n){
        return $this->_cast_dayweather[$n];
    }
    function getNightWeather($n){
        return $this->_cast_nightweather[$n];
    }
    function getDayTemp($n){
        return $this->_cast_daytemp[$n];
    }
    function getNightTemp($n){
        return $this->_cast_nighttemp[$n];
    }
}
?>