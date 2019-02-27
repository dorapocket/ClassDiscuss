<?php
class avatar{
    var $size=64;
    var $length=1;
    function make($name){
        $color=array("ef5350","ec407a","ab47bc","3d5afe","42a5f5","29b6f6","26c6da","26a69a","66bb6a","9ccc65","d4e157","ffee58","ffca28","ffa726","ff7043","a1887f","616161","90a4ae","d81b60","4527a0","18ffff","b2ff59","388e3c","ffd600","ffab00","e040fb","d500f9","d32f2f","ff1744","00b0ff","1e88e5","ff9800","ffb300","9e9e9e","424242","546e7a","37474f","b0bec5","f4511e");
        srand ((float) microtime() * 10000000);
        $rand_colors = array_rand ($color, 1);
        $url="https://ui-avatars.com/api/?background={$color[$rand_colors]}&color=fff&name={$name}&length=1";
        return $url;
    }
    function setSize($sizenum){
        $this->$size=$sizenum;
    }
    function makeTeacher($name){
        $color=array("ef5350","ec407a","ab47bc","3d5afe","42a5f5","29b6f6","26c6da","26a69a","66bb6a","9ccc65","d4e157","ffee58","ffca28","ffa726","ff7043","a1887f","616161","90a4ae","d81b60","4527a0","18ffff","b2ff59","388e3c","ffd600","ffab00","e040fb","d500f9","d32f2f","ff1744","00b0ff","1e88e5","ff9800","ffb300","9e9e9e","424242","546e7a","37474f","b0bec5","f4511e");
        srand ((float) microtime() * 10000000);
        $rand_colors = array_rand ($color, 1);
        $url="https://ui-avatars.com/api/?background={$color[$rand_colors]}&color=fff&name={$name}&length=1&size=256";
        return $url;
    }
}
?>