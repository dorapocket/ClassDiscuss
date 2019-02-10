<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
  <link rel="stylesheet" href="../css/mdui.min.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/mc.css">
  <title>HDU评课系统</title>
</head>

<body class="mdui-bottom-nav-fixed" style="background-color:#f1f1f1;">

  <!--导航菜单 开始-->
  <?php include"header.php"?>
  <!--导航菜单 结束-->

  <!--主体框架开始 GRID-->
  <div id="recent">
    <div class="mdui-container-fluid">
      <div class="mdui-row">
        <!--评价部分（左栏） 开始-->
        <div class="mdui-col-md-6 mdui-col-offset-md-1 mdui-col-sm-8 ">
          <!--评价卡片个体 开始-->
          <div class="mdui-card mdui-shadow-10" style="border-radius: 10px;">
            <!-- 卡片头部，头像 日期 星级  -->
            <div class="mdui-card-header">
              <img class="mdui-card-header-avatar" src="../img/avatar1.jpg" />
              <div class="mdui-card-header-title">Title</div>
              <div class="mdui-card-header-subtitle">Subtitle</div>
              <!--星级评定-->
              <div class="class-star">
                <div class="star-icon">
                  <i class="mdui-icon material-icons index-star">star</i>
                  <i class="mdui-icon material-icons index-star">star</i>
                  <i class="mdui-icon material-icons index-star">star</i>
                  <i class="mdui-icon material-icons index-star">star_half</i>
                  <i class="mdui-icon material-icons index-star">star_border</i>
                </div>
                <strong>5.2</strong>
              </div>
            </div>
            <!--评价内容-->
            <div class="mdui-card-content">子曰：「学而时习之，不亦说乎？有朋自远方来，不亦乐乎？人不知，而不愠，不亦君子乎？」</div>
          </div>
          <!--评价卡片个体 结束-->

        </div>
        <!--评价部分（左栏） 结束-->
        <!--排行部分（右栏） 开始-->
        <div class="mdui-col-md-3 mdui-col-offset-md-1 mdui-col-sm-4  index-right">
          <!--常开面板 课程热搜榜 开始-->
          <div class="mdui-panel" mdui-panel>
            <div class="mdui-panel-item  mdui-panel-item-open mdui-hoverable">
              <div class="mdui-panel-item-header"><i class="mdui-icon material-icons">format_list_numbered</i>课程热搜榜
              </div>
              <div class="mdui-panel-item-body">
                <div class="item-in-panel">
                  <strong class="hot-search-num-1">1.</strong>
                  <p style="display:inline;font-size:20px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num-2">2.</strong>
                  <p style="display:inline;font-size:18px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num-3">3.</strong>
                  <p style="display:inline;font-size:16px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">4.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">5.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">6.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
              </div>
            </div>
          </div>
          <!--常开面板 课程热搜榜 结束-->
          <!--常开面板 课程巅峰榜 开始-->
          <div class="mdui-panel" mdui-panel>
            <div class="mdui-panel-item  mdui-panel-item-open mdui-hoverable">
              <div class="mdui-panel-item-header"><i class="mdui-icon material-icons">format_list_numbered</i>课程巅峰榜
              </div>
              <div class="mdui-panel-item-body">
                <div class="item-in-panel">
                  <strong class="hot-search-num-1">1.</strong>
                  <p style="display:inline;font-size:20px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num-2">2.</strong>
                  <p style="display:inline;font-size:18px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num-3">3.</strong>
                  <p style="display:inline;font-size:16px;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">4.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">5.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
                <div class="mdui-divider"></div>
                <div class="item-in-panel">
                  <strong class="hot-search-num">6.</strong>
                  <p style="display:inline;margin:5px 5px 5px 5px;">测试课程1</p>
                </div>
              </div>
            </div>
          </div>
          <!--常开面板 课程巅峰榜 结束-->
        </div>
      </div>
    </div>
  </div>

  <!--登陆 注册等 开始-->

  <!--登陆 注册等 结束-->





  <!--底部菜单 开始-->
  <footer>

  </footer>
  <!--底部菜单 结束-->
</body>

</html>