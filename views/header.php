<?php
session_start();
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1) {
    $login = true;
} else {
    $login = false;
}
?>


<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-indigo">
    <!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">menu</i></a>-->
    <a href="index.php" class="mdui-typo-title" id="toobartit">HDU评课社区</a>
    <div class="mdui-toolbar-spacer"></div>
    <div class="mdui-textfield mdui-textfield-expandable mdui-float-right searchbox" style="max-width:40%;">
      <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
      <input class="mdui-textfield-input" type="text" placeholder="搜索课程" />
      <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
    </div>
    <?php
if (!$login) {
    echo <<< lgin
    <button class="login-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white" id="loginhh">登录</button>
    <button class="reg-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white" id="reghh">注册</button>
lgin;
} else {
    $username=$_SESSION['UserName'];
    echo <<< use
    <button class="mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white" id="usertab" mdui-menu="{target: '#usermenu'}">{$username}</button>
    <ul class="mdui-menu" id="usermenu">
    <li class="mdui-menu-item">
      <a href="javascript:;" class="mdui-ripple" id="logout">
        <i class="mdui-menu-item-icon mdui-icon material-icons">exit_to_app</i>注销咯
      </a>
    </li>
  </ul>
use;
}

?>
  </div>
</header>
<?php 
if(!$login){
  echo <<<logdialog
<div id="logindialogcontainer">
  <div id="login" class="mc-login mdui-dialog" style="top: 227.6px; display: block; height: 540.8px;"><button
      class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-indigo">登录</div>
    <form>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5">
        <label class="mdui-textfield-label">用户名或邮箱</label><input id="loginname" class="mdui-textfield-input" name="name" type="text"
          required="">
        <div class="mdui-textfield-error">账号不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">密码</label><input id="loginpassword" class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button class="mdui-btn mdui-ripple more-option" type="button"
          mdui-menu="{target: '#mc-login-menu', position: 'top', covered: true}">更多选项</button>
        <ul class="mdui-menu" id="mc-login-menu">
          <li class="mdui-menu-item"><a id="lires" class="mdui-ripple mc-password-reset-trigger">忘记密码</a></li>
          <li class="mdui-menu-item"><a id="lireg" class="mdui-ripple mc-register-trigger">创建新账号</a></li>
        </ul><button type="button" id="letslogin" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">登录</button>
      </div>
    </form>
  </div>
</div>
<div id="regdialogcontainer">
  <div id="reg" class="mc-register mdui-dialog"><button class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i
        class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-green mdui-text-color-white">创建新账号</div>
    <form id="reg1" class="">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">邮箱</label><input class="mdui-textfield-input" name="email" id="regemailbox"
          type="email" required="">
        <div class="mdui-textfield-error">邮箱格式错误</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field">
        <label class="mdui-textfield-label">邮件验证码</label><input class="mdui-textfield-input" id="regcode"
          name="email_code" type="text" required="">
        <div class="mdui-textfield-error">验证码不能为空</div><button class="mdui-btn send-email" type="button"
          id="regcreatecode">发送验证码</button>
      </div>
      <div class="actions">
        <div id="reglog" class="mdui-btn mdui-ripple more-option mc-login-trigger">已有账号？</div><button type="button"
          id="inreg2" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">下一步</button>
      </div>
    </form>
    <form id="reg2" class="mdui-hidden">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">用户名</label><input id="regname" class="mdui-textfield-input" name="username" type="text"
          required="">
        <div class="mdui-textfield-error">用户名不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">密码</label><input id="regpsw" class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button type="button"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right" id="letsreg">注册</button></div>
    </form>
  </div>
</div>
<div id="resetdialogcontainer">
  <div id="reset" class="mc-reset mdui-dialog" style="display: none; top: 227.6px; height: 540.8px;"><button
      id="closeall" class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i
        class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-deep-orange mdui-text-color-white">重置密码</div>
    <form class="" id="res1">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5">
        <label class="mdui-textfield-label">邮箱</label><input id="resemail" class="mdui-textfield-input" name="email" type="email"
          required="">
        <div class="mdui-textfield-error">邮箱格式错误</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field"><label
          class="mdui-textfield-label">邮件验证码</label><input id="resmailcode" class="mdui-textfield-input" name="email_code" type="text"
          required="">
        <div class="mdui-textfield-error">验证码不能为空</div><button class="mdui-btn send-email" type="button" id="rescreatecode">发送验证码</button>
      </div>
      <div class="actions"><button type="button" class="mdui-btn mdui-ripple more-option"
          mdui-menu="{target: '#mc-password-reset-menu', position: 'top', covered: true}">更多选项</button>
        <ul class="mdui-menu" id="mc-password-reset-menu">
          <li class="mdui-menu-item"><a class="mdui-ripple mc-login-trigger" id="cl">登录账号</a>
          </li>
          <li class="mdui-menu-item"><a class="mdui-ripple mc-register-trigger" id="cr">创建新账号</a></li>
        </ul><button type="button" id="reset2"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">下一步</button>
      </div>
    </form>
    <form class="mdui-hidden" id="res2">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label" >新密码</label><input id="npw1" class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label" >重复新密码</label><input id="npw2" class="mdui-textfield-input" name="password_repeat"
          type="password" required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button type="button"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right" id="letsres">提交</button></div>
    </form>
  </div>
</div>
logdialog;
}?>
<?php
if (!$login) {
    echo <<< lgin
    <script src="../js/headerbar.js"></script>
    <script src="../js/headerbar_dialog.js"></script>
lgin;
} else {
    echo <<< use
    <script src="../js/headerbar_log.js"></script>
    <script src="../js/headerbar_dialog.js"></script>
use;
}
?>