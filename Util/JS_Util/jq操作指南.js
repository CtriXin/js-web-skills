// 初始化
	$(document).ready(function(){   
		XXXXX;
	   });

使用jquery获取某DIV的子元素，通常有以下两种方法：
子元素选择器（>），例如 $("div>img") 获取div下的img子元素；
遍历函数children()，例如 $("div").children("img") 同样是获取div下的img子元素。
如果想要获取DIV下的不仅是子元素，而且还包括其他后代元素（孙辈、曾孙辈元素...），那么，相应的两种方法是：
后代元素选择器（空格），例如 $("div img")  获取div下的所有级别的img后代元素；
遍历函数find()，例如 $("div").find("img")  获取div下的所有级别的ing后代子元素。


  //将音频写到对话框里
  function writeToChatLog (audio_url,message_type,from,tm) 
  {
    var s=document.getElementById('s');
    if(commit>=Max_MSG_LENGTH){
      var t=s.childNodes.length;
      s.removeChild(s.childNodes[s.childNodes.length-1]);
    }
    commit++;
    var li= document.createElement("li");
    // var myDate = new Date();
    if(message_type=="text-me"){
       // autoplay="fasle"
     li.innerHTML='<li class="am-comment-primary am-animation-slide-left" style="margin: 0 auto;text-align: center"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a>   <time>'+tm+'</time></div></header><div class="am-comment-bd"><p><audio id="audio_'+commit+'" preload="true" controls="controls" style="margin:5px"><source  src="'+audio_url+'" >浏览器不支持音频</audio></p></div></div></li><br/>';
   }else if(message_type=="text-user"){

    li.innerHTML='<li class="am-comment-success am-animation-slide-right am-comment-flip"  style="margin: 0 auto;text-align: center"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a>   <time>'+curDateTime(tm)+'</time></div></header><div class="am-comment-bd"><p><audio id="audio_'+commit+'" preload="true" controls="controls" style="margin:5px"><source src="'+audio_url+'">浏览器不支持音频</audio></p></div></div></li><br/>';
  }
  // s.insertBefore(li,s.childNodes[0]);
  s.appendChild(li,s.childNodes[0]);
}

	//js 点击a标签 获取a的自定义属性
	function showDetail(obj){  
  var ownattr= obj.attributes[ownattr].nodeValue;  //自定义属性采用此方式获得  
  var id = obj.id;  //基本属性可以采用此方式获得  
}  

//修正md bootstrap 中floating-label通过jq的val()赋值的时候floating-label不动的bug
 <div><input type="text" class="form-control floating-label" placeholder="残疾证号" id="cid"> </div> <br/>
方法：先重新对class赋值再赋值value,如：$('#users_name').attr('class','form-control');$('#users_name').val(item.name);

//修正录入时，自动赋值的时候select不动的bug
if (item.sex=="1") {
  // $("#sex").find("option[text='女']").attr("selected",true);
  $("#sex option").eq(1).attr('selected', 'true');
   }else{
  $("#sex option").eq(0).attr('selected', 'true');
  // $("#sex").find("option[text='男']").attr("selected",true);
    }

//去掉手机号中的字母
<div class="col-lg-6 col-sm-8">
<input class="form-control" id="sos2" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" value="13714876874">
</div>

	div居中：
margin: 0 auto;

text居中：
text-align:center;


js获取url参数值的两种方式:
function GetRequest() { 
var url = location.search; //获取url中"?"符后的字串 
var theRequest = new Object(); 
if (url.indexOf("?") != -1) { 
var str = url.substr(1); 
strs = str.split("&"); 
for(var i = 0; i < strs.length; i ++) { 
theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]); 
} 
} 
return theRequest; 
} 

调用方法： 
<Script language="javascript"> 
var Request = new Object(); 
Request = GetRequest(); 
var 参数1,参数2,参数3,参数N; 
参数1 = Request['参数1']; 
参数2 = Request['参数2']; 
参数3 = Request['参数3']; 
参数N = Request['参数N']; 
</Script>

select操作
http://blog.csdn.net/nairuohe/article/details/6307367

每一次操作select的时候，总是要出来翻一下资料，不如自己总结一下，以后就翻这里了。

比如<select class="selector"></select>

1、设置value为pxx的项选中

     $(".selector").val("pxx");

2、设置text为pxx的项选中

    $(".selector").find("option[text='pxx']").attr("selected",true);

    这里有一个中括号的用法，中括号里的等号的前面是属性名称，不用加引号。很多时候，中括号的运用可以使得逻辑变得很简单。

3、获取当前选中项的value

    $(".selector").val();

4、获取当前选中项的text

    $(".selector").find("option:selected").text();

    这里用到了冒号，掌握它的用法并举一反三也会让代码变得简洁。

 

很多时候用到select的级联，即第二个select的值随着第一个select选中的值变化。这在jquery中是非常简单的。

如：$(".selector1").change(function(){

     // 先清空第二个

      $(".selector2").empty();

     // 实际的应用中，这里的option一般都是用循环生成多个了

      var option = $("<option>").val(1).text("pxx");

      $(".selector2").append(option);

});




