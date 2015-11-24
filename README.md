### js-web-skills
js web 相关总结

***
####
```

```


***
####delete  js delete可以删除对象属性及变量
http://www.jb51.net/article/54247.htm
***
####验证码发送
```
  var btn_sendSMS_obj=$('#btn_sendSMS');//发送验证码的对象
  var wait=0;//等待时间 

  //验证码计数君
  function count() {
  if (wait == 0) { 
    btn_sendSMS_obj.removeAttr("disabled"); 
    btn_sendSMS_obj.text("发送验证码");//改变按钮中value的值 
  } else { 
      btn_sendSMS_obj.attr("disabled", true);//倒计时过程中禁止点击按钮 
      btn_sendSMS_obj.text(wait + "秒");//改变按钮中value的值 
      wait--;
      setTimeout('count()',1000);
    }
  } 
```
***

####弹出数字键盘

```
<input id="phone" type="tel" class="am-form-field" placeholder="手机号" >
或者
<input id="user" type="text" placeholder="昵称" pattern="^[0-9]{20}$" title="昵称" value="bajian" required/>

```

***
####ul listview删除全部不需要遍历再remove，可以直接将整个ul内html只为空
```
var ul=$('#lv_device'); ul.html('');//先清空ul
```

***
jq
```
jQuery(document).ready(function($) {  
  });
```

***
jqm用
```
$(document).on("pageinit","#pagePhone",function(){
    $('#sendSMS').click(function(){
      sendSMS();
    });
});

```
***

函数一定要加function 否则无法使用
***
####jQuery常用方法一览
http://www.cnblogs.com/linzheng/archive/2010/10/14/1851816.html
***
```
checkCode.length
```
***
id绝对不能相同，不然很容易造成某些不易察觉的错误
***
####常见jq属性操作
```
$('#submitMyRec').attr("disabled", true);

$('#divSubMyRec').hide();

var cid=$('#CID').val();

$('#myRecNum').text(data.msg+'个'); 

$('#recList').append(content);

$('#bindPhone').removeAttr('href');
```
***
####ajax 
```
$.ajax({
    url:"/wechat/queryMyRec",
    type:"get",
    dataType: "json",
    success: function (data) {
        // alert(data.msg);
        if (data.state=='1') {
          if (data.msg!='0') {
            var content='';
            if (data.msg=='1') {
              content='<br><li><a href="#" style="margin:10px">'+data.data+'</a></li>';
            }else{
              var array = data.data.split(",");
              var length=array.length;
              for (var i = 0; i <length; i++) {
                content+='<br><li><a href="#" style="margin:10px">'+array[i]+'</a></li>';
              };
            }
            $('#myRecNum').text(data.msg+'个'); 
            $('#recList').append(content);
          }
        }else{
          alert(data.msg);
        }
      },
      error: function (msg) {
        alert('服务器连接失败，请稍后重试');
      }
    });
```
***
```
function time() {
  if (wait == 0) { 
    o.removeAttr("disabled"); 
    o.text("点击发送短信验证码");//改变按钮中value的值 
  } else { 
      o.attr("disabled", true);//倒计时过程中禁止点击按钮 
      o.text(wait + "秒后重新获取验证码");//改变按钮中value的值 
      wait--;
      setTimeout('time()',1000);
    }
  } 
```
***
####时间格式化

```
var d=new Date(date); 
var formatdate=d.getMonth()+"月"+d.getDay()+"日 "+d.getHours()+"时"+d.getMinutes()+"分"+d.getSeconds()+"秒";

```
***
####jq ajax 解析json中的数组

```
$.each(data.data, function(i, item) {
            $("#withdrawList").append(
                    "<div>" + item.Account + "</div>" + 
                    "<div>" + item.State    + "</div>" +
                    "<div>" + item.Timestamp + "</div><hr/>");
        });
```
***

