 //获得任意时间戳转 格式"2015/7/27 下午5:14:02"
function getDate(tm){ 
var tt=new Date(parseInt(tm) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ") 
return tt; 
}

//返回当前十位时间戳
function getCurTs(){
  var ts = (new Date()).valueOf()+"";
  var my=ts.substr(0,ts.length-3);
  return my;
}

         //获得当前时间 格式06-26 20:23:50
         //ts为十位时间戳。ts=='now' 当前
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