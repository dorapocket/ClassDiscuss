<?php
include("modules/weather.php");
$weather=new weather;
$weather->get();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - 主页示例</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <script>
        function weather_flash() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // IE6, IE5 浏览器执行代码
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var jsonObj = JSON.parse(xmlhttp.responseText);
                    document.getElementById("dt").innerHTML = jsonObj.daytemp + "℃";
                    document.getElementById("dw").innerHTML = jsonObj.dayweather;
                    document.getElementById("nt").innerHTML = jsonObj.nighttemp + "℃";
                    document.getElementById("nw").innerHTML = jsonObj.nightweather;
                    document.getElementById("date").innerHTML = jsonObj.date + "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" + jsonObj.week;
                }
            }
            xmlhttp.open("GET", "/224/modules/weather_flash.php", true);
            xmlhttp.send();
        }

        window.onload = function () {
            var t1 = window.setTimeout(weather_flash, 1000000);
        }
    </script>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content" style="padding-top:5px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="widget style1 lazur-bg" style="padding-top:6px;padding-bottom:6px;">
                    <div class="row" style="position:relative;">
                        <h4 style="font-size: 18px;line-height: 1.2;font-weight: 500;margin-bottom: 5px;margin-left:250px;"
                            id="date">
                            <?php echo $weather->getDate(0); echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$weather->getWeek(0);?>
                            </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1" id="dt">
                                        <?php echo $weather->getDayTemp(0);?>℃</div>
                                    <span class="text-muted text-xs">白天气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-info">
                                    <div class="h1 text-fff font-thin h1" id="dw">
                                        <?php echo $weather->getDayWeather(0);?></div>
                                    <span class="text-muted text-xs">白天天气</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-primary">
                                    <div class="h1 text-fff font-thin h1" id="nt">
                                        <?php echo $weather->getNightTemp(0);?>℃</div>
                                    <span class="text-muted text-xs">夜晚气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1"><?php echo $weather->getNightWeather(0);?></div>
                                    <span class="text-muted text-xs" id="nw">夜晚天气</span>
                                    <div class="bottom text-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-sm-12">
                <div class="widget style1 lazur-bg" style="padding-top:6px;padding-bottom:6px;">
                    <div class="row" style="position:relative;">
                        <h4 style="font-size: 18px;line-height: 1.2;font-weight: 500;margin-bottom: 5px;margin-left:250px;"
                            id="date">
                            <?php echo $weather->getDate(0); echo '(明天)&nbsp&nbsp&nbsp&nbsp'.$weather->getWeek(1);?>
                            </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1" id="dt">
                                        <?php echo $weather->getDayTemp(1);?>℃</div>
                                    <span class="text-muted text-xs">白天气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-info">
                                    <div class="h1 text-fff font-thin h1" id="dw">
                                        <?php echo $weather->getDayWeather(1);?></div>
                                    <span class="text-muted text-xs">白天天气</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-primary">
                                    <div class="h1 text-fff font-thin h1" id="nt">
                                        <?php echo $weather->getNightTemp(1);?>℃</div>
                                    <span class="text-muted text-xs">夜晚气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1"><?php echo $weather->getNightWeather(1);?></div>
                                    <span class="text-muted text-xs" id="nw">夜晚天气</span>
                                    <div class="bottom text-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-sm-12">
                <div class="widget style1 lazur-bg" style="padding-top:6px;padding-bottom:6px;">
                    <div class="row" style="position:relative;">
                        <h4 style="font-size: 18px;line-height: 1.2;font-weight: 500;margin-bottom: 5px;margin-left:250px;"
                            id="date">
                            <?php echo $weather->getDate(2); echo '(后天)&nbsp&nbsp&nbsp&nbsp'.$weather->getWeek(2);?>
                            </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1" id="dt">
                                        <?php echo $weather->getDayTemp(2);?>℃</div>
                                    <span class="text-muted text-xs">白天气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-info">
                                    <div class="h1 text-fff font-thin h1" id="dw">
                                        <?php echo $weather->getDayWeather(2);?></div>
                                    <span class="text-muted text-xs">白天天气</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item bg-primary">
                                    <div class="h1 text-fff font-thin h1" id="nt">
                                        <?php echo $weather->getNightTemp(2);?>℃</div>
                                    <span class="text-muted text-xs">夜晚气温</span>
                                    <div class="top text-right w-full">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1"><?php echo $weather->getNightWeather(2);?></div>
                                    <span class="text-muted text-xs" id="nw">夜晚天气</span>
                                    <div class="bottom text-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/layer/layer.min.js"></script>
    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <!-- 自定义js -->
    <script src="js/content.js"></script>
    <script>

    </script>
    <!--flotdemo-->
</body>

</html>