<?php
session_start();
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1) {
    $login = true;
} else {
    $login = false;
}
?>


<header class="mdui-appbar mdui-appbar-fixed mdui-appbar-inset">
  <div class="mdui-toolbar mdui-color-indigo">
    <a mdui-drawer="{target: '#left-drawer',swipe:true}" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">menu</i></a>
    <a href="index.php" class="mdui-typo-title" id="toobartit">HDU评课社区</a>
    <div class="mdui-toolbar-spacer"></div>
    <div class="mdui-textfield mdui-textfield-expandable mdui-float-right searchbox" style="max-width:40%;">
      <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
      <input class="mdui-textfield-input" type="text" placeholder="搜索课程" />
      <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
    </div>
    <div class="mc-drawer mdui-drawer mdui-drawer-close" id="left-drawer">
    <button class="mdui-btn" mdui-drawer-close>close</button>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">near_me</i>
        <div class="mdui-list-item-content">开始使用</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="./download" class="mdui-list-item mdui-ripple ">安装</a>
        <a href="./compatibility" class="mdui-list-item mdui-ripple ">兼容性</a>
        <a href="./jq" class="mdui-list-item mdui-ripple ">JavaScript 工具库</a>
        <a href="./global" class="mdui-list-item mdui-ripple ">JavaScript 全局方法</a>
      </div>
    </div>

    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange">layers</i>
        <div class="mdui-list-item-content">样式</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="./color" class="mdui-list-item mdui-ripple ">颜色与主题</a>
        <a href="./font" class="mdui-list-item mdui-ripple ">字体</a>
        <a href="./grid" class="mdui-list-item mdui-ripple ">网格布局</a>
        <a href="./typo" class="mdui-list-item mdui-ripple ">排版</a>
        <a href="./icon" class="mdui-list-item mdui-ripple ">图标</a>
        <a href="./media" class="mdui-list-item mdui-ripple ">媒体</a>
        <a href="./helper" class="mdui-list-item mdui-ripple ">辅助类</a>
        <a href="./shadow" class="mdui-list-item mdui-ripple ">阴影</a>
      </div>
    </div>

    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">widgets</i>
        <div class="mdui-list-item-content">组件</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="./ripple" class="mdui-list-item mdui-ripple ">涟漪动画效果</a>
        <a href="./button" class="mdui-list-item mdui-ripple ">按钮</a>
        <a href="./fab" class="mdui-list-item mdui-ripple ">浮动操作按钮</a>
        <a href="./select" class="mdui-list-item mdui-ripple ">下拉选择</a>
        <a href="./divider" class="mdui-list-item mdui-ripple ">分隔线</a>
        <a href="./panel" class="mdui-list-item mdui-ripple ">可扩展面板</a>
        <a href="./textfield" class="mdui-list-item mdui-ripple ">文本框</a>
        <a href="./selection_control" class="mdui-list-item mdui-ripple ">选择控件</a>
        <a href="./slider" class="mdui-list-item mdui-ripple ">滑块</a>
        <a href="./list" class="mdui-list-item mdui-ripple ">列表</a>
        <a href="./list_control" class="mdui-list-item mdui-ripple ">列表控制</a>
        <a href="./grid_list" class="mdui-list-item mdui-ripple ">网格列表</a>
        <a href="./tab" class="mdui-list-item mdui-ripple ">Tab 选项卡</a>
        <a href="./toolbar" class="mdui-list-item mdui-ripple ">工具栏</a>
        <a href="./appbar" class="mdui-list-item mdui-ripple ">应用栏</a>
        <a href="./drawer" class="mdui-list-item mdui-ripple ">抽屉式导航</a>
        <a href="./bottom_nav" class="mdui-list-item mdui-ripple ">底部导航栏</a>
        <a href="./card" class="mdui-list-item mdui-ripple ">卡片</a>
        <a href="./chip" class="mdui-list-item mdui-ripple ">纸片</a>
        <a href="./tooltip" class="mdui-list-item mdui-ripple ">工具提示</a>
        <a href="./snackbar" class="mdui-list-item mdui-ripple ">Snackbar</a>
        <a href="./table" class="mdui-list-item mdui-ripple ">表格</a>
        <a href="./dialog" class="mdui-list-item mdui-ripple ">对话框</a>
        <a href="./menu" class="mdui-list-item mdui-ripple ">菜单</a>
        <a href="./progress" class="mdui-list-item mdui-ripple ">进度指示器</a>
      </div>
    </div>

    <div class="mdui-collapse-item mdui-collapse-item-open">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-brown">view_carousel</i>
        <div class="mdui-list-item-content">JavaScript 插件</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="./collapse" class="mdui-list-item mdui-ripple mdui-list-item-active">Collapse</a>
        <a href="./headroom" class="mdui-list-item mdui-ripple ">Headroom</a>
      </div>
    </div>

    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-purple">local_mall</i>
        <div class="mdui-list-item-content">资源</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="./material_icon" class="mdui-list-item mdui-ripple ">Material 图标</a>
      </div>
    </div>
  </div>
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