<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-indigo">
    <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">menu</i></a>
    <a href="javascript:;" class="mdui-typo-title" id="toobartit">HDU评课社区</a>
    <div class="mdui-toolbar-spacer"></div>
    <div class="mdui-textfield mdui-textfield-expandable mdui-float-right searchbox">
      <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
      <input class="mdui-textfield-input" type="text" placeholder="搜索课程" />
      <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
    </div>
    <button class="login-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white" onclick="showlogin();" >登录</button>
    <button class="reg-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white" onclick="showreg();">注册</button>
  </div>
</header>
<div id="logindialogcontainer">
  <div id="login" class="mc-login mdui-dialog" style="top: 227.6px; display: block; height: 540.8px;"><button
      class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons"
        onclick="closeall();">close</i></button>
    <div class="mdui-dialog-title mdui-color-indigo">登录</div>
    <form>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5">
        <label class="mdui-textfield-label">用户名或邮箱</label><input class="mdui-textfield-input" name="name" type="text"
          required="">
        <div class="mdui-textfield-error">账号不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">密码</label><input class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button class="mdui-btn mdui-ripple more-option" type="button"
          mdui-menu="{target: '#mc-login-menu', position: 'top', covered: true}">更多选项</button>
        <ul class="mdui-menu" id="mc-login-menu">
          <li class="mdui-menu-item"><a id="lires" class="mdui-ripple mc-password-reset-trigger">忘记密码</a></li>
          <li class="mdui-menu-item"><a id="lireg" class="mdui-ripple mc-register-trigger">创建新账号</a></li>
        </ul><button type="submit" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">登录</button>
      </div>
    </form>
  </div>

  <div id="reg" class="mc-register mdui-dialog"><button onclick="closeall();"
      class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-green mdui-text-color-white">创建新账号</div>
    <form class="">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">邮箱</label><input class="mdui-textfield-input" name="email" type="email"
          required="">
        <div class="mdui-textfield-error">邮箱格式错误</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field">
        <label class="mdui-textfield-label">邮件验证码</label><input class="mdui-textfield-input" name="email_code"
          type="text" required="">
        <div class="mdui-textfield-error">验证码不能为空</div><button class="mdui-btn send-email" type="button">发送验证码</button>
      </div>
      <div class="actions">
        <div id="reglog" class="mdui-btn mdui-ripple more-option mc-login-trigger">已有账号？</div><button type="submit"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">下一步</button>
      </div>
    </form>
    <form class="mdui-hidden">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" name="username" type="text"
          required="">
        <div class="mdui-textfield-error">用户名不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">密码</label><input class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button type="submit"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">注册</button></div>
    </form>
  </div>

  <div id="reset" class="mc-reset mdui-dialog" style="display: none; top: 227.6px; height: 540.8px;"><button
      onclick="closeall();" class="mdui-btn mdui-btn-icon mdui-text-color-white close"><i
        class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title mdui-color-deep-orange mdui-text-color-white">重置密码</div>
    <form class="">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5">
        <label class="mdui-textfield-label">邮箱</label><input class="mdui-textfield-input" name="email" type="email"
          required="">
        <div class="mdui-textfield-error">邮箱格式错误</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom send-email-field"><label
          class="mdui-textfield-label">邮件验证码</label><input class="mdui-textfield-input" name="email_code" type="text"
          required="">
        <div class="mdui-textfield-error">验证码不能为空</div><button class="mdui-btn send-email" type="button">发送验证码</button>
      </div>
      <div class="actions"><button type="button" class="mdui-btn mdui-ripple more-option"
          mdui-menu="{target: '#mc-password-reset-menu', position: 'top', covered: true}">更多选项</button>
        <ul class="mdui-menu" id="mc-password-reset-menu">
          <li class="mdui-menu-item"><a class="mdui-ripple mc-login-trigger" onclick="closeall();showlogin();">登录账号</a>
          </li>
          <li class="mdui-menu-item"><a class="mdui-ripple mc-register-trigger"
              onclick="closeall();showreg();">创建新账号</a></li>
        </ul><button type="submit"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">下一步</button>
      </div>
    </form>
    <form class="mdui-hidden">
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">新密码</label><input class="mdui-textfield-input" name="password" type="password"
          required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label
          class="mdui-textfield-label">重复新密码</label><input class="mdui-textfield-input" name="password_repeat"
          type="password" required="">
        <div class="mdui-textfield-error">密码不能为空</div>
      </div>
      <div class="actions mdui-clearfix"><button type="submit"
          class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-float-right">提交</button></div>
    </form>
  </div>
</div>
<script>
  var regmain = new mdui.Dialog("#reg");
  var loginmain = new mdui.Dialog("#login");
  var resetmain = new mdui.Dialog("#reset");
  function displayok() {
    document.getElementById("logindialogcontainer").style.display = "block";
  }
  function displayno() {
    document.getElementById("logindialogcontainer").style.display = "none";
  }
  function showreg() {
    displayok();
    regmain.open();
  }
  function showlogin() {
    displayok();
    loginmain.open();
  }
  function showreset() {
    displayok();
    resetmain.open();
  }
  document.getElementById("lireg").addEventListener("click", function () { loginmain.close(); regmain.open(); });
  document.getElementById("lires").addEventListener("click", function () { loginmain.close(); resetmain.open(); });
  document.getElementById("reglog").addEventListener("click", function () { regmain.close(); loginmain.open(); });
  function closeall() {
    displayno();
    regmain.close();
    loginmain.close();
    resetmain.close();
  }
</script>