JavaScript 获取当前时间戳：
第一种方法：

var timestamp = Date.parse(new Date());
结果：1280977330000
第二种方法：

var timestamp = (new Date()).valueOf();
结果：1280977330748

第三种方法：

var timestamp=new Date().getTime()；
结果：1280977330748

第一种：获取的时间戳是把毫秒改成000显示，

第二种和第三种是获取了当前毫秒的时间戳。


//创建数组并添加数据
	var x = [];// 创建数组时间
    x.push(item.ts); // 添加到最后

// 创建json
var json={};
var lst=[];
var obj1={};
obj1['id']=1;
obj1['name']='name';
obj1['type']='type';
lst.push(obj1);
json['content']=lst;//引用json.js
var js=JSON.stringify(json);document.write(js);
// 结果：{"content":[{"id":1,"name":"name","type":"type"}]}

	//操作复杂json
	{"status":"000000","message":1,"data":[{"Type":"0","Account":"123??","State":"3","Timestamp":"2015-07-05 10:05:46","Money":"1","Reason":"ceshi "},{"Type":"0","Account":"13714876877","State":"3","Timestamp":"2015-05-15 17:17:36","Money":"2","Reason":"ceshi "},{"Type":"0","Account":"[object Object]","State":"3","Timestamp":"2015-05-15 14:14:15","Money":"10","Reason":"测试"},{"Type":"0","Account":"888","State":"2","Timestamp":"2015-04-07 19:28:24","Money":"1","Reason":""}]}
	$.ajax({
      url:"/wechat/queryWithdraw",
      type:"get",
      dataType: "json",
      success: function (data) {
        if (data.status=='000000') {
          //解析数组
          $.each(data.data, function(i, item) {
            var state='';
            switch(item.State)
            {
              case '1':
              state='待处理';
              break;
              case '2':
              state='已转账';
              break;
              default:
              state='提现失败 '+item.Reason;
            }
            $("#withdrawList").append(
              "<div>账号" + item.Account + " 状态" + state +
              "</br><div>金额" + item.Money + "元 时间" +item.Timestamp + "</div><hr/>");
          });
        }
        
      },
    });

//2方法

  $.getJSON("/card_getAllPhoneNum",function  (data) {
        $('#sos1').val(data.sos1);
        $('#sos2').val(data.sos2);
        $('#sos3').val(data.sos3);

        $('#familyName1').val(data.name1);
        $('#familyName2').val(data.name2);
        $('#familyName3').val(data.name3);
        $('#familyName4').val(data.name4);

        $('#familyNum1').val(data.family1);
        $('#familyNum2').val(data.family2);
        $('#familyNum3').val(data.family3);
        $('#familyNum4').val(data.family4);
      });

//js重定向
if (data.state=='1') {
            window.location.href='http://new.snewfly.com/wechat/userCenter';
          }

	//单个按钮点击
	$('#data').click(function(){
	getData();
	});

	// 妹子ui 点击的动画 && 所有元素点击 && $(this)使用
        $(':button').click(function(){
          var a=$(this),i="am-animation-"+a.data("docAnimation");a.data("animation-idle")&&clearTimeout(a.data("animation-idle")),a.removeClass(i),setTimeout(function(){a.addClass(i),a.data("animation-idle",setTimeout(function(){a.removeClass(i),a.data("animation-idle",!1)},500))},50);
        });

	 // 元素赋值
	$('#timeNum').text(parseInt(data.learningTime/60)+' 分');
	.html();
	.val();

	// 调试输出
	console.log("send successfully");

	// 创建一个元素并将其依附于某元素下面
	var mydiv = document.getElementById("mydiv");
	var p = document.createElement("span");
	p.style.marginRight = "10px";
	p.innerHTML = "send successfully" ;
	mydiv.appendChild(p);


	Append():在指定的页面元素后面追加元素 
比如一个列表元素<li>test!</li>,像这样的页面元素就可以通过append方法来动态添加多个<li>项例如： 
页面里面有一个id="div_keycontent"的div： <div id="div_keycontent"></div> 
Js里面就可以这样写： 
$.each(data.list, function (i, item) { 
$("#div_keycontent").append("<li>" + item["WikiTitle"] + " <a href=\"Read/" + item["WikiID"] + "\" >查看</a>" + "</li>"); 
}); 

//ajax get
	$.ajax({
	  url:"http://lamp.snewfly.com/data.php",
	  type:"get",
	  dataType: "json",
	  success: function (data) {
			 alert(data);
		 },
	  error: function (msg) {
		// alert("获取失败");
			 }
		});

//json 解析 
  var mObj=jQuery.parseJSON(data.getContent());
    alert(data.getContent());
    alert(mObj.content);
    alert(mObj.extra);

查找每个 p 元素的所有类名为 "selected" 的所有同胞元素：
$("p").siblings(".selected")

取值：var result = $('#txtSearch').val(); 
赋值：$('#txtSearch').val(result); 

