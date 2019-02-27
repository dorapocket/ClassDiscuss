window.onload=function(){closeall();}
var regmain = new mdui.Dialog("#reg");
var loginmain = new mdui.Dialog("#login");
var resetmain = new mdui.Dialog("#reset");
function displayok(name) {
  document.getElementById(name).style.display = "block";
}
function displayno(name) {
  document.getElementById(name).style.display = "none";
}
function showreg() {
  displayno("logindialogcontainer");
  displayno("resetdialogcontainer");
  displayok("regdialogcontainer");
  resetmain.close();
  loginmain.close();
  regmain.open();
}
function showlogin() {
  displayno("regdialogcontainer");
  displayno("resetdialogcontainer");
  displayok("logindialogcontainer");
  loginmain.open();
  regmain.close();
  resetmain.close();
}
function showreset() {
  displayno("logindialogcontainer");
  displayno("regdialogcontainer");
  displayok("resetdialogcontainer");
  regmain.close();
  loginmain.close();
  resetmain.open();
}
document.getElementById("lireg").addEventListener("click", function () { loginmain.close(); showreg(); });
document.getElementById("lires").addEventListener("click", function () { loginmain.close(); showreset();});
document.getElementById("reglog").addEventListener("click", function () { regmain.close(); showlogin();});

function closeall() {
  document.getElementById("body").classList.remove("mdui-locked");
  displayno("logindialogcontainer");
  displayno("regdialogcontainer");
  displayno("resetdialogcontainer");
  regmain.close();
  loginmain.close();
  resetmain.close();
}
var cbutton=document.getElementsByClassName("close");
cbutton[0].addEventListener("click",function(){closeall();});
cbutton[1].addEventListener("click",function(){closeall();});
cbutton[2].addEventListener("click",function(){closeall();});
document.getElementById("cl").addEventListener("click",function(){showlogin();});
document.getElementById("cr").addEventListener("click",function(){showreg();});
document.getElementById("loginhh").addEventListener("click",function(){showlogin();});
document.getElementById("reghh").addEventListener("click",function(){showreg();});