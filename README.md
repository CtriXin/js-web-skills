### js-web-skills
js web 相关总结

***
####
```

```
[输入链接说明](http://)


***
####AL Toggle获取状态
```

//@return 1=true,0=false
function getIsToggleActive(toggleId){
  if ($('#'+toggleId).hasClass('active')) {
    return 1;
  }
  return 0;
}

```

***
####document.createElement()用法
见createElement.html
[document.createElement()用法](http://www.jb51.net/article/34740.htm)

[GPS转百度坐标](http://developer.baidu.com/map/index.php?title=webapi/guide/changeposition)


***
####微信内下载app提示在其他浏览器打开
```

http://caibaojian.com/weixin-tip.html

Demo
http://7xkaou.com2.z0.glb.qiniucdn.com/MMBAppDL3.html
```

***
####php插入数组的简便方法
```
$arr=[];
for ($i=0; $i <5 ; $i++) { 
    $arr[]=$i;
}
print_r($arr);

```

***
####nginx负载均衡
```
http://www.cnblogs.com/liping13599168/archive/2011/04/15/2017369.html

远程地址带上密码
http://yourname:password@git.oschina.net/name/project.git

```

***
####git push 免输入密码
```
http://my.oschina.net/silentboy/blog/217766
```


***
####data-scroll="verticle|horizontal|scroll":刷新
```
      //当scroll初始化会进入此监听
$('#index_article').on('scrollInit', function(){
    var scroll = A.Scroll(this);//已经初始化后不会重新初始化，但是可以得到滚动对象
    //监听滚动到顶部事件，可以做一些逻辑操作
    scroll.on('scrollTop', function(){
        A.showToast('滚动到顶部');
        scroll.refresh(); //如果scroll区域dom有改变，需要刷新一下此区域
    });
    //监听滚动到底部事件，可以做一些逻辑操作
    scroll.on('scrollBottom', function(){
        A.showToast('滚动到底部');
        scroll.refresh(); //如果scroll区域dom有改变，需要刷新一下此区域，
    });
});
     

```



***
####有空可以瞧瞧的前端资源教程
```
http://www.shejidaren.com/category/css/css-learn
```


***
####html5 audio
```

html5 audio音频播放全解析
http://www.open-open.com/lib/view/open1407401112973.html

html5 touch事件实现触屏页面上下滑动(一)
http://www.cnblogs.com/leinov/p/3701951.html

项目中demo原型在html5_audio目录中

```


***
####bone首页也要带上page out 的class，否则返回会错版
```
  <div  id="pageHome" class="page out" >
```

***
####bone ajax加载 需要 data-ajax="false"  且href="qrcode/wifisettings.html" 为相对同域名路径
```
        <div style="margin: 8px"><a href="qrcode/wifisettings.html" data-ajax="false"  type="button" style=" -webkit-border-radius:7px;" class="am-btn am-btn-secondary am-btn-block ">伴学机配置wifi</a></div>
     
```


***
####字符串转json对象
```
var json='{"code":"S000000","data":[{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-01","warning":50,"words":30000},{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-02","warning":50,"words":30000}],"msg":""}';
var obj = eval("("+json+")");
obj.code;

json转string：json2
http://www.json.org/js.html

jq版互转（推荐）
http://blog.sina.com.cn/s/blog_667ac0360102ecem.html
json字符串转json对象：jQuery.parseJSON(jsonStr);
json对象转json字符串：JSON.stringify(jsonObj);
```

***
####把github 当服务器使用
```
http://rawgit.com/
```

***
####js刷新当前页面
```
location.reload() 
```


***
####不允许bone ajax加载bug data-ajax="false" 
```
<a style="float: right;margin: 1px" class="am-btn-sm am-btn-danger" data-ajax="false" href="http://lamp.snewfly.com/hzsb_login_page_zhihui">
        <i class="am-icon-exchange am-text-default"></i>
        切换账号
      </a>

```

***
####js 和php版正则匹配替换
```
js:
var string = '{"code":"S000000","data":[{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-01","warning":50,"words":30000},{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-02","warning":50,"words":30000}],"msg":""}'; string.replace(/(\d+-\d+)-/g,'');
string.replace(/(\d+-\d+)-/g,'');//匹配全部，string.replace(/(\d+-\d+)-/,'');//匹配第一个就结束

---------------------------------------------
name = '{"code":"S000000","msg":"操作成功","data":[{"deviceId":"5142521630344243c400003222840507","words":800,"pages":2,"timecost":120,"warning":2,"ts":"2015-12-19 14:40:52"},{"deviceId":"5142521630344243c400003222840507","words":1200,"pages":3,"timecost":120,"warning":3,"ts":"2015-12-20 10:32:01"}],"extra":""}';

uw=name.replace(/\d+-\d+-(\d\d) \d\d:\d\d:\d\d/g, function(word){
  return word[8]+word[9];}
  );document.write (uw);
-------------------------------------------
  改进
  name = '{"code":"S000000","msg":"操作成功","data":[{"deviceId":"5142521630344243c400003222840507","words":800,"pages":2,"timecost":120,"warning":2,"ts":"2015-12-19 14:40:52"},{"deviceId":"5142521630344243c400003222840507","words":1200,"pages":3,"timecost":120,"warning":3,"ts":"2015-12-20 10:32:01"}],"extra":""}';

uw=name.replace(/\d+-\d+-(\d\d) \d\d:\d\d:\d\d/g, "$1");

document.write (uw);
---------------------------------------------
    var str="中华人民共和国，中华人民共和国";   

 var newstr=str.replace(/(人)民(共)/g,"<font color=red>$1</font>aa<font color=red>$2</font>");   

document.write(newstr);   
-----------------------------------------

php:
$string = '{"code":"S000000","data":[{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-01","warning":50,"words":30000},{"deviceId":"ss333322$$222","pages":500,"timecost":3600,"ts":"2015-12-02","warning":50,"words":30000}],"msg":""}';
$pattern = '/(\d+-\d+)-/i';
$replacement = '';
echo preg_replace($pattern, $replacement, $string);

```

***
####并发编程（四）：也谈谈数据库的锁机制
```
http://www.2cto.com/database/201403/286730.html
```

***
####mysql in 和not in
```
SELECT * FROM t_userinfo WHERE userphone IN ('13714876874','18609944488') ORDER BY FIELD(userphone ,'13714876874','18609944488')
出来的顺序就是指定的顺序了

http://www.jb51.net/article/25639.htm
```

***
####CSS3 transition 属性
```
http://www.w3chtml.com/css3/properties/transition/transition.html
```

***
####
```
http://www.ituring.com.cn/article/48461

单页应用程序（SPA）一般比较复杂，往往包含数以万计行数的js代码，这些代码至少分布在几十个甚至成百上千的模块中，如果我们也在主界面就加载它们，载入时间会非常难以接受。
算了，我们还是用最简单的方式了，就是动态创建script标签，然后设置src，添加到document.head里，然后监听它们的完成事件，做后续操作。真的很简单，因为我们的框架不需要考虑那么多种情况，不需要AMD，不需要require那么麻烦，用这框架的人必须按照这里的原则写。

Javascript 装载和执行
http://coolshell.cn/articles/9749.html#jtss-tsina

function loadjs(script_filename,scriptId) {
    var script = document.createElement('script');
    script.setAttribute('type', 'text/javascript');
    script.setAttribute('src', script_filename);
    script.setAttribute('id', scriptId);
 
    script_id = document.getElementById(scriptId);
    if(script_id){//删除重复id的
        document.getElementsByTagName('head')[0].removeChild(scriptId);
    }
    document.getElementsByTagName('head')[0].appendChild(script);
}

//压缩版
  function loadjs(a,b){var c=document.createElement("script");c.setAttribute("type","text/javascript"),c.setAttribute("src",a),c.setAttribute("id",b),script_id=document.getElementById(b),script_id&&document.getElementsByTagName("head")[0].removeChild(b),document.getElementsByTagName("head")[0].appendChild(c)}
  
  loadjs('http://lamp.snewfly.com/static/js/bonezhihui.js','bonezhihui');


```

***
####mobilebone.js-mobile移动web APP单页切换骨架
```
http://www.zhangxinxu.com/wordpress/2014/10/mobilebone-js-mobile-web-app-core/
```

***
####jq模拟链接被点击（或者按钮）
```
链接只能用：$('#go123').get(0).click();

按钮可以：$('#btn_login').get(0).click();或者$('#btn_login').click();

```

***
####php接收键盘输入数据
```
 $a=fgets(STDIN);//接收键盘数据
 echo $a;
```

***
####js 反射
```
http://blog.csdn.net/liuzizi888/article/details/6632434

```

***
####封装AM Alert框
```
HTML:

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

JS:
function myAlert(value){

  $("#myAlert_value").html(value);
  $('#btn_myAlert').click();
}

```



***
####封装AM confirm框
```
HTML:

  <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
      <div id="myConfirm_title" class="am-modal-hd">标题</div>
      <div id="myConfirm_content" class="am-modal-bd">
        内容
      </div>
      <div class="am-modal-footer">
        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
        <span class="am-modal-btn" data-am-modal-confirm>确定</span>
      </div>
    </div>
  </div>

JS:
    $('#btn_login').click(function(){
      myConfirm('这是标题','内容。。。。',myconfirmCallback);
    });

      /*
        * 
        * 封装一个AM框架的confirm窗口
        * @param title 标题
        * @param content 内容
        * @param confirmCallback 确认回调 不可空
        * @param cancelCallback 取消回调 可空
        * @param closeViaDimmer 0不可，1可。默认0
        */
        function myConfirm(title,content,confirmCallback,cancelCallback,closeViaDimmer){
          $("#myConfirm_title").html(title);
          $("#myConfirm_content").html(content);
          if (closeViaDimmer==undefined||closeViaDimmer==0) {
            closeViaDimmer=0;
          }else{
            closeViaDimmer=1;
          }
          if (confirmCallback==undefined) {
            return;
          }

          $('#my-confirm').modal({
            relatedTarget: this,
            closeViaDimmer: closeViaDimmer,
            onConfirm: function(options) {
              confirmCallback(options);
            },
            onCancel: function(){
              if (cancelCallback!=undefined) {
                cancelCallback();
              }
            }
          });
        }

        function myconfirmCallback(){
          var $link = $(this.relatedTarget).prev('a');
          var msg = $link.length ? '1你要删除的链接 ID 为 ' + $link.data('id') :
          '1确定了，但不知道要整哪样';
          alert(msg);
        }


```

***
####jq判断元素是否存在某类
```
$(selector).hasClass(class);
$('#toggle_attendance').addClass('active');
$('#toggle_attendance').removeClass('active');

```

***
####php回调函数
```
http://www.nowamagic.net/librarys/veda/detail/1509
http://myceo.blog.51cto.com/2340655/725411/
```

***
####AL框架中radio
```

      <form class="form-group">
        <div class="card">
          <ul class="listitem" id="select_switch">
            <li >可否关机</li>
            <li class="nopadding ">
              <a data-role="radio">
                <label width="100%" for="closerdo1" class="black" >可关</label>
                <input checked="true" type="radio" name="switch" id="closerdo1" value="1">
              </a>
            </li>
            <li class="nopadding noborder">
              <a data-role="radio">
                <label width="100%" for="closerdo2" class="black" >不可关</label>
                <input type="radio" name="switch" id="closerdo2" value="0">
              </a>
            </li>
          </ul>
        </div> 
      </form>
```


***
####table遍历和删除
```
//遍历 整个table每行没咧
function GetInfoFromTable(tableid) {
    var tableInfo = "";
    var tableObj = document.getElementById(tableid);
    for (var i = 0; i < tableObj.rows.length; i++) {    //遍历Table的所有Row
        for (var j = 0; j < tableObj.rows[i].cells.length; j++) {   //遍历Row中的每一列
            tableInfo += tableObj.rows[i].cells[j].innerText;   //获取Table中单元格的内容
            tableInfo += "   ";
        }
        tableInfo += "\n";
    }
    return tableInfo;
} GetInfoFromTable("tb_re");

//删除某一行
 function deleteRow(tableid) {
    var tableInfo = "";
    var tableObj = document.getElementById(tableid);
    for (var i = 0; i < tableObj.rows.length; i++) {    //遍历Table的所有Row
        
            tableInfo= tableObj.rows[i].cells[3].innerText;   //获取Table中单元格的内容
            if(tableInfo=="0"){ tableObj.deleteRow(i);i--;}
    }
    return tableInfo;
} 

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
####ajax_get 封装终极版，统一请求，解耦处理数据（订阅者模式，模板方法、js回调）
```
      /*
        * by hgxbajian 15-11-28
        * 统一处理ajax get 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 完成get 请求url,可不带上host
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        */
        function ajax_get(url,succCallback,dataType,failCallback){

          if (url=="") {return;}
          dataType=(dataType==undefined||dataType=="")?"json":dataType;
          failCallback=failCallback==undefined?defaultFailCallback:failCallback;

          $.ajax({
            url:url,
            type:"get",
            dataType: dataType,
            success: function (data) {
              succCallback(data);
            },
            error: function (msg) {
            failCallback(msg);
            }
          });
        }


        ajax_get("/queryDevice",handleQueryDevice);

        function handleQueryDevice(data) {
          if (data.errcode!=null) {
            user_bind_deivce_obj=data;
            if (user_bind_deivce_obj.data.devices.length!=0) {
              //添加设备到列表
              ulAddLi();
            };
          }
        }

```

***
####ajax_post 封装终极版，统一请求，解耦处理数据（订阅者模式，模板方法、js回调）
```

      /*
        * by hgxbajian 15-11-28(此方法写了暂未使用测试)
        * 统一处理ajax post 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 请求url,可不带上host
        * @param data post data 如{Content: content,To:to}表示 Content=content&To=to
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        */
        function ajax_post(url,data,succCallback,dataType,failCallback){

          if (url=="") {return;}
          data=data==undefined?"":data;
          dataType=(dataType==undefined||dataType=="")?"json":dataType;
          failCallback=failCallback==undefined?defaultFailCallback:failCallback;

          $.ajax({
    url: url,
    type: 'POST',
    dataType: dataType,
    data: data,
  })
  .done(function(data) {
        succCallback(data);
      })
  .fail(function() {
    failCallback();
  })

        }

        function defaultFailCallback(){
          A.showToast('网络错误');// AL框架中的方法，类似alert
        }

        ajax_post("/queryDevice","{Content: content,To:to}",handleQueryDevice);

        function handleQueryDevice(data) {
          if (data.errcode!=null) {
            user_bind_deivce_obj=data;
            if (user_bind_deivce_obj.data.devices.length!=0) {
              //添加设备到列表
              ulAddLi();
            };
          }
        }

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
####AL:section间传参数,注意.html?，没有#
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
* ts="now" 为当前时间
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

***
####radio 设置选中
```
$('#male').attr("checked",true);

```

***
####select 默认提示设置&禁止选择
```
<div data-role="select" class="card noborder nopadding">
	<select placeholder="选择按键3号码">
		<option value="" selected="true" disabled="true">选择按键3号码</option>
		<option>15814776561</option>
		<option>13714876874</option>
	</select>
</div>


```

***
####al中不要出现href="#",这会变成返回上一页的
```
直接不要写href
<a data-role="radio">
	<input type="radio" name="sex" id="female" value="女" />
	<label for="female" class="black">女&nbsp;&nbsp;</label>
</a>


```

***
####自定义一个select添加器
```
var select=$('#mySelect') ;//选择框对象jq
var select=document.getElementById('select_1');/;//选择框对象js

/*
* 自定义一个select添加器 jq版
* @param select 选择器对象
* @param value 值
* @param name 展示的名字
*/
function addSelect(select,value,name){
select.append('<option value="' + value +'"> ' + name + '</option>');
}

/*
* 自定义一个select添加器 js版
* @param select 选择器对象
* @param value 值
* @param text 展示的名字
*/
function addSelect(select,value,text){
var varItem = new Option(text, value);      
select.options.add(varItem);   
}

```

***
####如果select选项中存在指定text，将其设置为选中
```

        /*
        * 如果select选项中存在指定text，将其设置为选中 js版//也可以改成指定value
        * @return boolean true 设置成功，false 不存在
        *简便方法：var objSelect=document.getElementById(id);
        *           objSelect.value = objItemText;
        */
        function setSelectedItem(objSelect,objItemText){
          for (var i = 0; i < objSelect.options.length; i++) {
            if (objSelect.options[i].text == objItemText) {
              objSelect.options[i].selected = true;
              return true;
            }
          }
          return false;
        }

        /*
        * AM框架版（需刷新）
        */
         function setSelectedItem(id,objItemText){
                    var objSelect=document.getElementById(id);
                    objSelect.value = objItemText;
                    $('#'+id).trigger('changed.selected.amui');
        }


      /*
        * 如果select选项中存在指定text，将其设置为选中 AM版
        * @return boolean true 设置成功，false 不存在
        */
        function setSelectedItem(id,objItemText){
          var objSelect=document.getElementById(id);
          for (var i = 0; i < objSelect.options.length; i++) {
            if (objSelect.options[i].text == objItemText) {
              $('#'+id).find('option').eq(i).attr('selected', true);
              return true;
            }
          }
          return false;
        }


```

***
####判断select选项中 是否存在Value="paraValue"的Item
```

        /*
        * 判断select选项中 是否存在Value="paraValue"的Item js版
        * @return boolean true 存在，false 不存在
        */
        function jsSelectIsExitItem(objSelect, objItemValue) {
          var isExit = false;
          for (var i = 0; i < objSelect.options.length; i++) {
            if (objSelect.options[i].value == objItemValue) {
              isExit = true; 
              break; 
            }
          }
          return isExit;  
        } 

```

***
####判断select选项中 是否存在Value="paraValue"的Item
```

        /*
        * 获得选中的index
        * @param id select的id
        */
        function getCurrentSelectedIndex(id){
          if (id==undefined) {
            id='mySelect';
          }
          return document.getElementById(id).selectedIndex;
        }

        /*
        * 获得选中的value
        * @param id select的id
        */
        function getCurrentSelectedValue(id){
          if (id==undefined) {
            id='mySelect';
          }
          return document.getElementById(id).value;
        }

        /*
        * 获得选中的text weiceshi
        * @param id select的id
        */
        function getCurrentSelectedValue(id){
          if (id==undefined) {
            id='mySelect';
          }
          return document.getElementById(id).options[getCurrentSelectedIndex(id)].text;
        }



```


***
####select操作大全
```
http://www.cnblogs.com/Herist/archive/2007/09/24/903890.html

```

***
####删除指定index的数组元素
```
arr.splice(1);//删除指定index的数组元素
```

***
####js支持类似重载的调用方法
```
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	function myfun(arg1,arg2,arg3){
		alert("in");
		alert(arg3);
	}
myfun();
myfun("arg1");
myfun("arg1","arg2");
myfun("arg1","arg2","arg2");
myfun("arg2","arg2","arg2","arg2");
</script>
</html>

```

***
####js 回调函数
```
http://blog.csdn.net/lulei9876/article/details/8494337

<html>   
<head>   
<title>回调函数(callback)</title>   
<script language="javascript" type="text/javascript">   
function a(callback)   
{      
   alert("我是parent函数a！，准备调用回调函数");   
     
    if (callback==d) {//判断有无参数
    	callback('{"a":"b"}');   
    }else{
    	callback();  
    }
}   
function b(){   
alert("我是回调函数b");   
  
}   
function c(){   
alert("我是回调函数c");   
  
}

function d(params){
	alert("回调函数，带参数："+params);
}   
  
function test()   
{   
    a(b);   
   a(c);  
   a(d);
}   
  
</script>   
</head>   
<body>   
<h1>学习js回调函数</h1>   
<button onClick=test()>click me</button>   
<p>应该能看到调用了两个回调函数</p>   
</body>   
</html>  

```

***
####php 保存同时上传多个文件
```
// print_r($_FILES);
// exit();Array
/*(
[mFile] => Array
(
[name] => face_cache.png
[type] => image/png
[tmp_name] => /tmp/phpfZM1gc
[error] => 0
[size] => 949898
)

[mFile1] => Array
(
[name] => 123.png
[type] => image/png
[tmp_name] => /tmp/phpcAkfjB
[error] => 0
[size] => 2886
)

)*/
$host='http://guixuan.snewfly.com/';
$return='';
foreach ($_FILES as $key => $value) {
if ($value["size"]<1000000) {//1MB
$name=$value["name"];
// 将文件移动到新的文件路径
move_uploaded_file($value['tmp_name'], $name);
$return.=$host.$name.';';
}
}
return $this->get_json(1,'成功','',$return);

```
