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
