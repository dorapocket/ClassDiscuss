<?php 
  require_once '../modules/MysqliDb.php';
  require_once '../modules/config.php';
  require_once '../modules/star.php';
  require_once '../modules/avatar.php';
  $color=array("ef5350","ec407a","ab47bc","3d5afe","42a5f5","29b6f6","26c6da","26a69a","66bb6a","9ccc65","d4e157","ffee58","ffca28","ffa726","ff7043","a1887f","616161","90a4ae","d81b60","4527a0","18ffff","b2ff59","388e3c","ffd600","ffab00","e040fb","d500f9","d32f2f","ff1744","00b0ff","1e88e5","ff9800","ffb300","9e9e9e","424242","546e7a","37474f","b0bec5","f4511e");
  srand ((float) microtime() * 10000000);
   


  $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
  $result=$db->rawQuery("select a.UserID,a.ClassID,a.Score,a.UserName,a.Text,a.Time,a.Anonymous,b.Name from class_commit a,class b where a.ClassID=b.ClassID and a.Hidden=false order by CommitID desc");
  foreach($result as $Class){
    $rand_colors = array_rand ($color, 1);
    $name=($Class['Anonymous']==1) ? '匿名用户' : $Class['UserName'];
    $userhref=($Class['Anonymous']==1) ? '匿名用户' : '<a href=user.php?UserID='.$Class['UserID'].'>'.$Class['UserName'].'</a>';
    $avatar=new avatar;
    $avatarsrc=$avatar->make($name);
?>
    <!--评价卡片个体 开始-->
    <div class="mdui-card mdui-shadow-10" style="border-radius: 10px;">
      <!-- 卡片头部，头像 日期 星级  -->
      <div class="mdui-card-header">
        <?php
        if(!$Class['Anonymous']){
        echo '<a href="user.php?UserID='.$Class['UserID'].'">';
        }?>   
        <img class="mdui-card-header-avatar" src="<?php echo $avatarsrc;?>" />
        <?php
        if(!$Class['Anonymous']){
        echo '</a>';
        }?>
        <div class="mdui-card-header-title mdui-typo"><?php echo $userhref ?>&nbsp&nbsp评价了&nbsp&nbsp<a href="class.php?ClassID=<?php echo $Class['ClassID'];?>"><?php echo $Class['Name'];?></a></div>
        <div class="mdui-card-header-subtitle"><?php echo $Class['Time'];?></div>
        <!--星级评定-->
        <div class="class-star">
          <div class="star-icon">
<?php
$score = intval($Class['Score']);
$star=new star;
$star->GenerateStar($score,"index-star");
$ss=sprintf("%.1f", $Class['Score']);
$commitJQ=substr($Class['Text'],0,240);
if(strlen($commitJQ)<240){
$finall=$commitJQ;
}else{
    $finall=substr($Class['Text'],0,240)."...";
}
?>
          </div>
          <strong><?php echo $ss;?></strong>
        </div>
      </div>
      <!--评价内容-->
      <div class="mdui-card-content"><?php echo $finall;?></div>
    </div>
    <!--评价卡片个体 结束-->
<?php
  }
?>