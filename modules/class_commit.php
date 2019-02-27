<?php
/*
处理评价信息文件   StatusCode
200  正常
201  已经评价过了
500  数据库操作错误
000  数据传输错误
300  用户未登录
400  课程不存在
800  原来已经收藏了，取消
 */
//header("Content-type: application/xml;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
session_start();
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1) {
    $login = true;
} else {
    $login = false;
}
if ($login) {
    $ClassID = isset($_POST['ClassID']) ? $_POST['ClassID'] : '';
    $Score = isset($_POST['Score']) ? $_POST['Score'] : '';
    $Difficuty = isset($_POST['Difficulty']) ? $_POST['Difficulty'] : '';
    $Gets = isset($_POST['Gets']) ? $_POST['Gets'] : '';
    $GiveScore = isset($_POST['GiveScore']) ? $_POST['GiveScore'] : '';
    $Homework = isset($_POST['Homework']) ? $_POST['Homework'] : '';
    $Text = isset($_POST['Text']) ? $_POST['Text'] : '';
    $Anonymous=isset($_POST['Anonymous']) ? $_POST['Anonymous'] : '';
    if(strlen($Score)>2 || strlen($Difficuty)>2 ||strlen($Gets)>2 ||strlen($GiveScore)>2 ||strlen($Homework)>2 ||strlen($Text)>1000){
        die("传值错误！！！！！！");
        exit;
    }
    if (!empty($ClassID) && !empty($Score) && !empty($Difficuty) && !empty($Gets) && !empty($GiveScore) && !empty($Homework) && !empty($Text)) {
        require_once '../modules/MysqliDb.php';
        require_once '../modules/config.php';
        $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
        //$db->where("UserID",$_SESSION['UserID']);
        $db->where("ClassID", $ClassID);
        if ($db->has("class")) {
            $db->where("UserID",$_SESSION['UserID']);
            $db->where("ClassID", $ClassID);
            if (!($db->has("class_commit"))) {
                $data=array();
                $data['UserID']=$_SESSION['UserID'];
                $data['UserName']=$_SESSION['UserName'];
                $data['ClassID']=$ClassID;
                $data['Score']=$Score;
                $data['Difficulty']=$Difficuty;
                $data['Gets']=$Gets;
                $data['GiveScore']=$GiveScore;
                $data['Homework']=$Homework;
                $data['Text']=$Text;
                $data['Time']=$db->now();
                if($Anonymous=="Anonymous"){
                    $data['Anonymous']=true;
                }else{
                    $data['Anonymous']=false;
                }
                $id=$db->insert("class_commit",$data);
                $db->where('ClassID',$ClassID);
                if($db->has("class_ave_calc")){
                    $db->where('ClassID',$ClassID);
                    $calcnow=$db->getOne('class_ave_calc');
                    $data2=array();
                    $data2['AllScore']=$Score+$calcnow['AllScore'];
                    $data2['AllDifficulty']=$Difficuty+$calcnow['AllDifficulty'];
                    $data2['AllGets']=$Gets+$calcnow['AllGets'];
                    $data2['AllGiveScore']=$GiveScore+$calcnow['AllGiveScore'];
                    $data2['AllHomework']=$Homework+$calcnow['AllHomework'];
                    $data2['Num']=$calcnow['Num']+1;
                    $db->where('ClassID',$ClassID);
                    $id2=$db->update('class_ave_calc',$data2);
                }else{
                    $data2=array();
                    $data2['ClassID']=$ClassID;
                    $data2['AllScore']=$Score;
                    $data2['AllDifficulty']=$Difficuty;
                    $data2['AllGets']=$Gets;
                    $data2['AllGiveScore']=$GiveScore;
                    $data2['AllHomework']=$Homework;
                    $data2['Num']=1;
                    $id2=$db->insert('class_ave_calc',$data2);
                    $data3=array();
                }
                $data3['Score']=round($data2['AllScore']/$data2['Num'],8);
                $data3['Difficulty']=round($data2['AllDifficulty']/$data2['Num'],8);
                $data3['Gets']=round($data2['AllGets']/$data2['Num'],8);
                $data3['GiveScore']=round($data2['AllGiveScore']/$data2['Num'],8);
                $data3['Homework']=round($data2['AllGiveScore']/$data2['Num'],8);
                $db->where('ClassID',$ClassID);
                $id3=$db->update('class',$data3);

                $db->where('ClassID',$ClassID);
                $a=$db->getOne('class');
                $db->where('TeacherID',$a['TeacherID']);
                if($db->has("teacher_ave_calc")){
                    $db->where('TeacherID',$a['TeacherID']);
                    $calcnow=$db->getOne('teacher_ave_calc');
                    $data4=array();
                    $data4['AllScore']=$Score+$calcnow['AllScore'];
                    $data4['Num']=$calcnow['Num']+1;
                    $db->where('TeacherID',$a['TeacherID']);
                    $id4=$db->update('teacher_ave_calc',$data4);
                }else{
                    $data4=array();
                    $data4['TeacherID']=$a['TeacherID'];
                    $data4['AllScore']=$Score;
                    $data4['Num']=1;
                    $id4=$db->insert('teacher_ave_calc',$data4);
                }
                $data5=array();
                $data5['Score']=round($data4['AllScore']/$data4['Num'],8);
                $db->where('TeacherID',$a['TeacherID']);
                $id5=$db->update('teacher',$data5);



                if($id&&$id2&&$id3&&$id4&&$id5){
                    $StatusCode="200";
                    zc();
                    //goto echoend;
                }else{
                    $StatusCode="500";
                    sb();
                    goto echoend;
                }
            }else{
                $StatusCode="201";
                pjg();
                goto echoend;
            }
        }else{
            $StatusCode="400";
            sb();
            goto echoend;
        }
    }else{
        $StatusCode="000";
        sb();
        goto echoend;
    }
}else{
    $StatusCode="300";
    sb();
    goto echoend;
}

function zc(){
    echo <<<ok
    <h3>评价成功！</h3>
ok;
}
function pjg(){
    echo <<<ok
    <h3>你已经评价过这门课程啦！</h3>
ok;
}
function sb(){
    global $StatusCode;
    echo <<<ok
    <h3>不好意思，评价失败了，请稍后再试！</h3>
    <br><h4>错误代码：{$StatusCode}</h4>
ok;
}
echoend:
// $dom = new DOMDocument('1.0', 'utf-8');
// $element = $dom->createElement('StatusCode', $StatusCode);
// $dom->appendChild($element);
// echo $dom->saveXML();
?>
<span id="time">5秒钟后自动返回</span><br>
<!-- <script>
    //定义函数myClose关闭当前窗口
    function myClose(){
        //将id为time的元素的内容转为整数，保存在变量n中
        var n=parseInt(time.innerHTML);
        n--;//将n-1
        //如果n==0,关闭页面
        //否则, 将n+秒钟后自动关闭，再保存回time的内容中
        if(n>0){
            time.innerHTML=n+"秒钟后自动返回";
            timer=setTimeout(myClose,1000);
        }else{
            history.go(-1);
        }
    }
    var timer=null;
    //当页面加载后，启动周期性定时器，每个1秒执行myClose
    window.onload=function(){
        timer=setTimeout(myClose,1000);
    }
</script> -->
