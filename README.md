### js-web-skills
js web 相关总结
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

 