```
switch(n)
{
case 1:
  执行代码块 1
  break;
case 2:
  执行代码块 2
  break;
default:
  n 与 case 1 和 case 2 不同时执行的代码
}
```

***
####表单只能输入整数
```
 onkeyup="value=value.replace(/[^\d]/g,'')" 
<input type="text" name="Money" id="Money" placeholder="输入整数提现金额" onkeyup="value=value.replace(/[^\d]/g,'')"  >
```
***
####jq xml解析并运用
```

    //经纬度转实际地址
    function card_getGeoReverse(Lat,Lng,OrgiLat,OrgiLng,IsGps){
      if (Lat!='' && Lng!='' && OrgiLat!='' && OrgiLng!='' && IsGps!='') {
        $.ajax({
          url:"/card_getGeoReverse?r="+Math.random()+'&orgiLat='+OrgiLat+'&orgiLng='+OrgiLng+'&lat='+Lat+'&lng='+Lng+'&isGps='+IsGps,
          type:"get",
          dataType: "xml",
          success: function (data) {
            if($(data).find('Code').text()=='200'){
              var address=$(data).find('Address').text();
              if (address!='') {
                card_last_location=address;
                $('#last_location').html(address);
              }

            }else{
              A.showToast('错误码：'+$(data).find('Code').text()+" "+$(data).find('Info').text());
            }
          },
          error: function (msg) {
            A.showToast('网络错误');
          }
        });
      }

    }
```

***
####百度地图相关
```
//当数组为空时定位到深圳
function ShenZhen () {
  map.centerAndZoom("深圳", 12);  
}

/*function refresh(){
  $('#dingwei').click();
}*/

/*
* @param GPS 中文地理位置
*/
function LocalMap (lng,lat,GPS) {
  map.clearOverlays();
    lng = parseFloat(lng) + 0.01185;//经度校正
    lat = parseFloat(lat) + 0.00328;//纬度校正
    map.setZoom(17);
    map.panTo(new BMap.Point(parseFloat(lng),parseFloat(lat)), 17);
    map.enableScrollWheelZoom(true);
    var opts = {
                width : 250,     // 信息窗口宽度
                height: 80,     // 信息窗口高度
                title : "所在位置" , // 信息窗口标题
                enableMessage:true//设置允许信息窗发送短息
              };
    var point = new BMap.Point(parseFloat(lng),parseFloat(lat)); //创建一个坐标点
    var marker = new BMap.Marker(point);  // 创建标注
    var content = GPS;
    map.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //标记点跳动效果    
    if(content ==""){

      var geoc = new BMap.Geocoder();
        // var point = new BMap.Point(parseFloat(lng),parseFloat(lat));
        geoc.getLocation(point,function  (rs) {
          var addComp = rs.addressComponents;
          var content = addComp.province +
          addComp.city +
          addComp.district +
          addComp.street +
          addComp.streetNumber;
          $("#weizhi").replaceWith('<li id="weizhi">所在位置：' + content + '附近</li>');
          addClickHandler(content,marker);
        })
      } else {
        addClickHandler(content,marker); //如果数据库存在位置信息则调用数据库的位置信息
      }


      function addClickHandler(content,marker){
        marker.addEventListener("click",function(e){
          openInfo(content,e)}
          );
      }
      function openInfo(content,e){
        var p = e.target;
        var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
        var infoWindow = new BMap.InfoWindow(content+"附近",opts);  // 创建信息窗口对象 
        map.openInfoWindow(infoWindow,point); //开启信息窗口
      }
    }
 ```

 ***
