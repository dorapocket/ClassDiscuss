var commitdialog = new mdui.Dialog("#commitdialog");
                function displayok() {
                    document.getElementById("dialogcontainer").style.display = "block";
                }
                function displayno() {
                    document.getElementById("dialogcontainer").style.display = "none";
                }
                var startext0 = document.getElementById("startext0");
                var startext1 = document.getElementById("startext1");
                var startext2 = document.getElementById("startext2");
                var startext3 = document.getElementById("startext3");
                var startext4 = document.getElementById("startext4");
                var vallscore = document.getElementById("allscore");
                var vdifficulty = document.getElementById("difficulty");
                var vgetsinfo = document.getElementById("getsinfo");
                var vbetterscore = document.getElementById("betterscore");
                var vhomework = document.getElementById("homework");
                document.getElementById("write").addEventListener("click", function () { displayok(); commitdialog.open(); });
                document.getElementById("closebutton").addEventListener("click", function () { displayno(); commitdialog.close(); })
                function star(name) { document.getElementById(name).innerText = "star"; }
                function nostar(name) { document.getElementById(name).innerText = "star_border"; }
                function clickanimation(name) { var aa = document.getElementById(name); aa.style.animation = "clickback 0.5s ease 0s"; aa.addEventListener("animationend", function () { aa.style.animation = ""; }); }
                document.getElementById("star01").addEventListener("mouseover", function () { if (vallscore.value == "") { star("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = "较差"; } });
                document.getElementById("star02").addEventListener("mouseover", function () { if (vallscore.value == "") { star("star01"); star("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = "一般"; } });
                document.getElementById("star03").addEventListener("mouseover", function () { if (vallscore.value == "") { star("star01"); star("star02"); star("star03"); nostar("star04"); nostar("star05"); startext0.innerText = "还行"; } });
                document.getElementById("star04").addEventListener("mouseover", function () { if (vallscore.value == "") { star("star01"); star("star02"); star("star03"); star("star04"); nostar("star05"); startext0.innerText = "推荐"; } });
                document.getElementById("star05").addEventListener("mouseover", function () { if (vallscore.value == "") { star("star01"); star("star02"); star("star03"); star("star04"); star("star05"); startext0.innerText = "极好"; } });
                document.getElementById("star11").addEventListener("mouseover", function () { if (vdifficulty.value == "") { star("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = "极简"; } });
                document.getElementById("star12").addEventListener("mouseover", function () { if (vdifficulty.value == "") { star("star11"); star("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = "简单"; } });
                document.getElementById("star13").addEventListener("mouseover", function () { if (vdifficulty.value == "") { star("star11"); star("star12"); star("star13"); nostar("star14"); nostar("star15"); startext1.innerText = "还行"; } });
                document.getElementById("star14").addEventListener("mouseover", function () { if (vdifficulty.value == "") { star("star11"); star("star12"); star("star13"); star("star14"); nostar("star15"); startext1.innerText = "略难"; } });
                document.getElementById("star15").addEventListener("mouseover", function () { if (vdifficulty.value == "") { star("star11"); star("star12"); star("star13"); star("star14"); star("star15"); startext1.innerText = "天书"; } });
                document.getElementById("star21").addEventListener("mouseover", function () { if (vgetsinfo.value == "") { star("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = "毫无"; } });
                document.getElementById("star22").addEventListener("mouseover", function () { if (vgetsinfo.value == "") { star("star21"); star("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = "有点"; } });
                document.getElementById("star23").addEventListener("mouseover", function () { if (vgetsinfo.value == "") { star("star21"); star("star22"); star("star23"); nostar("star24"); nostar("star25"); startext2.innerText = "还行"; } });
                document.getElementById("star24").addEventListener("mouseover", function () { if (vgetsinfo.value == "") { star("star21"); star("star22"); star("star23"); star("star24"); nostar("star25"); startext2.innerText = "很多"; } });
                document.getElementById("star25").addEventListener("mouseover", function () { if (vgetsinfo.value == "") { star("star21"); star("star22"); star("star23"); star("star24"); star("star25"); startext2.innerText = "极大"; } });
                document.getElementById("star31").addEventListener("mouseover", function () { if (vbetterscore.value == "") { star("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = "坑爹"; } });
                document.getElementById("star32").addEventListener("mouseover", function () { if (vbetterscore.value == "") { star("star31"); star("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = "很差"; } });
                document.getElementById("star33").addEventListener("mouseover", function () { if (vbetterscore.value == "") { star("star31"); star("star32"); star("star33"); nostar("star34"); nostar("star35"); startext3.innerText = "还行"; } });
                document.getElementById("star34").addEventListener("mouseover", function () { if (vbetterscore.value == "") { star("star31"); star("star32"); star("star33"); star("star34"); nostar("star35"); startext3.innerText = "挺好"; } });
                document.getElementById("star35").addEventListener("mouseover", function () { if (vbetterscore.value == "") { star("star31"); star("star32"); star("star33"); star("star34"); star("star35"); startext3.innerText = "超好"; } });
                document.getElementById("star41").addEventListener("mouseover", function () { if (vhomework.value == "") { star("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = "没有"; } });
                document.getElementById("star42").addEventListener("mouseover", function () { if (vhomework.value == "") { star("star41"); star("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = "有点"; } });
                document.getElementById("star43").addEventListener("mouseover", function () { if (vhomework.value == "") { star("star41"); star("star42"); star("star43"); nostar("star44"); nostar("star45"); startext4.innerText = "还行"; } });
                document.getElementById("star44").addEventListener("mouseover", function () { if (vhomework.value == "") { star("star41"); star("star42"); star("star43"); star("star44"); nostar("star45"); startext4.innerText = "略多"; } });
                document.getElementById("star45").addEventListener("mouseover", function () { if (vhomework.value == "") { star("star41"); star("star42"); star("star43"); star("star44"); star("star45"); startext4.innerText = "一堆"; } });

                document.getElementById("star01").addEventListener("mouseout", function () { if (vallscore.value == "") { nostar("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = ""; } });
                document.getElementById("star02").addEventListener("mouseout", function () { if (vallscore.value == "") { nostar("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = ""; } });
                document.getElementById("star03").addEventListener("mouseout", function () { if (vallscore.value == "") { nostar("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = ""; } });
                document.getElementById("star04").addEventListener("mouseout", function () { if (vallscore.value == "") { nostar("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = ""; } });
                document.getElementById("star05").addEventListener("mouseout", function () { if (vallscore.value == "") { nostar("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); startext0.innerText = ""; } });
                document.getElementById("star11").addEventListener("mouseout", function () { if (vdifficulty.value == "") { nostar("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = ""; } });
                document.getElementById("star12").addEventListener("mouseout", function () { if (vdifficulty.value == "") { nostar("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = ""; } });
                document.getElementById("star13").addEventListener("mouseout", function () { if (vdifficulty.value == "") { nostar("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = ""; } });
                document.getElementById("star14").addEventListener("mouseout", function () { if (vdifficulty.value == "") { nostar("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = ""; } });
                document.getElementById("star15").addEventListener("mouseout", function () { if (vdifficulty.value == "") { nostar("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); startext1.innerText = ""; } });
                document.getElementById("star21").addEventListener("mouseout", function () { if (vgetsinfo.value == "") { nostar("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = ""; } });
                document.getElementById("star22").addEventListener("mouseout", function () { if (vgetsinfo.value == "") { nostar("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = ""; } });
                document.getElementById("star23").addEventListener("mouseout", function () { if (vgetsinfo.value == "") { nostar("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = ""; } });
                document.getElementById("star24").addEventListener("mouseout", function () { if (vgetsinfo.value == "") { nostar("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = ""; } });
                document.getElementById("star25").addEventListener("mouseout", function () { if (vgetsinfo.value == "") { nostar("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); startext2.innerText = ""; } });
                document.getElementById("star31").addEventListener("mouseout", function () { if (vbetterscore.value == "") { nostar("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = ""; } });
                document.getElementById("star32").addEventListener("mouseout", function () { if (vbetterscore.value == "") { nostar("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = ""; } });
                document.getElementById("star33").addEventListener("mouseout", function () { if (vbetterscore.value == "") { nostar("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = ""; } });
                document.getElementById("star34").addEventListener("mouseout", function () { if (vbetterscore.value == "") { nostar("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = ""; } });
                document.getElementById("star35").addEventListener("mouseout", function () { if (vbetterscore.value == "") { nostar("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); startext3.innerText = ""; } });
                document.getElementById("star41").addEventListener("mouseout", function () { if (vhomework.value == "") { nostar("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = ""; } });
                document.getElementById("star42").addEventListener("mouseout", function () { if (vhomework.value == "") { nostar("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = ""; } });
                document.getElementById("star43").addEventListener("mouseout", function () { if (vhomework.value == "") { nostar("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = ""; } });
                document.getElementById("star44").addEventListener("mouseout", function () { if (vhomework.value == "") { nostar("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = ""; } });
                document.getElementById("star45").addEventListener("mouseout", function () { if (vhomework.value == "") { nostar("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); startext4.innerText = ""; } });

                document.getElementById("star01").addEventListener("click", function () { star("star01"); nostar("star02"); nostar("star03"); nostar("star04"); nostar("star05"); clickanimation("a1"); startext0.innerText = "较差"; vallscore.value = "2"; });
                document.getElementById("star02").addEventListener("click", function () { star("star01"); star("star02"); nostar("star03"); nostar("star04"); nostar("star05"); clickanimation("a1"); startext0.innerText = "一般"; vallscore.value = "4"; });
                document.getElementById("star03").addEventListener("click", function () { star("star01"); star("star02"); star("star03"); nostar("star04"); nostar("star05"); clickanimation("a1"); startext0.innerText = "还行"; vallscore.value = "6"; });
                document.getElementById("star04").addEventListener("click", function () { star("star01"); star("star02"); star("star03"); star("star04"); nostar("star05"); clickanimation("a1"); startext0.innerText = "推荐"; vallscore.value = "8"; });
                document.getElementById("star05").addEventListener("click", function () { star("star01"); star("star02"); star("star03"); star("star04"); star("star05"); clickanimation("a1"); startext0.innerText = "极好"; vallscore.value = "10"; });
                document.getElementById("star11").addEventListener("click", function () { star("star11"); nostar("star12"); nostar("star13"); nostar("star14"); nostar("star15"); clickanimation("a2"); startext1.innerText = "极简"; vdifficulty.value = "2"; });
                document.getElementById("star12").addEventListener("click", function () { star("star11"); star("star12"); nostar("star13"); nostar("star14"); nostar("star15"); clickanimation("a2"); startext1.innerText = "简单"; vdifficulty.value = "4"; });
                document.getElementById("star13").addEventListener("click", function () { star("star11"); star("star12"); star("star13"); nostar("star14"); nostar("star15"); clickanimation("a2"); startext1.innerText = "还行"; vdifficulty.value = "6"; });
                document.getElementById("star14").addEventListener("click", function () { star("star11"); star("star12"); star("star13"); star("star14"); nostar("star15"); clickanimation("a2"); startext1.innerText = "略难"; vdifficulty.value = "8"; });
                document.getElementById("star15").addEventListener("click", function () { star("star11"); star("star12"); star("star13"); star("star14"); star("star15"); clickanimation("a2"); startext1.innerText = "天书"; vdifficulty.value = "10"; });
                document.getElementById("star21").addEventListener("click", function () { star("star21"); nostar("star22"); nostar("star23"); nostar("star24"); nostar("star25"); clickanimation("a3"); startext2.innerText = "毫无"; vgetsinfo.value = "2"; });
                document.getElementById("star22").addEventListener("click", function () { star("star21"); star("star22"); nostar("star23"); nostar("star24"); nostar("star25"); clickanimation("a3"); startext2.innerText = "有点"; vgetsinfo.value = "4"; });
                document.getElementById("star23").addEventListener("click", function () { star("star21"); star("star22"); star("star23"); nostar("star24"); nostar("star25"); clickanimation("a3"); startext2.innerText = "还行"; vgetsinfo.value = "6"; });
                document.getElementById("star24").addEventListener("click", function () { star("star21"); star("star22"); star("star23"); star("star24"); nostar("star25"); clickanimation("a3"); startext2.innerText = "很多"; vgetsinfo.value = "8"; });
                document.getElementById("star25").addEventListener("click", function () { star("star21"); star("star22"); star("star23"); star("star24"); star("star25"); clickanimation("a3"); startext2.innerText = "极大"; vgetsinfo.value = "10"; });
                document.getElementById("star31").addEventListener("click", function () { star("star31"); nostar("star32"); nostar("star33"); nostar("star34"); nostar("star35"); clickanimation("a4"); startext3.innerText = "坑爹"; vbetterscore.value = "2"; });
                document.getElementById("star32").addEventListener("click", function () { star("star31"); star("star32"); nostar("star33"); nostar("star34"); nostar("star35"); clickanimation("a4"); startext3.innerText = "很差"; vbetterscore.value = "4"; });
                document.getElementById("star33").addEventListener("click", function () { star("star31"); star("star32"); star("star33"); nostar("star34"); nostar("star35"); clickanimation("a4"); startext3.innerText = "还行"; vbetterscore.value = "6"; });
                document.getElementById("star34").addEventListener("click", function () { star("star31"); star("star32"); star("star33"); star("star34"); nostar("star35"); clickanimation("a4"); startext3.innerText = "挺好"; vbetterscore.value = "8"; });
                document.getElementById("star35").addEventListener("click", function () { star("star31"); star("star32"); star("star33"); star("star34"); star("star35"); clickanimation("a4"); startext3.innerText = "超好"; vbetterscore.value = "10"; });
                document.getElementById("star41").addEventListener("click", function () { star("star41"); nostar("star42"); nostar("star43"); nostar("star44"); nostar("star45"); clickanimation("a5"); startext4.innerText = "没有"; vhomework.value = "2"; });
                document.getElementById("star42").addEventListener("click", function () { star("star41"); star("star42"); nostar("star43"); nostar("star44"); nostar("star45"); clickanimation("a5"); startext4.innerText = "有点"; vhomework.value = "4"; });
                document.getElementById("star43").addEventListener("click", function () { star("star41"); star("star42"); star("star43"); nostar("star44"); nostar("star45"); clickanimation("a5"); startext4.innerText = "还行"; vhomework.value = "6"; });
                document.getElementById("star44").addEventListener("click", function () { star("star41"); star("star42"); star("star43"); star("star44"); nostar("star45"); clickanimation("a5"); startext4.innerText = "略多"; vhomework.value = "8"; });
                document.getElementById("star45").addEventListener("click", function () { star("star41"); star("star42"); star("star43"); star("star44"); star("star45"); clickanimation("a5"); startext4.innerText = "一堆"; vhomework.value = "10"; });
                function validate_required(field, alerttxt) {
                    with (field) {
                        if (value == null || value == "") { alert(alerttxt); return false }
                        else { return true }
                    }
                }
                function validate_form(thisform) {
                    with (thisform) {
                        if (validate_required(allscore, "请评价综合评分~~") == false) { allscore.focus(); return false; }
                        if (validate_required(difficulty, "课程难度还未评价！") == false) { difficulty.focus(); return false; }
                        if (validate_required(getsinfo, "请评价收获程度~~") == false) { getsinfo.focus(); return false; }
                        if (validate_required(betterscore, "老师给分好坏未评价！") == false) { betterscore.focus(); return false; }
                        if (validate_required(homework, "请评价作业多少~~") == false) { homework.focus(); return false; }
                    }
                }
