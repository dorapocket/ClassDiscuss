<?php
$islike = false;
$isdislike = false;
$iscollection = false;
$ClassID = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';
if (!empty($ClassID)) {
    require_once '../modules/MysqliDb.php';
    require_once '../modules/config.php';
    require_once "../modules/avatar.php";
    require_once "../modules/star.php";
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $db->where("ClassID", $ClassID);
    $Class = $db->getOne("class");
    $db->where("TeacherID", $Class['TeacherID']);
    $Teacher = $db->getOne("teacher");
    $sql1="select a.Name,b.TeacherName,a.ClassID from class a,teacher b where a.TeacherID=b.TeacherID and a.Name='".$Class['Name']."'limit 5";
    $sameclass=$db->rawQuery($sql1);
    $sameclasscount=count($sameclass);
    $sql2="select ClassID , Name from class where TeacherID='".$Class['TeacherID']."' limit 5";
    $sameteacher=$db->rawQuery($sql2);
    $sameteachercount=count($sameteacher);
} else {
    die("数据传入错误");
}
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <link rel="stylesheet" href="../css/mdui.min.css">
    <title><?php echo $Class['Name']; ?></title>
    <link rel="stylesheet" href="../css/class.css">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/mc.css">


</head>

<body class="mdui-theme-primary-indigo mdui-theme-accent-pink"  id="body">
    <!--网页固定头部工具栏 开始-->
    <?php include "header.php"?>
    <?php
if ($login) {
    $db->where("UserID", $_SESSION['UserID']);
    $db->where("ClassID", $ClassID);
    $db->where("isSet", 1);
    if ($db->has("like_table")) {$islike = true;}
    $db->where("UserID", $_SESSION['UserID']);
    $db->where("ClassID", $ClassID);
    $db->where("isSet", 1);
    if ($db->has("dislike_table")) {$isdislike = true;}
    $db->where("UserID", $_SESSION['UserID']);
    $db->where("ClassID", $ClassID);
    $db->where("isSet", 1);
    if ($db->has("collection_table")) {$iscollection = true;}
}
?>
    <!--网页固定头部工具栏 结束-->
    <!--网页主体 开始-->
    <span id="classid" style="display:none"><?php echo $ClassID; ?></span>
    <div class="mdui-container-fluid class-page">
        <div class="mdui-row">
            <!--左栏 课程详细信息 开始-->
            <div class="mdui-col-md-7 mdui-col-offset-md-1 mdui-shadow-9 mdui-col-sm-10 mdui-col-offset-sm-1 basic-col">
                <!--课程头部 星级-->
                <div class="mdui-row class-title-container">
                    <div class="mdui-col-md-6 mdui-col-sm-6 mdui-col-xs-8">
                        <h1 class="class-title"><?php echo $Class['Name']; ?></h1>
                        <p class="class-number">选课课号：<?php echo $Class['Code']; ?></p>
                    </div>
                    <div class="mdui-col-md-3 mdui-col-sm-3 mdui-col-offset-sm-2 mdui-col-xs-4 mdui-col-offset-md-2 class-star-inf">
                        <?php
                            $score = intval($Class['Score']);
                            $star_all=new star;
                            $star_all->GenerateStar($score);
                        ?>
                        <strong class="df"><?php echo sprintf("%.1f", $Class['Score']); ?></strong>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <!--纸屑效果 课程基本信息-->
                <div class="mdui-row class-basic">
                    <div class="mdui-col-md-12 mdui-col-sm-12 class-info-chip-container">
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><strong>课程难度：</strong>
                            <?php
$dif = intval($Class['Difficulty']);
if ($dif < 2) {echo "极简";}
if ($dif >= 2 && $dif < 4) {echo "简单";}
if ($dif >= 4 && $dif < 6) {echo "略难";}
if ($dif >= 6 && $dif < 8) {echo "还行";}
if ($dif >= 8) {echo "天书";}
?>
                            </span>
                        </div>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><strong>收获大小：</strong>
                            <?php
