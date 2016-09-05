
<!DOCTYPE html>
<html class="js cssanimations"><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>漫空町 | 一个自由的匿名讨论版</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
  <link rel="stylesheet" href="http://121.41.115.101/acgair/main.css">

  <link rel="icon" href="img/icon.ico">
  <script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js"></script>
<script src="js/websocket.js"></script>
</head>
<body>
<header class="am-g my-head">
  <div class="am-u-sm-12 am-article" id='heads'>
    <h1 class="am-article-title">漫空町</h1>
    <p class="am-article-meta ">一个自由的匿名讨论版</p>
    <p id='para' class="am-animation-slide-top"></p>
    <img src="" id='headimg' class="am-circle" width="140" height="140" class="am-animation-scale-down">
  </div>
</header>
<hr class="am-article-divider">
<div class="am-g am-g-fixed">
  <div>
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article">
        <div>
        <ul class="am-comments-list" id="s">
          </ul>
          <!-- <form class="am-form">
            <fieldset> -->
       <div class="am-form-group">
        <div><label for="doc-ta-1">在此处输入信息:</label>
      
      <input id="msgBox" class="am-form-field" type="text" /></div>
      
      <br>
      <button type="button" class="am-btn am-btn-primary am-animation-shake"   id="sendMessage"><span class="am-icon-weixin"></span> Poi</button>
      <button type="button" class="am-btn am-btn-primary" id="editName">修改昵称</button>
      <button class="am-btn am-btn-primary" data-am-modal="{target: '#my-popup'}" onclick="return false;">聊天记录</button>
<button class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 225}"onclick="return false;">偏好设定</button>
    <!-- </fieldset>
      </form> -->
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">偏好设置
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>

    <div class="am-modal-bd">
      <button type="button" class="am-btn am-btn-default" onclick="return false;" id="offinfo">关闭登录提示</button>
      <button type="button" class="am-btn am-btn-primary am-active" onclick="return false;" id="voice">音效开关</button>
    </div>
  </div>
</div>

<div class="am-popup" id="my-popup">
  <div class="am-popup-inner">
    <div class="am-popup-hd">
      <h4 class="am-popup-title">聊天记录</h4>
      <span data-am-modal-close
            class="am-close">&times;</span>
    </div>
    <div class="am-popup-bd">
      <ul class="am-comments-list" id="olds">
          </ul>
    </div>
  </div>
</div>
<audio id="niconiconi" preload="auto">
        <source src="http://121.41.115.101/acgair/audio/niconiconi.mp3">
    </audio>
    <audio id="usermessage" preload="auto">
        <source src="http://121.41.115.101/acgair/audio/message.mp3">
    </audio>
<footer class="my-footer">
  <p>漫空<br>
    <small>本站不提供任何数据存储服务，所有内容均在实时转发后丢弃。</small>
    <br>
  天使にふれたよ!<br>
  <small>© 剪纸 technology 2015</small></p>
</footer>

</body></html>