  jQuery(document).ready(function($){
    var curr_user_nickname = '游客';
    var curr_user_head="";
    var socket;
    var wsServer = 'ws://120.24.76.242:1145';


    function checkAvailable () 
    {
      if(!("WebSocket" in window))
      {
        if(this.MozWebSocket)
        {
          WebSocket = this.MozWebSocket;
        }else
        {
          return false;
        }
      } 
      return true;
    }

    var result = checkAvailable();
    if (!result)
    {
      var message = "浏览器不支持或版本过低,建议安装最新chrome。";
      writeToChatLog(message,'text-error');
    }else
    {
      socket = 
      { 
        start : function() 
        { 
          this._ws = new WebSocket(wsServer); 
          this._ws.onopen = this.whenOpen; 
          this._ws.onmessage = this.whenMessage; 
          this._ws.onclose = this.whenClose; 
          this._ws.onerror = this.whenError;
        }, 
        whenOpen : function(m) 
        { 
          var system ={
            win : false,
            mac : false,
            xll : false
          };
          var p = navigator.platform;
          system.win = p.indexOf("Win") == 0;
          system.mac = p.indexOf("Mac") == 0;
          system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
          if(system.win||system.mac||system.xll){
            Notification.requestPermission();
          }

          var msg = new Object;
          msg.type = "NAME";
          socket.sendMsg(JSON.stringify(msg));
        }, 
        sendMsg : function(message) 
        { 
          if (this._ws) 
          { 
            this._ws.send(message); 
          }
        }, 
        whenMessage : function(m) 
        { 
          var msgObj = JSON.parse(m.data);

          switch (msgObj.type)
          {
            case "JOIN":
            if (!document.getElementById("offinfo").className.match(/(?:^|\s)am-active(?!\S)/)){
              writeToChatLog(msgObj.msg,'text-info');
            }
            break;

            case "QUIT":
            if (!document.getElementById("offinfo").className.match(/(?:^|\s)am-active(?!\S)/)){
              writeToChatLog(msgObj.msg,"text-info");
            }

            break;
            case "POST":
            if(msgObj.text_type=="text-error"){
              writeToChatLog(msgObj.msg,"text-error");
            }else{
              if(msgObj.from==curr_user_nickname){
            //自己发送的
            if(msgObj.msg=="『niconiconi』"){
              var niconiconi=document.getElementById("niconiconi");
              niconiconi.play();
            }
            writeToChatLog(msgObj.msg,"text-me",msgObj.from,msgObj.head);

          }else{
            if(msgObj.msg=="『niconiconi』"){
              var niconiconi=document.getElementById("niconiconi");
              niconiconi.play();}

              writeToChatLog(msgObj.msg,"text-user",msgObj.from,msgObj.head);
              if (Notification.permission === "granted") {
                alert('支持notification');
                var notification = new Notification(
                  msgObj.from+'说：', {
                    body: msgObj.msg,
                    icon: msgObj.head,
                    tag: 1
                  });
                notification.onshow = function () {
                  setTimeout(function () {
                    notification.close();
                  }, 6000);
                }
              }else{
               	// alert('不支持notification');
              }
              //alert('zhixwan');
            }
          }
          break;
          case "NOTE":
          writeToChatLog(msgObj.msg,msgObj.text_type);
          break;
          case "NAME":
          curr_user_nickname=msgObj.name;
          curr_user_head=msgObj.head;
          writeToChatLog(msgObj.msg,'text-info');
          $("#para").text("你好，"+curr_user_nickname);   
          $("#headimg").attr("src",curr_user_head);

          var msg = new Object;
          msg.type = "JOIN";
          msg.user_nickname=curr_user_nickname;
          socket.sendMsg(JSON.stringify(msg));
          setInterval(function() 
          {
            var msg = new Object
            msg.type = "HEARTBEAT";
            socket.sendMsg(JSON.stringify(msg));
          },60000);
          var msg = new Object;
          msg.type = "NOTE";
          msg.user_nickname = curr_user_nickname;
          socket.sendMsg(JSON.stringify(msg));
          break;
          case 'EDIT':
          writeToChatLog (msgObj.from+" 改昵称为："+msgObj.to,'text-info') ;
          
          break;
          
        }

      },
      whenClose : function(m) 
      { 
        this._ws = null; 
        var message = '连接已断开.'
        writeToChatLog(message,'text-error');
      },
      whenError : function(m)
      {
        var message = '出现未知错误，可能导致连接中断...';
        writeToChatLog(message,'text-error');
      } 
    }; 
  }




  var commit=0;
  function writeToChatLog (message,message_type,from,head) 
  {
    var systemmessage=document.getElementById("systemmessage");
    var usermessage=document.getElementById("usermessage");
    var s=document.getElementById('s');
    if(commit>5){
      var t=s.childNodes.length;
      s.removeChild(s.childNodes[0]);
    }
    commit++;
    var li= document.createElement("li");
    var myDate = new Date();
    if(message_type=="text-info"){
      li.innerHTML='<li class="am-comment-success am-animation-slide-bottom"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">萌睿娘</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
    }else if(message_type=="text-error"){
     li.innerHTML='<li class="am-comment-danger am-animation-slide-bottom"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">萌睿娘</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
   }else if(message_type=="text-me"){
     li.innerHTML='<li class="am-comment-primary am-animation-slide-left"><a href="#"><img src="'+head+'" alt="" class="am-comment-avatar" width="48" height="48"></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
   }else if(message_type=="text-user"){
    if (document.getElementById("voice").className.match(/(?:^|\s)am-active(?!\S)/)){
      usermessage.play();
    }
    li.innerHTML='<li class="am-comment am-animation-slide-right am-comment-flip"><a href="#"><img src="'+head+'" alt="" class="am-comment-avatar" width="48" height="48"></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
  }
  s.appendChild(li);
  s=document.getElementById('olds');
  var li= document.createElement("li");
  var myDate = new Date();
  if(message_type=="text-info"){
    li.innerHTML='<li class="am-comment-success am-animation-slide-bottom"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">系统</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
  }else if(message_type=="text-error"){
   li.innerHTML='<li class="am-comment-danger am-animation-slide-bottom"><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">系统</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
 }else if(message_type=="text-me"){
   li.innerHTML='<li class="am-comment-primary am-animation-slide-left"><a href="#"><img src="'+head+'" alt="" class="am-comment-avatar" width="48" height="48"></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
 }else if(message_type=="text-user"){
  li.innerHTML='<li class="am-comment am-animation-slide-right am-comment-flip"><a href="#"><img src="'+head+'" alt="" class="am-comment-avatar" width="48" height="48"></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#" class="am-comment-author">'+from+'</a> 发送于 <time>'+myDate.toLocaleString()+'</time></div></header><div class="am-comment-bd"><p>'+message+'</p></div></div></li><br>';
}
s.appendChild(li);
}
window.onunload = function() 
{
  quit();
};
window.onbeforeunload = function() 
{
  return '您真的要离开本页么？离开本页您的聊天记录，头像和昵称将被清空！'
};
function quit () {
  var msg = new Object;
  msg.type = "QUIT";
  if(!curr_user_nickname){
    curr_user_nickname='游客';
  }
    
  msg.from = curr_user_nickname;
  socket.sendMsg(JSON.stringify(msg));
}




socket.start();

// document.getElementById('sendMessage').addEventListener('click',function()
// {
//   sendmessage();
// },true);
document.getElementById('offinfo').addEventListener('click',function()
{
  if (document.getElementById("offinfo").className.match(/(?:^|\s)am-active(?!\S)/)){
   document.getElementById("offinfo").className = "am-btn am-btn-default";
 }else{
   document.getElementById("offinfo").className = "am-btn am-btn-primary am-active";
 }
},true);
document.getElementById('voice').addEventListener('click',function()
{
  if (document.getElementById("voice").className.match(/(?:^|\s)am-active(?!\S)/)){

   document.getElementById("voice").className = "am-btn am-btn-default";
 }else{
   document.getElementById("voice").className = "am-btn am-btn-primary am-active";
 }
},true);

function sendmessage(){
  message = $('#msgBox').val();
  // message = document.getElementById('messageTextBox1').value;
  if(message){
    if (curr_user_nickname)
    {
      var msg = new Object;
      msg.type = "POST";
      msg.from = curr_user_nickname;
      msg.context = '『'+message+'』';
      msg.to = '';
      msg.head=curr_user_head;
      socket.sendMsg(JSON.stringify(msg));

    }
  }
  // document.getElementById('msgBox').value="";
  $('#msgBox').val('');
}



  //输入框按键
  $("#msgBox").keydown(function(event) {  
                    if (event.keyCode == 13) {
                      sendmessage();
                    }  
                });
  //poi
$('#sendMessage').click(function(){
  
  $('#sendMessage').removeClass('am-animation-shake');
  // $('#sendMessage').addClass(' am-animation-shake');
  if ($('#msgBox').val()) {
    sendmessage();
  }
  
});
$('#editName').click(function(){
  var text = prompt("爆裂吧，现实！ 粉碎吧，精神！消失吧！这个世界！", "")
  if(text)
  {

    var msg = new Object;
    msg.type = "EDIT";
    msg.from = curr_user_nickname;
    curr_user_nickname=text;
    msg.to = text;
    msg.head=curr_user_head;
    socket.sendMsg(JSON.stringify(msg));
  }
});
});