$gets = intval($Class['Gets']);
if ($gets < 2) {echo "毫无";}
if ($gets >= 2 && $gets < 4) {echo "有点";}
if ($gets >= 4 && $gets < 6) {echo "还行";}
if ($gets >= 6 && $gets < 8) {echo "很多";}
if ($gets >= 8) {echo "极大";}
?>
                            </span>
                        </div>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><strong>给分好坏：</strong>
                            <?php
$GS = intval($Class['GiveScore']);
if ($GS < 2) {echo "坑爹";}
if ($GS >= 2 && $GS < 4) {echo "很差";}
if ($GS >= 4 && $GS < 6) {echo "还行";}
if ($GS >= 6 && $GS < 8) {echo "挺好";}
if ($GS >= 8) {echo "超好";}
?>
                            </span>
                        </div>
                        <div class="mdui-chip">
                            <span class="mdui-chip-title"><strong>作业多少：</strong>
                            <?php
$hmw = intval($Class['Homework']);
if ($hmw < 2) {echo "没有";}
if ($hmw >= 2 && $hmw < 4) {echo "有点";}
if ($hmw >= 4 && $hmw < 6) {echo "还行";}
if ($hmw >= 6 && $hmw < 8) {echo "略多";}
if ($hmw >= 8) {echo "一堆";}
?>
                            </span>
                        </div>
                    </div>
                </div>
                <!--课程详细信息-->
                <div class="mdui-row class-info">
                    <div class="mdui-col-md-6 class-num-dis">
                        <p><strong>选课课号：</strong><?php echo $Class['Code']; ?></p>
                    </div>
                    <div class="mdui-col-md-6">
                        <p><strong>课程性质：</strong><?php echo $Class['Type']; ?></p>
                    </div>
                    <div class="mdui-col-md-6">
                        <p><strong>开课学院：</strong><?php echo $Class['School']; ?></p>
                    </div>
                    <div class="mdui-col-md-6">
                        <p><strong>课程层次：</strong><?php echo $Class['KCCC']; ?></p>
                    </div>
                    <div class="mdui-col-md-6">
                        <p><strong>课程学分：</strong><?php echo sprintf("%.1f", $Class['Point']); ?></p>
                    </div>
                    <div class="mdui-col-md-6">
                        <p><strong>上课时间：</strong><?php echo $Class['ClassTime']; ?></p>
                    </div>
                </div>
                <!--按钮组-->
                <div class="mdui-row">
                    <div class="mdui-col-md-12">
                        <div class="class-recommand-button">
                        <?php
if ($islike) {
    echo <<<likeal
                            <button class="mdui-btn mdui-ripple" id="classgood"><i class="mdui-icon material-icons" id="classgoodicon">thumb_up</i><span id="d">已顶</span></button>
likeal;
} else {
    echo <<<like
                            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" id="classgood"><i id="classgoodicon" class="mdui-icon material-icons">thumb_up</i><span id="d">顶</span></button>
like;
}
if ($isdislike) {
    echo <<<disal
                            <button class="mdui-btn mdui-ripple" id="classbad"><i class="mdui-icon material-icons">thumb_down</i><span id="c">已踩</span></button>
disal;
} else {
    echo <<<dis
                            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" id="classbad"><i class="mdui-icon material-icons">thumb_down</i><span id="c">踩</span></button>
dis;
}
if ($iscollection) {
    echo <<< collal
                            <button class="mdui-btn mdui-ripple" id="collection"><i class="mdui-icon material-icons">turned_in_not</i><span id="s">已收藏</span></button>
collal;
} else {
    echo <<< coll
                            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" id="collection"><i class="mdui-icon material-icons">turned_in_not</i><span id="s">收藏</span></button>
coll;
}
?>
                        </div>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <div class="mdui-row class-teacher-dis">
                    <div class="mdui-col-sm-2">
                        <img class="mdui-img-circle" src="../img/avatar1.jpg" width="80px" />
                    </div>
                    <div class="mdui-col-sm-10">
                        <div class="class-dis-star">
                        <?php
                            $teacherstar = intval($Teacher['Score']);
                            $star_all->GenerateStar($teacherstar);
                        ?>
                            <strong style="font-size:20px;">&nbsp&nbsp<?php echo sprintf("%.1f", $Teacher['Score']); ?></strong></div>
                        <p><strong>姓名：</strong><?php echo $Teacher['TeacherName']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                        <p><strong>学院：</strong><?php echo $Teacher['TeacherSchool']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <!--点评部分 开始-->
                <!--点评大标题 头部-->
                <div class="mdui-row class-commit-title">
                    <div class="mdui-col-md-12"
                        style="display: flex; justify-content:space-between;align-content: center;">
                        <h1 class="class-title">点评</h1>


                        <button id="write" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent"
                            style="float:none;position:absolute;top:20%;right:10%;"><i
                                class="mdui-icon material-icons">add</i>写评论</button>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <div class="mdui-row">
                    <!--点评内容 开始-->
                    <div class="mdui-col-md-12">