####别人问我的正则问题
```
1、
https://coding.net/u/LDCN/p/LD/git/tree/master/1C4088BA/trunk/DesomodGaren
可能长这样
https://coding.net/u/LDCN/p/LD/git/tree/master/DesomodGaren
可能长这样

LDCN，LD，DesomodGare是我要的
LDCN，LD，DesomodGare，1C4088BA这几个位置的内容不是固定的
#####解决：
https://coding.net/u/(.*?)/p/(.*?)/git/tree/master/(.*/trunk/)?(.*)

2、
$str='每天在1：03发送消息：哈哈';
$re='';
preg_match('#(每天)?在([^时]*)(时)?发送(消息)?：(.*)#',$str,$re);
print_r($re);

$str='在1：03时发送：哈哈';
$re='';
preg_match('#(每天)?在([^时]*)(时)?发送(消息)?：(.*)#',$str,$re);
print_r($re);

$str='在1：03发送：哈哈';
$re='';
preg_match('#(每天)?在([^时]*)(时)?发送(消息)?：(.*)#',$str,$re);
print_r($re);

```

***
####AL框架中listview之类的DOM操作后要refresh下，否则scroller会出问题
```
//一般当Article为refresh组件的时候，都是通过监听refresh初始化事件（refreshInit）而不是监听articleload或者articleshow事件，因为前者通常比后者晚触发，所以如果需要异步加载数据可能会出现refresh组件尚未初始化的情况，所以一般建议在refreshInit中执行注入等操作。
//当refresh初始化会进入此监听
首先：设置 article的data-scroll="pullup"如：<article data-role="article" id="article_cardcenter" data-scroll="pullup" class="active" style="top:44px;bottom:50px;">
其次：
			$('#article_cardcenter').on('refreshInit', function(){
				var refresh = A.Refresh(this);
				//监听下拉刷新事件，可以做一些逻辑操作，当data-scroll="pullup"时无效
				refresh.on('pulldown', function(){
					$('#content').prepend('<li><div class="text">下拉刷新的内容</div></li>');
					refresh.refresh();//当scroll区域有dom结构变化需刷新
				});
				//监听上拉刷新事件，可以做一些逻辑操作，当data-scroll="pulldown"时无效
				refresh.on('pullup', function(){
					$('#content').append('<li><div class="text">上拉刷新的内容</div></li>');
					refresh.refresh();//当scroll区域有dom结构变化需刷新
				});
			});

```


***
####AL:section间传参数
```
  var li='<li href="section_device_main.html?id=1" data-toggle="section"><div class="img appimg"><img class="am-circle" src="http://mhfm4.us.cdndm5.com/19/18034/20150409110918_180x240_10.jpg" width="60px" height="60px" /></div><i class="icon-color-blue ricon iconfont iconline-arrow-right"></i><div class="text">设备Aa<small>已关机<br/>电量 | 音量</small></div> </li>';


$('#article_device_main').on('articleshow', function(){//设备详情每次展示调用
          var params = A.Component.params('#section_device_main');//获取所有参数，这里必须是section和data-toggle类型一致。都是article的话就必须是article
        A.showToast('参数id的值为：'+params.id);
      });
```


***
####真机web调试
```
https://github.com/jieyou/remote_inspect_web_on_real_device?utm_campaign=email_admin&utm_source=trigger-email&utm_medium=email#%E8%B0%83%E8%AF%95android-app%E9%87%8C%E7%9A%84webview
```

***
####AL框架中点击事件不要使用JQ的，手机上会出先点击难以捕捉问题。使用框架自带的：
```
              //选择头像
       $('.head-img').on(A.options.clickEvent, function(){
        var t=$(this);
        if(previewSelected){
          previewSelected.css("border","0px");
        }
        t.css("border","solid 1px #3779D0");
        previewSelected=t;
        // document.getElementById("iconInfos").value=t.attr("src").substring(11);

          return false;
        });
```

