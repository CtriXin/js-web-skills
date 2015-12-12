<?php
if(!isset($_SESSION)){
   session_start();  
}  
?>
<!DOCTYPE html>
<html manifest="/hzsb.manifest">
<head>
  <meta charset="utf-8">
  <meta content="yes" name="apple-mobile-web-app-capable" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta http-equiv="cache-control" content="private" />
<meta http-equiv="expires" content="0" />

  <title>孩在身边</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.2/css/amazeui.min.css"/>

<style type="text/css">
  a.am-btn-primary:visited,a.am-btn-danger:visited,a.am-btn-warning:visited,a.am-btn-secondary:visited,a.am-btn-success:visited{
color:#fff;
}

.set-bt, .set-bt span{ display:-webkit-box;-webkit-box-sizing:border-box; background-color:#ffffff;border:1px solid #d2d2d2; -webkit-border-radius:16px;}
.set-bt{width:52px; height:32px; text-align:left;}
.set-bt span{width:30px; height:30px;}
.set-on-bt{ background-color:#01e366; border:1px solid #01e366; -webkit-box-pack:end;}

</style>

</head>
<body>
<!-- http://7xkaou.com2.z0.glb.qiniucdn.com/xbjbg.png -->
<div style="margin: 10px 10px">
    <select id="mySelect" data-am-selected="{btnWidth: '100%', btnSize: 'sm', btnStyle: 'default'}">
<!--     <option value="rongyunid">学伴机一号</option> -->
  </select>
</div>
<div id="myImgContainer">
  <figure id="myfigure" data-am-widget="figure" class="am am-figure am-figure-default "
data-am-figure="{  pureview: 'true' }">
  <img id="myImg" src="http://7xkaou.com2.z0.glb.qiniucdn.com/xbjbg.png"
  data-rel="http://7xkaou.com2.z0.glb.qiniucdn.com/xbjbg.png" alt=""
  />
</figure>
</div>
<!--   <img id="img" src="http://7xkaou.com2.z0.glb.qiniucdn.com/xbjbg.png" alt="学伴机截图，点击查看全图"
  >
 -->
  <div style="margin: 10px 10px">
  <!--   to:<input type="text" id="target" style="margin-right: 10px;width: 60px" value="10442" > --><!-- 截图类型:<select id="type" style="margin-right: 10px">
    <option value="4" selected>小图</option>
  </select> -->
<div style="text-align: center">
    <button id="send" type="button" class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake"><span class="am-icon-camera"></span>&nbsp;截小图</button>&nbsp;
  <button id="sendbig" type="button" class="am-btn am-btn-warning  doc-animations"  data-doc-animation="shake"><span class="am-icon-camera"></span>&nbsp;截大图</button>
</div>
  <div style="margin: 3px" id="picMsgContainer"></div>
  <hr data-am-widget="divider" style="border:0;background-color:#DEDEDE;height:1px;" class="am-divider am-divider-dashed"/>
            <div id="audioMsgContainer"></div>
          <div style="text-align: center">
          <div id="refreshing"><span class="am-icon-spinner am-animation-spin"></span>数据初始化，请稍等..</div>
            <div class="am-btn-group" >
  <button disabled  class="am-btn am-btn-secondary doc-animations am-round"  data-doc-animation="shake" id="startRecord"><span class="am-icon-microphone"></span>&nbsp;录音</button>
<button disabled class="am-btn am-btn-danger doc-animations "  data-doc-animation="shake" id="stopRecord"><span class="am-icon-trash"></span>&nbsp;放弃</button>
<button disabled class="am-btn am-btn-success doc-animations am-round"  data-doc-animation="shake" id="uploadVoice"><span class="am-icon-paper-plane"></span>&nbsp;发送</button>
</div>
          </div>

  <!-- <hr data-am-widget="divider" style="border:0;background-color:#DEDEDE;height:1px;" class="am-divider am-divider-dashed"/> -->

</div>

  <section data-am-widget="accordion" class="am-accordion am-accordion-gapped"
  data-am-accordion='{  }'>
    <!-- <dl class="am-accordion-item am-active"> -->
  <dl class="am-accordion-item" id="audio_live">
    <dt class="am-accordion-title">语音聊天记录<span id="badge_not_read" class="am-badge am-badge-danger am-round" style="display: none">0</span><span style="float: right" class="am-icon-save"></span></dt>
    <dd class="am-accordion-bd am-collapse">
      <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
      <div class="am-accordion-content">
        <!-- <h3 id="menu-voice">聊天表</h3> -->
        <ul class="am-comments-list" id="s">
          </ul>

          
        <!-- <button  class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake" id="startRecord"><span class="am-icon-microphone"></span>&nbsp;开始录音</button>&nbsp; -->
        <!-- <button disabled class="am-btn am-btn-danger doc-animations "  data-doc-animation="shake" id="stopRecord"><span class="am-icon-microphone-slash"></span>&nbsp;停止录音</button>&nbsp;<br/> -->
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake" id="playVoice" style="display: none">播放语音</button>&nbsp;
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake" id="pauseVoice" style="display: none">暂停播放</button>&nbsp;
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake" id="stopVoice" style="display: none">停止播放</button><br/>
        <!-- <button disabled class="am-btn am-btn-success doc-animations "  data-doc-animation="shake" id="uploadVoice"><span class="am-icon-paper-plane"></span>&nbsp;发送语音</button> -->
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake" id="downloadVoice" style="display: none">下载语音</button>
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake"  id="translateVoice" style="display: none">识别音频并返回识别结果</button>
        <button class="am-btn am-btn-secondary doc-animations "  data-doc-animation="shake"  id="replace" style="display: none">替换录音</button>
        <div>

          </div>
        </div>
      </dd>
    </dl>

  <dl class="am-accordion-item "  id="collapse-nav">
    <dt class="am-accordion-title">今天学习数据<span style="float: right" class="am-icon-file-text-o"></span></dt>
    <dd class="am-accordion-bd am-collapse">
      <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
      <div class="am-accordion-content">
        <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
          <li><a href="###" class="am-cf"><span class="am-icon-check"></span> 您的孩子已学习：<span class="am-icon-star am-fr am-margin-right am-text-warning am-animation-spin"></span></a></li>
          <li><a href="###"><span class="am-icon-clock-o"></span> 时&nbsp;&nbsp;&nbsp;间：<span id="timeNum" class="am-badge am-badge-secondary am-margin-right am-fr">0分</span></a></li>
          <li><a href="###"><span class="am-icon-at"></span> 写字数：<span id="wordNum"  class="am-badge am-badge-secondary am-margin-right am-fr">0字</span></a></li>
          <li><a href="###"><span class="am-icon-book"></span> 阅读量：<span id="pageNum"  class="am-badge am-badge-secondary am-margin-right am-fr">0页</span></a></li>
          <li><a href="###"><span class="am-icon-bookmark-o"></span> 更新时间：<span id="updateTime"  class="am-badge am-badge-secondary am-margin-right am-fr">2015-06-26 20:23:50</span></a></li>
        </ul>

        <button id="data" type="button" class="am-btn am-btn-warning am-round doc-animations "  data-doc-animation="scale-up"><span class="am-icon-refresh " ></span>&nbsp;更新数据</button><!-- <span class="am-icon-cog am-animation-spin" style="float: right"></span> -->

      </div>
    </dd>
  </dl>
      <dl class="am-accordion-item">
      <dt class="am-accordion-title">学习统计图<span style="float: right" class="am-icon-line-chart"></span></dt>
      <dd class="am-accordion-bd am-collapse ">
        
        <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
        <div class="am-accordion-content">
        <!-- 日期选择 -->
          <div class="am-input-group am-datepicker-date" style="margin: 0 auto;">
          <input style="text-align: center" id="datepicker" type="text" class="am-form-field" placeholder="选择查询月份"  data-am-datepicker="{format: 'yyyy-mm', viewMode: 'months', minViewMode: 'months'}"  readonly>
          
        </div>
        <br/>
        <div id="msgContainer"></div>
          <div style="text-align: center">
            <button class="am-btn am-btn-primary doc-animations "  data-doc-animation="shake" id="btn_words"><span class="am-icon-at"></span>字数</button>&nbsp;
            <button class="am-btn am-btn-success doc-animations "  data-doc-animation="shake" id="btn_pages"><span class="am-icon-book"></span>页数</button>&nbsp;
            <button class="am-btn am-btn-warning doc-animations "  data-doc-animation="shake" id="btn_time"><span class="am-icon-clock-o"></span>时间</button>&nbsp;
          </div>
          <div style='width: 800px; height: 320px;display: none' id="drawDiv">

          </div>
        </div>
      </dd>
    </dl>


    <dl class="am-accordion-item">
      <dt class="am-accordion-title">设置<span style="float: right" class="am-icon-cog am-animation-spin"></span></dt>
      <dd class="am-accordion-bd am-collapse ">
      
      <div style="margin: 5px;margin-top: 15px">      <span class="am-icon-user am-text-success">
        
      </span>&nbsp;<strong><?php echo $_SESSION['telephone'];?></strong><span id="username" style=""></span>
      <a style="float: right;margin: 1px" class="am-btn-sm am-btn-danger" href="http://lamp.snewfly.com/hzsb_login_page">
  <i class="am-icon-exchange am-text-default"></i>
   切换账号
</a></div>
<hr/>
      <div style="margin: 5px;margin-top: 15px"><span class="am-icon-tag am-text-success"></span>&nbsp;
      <span id="username">使用说明</span><a style="float: right;margin: 1px" class="am-btn-sm am-btn-primary" href="http://7xkaou.com2.z0.glb.qiniucdn.com/help.html">
  <i class="am-icon-tags  am-text-warning"></i>
   点我查看
</a></div>
<hr/>
<div style="margin: 5px;"><span class="am-icon-toggle-on am-text-success"></span><span style="vertical-align: middle"> 新消息提示音</span><input name="stateon" id="stateon" type="hidden" value="0" /><a style="margin:1px;" class="set-bt am-fr" id="toggleswitch" href="javascript:void(0)"><span></span></a></div>
<hr/>
      </dd>
    </dl>
  </section>

<div id="mydiv" style="width: 100%;height: 200px;background-color: oldlace;overflow-y: auto;display: none">

</div>
<div id="cons" style="display: none">

</div>
<br/>
<!-- myalert -->
  <button
  id="btn_myAlert"
  style="display: none;"
  type="button"
  class="am-btn am-btn-primary"
  data-am-modal="{target: '#my-alert',closeViaDimmer: 0}">
  Alert
</button>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">温馨提示</div>
    <div class="am-modal-bd" id="myAlert_value">
      
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>

<audio id="audio_tip" preload="auto" >
        <source src="http://7xkaou.com2.z0.glb.qiniucdn.com/tip.mp3">
    </audio>
</body>
<!-- <div style="margin: 10px 10px">
    content:<input id="content" type="text" style="width: 80%;" value="1">
  </div> -->

  <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/jquery-2.1.4.min.js"></script>
  <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/amazeui2.x.min.js"></script>
  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/RongIMClient-0.9.10.min.js"></script>
  <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/highcharts.js"></script>
  <!-- // <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/highcharts-4.0.1.js"></script> -->
  <!-- // <script src="http://www.ucpaas.com/js/Highcharts-4.0.1/modules/exporting.js"></script> -->

  <script type="text/javascript">
    wx.config({
      debug: false,
      appId: '<?php echo $signPackage["appId"];?>',
      timestamp: <?php echo $signPackage["timestamp"];?>,
      nonceStr: '<?php echo $signPackage["nonceStr"];?>',
      signature: '<?php echo $signPackage["signature"];?>',
      jsApiList: [
      'checkJsApi',
      'hideMenuItems',
      'showMenuItems',
      'translateVoice',
      'startRecord',
      'stopRecord',
      'onRecordEnd',
      'playVoice',
      'pauseVoice',
      'stopVoice',
      'uploadVoice',
      'downloadVoice',
      ]
    });
  </script>

  <script type="text/javascript">
  /*config*/
  var RongToken='<?php echo $_SESSION['rong_token'];?>';
  var PlayAudioTip="1";//是否来消息提示音
  var isAudioLiveOpen=false;//语音框是否打开着
  var notReadTimes=0;//语音未读消息数
  var telephone='<?php echo $_SESSION['telephone'];?>';
  var username='<?php echo $_SESSION['telephone'];?>';
  var openid='<?php echo $_SESSION['id'];?>';
  var tokenid='<?php echo $_SESSION['rong_token_id'];?>';
  var QueryTime="本月";//默认显示查询表头
  var LastQueryTime="2015-07";//如果上次查询时间相同则不再查询
  var LastQueryData="";//上次查询时间数据
  var QueryType=1;//1=pages，2=words，3=learnts学习时间
  var DeviceId="";//选择的学伴机id
  var Max_MSG_LENGTH=6;//语音聊天的消息数
  var SHOWMSG_TIME=5000;//消息提示块显示的时间

  var BindTips="您还未选择学伴机，请先通过app绑定学伴机";//未绑定提示
  var Title_times="学习时间报表";//
  var Title_pages="阅读量报表";//
  var Title_words="写字数报表";//
  var RongKey="m7ua80gbufiym";//融云key

//localStorage key
  var LS_AllowAudio=telephone+'AllowAudio';//是否允许语音提示 true，false
  var LS_LastReceiveTime=telephone+'LastReceiveTime';//标记最后一次收到消息的时间戳，用于过滤历史消息

  function myAlert(value){
    $("#myAlert_value").html(value);
    $('#btn_myAlert').click();
  }

$(document).ready(function(){
  //折叠状态监听
   $('.am-accordion-item').on('opened.collapse.amui', function() {
  if($(this).attr('id') == "audio_live"){
    // alert('折叠菜单打开了x！');
    isAudioLiveOpen=true;
    notReadTimes=0;
    $('#badge_not_read').css('display','none');
  }
}).on('closed.collapse.amui', function() {
  if($(this).attr('id') == "audio_live"){
    // alert('折叠菜单关闭鸟x！');
    isAudioLiveOpen=false;
  }
});

//设置select宽度
var showWidth = document.body.clientWidth;
// 设置参数
$('mySelect').selected({
btnWidth: showWidth
});
//提示音设置
$('#toggleswitch').click(function(){
  $('#toggleswitch').toggleClass("set-on-bt");
  if (PlayAudioTip=="1") {
    PlayAudioTip="0";
  }else{
    PlayAudioTip="1";
  }
  
   localStorage.setItem(LS_AllowAudio,PlayAudioTip);
});
});

</script>
  <script src="http://lamp.snewfly.com/static/js/wxdemo-1.5.min.js"></script>
  </html>