<?php
if ($login) {
    echo <<< commit
    <div class="mdui-dialog" id="report">
        <div class="mdui-dialog-title">确定?</div>
        <div class="mdui-dialog-content">真的要举报这个答案吗?</div>
        <div class="mdui-dialog-actions">
        <span style="display:none" id="jbid"></span>
            <button class="mdui-btn mdui-ripple" mdui-dialog-close>再想想</button>
            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm id="qdjb">举报</button>
        </div>
    </div>
commit;
}
$db->where("ClassID", $ClassID);
if ($db->has("class_commit")) {
    $db->where("ClassID", $ClassID);
    $db->where('Hidden','false');
    $commit = $db->get('class_commit');
    $avatar=new avatar;
    foreach ($commit as $keys) {
        if($keys['Anonymous']==1){
            $uname='匿名用户';
            $avsrc='https://ui-avatars.com/api/?background=9e9e9e&color=fff&name=匿&length=1';
        }else{
            $uname=$keys['UserName'];
            $avsrc=$avatar->make($keys['UserName']);
        }
    ?>
        <!--评价卡片个体 开始-->
        <div class="mdui-card mdui-shadow-0 class-commit-body" style="border-radius: 10px;">
            <!-- 卡片头部，头像 日期-->
            <div class="mdui-card-header">
                <img class="mdui-card-header-avatar" src="<?php echo $avsrc;?>" />
                <div class="mdui-card-header-title commit-title"><?php echo $uname;?></div>
                <div class="mdui-card-header-subtitle"><?php echo $keys['Time'];?><div class="commit-star-container">
        <?php
        $commitstar = intval($keys['Score']);
        $star_all->GenerateStar($commitstar,"commit-star");
        $formatscore = sprintf("%.1f", $keys['Score']);
        ?>

                        <strong><?php echo $formatscore;?></strong>
                    </div>
                </div>
            </div>
            <!--评价内容-->
            <div class="mdui-card-content commit-inner"><?php echo $keys['Text'];?></div>
            <div class="commit-eachother">
                <!--<button class="mdui-btn mdui-btn-icon" id="commitgood"><i
                        class="mdui-icon material-icons commit-icons">thumb_up</i></button>
                <p>0</p>
                <button class="mdui-btn mdui-btn-icon" id="commitbad"><i
                        class="mdui-icon material-icons commit-icons">thumb_down</i></button>
                <p>0</p>-->
                <button class="mdui-btn mdui-btn-dense mdui-color-white mdui-ripple"
        <?php
        if ($login) {
            echo <<<jb
        mdui-dialog="{target: '#report'}"
jb;
        }
        echo <<< commit3
                                   onclick="jb({$keys['CommitID']});" ><i
                                        class="mdui-icon material-icons commit-icons">error_outline</i>举报</button>
                            </div>
                        </div>
                        <!--评价卡片个体 结束-->
                        <div class="mdui-divider"></div>
commit3;
    }
} else {
    echo "暂无评价哦，快来发表你的看法!";
}?>




                    </div>
                    <!--点评内容 结束-->
                </div>
                <!--点评部分 结束-->
            </div>
            <!--左栏 课程详细信息 结束-->

            <!--右栏 任课教师信息 开始-->
            <div class="mdui-col-md-3 mdui-col-offset-md-1 class-teacher-container mdui-shadow-9 basic-col">
                <div class="mdui-row">
                    <div class="mdui-col-md-12" style="display:flex;align-items: center;justify-content:left;">
                        <h3 class="class-teacher-subtit">任课教师信息</h3>
                    </div>
                </div>
                <div class="mdui-divider"></div>

                <div class="mdui-row">
                    <!--任课教师信息 好评率等 开始-->
                    <div class="mdui-col-md-12">
                        <div class="mdui-card-media">
                            <img src="https://ui-avatars.com/api/?color=fff&name=<?php echo $Teacher['TeacherName']?>&length=1&size=256" />
                            <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                                <div class="mdui-card-primary">
                                    <div class="mdui-card-primary-title"><?php echo $Teacher['TeacherName']; ?>老师<br>(<?php echo $Teacher['TeacherSchool']; ?>)</div>
                                    <div class="mdui-card-primary-subtitle teacherstar">
                                    <?php
                                        $star_all->GenerateStar($teacherstar);
                                    ?>
                                        <strong style="font-size:20px;">&nbsp&nbsp<?php echo sprintf("%.1f", $Teacher['Score']); ?></strong></div>
                                </div>

                            </div>

                        </div>
                        <!--
                        <div class="mdui-card-content">
                            <p><strong>课程好评率：</strong>99%</p>
                            <p><strong>点名率：</strong>0%</p>
                        </div>
                        -->


                    </div>
                    <!--任课教师信息 好评率等 结束-->
                    <!--其他老师的相同课程-->
                    <div class="mdui-col-md-12" style="margin-top:20px;">
                        <div class="mdui-divider"></div>
                        <h3 class="class-teacher-subtit">其他老师的《<?php echo $Class['Name'];?>》课</h3>
                        <table class="mdui-table mdui-shadow-0 class-subtable">
                            <tbody class="mdui-typo">
                            <?php
                            $n=1;
                            if($sameclasscount>0){
                            foreach($sameclass as $sameclassa){
                                if($sameclassa['ClassID']==$_GET['ClassID']) continue;
                                echo '<tr>';
                                echo "<td><a href=\"class.php?ClassID={$sameclassa['ClassID']}\">{$n}、{$sameclassa['Name']}({$sameclassa['TeacherName']})</a></td>";
                                echo '</tr>';
                                $n++;
                            }
                        }
                        else echo '<tr><td>暂无课程</td></tr>';
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mdui-col-md-12" style="margin-top:20px;">
                        <div class="mdui-divider"></div>
                        <!--该老师的不同课程-->
                        <h3 class="class-teacher-subtit"><?php echo $Teacher['TeacherName'];?>老师的其他课</h3>
                        <table class="mdui-table mdui-shadow-0 class-subtable">
                            <tbody class="mdui-typo">
                            <?php
                            $p=1;
                            if($sameteachercount>0){
                            foreach($sameteacher as $sameteachera){
                                if($sameteachera['ClassID']==$_GET['ClassID']) continue;
                                echo '<tr>';
                                echo "<td><a href=\"class.php?ClassID={$sameteachera['ClassID']}\">{$p}、{$sameteachera['Name']}</td>";
                                echo '</tr>';
                                $p++;
                            }
                        }
                        else echo '<tr><td>暂无课程</td></tr>';
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--右栏 任课教师信息 结束-->
        </div>
    </div>
    <!--网页主体 结束-->
    </div>
    <!--举报对话框-->
