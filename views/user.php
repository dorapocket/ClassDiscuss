<?php 
$UserID = isset($_GET['UserID']) ? $_GET['UserID'] : '';
if(empty($UserID)){
    die("数据传入失败！！！");
}else{
    require_once '../modules/MysqliDb.php';
    require_once '../modules/config.php';
    require_once "../modules/avatar.php";
    require_once "../modules/star.php";
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("UserID", $UserID);
    $User = $db->getOne("users");
    $avatar=new avatar;
    $jb_count_sql='select count(*) from jb_table where UserID='.$UserID;
    $jb_time=($db->rawQuery($jb_count_sql))[0]['count(*)'];
    $commit_count_sql='select count(*) from class_commit where UserID='.$UserID;
    $commit_time=($db->rawQuery($commit_count_sql))[0]['count(*)'];
    $user_commit_sql='select a.ClassID,a.CommitID,b.Name,a.Score,a.Text,a.Time from class_commit a,class b where a.UserID='.$UserID.' and  a.Anonymous=0 and a.ClassID=b.ClassID'.' order by Time ASC';
    $user_commit=$db->rawQuery($user_commit_sql);
}
?>

<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <link rel="stylesheet" href="../css/mdui.min.css">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>HDU评课系统</title>
</head>

<body class="mdui-theme-primary-indigo mdui-theme-accent-pink main-container">
    <?php include "header.php"; ?>
    <div class="mdui-container-fluid" id="user">
        <div class="mdui-row">
            <div class="mdui-col-md-3 mdui-col-offset-md-1 mdui-shadow-6 module user-information" >
                <div class="centercontainer" style="flex-direction: column;margin:50px 0px 40px 0px">
                    <img class="mdui-img-circle" src="<?php echo $avatar->make($User['UserName'])?>"  alt="">
                    <h2><?php echo $User['UserName'];?></h2>
                    <div><strong>发表评论数量：</strong><span><?php echo $commit_time;?></span></div>
                    <br>
                    <div><strong>被举报数量：</strong><span><?php echo $jb_time;?></span></div>
                    <br><br>
                    <div>
                        <button class="mdui-btn mdui-ripple mdui-color-theme-accent"><i
                                class="mdui-icon material-icons">remove_red_eye</i>关注</button>
                    </div>
                </div>
            </div>
            <div class="mdui-col-md-6 mdui-col-offset-md-1 user-recent">
                <?php
                //print_r($user_commit);
                foreach($user_commit as $commit){
                ?>
                <!--评价卡片个体 开始-->
                <div class="mdui-card mdui-shadow-6" style="border-radius: 10px;">
                    <!-- 卡片头部，头像 日期 星级  -->
                    <div class="mdui-card-header">
                        <img class="mdui-card-header-avatar" src="<?php echo $avatar->make($User['UserName'])?>" />
                        <div class="mdui-card-header-title mdui-typo"><?php echo $commit['Time'];?>  评价了  <a href="class.php?ClassID=<?php echo $commit['ClassID'];?>"><?php echo $commit['Name'];?></a></div>
                        <!--星级评定-->
                        <div class="class-star">
                            <div class="star-icon">
                           <?php $score = intval($commit['Score']);
                           $star=new star;
                           $star->GenerateStar($score,"index-star");
                            ?>
                            </div>
                            <strong><?php echo sprintf("%.1f",$commit['Score']);?></strong>
                        </div>
                    </div>
                    <!--评价内容-->
                    <div class="mdui-card-content"><?php echo $commit['Text'];?></div>
                </div>
                <!--评价卡片个体 结束-->
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>