// Each():对一个集合的操作,对集合里面的每一个元素进行后面的方法调用，例如： 
$.each(data.list, function (i, item) { 
Alert(item["WikiTitle"]”+” item["WikiID"]);//i是集合的元素下表，item代表元素本身 
}); 

// Spilt():对字符串进行操作例如： 
Var str = spit('liu,ming,feng',','); 
这样返回的str就是一个字符串数组：{“liu”,”ming”,”feng”} 



Substr();对字符串操作的，去里面的子字符串 
// 用法： ///判断最后一个字符是否为逗号 
if (str.substring(str.length - 1, str.length) == "," || str.substring(str.length - 1, str.length) == "，"){ 
alert(“最后一个字符是逗号！”); 
} 

Keyup();键盘按下弹起触发的方法 
$("#txtSearchKey").keyup(function () { 
$("#div_keycontent").html("<p>数据检索中....</p>"); 
}); 


// Trim()：去掉字符串的首尾空格 
用法：str.trim(); 

//实用 比$('#img').removeAttr('display');啥的简便
Show():让页面元素显示例如：$("#txtSearchKey").show(); 
Hide()：隐藏页面的元素例如：$("#txtSearchKey").hide(); 

//讲隐藏的元素显示：
<div style='width: 800px; height: 320px;display: none' id="drawDiv">
$('#drawDiv').css('display','inline');

// Indexof():查看字符串的中是否有对应的子字符串 
用法： 
if (str.indexOf(',,') != -1 || str.indexOf('，，') != -1) {///判断是否有连逗号 
alert(“有两个逗号连用！”); 
}


$("#msg").height(); //返回id为msg的元素的高度 
$("#msg").height("300"); //将id为msg的元素的高度设为300 
$("#msg").width(); //返回id为msg的元素的宽度 
$("#msg").width("300"); //将id为msg的元素的宽度设为300 

$("input").val(""); //返回表单输入框的value值 
$("input").val("test"); //将表单输入框的value值设为test 

$("#msg").click(); //触发id为msg的元素的单击事件 
$("#msg").click(fn); //为id为msg的元素单击事件添加函数 
同样blur,focus,select,submit事件都可以有着两种调用方法 



// 集合处理功能 
对于jquery返回的集合内容无需我们自己循环遍历并对每个对象分别做处理，jquery已经为我们提供的很方便的方法进行集合的处理。 
包括两种形式： 
$("p").each(function(i){this.style.color=['#f00','#0f0','#00f'][i]}) 
//为索引分别为0，1，2的p元素分别设定不同的字体颜色。 

$("tr").each(function(i){this.style.backgroundColor=['#ccc','#fff'][i%2]}) 
//实现表格的隔行换色效果 

// 支持方法的连写 
所谓连写，即可以对一个jquery对象连续调用各种不同的方法。 
例如： 
$("p").click(function(){alert($(this).html())}) 
.mouseover(function(){alert('mouse over event')}) 
.each(function(i){this.style.color=['#f00','#0f0','#00f'][i]}); 

// 操作元素的样式 
主要包括以下几种方式： 
$("#msg").css("background"); //返回元素的背景颜色 
$("#msg").css("background","#ccc") //设定元素背景为灰色 
$("#msg").height(300); $("#msg").width("200"); //设定宽高 
$("#msg").css({ color: "red", background: "blue" });//以名值对的形式设定样式 
$("#msg").addClass("select"); //为元素增加名称为select的class 
$("#msg").removeClass("select"); //删除元素名称为select的class 
$("#msg").toggleClass("select"); //如果存在（不存在）就删除（添加）名称为select的class 

（1）hover(fn1,fn2)：一个模仿悬停事件（鼠标移动到一个对象上面及移出这个对象）的方法。当鼠标移动到一个匹配的元素上面时，会触发指定的第一个函数。当鼠标移出这个元素时，会触发指定的第二个函数。 
//当鼠标放在表格的某行上时将class置为over，离开时置为out。 
$("tr").hover(function(){ 
$(this).addClass("over"); 
}, 
function(){ 
$(this).addClass("out"); 
}); 

（3）toggle(evenFn,oddFn): 每次点击时切换要调用的函数。如果点击了一个匹配的元素，则触发指定的第一个函数，当再次点击同一元素时，则触发指定的第二个函数。随后的每次点击都重复对这两个函数的轮番调用。 
//每次点击时轮换添加和删除名为selected的class。 
$("p").toggle(function(){ 
$(this).addClass("selected"); 
},function(){ 
$(this).removeClass("selected"); 
}); 

（4）trigger(eventtype): 在每一个匹配的元素上触发某类事件。 
例如： 
$("p").trigger("click"); //触发所有p元素的click事件 

（5）bind(eventtype,fn)，unbind(eventtype): 事件的绑定与反绑定 
从每一个匹配的元素中（添加）删除绑定的事件。 
例如： 
$("p").bind("click", function(){alert($(this).text());}); //为每个p元素添加单击事件 
$("p").unbind(); //删除所有p元素上的所有事件 
$("p").unbind("click") //删除所有p元素上的单击事件 