<?php
if ($login) {
?>
    <div class="mdui-dialog" id="report">
        <div class="mdui-dialog-title">确定?</div>
        <div class="mdui-dialog-content">真的要举报这个答案吗?</div>
        <div class="mdui-dialog-actions">
            <button class="mdui-btn mdui-ripple" mdui-dialog-close>再想想</button>
            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm id="qdjb">举报</button>
        </div>
    </div>
    <!--评价dialog 开始-->
    <div id="dialogcontainer">
        <div id="commitdialog" class="mc-login mdui-dialog">
            <button id="closebutton" class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i
                    class="mdui-icon material-icons">close</i></button>
            <div class="mdui-dialog-title mdui-color-indigo">发表我的看法</div>
            <form action="../modules/class_commit.php" method="POST" onsubmit="return validate_form(this)" id="commitform">
                <div id="commit-star-group" class="stg">
                    <h4>综合评分：</h3>
                        <div id="a1">
                            <i id="star01" class="mdui-icon material-icons">star_border</i>
                            <i id="star02" class="mdui-icon material-icons">star_border</i>
                            <i id="star03" class="mdui-icon material-icons">star_border</i>
                            <i id="star04" class="mdui-icon material-icons">star_border</i>
                            <i id="star05" class="mdui-icon material-icons">star_border</i></div>
                        <h3 id="startext0">
                            </h1>
                </div>
                <div id="commit-star-difficulty" class="stg">
                    <h4>课程难度：</h3>
                        <div id="a2">
                            <i id="star11" class="mdui-icon material-icons">star_border</i>
                            <i id="star12" class="mdui-icon material-icons">star_border</i>
                            <i id="star13" class="mdui-icon material-icons">star_border</i>
                            <i id="star14" class="mdui-icon material-icons">star_border</i>
                            <i id="star15" class="mdui-icon material-icons">star_border</i></div>
                        <h3 id="startext1">
                            </h1>
                </div>
                <div id="commit-star-gets" class="stg">
                    <h4>收获大小：</h3>
                        <div id="a3">
                            <i id="star21" class="mdui-icon material-icons">star_border</i>
                            <i id="star22" class="mdui-icon material-icons">star_border</i>
                            <i id="star23" class="mdui-icon material-icons">star_border</i>
                            <i id="star24" class="mdui-icon material-icons">star_border</i>
                            <i id="star25" class="mdui-icon material-icons">star_border</i></div>
                        <h3 id="startext2">
                            </h1>
                </div>
                <div id="commit-star-gets" class="stg">
                    <h4>给分好坏：</h3>
                        <div id="a4">
                            <i id="star31" class="mdui-icon material-icons">star_border</i>
                            <i id="star32" class="mdui-icon material-icons">star_border</i>
                            <i id="star33" class="mdui-icon material-icons">star_border</i>
                            <i id="star34" class="mdui-icon material-icons">star_border</i>
                            <i id="star35" class="mdui-icon material-icons">star_border</i></div>
                        <h3 id="startext3">
                            </h1>
                </div>
                <div id="commit-star-gets" class="stg">
                    <h4>作业多少：</h3>
                        <div id="a5">
                            <i id="star41" class="mdui-icon material-icons">star_border</i>
                            <i id="star42" class="mdui-icon material-icons">star_border</i>
                            <i id="star43" class="mdui-icon material-icons">star_border</i>
                            <i id="star44" class="mdui-icon material-icons">star_border</i>
                            <i id="star45" class="mdui-icon material-icons">star_border</i></div>
                        <h3 id="startext4">
                            </h1>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label" style="margin:0px 20px 10px 20px;">
                    <label class="mdui-textfield-label">我的看法(200字以内)</label>
                    <textarea class="mdui-textfield-input" form="commitform" name="Text"
                        onpropertychange="if(value.length>200) value=value.substr(0,200)" maxlength="200"></textarea>
                        <br>
                        <label>匿名提交<input name="Anonymous" type="checkbox" value="Anonymous" /></label>
                </div>
                <input type="hidden" id="cid" name="ClassID" value="<?php echo $ClassID;?>">
                <input type="hidden" id="allscore" name="Score" value="">
                <input type="hidden" id="difficulty" name="Difficulty" value="">
                <input type="hidden" id="getsinfo" name="Gets" value="">
                <input type="hidden" id="betterscore" name="GiveScore" value="">
                <input type="hidden" id="homework" name="Homework" value="">
                <div class="centercontainer">
                    <input type="submit" id="commitgo" class="mdui-btn mdui-btn-raised mdui-color-theme-accent cmbtn" value="发表">
                </div>
            </form>
        </div>
    </div>
            <!--这个js有星星变化、提交检测有没有填完-->
            <script src="../js/class-writecheck.js"></script>
            <script src="../js/class_ajax.js"></script>
            <!--评价dialog 结束-->
<?php
} else {
    echo <<< js
    <script src="../js/class_login.js"></script>
js;
}
?>
</body>
</html>