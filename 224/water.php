<?php echo "hh"?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 小工具</title>

    <meta name="keywords" content="">
    <meta name="description" content="">


    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="widget navy-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-tint fa-4x"></i>
                        <h2 class="m-xs">该谁买水了？(っ*´Д`)っ</h2><br><br>
                        <h1 class="no-margins m-xs" id="name">
                        <?php
                            require_once("modules/MysqliDb.php");
                            require_once("modules/config.php");
                            $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname); 
                            $sql='select count(*) from water';
                            $res=$db->rawQuery($sql)[0]['count(*)'];
                            $y=$res%5;
                            switch($y){
                                case 0:echo "姚远";break;
                                case 1:echo "冯俊杰";break;
                                case 2:echo "杨文宇";break;
                                case 3:echo "李国宇";break;
                                case 4:echo "肖泽芸";break;
                            }
                        ?>
                        </h1>
                        <span id="nameid"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2" style="margin-right:80px;">
                    <div class="widget style1 lazur-bg ok" id="ok">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <h2 class="" style="font-size:25px;margin-top:18px;">买完了，下一个 ヾ(´∀`o)+</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 全局js -->
            <script src="js/jquery.min.js?v=2.1.4"></script>
            <script src="js/jquery-ui-1.10.4.min.js"></script>
            <script src="js/bootstrap.min.js?v=3.3.6"></script>



            <!-- 自定义js -->
            <script src="js/content.js?v=1.0.0"></script>
            <!-- Sweet alert -->
            <script src="js/plugins/sweetalert/sweetalert.min.js"></script>
            <script>



                var name=document.getElementById("name").innerText;
                function ok(){
                    var xmlhttp;
                    if (window.XMLHttpRequest)
                    {
                        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                    {
                        // IE6, IE5 浏览器执行代码
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function()
                    {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            
                        }
                    }
                    xmlhttp.open("GET","/224/modules/water.php?name="+name,true);
                    xmlhttp.send();
                }

                    $(document).ready(function () {
                        $('.ok').click(function () {
                swal({
                        title: "哇",
                        text: "你真的买了咩？还是手抖？",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "真的买了！",
                        cancelButtonText: "手抖了...",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("搞定", "买了就好~", "success");
                            ok();
                            window.location.reload();

                        } else {
                            swal("取消咯", "下次别乱点~", "error");
                        }
                    });
            });
                       });
            </script>

            <!-- Jvectormap -->
            <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

            <!-- Flot -->
            <script src="js/plugins/flot/jquery.flot.js"></script>
            <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
            <script src="js/plugins/flot/jquery.flot.resize.js"></script>


</body>

</html>