***
####获得当前时间 格式06-26 20:23:50
```

         /**
         * ts="new" 为当前时间
         */
 function curDateTime(ts) {
  var d = new Date();
  if (ts!='now') {
    var t=parseInt(ts);
    d.setTime(t*1000);
  };
  // var year = d.getFullYear();
  var month = d.getMonth() + 1;
  var date = d.getDate();
  var day = d.getDay();
  var Hours=d.getHours(); //获取当前小时数(0-23)
  var Minutes=d.getMinutes(); //获取当前分钟数(0-59)
  var Seconds=d.getSeconds(); //获取当前秒数(0-59)
  var curDateTime = '';
  if (month > 9)
    curDateTime = curDateTime + month+'-';
  else
    curDateTime = curDateTime + "0" + month+'-';
  if (date > 9)
    curDateTime = curDateTime + date+' ';
  else
    curDateTime = curDateTime + "0" + date+' ';
  if (Hours > 9)
    curDateTime = curDateTime + Hours+':';
  else
    curDateTime = curDateTime + "0" + Hours+':';
  if (Minutes > 9)
    curDateTime = curDateTime + Minutes+':';
  else
    curDateTime = curDateTime + "0" + Minutes+':';
  if (Seconds > 9)
    curDateTime = curDateTime + Seconds;
  else
    curDateTime = curDateTime + "0" + Seconds;
  return curDateTime;
          }
```

***
####返回当前十位时间戳
```
function getCurTs(){
  var ts = (new Date()).valueOf()+"";
  var my=ts.substr(0,ts.length-3);
  return my;
}
```

***
####web 融云使用
```
//初始化，传入key
RongIMClient.init(RongKey);
//监听在线状态
          RongIMClient.setConnectionStatusListener({
            onChanged: function (status) {
              // alert("status"+status);
              if (status==RongIMClient.ConnectionStatus.CLOSURE) {
                // myAlert('您已离线，请检查您的网络');
                var showmsg=getShowCommand('<span class="am-icon-remove"> </span>&nbsp;您已离线，请检查您的网络并重新打开','danger');
                    $('#picMsgContainer').html(showmsg);
                    timeoutHandler=setTimeout("closeShowCommand()",SHOWMSG_TIME);
                    myAlert('您已离线，请检查您的网络并重新打开');
              }else if(status==RongIMClient.ConnectionStatus.OTHER_DEVICE_LOGIN){
                myAlert('您的账号已在其他设备登录');
                window.location="http://lamp.snewfly.com/hzsb_login_page?otherDevice=1";
              };
            }
          });
 //监听消息接收
 RongIMClient.getInstance().setOnReceiveMessageListener({
            //接收消息
            onReceived: function (data) {

                var con=eval('('+data.getContent()+')');
                if (localStorage.getItem(LS_LastReceiveTime)>con.ts) {
                  return;
                };
                localStorage.setItem(LS_LastReceiveTime,con.ts);

                if (data.getContent()!='' && data.getExtra()=='img') {
                    var obj=eval('('+data.getContent()+')');
                    changeImg(obj.url,obj.username);
                    if (PlayAudioTip=="1") {
                      playAudioTip();
                    };
                  }else if(data.getContent()!='' && data.getExtra()=='audio'){
                    //音频
                    
                      var obj=eval('('+data.getContent()+')');
                      writeToChatLog (obj.url,'text-user',obj.username,obj.ts);
                      if (PlayAudioTip=="1") {
                        playAudioTip();
                      };

                      if (!isAudioLiveOpen) {//没打开
                        notReadTimes++;
                        $('#badge_not_read').html(notReadTimes);
                        $('#badge_not_read').css('display','inline');
                      }else{//打开着的（这里可不写）
                        notReadTimes=0;
                        $('#badge_not_read').html(notReadTimes);
                        $('#badge_not_read').css('display','none');
                      }

                    }else if(data.getContent()!='' && data.getExtra()=='cancel'){
                    //拒绝拍照

                      var obj=eval('('+data.getContent()+')');
                      var showmsg=getShowCommand(obj.username+'拒绝拍照','danger');
                    $('#picMsgContainer').html(showmsg);
                    timeoutHandler=setTimeout("closeShowCommand()",SHOWMSG_TIME);
                      if (PlayAudioTip=="1") {
                        playAudioTip();
                      };
                    }

                  }
                });
//融云链接
        RongIMClient.connect(RongToken, {
          onSuccess: function (x) {

              },
              onError: function (x) {
                console.log(x);

              }
            });
//发送消息
ins = RongIMClient.getInstance();
        //定义 content等
        var   s = document.getElementById("send"), t = document.getElementById("type");
        s.onclick = function () {
          if (DeviceId=="") {
            myAlert(BindTips);
            return;
          }

            var con = RongIMClient.ConversationType.setValue('4');//只使用私聊

            var msg=toMsg('123');
            var content=RongIMClient.TextMessage.obtain(msg || Date.now());
            content.setExtra("smallpic");

            //发送消息
            ins.sendMessage(con, DeviceId, content, null, {
              onSuccess: function () {
                var showmsg=getShowCommand('<span class="am-icon-rocket"> </span>&nbsp;指令发送成功','success');
                $('#picMsgContainer').html(showmsg);
                timeoutHandler=setTimeout("closeShowCommand()",SHOWMSG_TIME);

                  }, onError: function () {
                    var showmsg=getShowCommand('<span class="am-icon-remove"> </span>&nbsp;指令发送失败','danger');
                    $('#picMsgContainer').html(showmsg);
                    timeoutHandler=setTimeout("closeShowCommand()",SHOWMSG_TIME);
                  }
                });
          };


```

***
####highchart使用
```
/**
* @param data，欲处理原始数据
**/
function handlerChartData(myData,title){

  var array = myData.split("T");
      var x = array[1];
      x = eval("("+x+")");
      data = array[2];
      data = eval("("+data+")");
      drawChart(data,x,title);
    }

/**
* @param data，数据 格式（）
* @param x，日期 格式（）
* @param title，标题栏
**/
function drawChart(data,x,title){
  $('#drawDiv').css('display','inline');
  var enmu='';//单位
  if (QueryType==1) {
    enmu='页';
  }else if (QueryType==2) {
    enmu='个';
  }else if (QueryType==3) {
    enmu='分钟';
  }
  //QueryType=1;//1=pages，2=words，3=learnts学习时间
  chart = new Highcharts.Chart({
    chart: {
     renderTo: 'drawDiv',
     defaultSeriesType: 'spline',
     events: {
             }
           },
           title: {
             text: title,
           x: -20 //center
         },
         subtitle: {
           text: '',
           x: -20
         },
         xAxis: {
           categories: x,
           gridLineWidth: 1, //设置网格宽度为1 
           lineWidth: 1,  //基线宽度 
           labels:{y:20}  //x轴标签位置：距X轴下方26像素
         },
         yAxis: {
           title: {
               text: '' //左侧边栏
             },
             min:0,
           lineWidth: 1, //基线宽度 
           plotLines: [{
             value: 0,
             width: 1,
             color: '#808080'
           }]
         },
         tooltip: {
           valueSuffix: enmu
         },
       //设置图例
       legend: {
        enabled:false //去掉图例
      },
      //右下角不显示LOGO 
      credits: { 
       enabled: false   
     },
     series:data
   });
}
```


***
####jq <div> \span 赋值 input
```
$('#sp').val();//
$('#sp').html();

jQuery获取多种input值的方法
http://blog.sina.com.cn/s/blog_70491fc60100t5kw.html

```


***
####获取选中的单选按钮
```
<label class="label-right" id="radio_group_sex">
					<a href="#" data-role="radio">
						<input type="radio" checked="true" name="sex" id="male" style="left:0;right:auto;" value="男" />
						<label for="male" class="black">男&nbsp;</label>
					</a>
					<a href="#" data-role="radio">
						<input type="radio" name="sex" id="female" style="left:0;right:auto;" value="女" />
						<label for="female" class="black">女&nbsp;</label>
					</a>
				</label>
				
$('#radio_group_sex input[name="sex"]:checked').val();

```
