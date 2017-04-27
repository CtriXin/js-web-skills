### js-web-skills
js web 相关总结，乱七八糟,难度不分先后，随意插入的

***

[1秒破解 js packer 加密](http://www.cnblogs.com/52cik/p/js-unpacker.html)

[了解一下幂等](http://macrochen.iteye.com/blog/678683)

[用JS在浏览器中创建下载文件](http://www.jb51.net/article/47723.htm)

***
####细说PHP中strlen和mb_strlen的区别
```
//测试时文件的编码方式要是UTF8  
$str='中文a字1符';  
echo strlen($str).'<br>';//14  
echo mb_strlen($str,'utf8').'<br>';//6  
echo mb_strlen($str,'gbk').'<br>';//8  
echo mb_strlen($str,'gb2312').'<br>';//10  
```
***
####getBoundingClientRect
```
![demo](http://images.cnitblog.com/blog2015/678562/201504/262132219001037.jpg)
ClientRect {top: 788.578125, right: 1525.484375, bottom: 820.578125, left: 600.828125, width: 924.65625…}

```

***
####git sourcetree 想回滚未提交的文件，可以选中文件，右键--移除--再右键--丢弃

***
####git sourcetree 想回滚到某个版本，可以双击版本--点击确定

***
####array_map() 函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
```

if (get_magic_quotes_gpc()) {
  function stripslashes_deep($value){ 
    $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
  return $value;
}
  $_POST = array_map('stripslashes_deep', $_POST);
  $_GET = array_map('stripslashes_deep', $_GET);
  $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}
```

***
####PHP7专题
```

// 返回值类型
declare(strict_types = 1);
   function returnIntValue(int $value): int {
      return $value;
   }
   print(returnIntValue(5));

//参数类型
declare(strict_types=1);
   function sum(int ...$ints) {
      return array_sum($ints);
   }
   print(sum(2, '3', 4.1));

//在PHP7，一个新的功能，空合并运算符(??)已被引入。它被用来代替三元运算并与 isset()函数功能结合一起使用。如果它存在并且它不是空的，空合并运算符返回它的第一个操作数;否则返回第二个操作数。
//用来判断$_POST,$_GET最合适了
$A=0;
$username = $A ?? 'not passed';
echo $username;//0
$A='';
$username = $A ?? 'not passed';
echo $username;//''

$A=null;
$username = $A ?? 'not passed';
echo $username;//'not passed'

$A;
$username = $A ?? 'not passed';
echo $username;//'not passed'

在PHP7，一个新的功能，飞船操作符已经被引入。它是用于比较两个表达式。当第一个表达式比第二个表达式分别小于，等于或大于它返回-1，0或1。
//integer comparison
   print( 1 <=> 1);print("<br/>");//0
   print( 1 <=> 2);print("<br/>");//-1
   print( 2 <=> 1);print("<br/>");//1

   //string comparison
   print( "a" <=> "a");print("<br/>");//0
   print( "a" <=> "b");print("<br/>");//-1
   print( "b" <=> "a");print("<br/>");//1

echo "A" <=> "B";//-1
echo "ab" <=> "b";//-1

//数组常量现在可以使用 define() 函数定义。 在PHP5.6，它们只能使用 const 关键字定义。
//define a array using define function
   define('animals', [
      'dog',
      'cat',
      'bird'
   ]);
   print(animals[1]);//cat

//在php7中，匿名类现在可以使用 new class 来定义。匿名类可以使用来代替完整的类定义。
   interface Logger {
      public function log(string $msg);
   }

   class Application {
      private $logger;

      public function getLogger(): Logger {
         return $this->logger;
      }

      public function setLogger(Logger $logger) {
         $this->logger = $logger;
      }  
   }

   $app = new Application;
   $app->setLogger(new class implements Logger {
      public function log(string $msg) {
         print($msg);
      }
   });

   $app->getLogger()->log("My first Log Message");//My first Log Message

Closure::call() 方法被添加作为临时绑定的对象范围，以封闭并简便调用它的方法。它的性能相比PHP5.6 bindTo要快得多。
   class A {
      private $x = 1;
   }

   // PHP 7+ code, Define
   $value = function() {
      return $this->x;
   };

   print($value->call(new A));//1
//类似JS里的call,apply

PHP7引入了intdiv()的新函数，它执行操作数的整数除法并返回结果为 int 类型。
echo intdiv(7,12);//0
echo intdiv(7,2);//3

7.1新特性http://www.phpchina.com/portal.php?mod=view&aid=40237

```

***
####为querySelectorAll添加forEach方法
```
let selector = 'th.vuetable-th-checkbox-' + idColumn + ' input[type=checkbox]'
      let els = document.querySelectorAll(selector)

      //fixed:document.querySelectorAll return the typeof nodeList not array
      if(els.forEach===undefined)
      els.forEach=function(cb){
        [].forEach.call(els, cb);
      }

      // count how many checkbox row in the current page has been checked
      let selected = this.tableData.filter(function(item) {
        return self.selectedTo.indexOf(item[idColumn]) >= 0
      })

      // count == 0, clear the checkbox
      if (selected.length <= 0) {
        els.forEach(function(el) {
          el.indeterminate = false
        })
        return false
      }
```

***
####WinSCP下su切换到root的技巧
```
https://my.oschina.net/u/1038053/blog/611562?p={{totalPage}}

```

***
####图片转base64 字符串转base64
```
将图片数据进行Base64编码
function getCanvas(w, h) {
  var c = document.createElement('canvas');
  c.width = w;
  c.height = h;
  return c;
}
  
function getPixels(img) {
  var c = getCanvas(img.width, img.height);
  var ctx = c.getContext('2d');
  ctx.drawImage(img, 0, 0);
  return ctx.getImageData(0, 0, c.width, c.height);
}

字符串转base64
/**
 * 
 * btoa()：字符串或二进制值转为Base64编码
 * atob()：Base64编码转为原来的编码
  */
  var string = 'Hello World!';
  console.log(btoa(string)) // "SGVsbG8gV29ybGQh" 将ascii字符串或二进制数据转换成一个base64编码过的字符串,该方法不能直接作用于Unicode字符串.

  console.log(atob('SGVsbG8gV29ybGQh')) // "Hello World!"

  function b64Encode(str) {
      return btoa(encodeURIComponent(str));
  }

  function b64Decode(str) {
      return decodeURIComponent(atob(str));
  }
  console.log(b64Encode('Hello World! 你好！'))
  console.log(b64Decode('SGVsbG8lMjBXb3JsZCElMjAlRTQlQkQlQTAlRTUlQTUlQkQlRUYlQkMlODE='))


```


***
####HTML语言中表格的书写中TD TR TH的英文全称是什么？
```
是定义表格中的一行
table row
是定义一个表格
table data cell
是定义单元格中的一个单元格
table head
和差不多，只不过单元格中的字体是居中加粗的
```

***
####js计算耗时
```
console.time('myTime'); //Starts the timer with label - myTime
 
for(var i=0; i < 100000; i++){
  2+4+5;
}
 
console.timeEnd('myTime'); 

console.table(variableName) 把变量和它的所有属性展现城表格结构
var myArray=[{a:1,b:2,c:3},{a:1,b:2,c:3,d:4},{k:11,f:22},{a:1,b:2,c:3}]
console.table(myArray)
```


***
####group by 按最新一条排序（考勤数据）
```
分析：由于group by 会取出排在最上面的一条做显示的一条，所以对考勤数据进行排序（时间降序）再group by 就行了：
SELECT * FROM (SELECT a.`student_id` AS studentID,a.`name` AS studentName,b.`type`,b.`time` AS DATETIME FROM manager_student a LEFT JOIN xsk_attendance b ON a.`device_id`=b.`device_id` AND DATE_FORMAT(b.time,'%Y-%m-%d') ='2017-02-14' WHERE a.`class_id`=208 AND a.`school_id`=61 ORDER BY (DATETIME) DESC)t GROUP BY studentName ORDER BY studentID ASC

原本的语句只会按最早一条数据排序：
SELECT a.`student_id` AS studentID,a.`name` AS studentName,b.`type`,b.`time` AS datetime FROM manager_student a LEFT JOIN xsk_attendance b ON a.`device_id`=b.`device_id` AND DATE_FORMAT(b.time,\'%Y-%m-%d\') =? WHERE a.`class_id`=? AND a.`school_id`=? GROUP BY a.`name` ORDER BY (studentID+0) ASC
参考
http://www.tuicool.com/articles/FnQFre
```

***
####mysql 对null进行排序，降序时候让null在前面
```
 ISNULL(DATETIME) DESC ,DATETIME DESC，升序反之，怎么搞都行

SELECT * FROM (SELECT a.`student_id` AS studentID,a.`name` AS studentName,b.`type`,b.`time` AS DATETIME FROM manager_student a LEFT JOIN xsk_attendance b ON a.`device_id`=b.`device_id` AND DATE_FORMAT(b.time,'%Y-%m-%d') ='2017-02-14' WHERE a.`class_id`=208 AND a.`school_id`=61 ORDER BY (DATETIME) DESC)t GROUP BY studentName ORDER BY ISNULL(DATETIME) DESC ,DATETIME DESC
参考
http://www.cnblogs.com/jeffen/p/6044764.html
```

***
####子域名间共享cookie（seesion id）
```
设置顶级域名就行了

未指定domain时，默认的domain为用哪个域名访问就是哪个，如果为顶级域名访问，那么可以被其他2级域名共享。


读取cookie
　　二级域名能读取设置了domain为顶级域名或者自身的cookie，不能读取其他二级域名domain的cookie。所以要想cookie在多个二级域名中共享，需要设置domain为顶级域名，这样就可以在所有二级域名里面或者到这个cookie的值了。

顶级域名只能获取到domain设置为顶级域名的cookie，其他domain设置为二级域名的无法获取。

删除cookie
　　1）顶级域名的cookie在顶级域名或者2级域名都可以删除，但是用非顶级域名访问的网站要删除顶级域名的cookie，需要设置获取到的cookie的domain为顶级域名,这样才能删除顶级域名的cookie，否则无法删除，默认的会删除访问的域名下对应的cookie，而不是顶级域名的。

```

***
####mysql中模糊查询的四种用法： 
```
http://www.jb51.net/article/48315.htm
1，%：表示任意0个或多个字符。可匹配任意类型和长度的字符，有些情况下若是中文，请使用两个百分号（%%）表示。 
比如 SELECT * FROM [user] WHERE u_name LIKE '%三%' 
将会把u_name为“张三”，“张猫三”、“三脚猫”，“唐三藏”等等有“三”的记录全找出来。 
另外，如果需要找出u_name中既有“三”又有“猫”的记录，请使用and条件 
SELECT * FROM [user] WHERE u_name LIKE '%三%' AND u_name LIKE '%猫%' 
若使用 SELECT * FROM [user] WHERE u_name LIKE '%三%猫%' 

虽然能搜索出“三脚猫”，但不能搜索出符合条件的“张猫三”。 

2，_： 表示任意单个字符。匹配单个任意字符，它常用来限制表达式的字符长度语句： 
比如 SELECT * FROM [user] WHERE u_name LIKE '_三_' 
只找出“唐三藏”这样u_name为三个字且中间一个字是“三”的； 


3，[ ]：表示括号内所列字符中的一个（类似正则表达式）。指定一个字符、字符串或范围，要求所匹配对象为它们中的任一个。 
比如 SELECT * FROM [user] WHERE u_name LIKE '[张李王]三' 将找出“张三”、“李三”、“王三”（而不是“张李王三”）； 
如 [ ] 内有一系列字符（01234、abcde之类的）则可略写为“0-4”、“a-e” 
SELECT * FROM [user] WHERE u_name LIKE '老[1-9]' 将找出“老1”、“老2”、……、“老9”； 
测试不通过。。

4，[^ ] ：表示不在括号所列之内的单个字符。其取值和 [] 相同，但它要求所匹配对象为指定字符以外的任一个字符。 
比如 SELECT * FROM [user] WHERE u_name LIKE '[^张李王]三' 将找出不姓“张”、“李”、“王”的“赵三”、“孙三”等； 
SELECT * FROM [user] WHERE u_name LIKE '老[^1-4]'; 将排除“老1”到“老4”，寻找“老5”、“老6”、…… 
测试不通过。。

正则
SELECT * FROM bikelock WHERE device_id REGEXP  '^1[1-9]*'

```

***
####relative absolute 居中方法
```
relative:
margin：0 auto;

absolute：
left:50%;
margin-left:-1.42857143rem;/* 40px */

也可以配合flex设置
```

***
####判断object中是否存在xx键值
```
a={ a:123,tt:999}
Object {a: 123, tt: 999}
if('tt' in a) alert(1)//比 a['tt']更直观
```

***
####nginx 配置域名重定向
```
server {
        server_name luokr.com;
        return 301 $scheme://www.luokr.com$request_uri;
}
```

***
####取消冒泡事件兼容性写法
```
       //取消冒泡事件
function stopBubble(e){
               e=e||window.event;  //firefox,chrome,etc.||IE,opera
if(e.stopPropagation){
                   e.stopPropagation();
                 }
                 else{
                  e.cancelBubble=true;
                 }
             }
```

***
####transform-origin 旋转中心点
```
http://www.zhangxinxu.com/wordpress/2012/06/css3-transform-matrix-%E7%9F%A9%E9%98%B5/

CSS代码：
.anim_image {
    -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
    -o-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
    cursor:pointer;
}
.anim_image_top {
    position: absolute;
    -webkit-transform: scale(0, 0);
    opacity: 0;
    filter: Alpha(opacity=0);
}
.anim_box:hover .anim_image_top , .anim_box_hover .anim_image_top {
    opacity: 1;
    filter: Alpha(opacity=100);
    -webkit-transform: scale(1, 1);
    -webkit-transform-origin: top right;        
}
.anim_box:hover .anim_image_bottom, .anim_box_hover .anim_image_bottom {
    -webkit-transform: scale(0, 0);
    -webkit-transform-origin: bottom left;
}
HTML代码：
<div id="testBox" class="demo anim_box">
    <img class="anim_image anim_image_top" src="http://image.zhangxinxu.com/image/study/p/s200/ps6.jpg" />
    <img class="anim_image anim_image_bottom" src="http://image.zhangxinxu.com/image/study/p/s200/ps4.jpg" />
</div>

```

***
####取消手机端点击时候的样式
```
-webkit-tap-highlight-color:rgba(0,0,0,0);
还有个outline
```

***
####linux 查看本机链接tcp/http情况
```
 netstat -nat|grep -i "6677"
http://blog.csdn.net/he_jian1/article/details/40787269
TIME_WAIT 8947 等待足够的时间以确保远程TCP接收到连接中断请求的确认
FIN_WAIT1 15 等待远程TCP连接中断请求，或先前的连接中断请求的确认
FIN_WAIT2 1 从远程TCP等待连接中断请求
ESTABLISHED 55 代表一个打开的连接
SYN_RECV 21 再收到和发送一个连接请求后等待对方对连接请求的确认
CLOSING 2 没有任何连接状态
LAST_ACK 4 等待原来的发向远程TCP的连接中断请求的确认
 
TCP连接状态详解
LISTEN： 侦听来自远方的TCP端口的连接请求
SYN-SENT： 再发送连接请求后等待匹配的连接请求
SYN-RECEIVED：再收到和发送一个连接请求后等待对方对连接请求的确认
ESTABLISHED： 代表一个打开的连接
FIN-WAIT-1： 等待远程TCP连接中断请求，或先前的连接中断请求的确认
FIN-WAIT-2： 从远程TCP等待连接中断请求
CLOSE-WAIT： 等待从本地用户发来的连接中断请求
CLOSING： 等待远程TCP对连接中断的确认
LAST-ACK： 等待原来的发向远程TCP的连接中断请求的确认
TIME-WAIT： 等待足够的时间以确保远程TCP接收到连接中断请求的确认
CLOSED： 没有任何连接状态
```


***
####mysql添加查询日志
```
general_log=ON
general_log_file=/tmp/mysql.log
```


***
####mysql区分大小写
```

在 字段前加 binary
如
SELECT * FROM daxiaoxie WHERE BINARY NAME='haha'
```


***
####PHP 面试题
```

$test = 'aaaaaa';
    $abc = & $test;
    unset($test);
    echo $abc;//'aaaaaaa'


    $a1 = null;
    $a2 = false;
    $a3 = 0;
    $a4 = '';
    $a5 = '0';
    $a6 = 'null';
    $a7 = array();
    $a8 = array(array());
    echo empty($a1) ? 'true' : 'false';
    echo empty($a2) ? 'true' : 'false';
    echo empty($a3) ? 'true' : 'false';
    echo empty($a4) ? 'true' : 'false';
    echo empty($a5) ? 'true' : 'false';
    echo empty($a6) ? 'true' : 'false';
    echo empty($a7) ? 'true' : 'false';
    echo empty($a8) ? 'true' : 'false';

//true true true true true false true false


    $count = 5;
    function get_count(){
        static $count = 0;
        return $count++;
    }
    echo $count;//5
    ++$count;
    echo get_count();//0
    echo get_count();//1
    echo get_count();
function foo(){ 
static $int = 0;// correct 
static $int = 1+2; // wrong (as it is an expression) 
static $int = sqrt(121); // wrong (as it is an expression too) 
$int++; 
echo $int; 
} 


strrev()//字符串翻转
strrchr() //函数查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。
strchr() //函数查找字符串在另一个字符串中第一次出现的位置，并返回从该位置到字符串结尾的所有字符。
strrpos()//字符串最后一次出现的位置


必看面试题
https://cnodejs.org/topic/5867d50d5eac96bb04d3e302
```

冒泡排序（数组排序）
$a=array('3','8','1','8','4','11','7');
// print_r($a);
$len = count($a);

function quikSort($arr){
    for ($i=0; $i <$len ; $i++) { 
    for ($j=0; $j <$len-$i-1 ; $j++) { 
        if ($a[$j]>$a[$j+1]) {
            $temp=$a[$j+1];
            $a[$j+1]=$a[$j];
            $a[$j]=$temp;
        }
    }
}
}


/**
* 快速排序
* $a=array('3','8','1','4','11','7');
* 递归实现
* 获取数组第一个数,循环使后面的数与其比较,
* 比其小的放在一个数组中,比其大的放在一个数组中
* 将2个数组递归调用,直到最终数组元素小于等于1时,没有可以比较的元素
* 通过array_merge函数,将比较的数组按大小顺序合并然后一层一层的return出去,最终实现从小到大排序
* @param array $array 要操作的数组
* @return array $array 返回的数组
*/

function quickSort($array)
{
        if(count($array) <= 1 ) return $array;
        $key = $array[0];
        $left_arr = array();
        $right_arr = array();
        for ($i=1;$i<count($array);$i++){
                if($array[$i] <= $key){
                        $left_arr[] = $array[$i];
                }else{
                        $right_arr[] = $array[$i];
                }
        }

        $left_arr = quickSort($left_arr);
        $right_arr = quickSort($right_arr);
        return array_merge($left_arr,array($key),$right_arr);

}

js版

arr=[5,6,1,4,88];
console.log(quikSort(arr));
function quikSort(arr){
    console.log('in quikSort');
    if (arr.length<=1) return arr;
    var key=arr[0],
    l=[],
    r=[];
    for (var i = 1; i <arr.length; i++) {
        if (key>=arr[i]) {
            l.push(arr[i])
        }else{
            r.push(arr[i])
        }
    }
    l=quikSort(l)
    r=quikSort(r)
    return l.concat([key]).concat(r)
}

/**
* 选择排序
* 2层循环
* 第一层逐个获取数组的值 $array[$i]
* 第二次遍历整个数组与$array[$i]比较($j=$i+1已经比较的,不再比较,减少比较次数)
* 如果比$array[$i]小,就交换位置
* 这样一轮下来就可以得到数组中最小值
* 以此内推整个外层循环下来就数组从小到大排序了
* @param array $array 要比较的数组
* @return array $array 从小到大排序后的数组
*/

function selectSort($array){
        $cnt = count($array);
        for($i=0;$i<$cnt;$i++){
                for($j=($i+1);$j<$cnt;$j++){
                        if($array[$i]>$array[$j]){
                                $tmp = $array[$i];
                                $array[$i] = $array[$j];
                                $array[$j] = $tmp;
                        }
                }
        }
        return $array;
}


***
####四种this的类型
```
介绍一下四种this的类型：

默认绑定
隐式绑定
显式绑定
new绑定
其中，默认绑定就是什么都匹配不到的情况下，非严格模式this绑定到全局对象window或者global,严格模式绑定到undefined;隐式绑定就是函数作为对象的属性，通过对象属性的方式调用，这个时候this绑定到对象;显示绑定就是通过apply和call调用的方式;new绑定就是通过new操作符时将this绑定到当前新创建的对象中，它们的匹配有限是是从小到大的。
```

***
####绝对定位 max-width也可以居中
```
max-width: 600px;
position: absolute;
    top: 0;
    left: 0;
    right:0;
    width: 100%;
    height: 100%;
    margin:0 auto;
```


***
####mysql left join、right join、inner join的区别
```
A LEFT JOIN B:
left join是以A表的记录为基础的,A可以看成左表,B可以看成右表,left join是以左表为准的.
换句话说,左表(A)的记录将会全部表示出来,而右表(B)只会显示符合搜索条件的记录(例子中为: A.aID = B.bID).
B表记录不足的地方均为NULL.
right join 反之
inner join 取两者都有的，其他不显示
```


***
####mysql设置外键 on update on delete CASCADE
```
CASCADE
删除：删除主表时自动删除从表。删除从表，主表不变
更新：更新主表时自动更新从表。更新从表，主表不变
参考
https://my.oschina.net/cart/blog/277624
```


***
####LBS应用中"附近的人"在服务器端如何更高效快速地计算距离？

```
用经纬度做索引，
先粗算，比如把经纬度差一以上的全去掉，where latitude>y-1 and latitude<y+1 and longitude>x-1 and longitude <x+1 and ... ; x,y为当前用户的经纬度。
再小范围概算，使用类似这样的公式 order by abs(longitude -x)+abs(latitude -y) limit 100;
最后显示时再精确计算 使用类似这样的公式:(2 * 6378.137* ASIN(SQRT(POW(SIN(PI()*(y-lat)/360),2)+COS(PI()*x/180)* COS(lat * PI()/180)*POW(SIN(PI()*(x-lng)/360),2))))。
前两项在数据库端计算，后一项在应用服务器端计算即可。

链接：https://www.zhihu.com/question/19937663/answer/21170137

php 代码：（laravel）

    public function near($version,Request $request)
    {
        $lng=$request->input('lng');
        $lat=$request->input('lat');
        $range=$request->input('range',5);
        $limit=$request->input('limit',20);

        if ($lng=='' || $lat=='') 
            return $this->toJson(-1,'经纬度不能为空');
        $arr=$this->returnSquarePoint($lng, $lat,$range * 1000);
        //TODO 东西半球，南北半球的换算绝对值？
        $bikelocks=Bikelock::where('lat','<=',$arr['left-top']["lat"])
        ->where('lat','>=',$arr['right-bottom']["lat"])
        ->where('lng','>=',$arr['left-top']["lng"])
        ->where('lng','<=',$arr['right-bottom']["lng"])
        ->where('status_lock','0')->orderByRaw('( ABS(lat -'.$lat.')+ABS(lng -'.$lng.') )')->take($limit)->get(['device_id','status_book','status_lock','lat','lng','electricity']);

        return $this->toJson(0,'',$bikelocks);
    }


    /**
     * 
     * @author bajian
     * @param distance 单位米
     * @return array
     */
    private function returnSquarePoint($lng, $lat,$distance = 5000){
       $earthRadius = 6378138;
       $dlng =  2 * asin(sin($distance / (2 * $earthRadius)) / cos(deg2rad($lat)));
       $dlng = rad2deg($dlng);
       $dlat = $distance/$earthRadius;
       $dlat = rad2deg($dlat);
       return array(
         'left-top'=>array('lat'=>round($lat + $dlat,6),'lng'=>round($lng-$dlng,6)),
         'right-top'=>array('lat'=>round($lat + $dlat,6), 'lng'=>round($lng + $dlng,6)),
         'left-bottom'=>array('lat'=>round($lat - $dlat,6), 'lng'=>round($lng - $dlng,6)),
         'right-bottom'=>array('lat'=>round($lat - $dlat,6), 'lng'=>round($lng + $dlng,6))
         );
   }
```


***
#### 查询数据库中的表名
```
SELECT * FROM information_schema.tables WHERE TABLE_NAME LIKE 'data_%'

SELECT * FROM information_schema.tables WHERE TABLE_SCHEMA='db_kirito' AND  TABLE_NAME LIKE 'bi_%'

```

***
#### 百度地图经纬度偏移量
```

  var lng = parseFloat(obj.lng) + 0.011307845100006375;
  var lat = parseFloat(obj.lat) + 0.0035078896000015902;
```

***
####compact 创建一个包含变量名和它们的值的数组：
```
<?php
$firstname = "Bill";
$lastname = "Gates";
$age = "60";

$result = compact("firstname", "lastname", "age");

print_r($result);//Array ( [firstname] => Bill [lastname] => Gates [age] => 60 )
?>

```


***
####微信端地址刷新（跳转）不能是和当前页面同一个连接，否则不刷新
```
window.location.reload()
window.location.href="/reload.html"
都不行，除非加随机数

```



***
####String.replace() 语法 替换文本中的$字符有特殊含义：（用于模式匹配的String方法）
```
$1、$2、...、$99 与 regexp 中的第 1 到第 99 个子表达式相匹配的文本。
$&  与 regexp 相匹配的子串。
$`  位于匹配子串左侧的文本。
$'  位于匹配子串右侧的文本。
$$  普通字符$。

如：
'abc'.replace(/b/g, "{$$$`$&$'}")
// 结果为 "a{$abc}c"，即把b换成了{$abc}
'abccba'.replace(/b/g, "{$`}")
// 结果为 "a{a}cc{abcc}a"


定位点（锚字符、边界）
^ 匹配开始的位置。将 ^ 用作括号[]表达式中的第一个字符，则会对字符集求反。
$ 匹配结尾的位置。
\b 与一个字边界匹配，如er\b 与“never”中的“er”匹配，但与“verb”中的“er”不匹配。
\B 非边界字匹配。

? 当该字符紧跟在任何一个其他限制符（*,+,?，{n}，{n,}，{n,m}）后面时，匹配模式是非贪婪的。非贪婪模式尽可能少的匹配所搜索的字符串，而默认的贪婪模式则尽可能多的匹配所搜索的字符串。例如，对于字符串“oooo”，“o+?”将匹配每个“o”即4次匹配，而“o+”将只匹配1次即匹配“oooo”。
"AB01CD23CD45CEff".match('AB.*CD')
["AB01CD23CD"]

"AB01CD23CD45CEff".match('AB.*?CD')
["AB01CD"]
http://web.jobbole.com/89221/

```

***
####gitignore 语法
```
语法规范

空行或是以 # 开头的行即注释行将被忽略。
可以在前面添加正斜杠 / 来避免递归,下面的例子中可以很明白的看出来与下一条的区别。
可以在后面添加正斜杠 / 来忽略文件夹，例如 build/ 即忽略build文件夹。
可以使用 ! 来否定忽略，即比如在前面用了 *.apk ，然后使用 !a.apk ，则这个a.apk不会被忽略。
* 用来匹配零个或多个字符，如 *.[oa] 忽略所有以".o"或".a"结尾， *~ 忽略所有以 ~ 结尾的文件（这种文件通常被许多编辑器标记为临时文件）； [] 用来匹配括号内的任一字符，如 [abc] ，也可以在括号内加连接符，如 [0-9] 匹配0至9的数； ? 用来匹配单个字符。 
看了这么多，还是应该来个栗子：

# 忽略 .a 文件
*.a
# 但否定忽略 lib.a, 尽管已经在前面忽略了 .a 文件
!lib.a
# 仅在当前目录下忽略 TODO 文件， 但不包括子目录下的 subdir/TODO
/TODO
# 忽略 build/ 文件夹下的所有文件
build/
# 忽略 doc/notes.txt, 不包括 doc/server/arch.txt
doc/*.txt
# 忽略所有的 .pdf 文件 在 doc/ directory 下的
doc/**/*.pdf
```


***
####table 自动换行
```
word-break: break-all;text-align: left;padding-left: 5px;word-wrap:break-word;
```


***
####cookie ls 跨域的办法
```
Cookie跨域单点登录  

为了快速、简单的实现这一功能，首先想到就是通过JS操作Cookie并让两个不同域的cookie能够相互访问，这样就可达到了上述的效果，具体实现过程大致可分以下两个步骤：  

１、在Ａ系统下成功登录后，利用JS动态创建一个隐藏的iframe，通过iframe的src属性将Ａ域下的cookie值作为 get参数重定向到Ｂ系统下b.aspx页面上；  

var _frm = document.createElement("iframe"); 
_frm.style.display="none";  
_frm.src="http://b.com/b.jsp?test_cookie=xxxxx";  
document.body.appendChild(_frm);  

2、在Ｂ系统的b.aspx页面中来获取Ａ系统中所传过来的cookie值，并将所获取到值写入cookie中，这样就简单的实现了cookie跨域的访问；　不过这其中有个问题需要注意，就是在IE浏览器下这样操作不能成功，需要在b.aspx页面中设置P3P HTTP Header就可以解决了（具体詳細信息可以参考:http://www.w3.org/P3P/)，P3P设置代码为： 

也可以在html加入标记 
<meta http-equiv="P3P" content='CP="IDC DSP COR CURa ADMa  OUR IND PHY ONL COM STA"'>


Response.AppendHeader("P3P", "CP='IDC DSP COR CURa ADMa  OUR IND PHY ONL COM STA'"); 
```


***
####ajax 跨域原理
```
1、简单请求(simple request)
简单请求的判断包括两个条件：

请求方法必须是一下几种:
HEAD
GET
POST
HTTP 头只能包括以下信息：
Accept
Accept-Language
Content-Language
Last-Event-ID
Content-Type: 只限于[application/x-www-form-urlencoded, multipart/form-data, text/plain]
不能同时满足以上两个条件的，就都视作非简单请求

在 CROS 请求中，默认是不会携带 cookie之类的用户信息的，但是不携带用户信息的话，是没办法判断用户身份的，所以，可以在请求时将withCredentials设置为 true, 例如：

设置了这个值之后，在服务端会将 response 中的 Access-Control-Allow-Credentials 也设置为 true，这样浏览器才会相应 cookie
如果这个值被设为了`true`，那么`Access-Control-Allow-Origin`就不能被设置为    `*`，必须要显示指定为`origin`的值；并且返回的`cookie`因为是在被跨域访问的域名下，因为遵守同    源策略，所以在`origin`网页中是不能被读取到的。


2、非简单请求(not-so-simple request)
与简单请求最大的不同在于，非简单请求实际上是发送了两个请求。

在正式请求之前，会先发送一个预请求(preflight-request)（options类型），这个请求的作用是尽可能少的携带信息，供服务端判断是否响应该请求。

还会带上这几个字段：
Origin: 同简单请求的origin
Access-Control-Request-Method: 请求将要使用的方法
Access-Control-Request-Headers: 浏览器会额外发送哪些头信息

服务端
如果判断响应这个请求，返回的response中将会携带：

Access-Control-Allow-Origin: origin
Access-Control-Allow-Methods: like request
Access-Control-Allow-Headers: like request
如果否定这个请求，直接返回不带这三个字段的response就可以，浏览器将会把这种返回判断为失败的返回，触发onerror方法

php 设置方式
private function SetCors(){
    $origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '*';
    header('content-type:application:json;charset=utf8');  
    header('Access-Control-Allow-Origin:'.$origin);  
    header('Access-Control-Allow-Methods:*');  
    header('Access-Control-Allow-Credentials:true');  
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    }

options类型 
if ($_SERVER['REQUEST_METHOD']=='OPTIONS') {
    $origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '*';
    header('content-type:application:json;charset=utf8');  
    header('Access-Control-Allow-Origin:'.$origin);  
    header('Access-Control-Allow-Methods:*');  
    header('Access-Control-Allow-Credentials:true');  
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    return ;
}

js

        var unlock=function(){
            $.ajax({
            url:'http://vkapi.goupianyi888.com/api/v1/device/unlock',
            method:'post',
            data:{
                device_id:'1234567890123',
            },
            xhrFields: {
                withCredentials: true
            },
            crossDomain: true,
            success:function(data){
                console.log(data);
            }
        })

        }

```

***
####laravel 获得查询原始sql
```
DB::connection()->enableQueryLog();
 
        $bikelocks=Bikelock::where('lat','>=',$arr['left-top']["lat"])
            ->where('lat','<=',$arr['right-bottom']["lat"])
            ->where('lng','>=',$arr['left-top']["lng"])
            ->where('lng','<=',$arr['right-bottom']["lng"])->take($limit)->get();
            print_r(
    DB::getQueryLog()
```
***
####laravel 数据库锁
```
首先，laravel事务有两种写法
1、
$model=null;
DB::connection()->enableQueryLog();
DB::transaction(function() use(&$model){
            $model = Merchant::lockForUpdate()->find(5);
            //$model = Merchant::sharedLock()->find(5);
            $model->balance=$model->balance+1;
            $model->save();
            var_dump(DB::getQueryLog());
        });
2、
DB::beginTransaction();
$model = Merchant::lockForUpdate()->find(5);
$model->balance=$model->balance+1;
$model->save();
var_dump(DB::getQueryLog());
DB::commit();

其次
lockForUpdate()
sharedLock()执行行锁（需要引擎innodb（且使用主键）,因为myisan会变成表锁，两种类型最主要的差别就是Innodb 支持事务处理与外键和行级锁）
http://blog.csdn.net/xifeijian/article/details/20316775

lock for update的加锁方式无非是比lock in share mode的方式多阻塞了select...lock in share mode的查询方式，并不会阻塞快照读。
http://blog.csdn.net/cug_jiang126com/article/details/50544728
在我看来，SELECT ... LOCK IN SHARE MODE的应用场景适合于两张表存在关系时的写操作，拿mysql官方文档的例子来说，一个表是child表，一个是parent表，假设child表的某一列child_id映射到parent表的c_child_id列，那么从业务角度讲，此时我直接insert一条child_id=100记录到child表是存在风险的，因为刚insert的时候可能在parent表里删除了这条c_child_id=100的记录，那么业务数据就存在不一致的风险。正确的方法是再插入时执行select * from parent where c_child_id=100 lock in share mode,锁定了parent表的这条记录，然后执行insert into child(child_id) values (100)就ok了。
总结：lock in share mode适用于两张表存在业务关系时的一致性要求，for  update适用于操作同一张表时的一致性要求。



锁多个表
$queue = Users::with(array('email'=>function($query){
            $query->lockForUpdate();
    })->lockForUpdate()
    ->get()
```

***
####laravel 分页
```
http://laravelacademy.org/post/6960.html

        $users=User::paginate(15,  ['*'], 'page',1);//per_page,column,page,current_page
        $users->setPath('custom/url');
        return $this->toJson($users);
        return $this->toJson();

$pagination = $query->with('address')->paginate($perPage);
    $pagination->appends([
        'sort' => request()->sort,
        'filter' => request()->filter,
        'per_page' => request()->per_page
    ]);
```
***
####laravel 配置相关、缓存配置
```
php artisan config:cache
php artisan config:clear

获取配置
可以使用 config 辅助函数获取你的设置值，设置值可以通过「点」语法来获取，其中包含了文件与选项的名称。你也可以指定一个默认值，当该设置选项不存在时就会返回默认值：

$value = config('app.timezone');
若要在运行期间修改设置值，请传递一个数组至 config 辅助函数：

config(['app.timezone' => 'America/Chicago']);


获取ENV文件的值
env('APP_DEBUG', false)

http://d.laravel-china.org/docs/5.4/configuration#configuration-caching

```

***
####laravel passport jwt
```
根據http://laravelacademy.org/post/5993.html配置后，
不用oauth的話，只要php artisan passport:client --password生成一個自用的client就行了
然後得到 oauth_clients表多了一條client數據

客戶端登錄的時候帶上，請求URL:'/oauth/token'

$url='http://api.com/oauth/token';
$data=[
        'grant_type' => 'password',
        'client_id' => '16',
        'client_secret' => 'cASw4y3CxxxIu6rbo43b0gUhHhWl6zN0KDJvqsRo',
        'username' => '276665346@qq.com',
        'password' => '123456',
        'scope' => '*'
    ];
echo http_request($url, $data);
得到access_token,以後每次請求再header里帶上Authorization: Bearer +access_token

GET http://api.com/api/user HTTP/1.1
Host: api.com
Connection: keep-alive
Cache-Control: max-age=0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36
Referer: http://api.com/login
Accept-Encoding: gzip, deflate, sdch
Accept-Language: zh-CN,zh;q=0.8
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVkNTYzZDM5NzM4MTRjNGRlYzJjYmE1YzI4YWRlM2M0NjI0NTZkY2ZlNGRhMDRkNzQ3NDA4YmU2YmNhOTg1NTE5MjlhNjI2N2ZiNjc1Yjk3In0.eyJhdWQiOiIxNiIsImp0aSI6IjVkNTYzZDM5NzM4MTRjNGRlYzJjYmE1YzI4YWRlM2M0NjI0NTZkY2ZlNGRhMDRkNzQ3NDA4YmU2YmNhOTg1NTE5MjlhNjI2N2ZiNjc1Yjk3IiwiaWF0IjoxNDkwODY3MTQwLCJuYmYiOjE0OTA4NjcxNDAsImV4cCI6MTUyMjQwMzE0MCwic3ViIjoiMyIsInNjb3BlcyI6WyIqIl19.GogqyJJGG43QCTWsFGDHRqJVDxpn73A9Ty2uExC8NmCphqhHwned4JPxbH-QdBAwAHZ35c-om2uVR-kU6IcSPGRkAzuv2wzHHb50C1852XSDu3vUQ1ZQdUu-bS1rJPDcN_lx_pe_gJF0qHGnt7z-CrJp6X8OsrbK3rEjwoe4gSFPTqgLqwzcFFusBVz9YF3bbuCjdXvlpd3Gq7W6h48sE25z--Yx97TV-j305PicKp8YynnXV5fmiTC73talKcbIZhRtbinQDCD7s20zFVXyBYAO9D5wkY-KyBIB9EeJNWp8lYwdnzV4bqKT6sb7k0uKzHsoV2wbC4_FFolLkdTmQtpSBN6Tc_KZk3MnE-Yy9HcMaMVaPa00LZ4vyMrLTLqWLqcJsFYCcMpSdpaLP95P0v0TjOlALjKLLY0AVAhN_o-MBzb75RIqEoCKqelO2kgjhjj0Ew3EkxKb8Tw4eD5IXFTcazZQG14xC1CnUv5U6sOLfj4hpQ1HHmtuwI39-HJjJ5r3QA49QCUFs_EmZI0eVFIZMHSG8HeEMQyRoTxJEMzeKGijNvWth1SvYGwP9Rd0dlEG18_Rvjgr5KM6rhiHE4ftF_MAUVfnj4UEN-Q7FZIV6_cud3-GM5hKuRXgbyCc4ccJSi_iMYelvvWi4PZlN5P1bnI5RCPO5DmMEIsrJmU


```


***
####laravel 获取session id
```
nRRw2MfQNqe5gbohFqhgt5mJ5zqBhPeJSK87CvcB
var_dump(Session::getId());

```

***
####前端移动适配
```
<link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.dilidili.com/">

```

***
####获取远程文件的大小
```
function remote_filesize($url, $user = "", $pw = "")
{
    ob_start();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    if(!empty($user) && !empty($pw))
    {
        $headers = array('Authorization: Basic ' .  base64_encode("$user:$pw"));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    $ok = curl_exec($ch);
    curl_close($ch);
    $head = ob_get_contents();
    ob_end_clean();
    $regex = '/Content-Length:\s([0-9].+?)\s/';
    $count = preg_match($regex, $head, $matches);
    return isset($matches[1]) ? $matches[1] : "unknown";
}
```


***
####文件下载 和文件限速下载
```
// local file that should be send to the client
$local_file = 'test-file.zip';
// filename that the user gets as default
$download_file = 'your-download-name.zip';
 
// set the download rate limit (=> 20,5 kb/s)
$download_rate = 20.5; 
if(file_exists($local_file) && is_file($local_file)) {
    // send headers
    header('Cache-control: private');
    header('Content-Type: application/octet-stream'); 
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);
 
    // flush content
    flush();    
    // open file stream
    $file = fopen($local_file, "r");    
    while(!feof($file)) {
 
        // send the current file part to the browser
        echo fread($file, round($download_rate * 1024));    
 
        // flush the content to the browser
        flush();
 
        // sleep one second
        sleep(1);    
    }    
 
    // close file stream
    fclose($file);}
else {
    die('Error: The file '.$local_file.' does not exist!');
}

 根据 URL 下载图片
function imagefromURL($image,$rename)
{
$ch = curl_init($image);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
$rawdata=curl_exec ($ch);
curl_close ($ch);
$fp = fopen($rename,'w');
fwrite($fp, $rawdata); 
fclose($fp);
}

```


***
####确定任意图片的主导颜色
```
function dominant_color($image)
{
$i = imagecreatefromjpeg($image);
for ($x=0;$x<imagesx($i);$x++) {
    for ($y=0;$y<imagesy($i);$y++) {
        $rgb = imagecolorat($i,$x,$y);
        $r   = ($rgb >> 16) & 0xFF;
        $g   = ($rgb >>  & 0xFF;
        $b   = $rgb & 0xFF;
        $rTotal += $r;
        $gTotal += $g;
        $bTotal += $b;
        $total++;
    }
}
$rAverage = round($rTotal/$total);
$gAverage = round($gTotal/$total);
$bAverage = round($bTotal/$total);
}

/**
     * RGB转 十六进制
     * @param $rgb RGB颜色的字符串 如：rgb(255,255,255);
     * @return string 十六进制颜色值 如：#FFFFFF
     */
    function RGBToHex($rgb){
        $regexp = "/^rgb\(([0-9]{0,3})\,\s*([0-9]{0,3})\,\s*([0-9]{0,3})\)/";
        $re = preg_match($regexp, $rgb, $match);
        $re = array_shift($match);
        $hexColor = "#";
        $hex = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
        for ($i = 0; $i < 3; $i++) {
            $r = null;
            $c = $match[$i];
            $hexAr = array();
            while ($c > 16) {
                $r = $c % 16;
                $c = ($c / 16) >> 0;
                array_push($hexAr, $hex[$r]);
            }
            array_push($hexAr, $hex[$c]);
            $ret = array_reverse($hexAr);
            $item = implode('', $ret);
            $item = str_pad($item, 2, '0', STR_PAD_LEFT);
            $hexColor .= $item;
        }
        return $hexColor;
    }
    /**
     * 十六进制 转 RGB
     */
    function hex2rgb($hexColor) {
        $color = str_replace('#', '', $hexColor);
        if (strlen($color) > 3) {
            $rgb = array(
                'r' => hexdec(substr($color, 0, 2)),
                'g' => hexdec(substr($color, 2, 2)),
                'b' => hexdec(substr($color, 4, 2))
            );
        } else {
            $color = $hexColor;
            $r = substr($color, 0, 1) . substr($color, 0, 1);
            $g = substr($color, 1, 1) . substr($color, 1, 1);
            $b = substr($color, 2, 1) . substr($color, 2, 1);
            $rgb = array(
                'r' => hexdec($r),
                'g' => hexdec($g),
                'b' => hexdec($b)
            );
        }
        return $rgb;
    }
```

***
####laravel 测试过的一些方法
```
        // $user=new User();
        // $user->name="1234567333";
        // $user->password="1234";
        // $user->balance=11.22;
        // $user->save();//->delete();

        // dd($user);
        // dd(User::all());
        // var_dump(User::where('balance','>', 60)
        //        ->orderBy('balance', 'desc')
        //        ->take(2)
        //        ->get());
        // var_dump(User::where('balance','>', 60)
        //     ->take(1)->update(['balance' => 99]));//传递给 update 方法的参数必须是一个数组
        // var_dump(User::where('balance','>', 60)
        //        ->count());

        // $flight = User::create(['name' => 'Flight1w1','balance'=>'34.21','password'=>"aa"]);
        // 
        // var_dump(User::where('name','Flight1w1')->delete());//hard delete
        // var_dump(BookHistory::where('user_id',1)->delete());//当有deleted_at 和use SoftDeletes;是soft delete、参见->forceDelete();
        // var_dump(User::where('name','Flight1w1')->delete());//hard delete
        // echo $user[0]->id;
        // var_dump(User::find(1)->bookhistory->device_id);//不包含delete_at不为null的
        // 
        // var_dump(Auth::user());
        // echo session('user_id');
            // var_dump(Auth::guard('web')->check());
        // 
        // 
        // $value = Cache::remember('key', 1, function() {//更便捷
        //     return 88;
        //     // return DB::table('users')->get();
        // });

        // Cache::increment('key',1);
        // return Cache::get('key',999);

    // var_dump(Auth::guard('admin')->loginUsingId(1)) ;
    // var_dump(Auth::guard('admin')->check()) ;
    // var_dump(Auth::guard('web')->check()) ;

    $model=Bikelock::where('lat','<=',$arr['left-top']["lat"])
            ->where('lat','>=',$arr['right-bottom']["lat"])
            ->where('lng','>=',$arr['left-top']["lng"])
            ->where('lng','<=',$arr['right-bottom']["lng"])
            ->where('status_lock','0');
        if ($client_no)
            $model=$model->where('device_id','like',$client_no.'%');
        $bikelocks=$model->orderByRaw('( ABS(lat -'.$lat.')+ABS(lng -'.$lng.') )')->take($limit)->get(['device_id','status_book','status_lock','lat','lng','electricity']);


```

***
####laravel Eloquent 获取数据库个别字段
```
1 $users = User::all(['name']);
2 $admin_users = User::where('role', 'admin')->get(['id','device_id as aaa']);
3 $user = User::find($user_id, ['name']);
```
***
####laravel 缓存查询
```
$users = DB::table('users')->remember(10)->get();
在本例中,查询的结果将为十分钟被缓存。查询结果缓存时,不会对数据库运行,结果将从默认的缓存加载驱动程序指定您的应用程序。
如果您使用的是支持缓存的司机,还可以添加标签来缓存:
$users = DB::table('users')->cacheTags(array('people', 'authors'))->remember(10)->get();

```

***
####laravel 加锁
```
    public function t()
    {
            $model = Merchant::where('id', 5)->lockForUpdate()->first();
            sleep(15);
//        $model->increment('balance');//实测不commit也一样要等函数执行完毕才执行t2
        return $this->toJson(0,'',$model->balance);
    }
public function t2()
    {
        $model = Merchant::where('id', 5)->lockForUpdate()->first();
        $model->increment('balance');
        return $this->toJson(0,'',$model->balance);//确实在t执行完才执行t2接口的返回
    }


```

***
####laravel Eloquent 只获取第一个对象的方法
```
$merchant=Merchant::where('openid',$re_openid)->first();
```

***
####laravel Eloquent date filtering
```
1 $users = User::all(['name']);
2 $admin_users = User::where('role', 'admin')->get(['id','device_id as aaa']);
3 $user = User::find($user_id, ['name']);
```

***
####laravel Eloquent Retrieve random rows
```
$questions = Question::orderByRaw('RAND()')->take(10)->get();

```

***
####laravel router dispatch
```
$request = Request::create('/api/cars/' . $id . '?fields=id,color', 'GET');
$response = json_decode(Route::dispatch($request)->getContent());
```

***
####laravel 依赖注入的时候传递参数
```
熟悉Laravel人都知道Laravel的Service Provider，但是如果要注入的类需要初始化参数呢？这个时候可以通过ServiceProvider中的register来绑定实现。

public function register()
{
    $this->app->bind('Bloom\Security\ChannelAuthInterface', function()
    {
        $request = $this->app->make(Request::class);
        $guard   = $this->app->make(Guard::class);

        return new ChannelAuth($request->input('channel_name'), $guard->user());
    });
}
```

***
####laravel share cookie between domains
```
// app/Http/Middleware/EncryptCookies.php
protected $except = [
    'shared_cookie'

];

Cookie::queue('shared_cookie', 'my_shared_value', 10080, null, '.example.com');
```

***
####laravel Eloquent 专题，，一个个贴太累了
```
Simple incrementing & Decrementing

$customer = Customer::find($customer_id);
$loyalty_points = $customer->loyalty_points + 50;
$customer->update(['loyalty_points' => $loyalty_points]);

// adds one loyalty point

Customer::find($customer_id)->increment('loyalty_points', 50);
// subtracts one loyalty point

Customer::find($customer_id)->decrement('loyalty_points', 50);



```

***
####laravel Eloquent having raw
```
SELECT *, COUNT(*) FROM products GROUP BY category_id HAVING count(*) > 1;

DB::table('products')
    ->select('*', DB::raw('COUNT(*) as products_count'))
    ->groupBy('category_id')
    ->having('products_count', '>', 1)
    ->get();
Product::groupBy('category_id')->havingRaw('COUNT(*) > 1')->get();
```


***
####laravel Eloquent 联合查询,with 解决N+1问题
```
在Model中创建：
    public function bookhistory()
    {
        return $this->hasOne('App\BookHistory');
        // return $this->hasOne('App\BookHistory','user_id','id');
    }
然后with('bookhistory'):
// var_dump(Bike::find(1)->bikelock);
        $bike=Bike::where('bike_id',$bike_id)->take(1)->with('bikelock')->get();//记得这里返回的是数组
        if ($bike && $bike[0]->bikelock) {
            return $this->toJson(0,'',$bike[0]->bikelock);
        }


        $user=Auth::user()->with('merchant')->get();
    $user=Auth::user()->merchant;

many2many

class Article extends BaseModel
{

    protected $hidden = [
        'password',
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}

class Tag extends BaseModel
{

    protected $hidden = [
        'password',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}

$article = Article::find(1);
//return $this->toJson(0,'',$article);
return $this->toJson(0,'',$article->tags);

$tag = Tag::where('name','tag2')->first();
return $this->toJson(0,'',$tag->articles);



Eager Loading Multiple Relationships
Sometimes you may need to eager load several different relationships in a single operation. To do so, just pass additional arguments to the with method:

$books = App\Book::with('author', 'publisher')->get();

Nested Eager Loading
To eager load nested relationships, you may use "dot" syntax. For example, let's eager load all of the book's authors and all of the author's personal contacts in one Eloquent statement:

$books = App\Book::with('author.contacts')->get();


Constraining Eager Loads

Sometimes you may wish to eager load a relationship, but also specify additional query constraints for the eager loading query. Here's an example:

$users = App\User::with(['posts' => function ($query) {
    $query->where('title', 'like', '%first%');
}])->get();
In this example, Eloquent will only eager load posts where the post's title column contains the word first. Of course, you may call other query builder methods to further customize the eager loading operation:

$users = App\User::with(['posts' => function ($query) {
    $query->orderBy('created_at', 'desc');
}])->get();
以此引出一下写法
class BaseModel extends Model
{
    public function scopeWithCertain($query, $relation, Array $columns)
    {
        return $query->with([$relation => function ($query) use ($columns){
            $query->select(array_merge(['id'], $columns));
        }]);
    }
}
$car_list=Car::where('merchant_id',$user->merchant_id)->withCertain('admin',['name','admin_role_type'])->get();
        return $this->toJson(0,'',$car_list);

用户--》关联商户--》关联地区
$query = app(User::class)->newQuery();
        $query->whereNotNull('merchant_id')->with(['merchant'=>function ($queryx){
            $queryx->with('province')->with('city')->with('county');
        }]);

用户--》关联商户--》关联地区
                --》关联设备数withCount，（Merchant模型需要public function car(){
        return $this->belongsTo('App\Car','id','merchant_id');
    }）
$query = app(User::class)->newQuery();
        $query->whereNotNull('merchant_id')->with(['merchant'=>function ($queryx){
            $queryx->with('province')->with('city')->with('county')->withCount('car');
        }]);
```


***
####通用hover 样式
```
.card-view:hover{
  -webkit-animation: mlsh 0.5s ease 0s forwards;
    animation: mlsh 0.5s ease 0s forwards;
    -ms-animation: mlsh 0.5s ease 0s forwards;
    -moz-animation: mlsh 0.5s ease 0s forwards;
    -o-animation: mlsh 0.5s ease 0s forwards;
}

@-webkit-keyframes mlsh {
0% {
  opacity:1; transform-origin:50% 50%; transform: scale(1,1);
  }
100% {
  transform-origin:50% 50%; transform: scale(1,1); opacity:1; box-shadow:0px 0px 20px #999; z-index:2;
  }
}
```

***
####通用card view 样式
```
.card-view{
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}
```


***
####发送短信验证码记得加个type，
```
注册要判断用户是否已经注册，找回判断用户未注册
不正确就不要发短信，省钱
```


***
####uuid 
```
     /**
     * 最长32位的 uuid
     * @author bajian
     * @param len
     * @return uuid
     */
function uuid($len=32){
    $charid = md5(uniqid(rand(), true));
    if ($len<32) {
       return substr($charid, 0, $len);
    }
    return $charid;
}
// echo uuid(22);
```


***
####防止mysql 重复插入 
```
INSERT INTO marks (NAME,subject1,mark) (SELECT * FROM (SELECT 'kirito','maths',100) AS t WHERE NOT EXISTS (SELECT NAME FROM marks WHERE NAME='kirito' AND subject1='maths' LIMIT 1))


```

***
####移动端经验
```
禁止保存或拷贝图像

通常当你在手机或者pad上长按图像 img ，会弹出选项 存储图像 或者 拷贝图像，如果你不想让用户这么操作，那么你可以通过以下方法来禁止：

img {
    -webkit-touch-callout: none;
}
需要注意的是，该方法只在 iOS 上有效。

取消touch高亮

在移动设备上，所有设置了伪类 :active 的元素，默认都会在激活状态时，显示高亮框，如果不想要这个高亮，那么你可以通过以下方法来禁止：

.xxx {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

禁止选中内容

如果你不想用户可以选中页面中的内容，那么你可以禁掉：

html {
    -webkit-user-select: none;
}


如果想同时关闭电话和邮箱识别，可以把它们写到一条 meta 内，代码如下：
<meta name="format-detection" content="telephone=no,email=no" />

关闭iOS键盘首字母自动大写

在iOS中，默认情况下键盘是开启首字母大写的功能的，如果业务不想出现首字母大写，可以这样：

<input type="text" autocapitalize="off" />

关闭iOS输入自动修正

在iOS中，默认输入法会开启自动修正输入内容的功能，如果不需要的话，可以这样：

<input type="text" autocorrect="off" />

```

***
####nginx access_log 设置buffer
```
access_log /data/wwwlogs/bxjtest.snewfly.com_nginx.log combined buffer=2k;

```

***
####PHP trait 
```
就是代码块的继承
当前类成员覆盖trait的成员,trait覆盖基类的成员

通过逗号分隔，在 use 声明列出多个 trait，可以都插入到一个类中。
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();//Hello World!

如果两个 trait 都插入了一个同名的方法，如果没有明确解决冲突将会产生一个致命错误。



```


***
####备忘，省得每次都查
```
iptables -I INPUT -p tcp -m tcp --dport 3306 -j ACCEPT

iptables -L -n

```

***
####mysql 修改host
```
mysql -u root –p
mysql>use mysql;
mysql>update user set host = '%' where user = 'root';
mysql>select host, user from user;

```

***
####将制定元素置于可视区内。在listview，scrollview非常有价值
```
setTimeout(()=>{
          let e=document.getElementsByClassName('season_selected')[0]
          e&&e.scrollIntoViewIfNeeded()
        },10)
```


***
####flex布局总结

>http://www.ruanyifeng.com/blog/2015/07/flex-grammar.html?utm_source=tuicool
###container 属性
>flex-direction属性决定主轴的方向（即项目的排列方向）。
row（默认值）：主轴为水平方向，起点在左端。
row-reverse：主轴为水平方向，起点在右端。
column：主轴为垂直方向，起点在上沿。
column-reverse：主轴为垂直方向，起点在下沿。

>flex-wrap属性定义，如果一条轴线排不下，如何换行。
flex-wrap: nowrap | wrap | wrap-reverse;

>justify-content属性定义了项目在主轴上的对齐方式。
flex-start（默认值）：左对齐
flex-end：右对齐
center： 居中
space-between：两端对齐，项目之间的间隔都相等。
space-around：每个项目两侧的间隔相等。所以，项目之间的间隔比项目与边框的间隔大一倍。


>align-items属性定义项目在交叉轴上如何对齐。
flex-start：交叉轴的起点对齐。
flex-end：交叉轴的终点对齐。
center：交叉轴的中点对齐。
baseline: 项目的第一行文字的基线对齐。
stretch（默认值）：如果项目未设置高度或设为auto，将占满整个容器的高度。

###item 属性
>order属性定义项目的排列顺序。数值越小，排列越靠前，默认为0。
.item {
  order: <integer>;
}

>align-self: center; 垂直居中！！非常有用
>align-self: flex-end; 底部对齐

>flex-grow属性定义项目的放大比例，默认为0，即如果存在剩余空间，也不放大。
.item {
  flex-grow: <number>; /* default 0 */
}

> flex属性是flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto。后两个属性可选。
.item {
  flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'> ]
}
!!!!该属性有两个快捷值：auto (1 1 auto) 和 none (0 0 auto)。
>可以用来控制剩余空间，如下：怎么让这个input占满除了左边，剩余的宽度呢。。
```js
  #loginForm .name{
    position: relative;
    height: 2.7rem;/* 108px */
    border-bottom: 2px solid #999;
    display: flex;
  }
  #loginForm .name>img{
    width: 1.45rem;/* 58px */
    height: 1.825rem;/* 73px */
    margin-left: .5rem;/* 20px */
    flex: none;
  }
    #loginForm input{
    margin-left: 1.575rem;/* 63px */
    height: 1.375rem;/* 55px */
    flex: auto;
    margin-top: 4px;
  }

.item{
    order: <integer>;
    /*排序：数值越小，越排前，默认为0*/
 
    flex-grow: <number>; /* default 0 */
    /*放大：默认0（即如果有剩余空间也不放大，值为1则放大，2是1的双倍大小，以此类推）*/
 
    flex-shrink: <number>; /* default 1 */
    /*缩小：默认1（如果空间不足则会缩小，值为0不缩小）*/
 
    flex-basis: <length> | auto; /* default auto */
    /*固定大小：默认为0，可以设置px值，也可以设置百分比大小*/
 
    flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'> ]
    /*flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto，*/
 
    align-self: auto | flex-start | flex-end | center | baseline | stretch;
    /*单独对齐方式：自动（默认） | 顶部对齐 | 底部对齐 | 居中对齐 | 上下对齐并铺满 | 文本基线对齐*/
}
```


###建议优先使用这个属性，而不是单独写三个分离的属性，因为浏览器会推算相关值。
####一个简单的例子
```js
.tab-title-container{
    position: relative;
    display: table;
    margin: 0 auto;
    list-style: none;
    border-bottom: 1px solid #dddddd;
    display: -webkit-flex;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: center;
}
.tab-title{
    height: 35px;
    line-height: 35px;
    position: relative;
    text-align: center;
    cursor: pointer;
    outline-style: none;
    flex: 1;
}


X5兼容写法

  .item-container{
    overflow: scroll;
    white-space:nowrap;
    position: relative;
    display: inline-flex;/* UC写法 */
    display: -webkit-box;
    display: -moz-box;
    display: -o-box;
    display: -ms-flexbox;
    display: flex;

    margin: .5rem 0px 0rem .5rem;/* 40px */
  }
  .item{
    display: block;
    padding: .75rem;/* 30px */
    background: #fff;
    margin-right: .35rem;/* 14px */
    font-weight: bold;
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
  }

更多可参考AL框架seedsui layout页面
```



***
####在 _onTouchMove中this变为此this
```
this._onTouchMove = this._onTouchMove.bind(this);
```

***
####nginx 控制上传文件大小
```
http{} 加上
client_max_body_size 5m;

要是以php运行的话，这个大小client_max_body_size
要和php.ini中的如下值的最大值差不多或者稍大，
这样就不会因为提交数据大小不一致出现错误。
post_max_size = 5M
upload_max_filesize = 5M
APACHE 好像是LimitRequestBody 
```

***
####SecureCRT中文乱码解决方法
```
http://jingyan.baidu.com/article/948f59245be128d80ff5f9aa.html

在显示的“窗口和文本外观”中找到“字符编码”。
把“字符编码”设置为“UTF-8”.
```


***
####ios系统中元素被触摸时产生的半透明灰色遮罩怎么去掉
```
a,button,input,textarea{-webkit-tap-highlight-color: rgba(0,0,0,0;)} 
```
***

***
####消除transition闪屏
```
.css{ /*设置内嵌的元素在 3D 空间如何呈现：保留 3D*/ -webkit-transform-style: preserve-3d; /*（设置进行转换的元素的背面在面对用户时是否可见：隐藏）*/ -webkit-backface-visibility: hidden; }
```
***

####屏幕旋转的事件和样式
```
window.onorientationchange = function(){ 
switch(window.orientation){ 
case -90: 
case 90: alert("横屏:" + window.orientation); 
break; 
case 0: 
case 180: 
alert("竖屏:" + window.orientation); 
break; 
} } 

```

***
####2>&1 linux命令详解
```
     command >out.file 2>&1 &
    是将标准出错重定向 2到标准输出 1，这里的标准输出已经重定向到了out.file文件，即将标准出错也输出到out.file文件中。最后一个& 是让该命令在后台执行。

command > filename 把把标准输出重定向到一个新文件中
command >> filename 把把标准输出重定向到一个文件中(追加)
command 1 > fielname 把把标准输出重定向到一个文件中
command > filename 2>&1 把把标准输出和标准错误一起重定向到一个文件中
command 2 > filename 把把标准错误重定向到一个文件中
command 2 >> filename 把把标准输出重定向到一个文件中(追加)
command >> filename 2>&1 把把标准输出和标准错误一起重定向到一个文件中(追加)
command < filename > filename2把command命令以filename文件作为标准输入，以filename2文件作为标准输出
command < filename 把command命令以filename文件作为标准输入
command << delimiter 把从标准输入中读入，直至遇到delimiter分界符
command <&m 把把文件描述符m作为标准输入
command >&m 把把标准输出重定向到文件描述符m中
command <&- 把关闭标准输入
```

***
####jquery serialize 通过序列化表单值，创建 URL 编码文本字符串
```
var query  = $('.search-form').find('input').serialize();

$("div").text($("form").serialize());
```

***
####ssh登录远程服务器
```
ssh root@123.57.82.164
 q09307206
```


***
####快速加减的做法
```
        let order = await this.model("order").where({user_id: this.user.uid, pay_status: 1}).getField('order_amount');
        let orderTotal = eval(order.join("+"));
```

***
####mysql配置相关查看
```
查看mysql全局变量，可以直接用SQLyog查看：工具---信息
mysqladmin variables -uxsk -p
查看MySQL配置文件路径及相关配置
mysqld --verbose --help |grep -A 1 'Default options'
```

***
####Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,
```
  SET collation_connection = 'utf8_general_ci'

then for your databases

  ALTER DATABASE db CHARACTER SET utf8 COLLATE utf8_general_ci

  ALTER TABLE table CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci

MySQL sneaks swedish in there sometimes for no sensible reason.
```

***
####严格模式主要有以下限制。
```
变量必须声明后再使用
函数的参数不能有同名属性，否则报错
不能使用with语句
不能对只读属性赋值，否则报错
不能使用前缀0表示八进制数，否则报错
不能删除不可删除的属性，否则报错
不能删除变量delete prop，会报错，只能删除属性delete global[prop]
eval不会在它的外层作用域引入变量
eval和arguments不能被重新赋值
arguments不会自动反映函数参数的变化
不能使用arguments.callee
不能使用arguments.caller
禁止this指向全局对象
不能使用fn.caller和fn.arguments获取函数调用的堆栈
增加了保留字（比如protected、static和interface）
```

***
####jquery ajaxForm表单提交
```

<form id="formToUpdate" method="post" enctype="multipart/form-data">
                        <span class="fileName">点击添加模板</span>
                        <input name="file"  type="file" class="fileSumit" id="fileload"/>
                      </form>

$("#formToUpdate").ajaxSubmit({
                url:"/jxhd/school/student/addByFile/",
                type:"POST", 
                dataType:"json",
                data:{                  
       
                },
                success:function(data){
                    console.log(data)                    
                },
                error:function(){
                    alert("发生异常错误");
                }
                });
```
***
####js技巧
```
3.玩转数字 除了上一节介绍的之外，这里有更多的处理数字的技巧 
0xFF; // Hex declaration, returns 255 
020; // Octal declaration, returns 16 
1e3; // Exponential, same as 1 * Math.pow(10,3), returns 1000 
(1000).toExponential(); // Opposite with previous, returns 1e3 
(3.1415).toFixed(3); // Rounding the number to string, returns "3.142"


//说明嵌套循环中break跳出所有循环
/*  for (var i = 0; i < 5; i++) {
    for (var j = 0; j < 5; j++) {
      console.log('j',j,'i',i);
      if (j==2) break;
    }
  }*/
// 有的时候，循环中又嵌套了循环，你可能想在循环中退出，则可以用标签： 

// outerloop:  
// for (var iI=0;iI<5;iI++) {  
//  console.log('iI',iI);
//     if (iI==3) {  
//         // Breaks the outer loop iteration  
//         break outerloop;  
//     }  
      
//     innerloop:  
//     for (var iA=0;iA<5;iA++) {  
//      console.log('iA',iA,'iI',iI);
//         if (iA==2) {  
//             // Breaks the inner loop iteration  
//             break innerloop;  
//         }  
  
//     }  
// }
```

***
####99%的人都理解错了HTTP中GET与POST的区别
```
GET和POST还有一个重大区别，简单的说：
GET产生一个TCP数据包；POST产生两个TCP数据包。

长的说：
对于GET方式的请求，浏览器会把http header和data一并发送出去，服务器响应200（返回数据）；
而对于POST，浏览器先发送header，服务器响应100 continue，浏览器再发送data，服务器响应200 ok（返回数据）。

也就是说，GET只需要汽车跑一趟就把货送到了，而POST得跑两趟，第一趟，先去和服务器打个招呼“嗨，我等下要送一批货来，你们打开门迎接我”，然后再回头把货送过去。

因为POST需要两步，时间上消耗的要多一点，看起来GET比POST更有效。因此Yahoo团队有推荐用GET替换POST来优化网站性能。但这是一个坑！跳入需谨慎。为什么？
1. GET与POST都有自己的语义，不能随便混用。
2. 据研究，在网络环境好的情况下，发一次包的时间和发两次包的时间差别基本可以无视。而在网络环境差的情况下，两次包的TCP在验证数据包完整性上，有非常大的优点。
3. 并不是所有浏览器都会在POST中发送两次包，Firefox就只发送一次。
```

***
####php 空对象
```
$obj=(object)null;
$obj=(object)[];

$data = new stdClass();
$data->statusCode = '172004';
var_dump($data);
```
***
####service init.d 重启后不再/再启动
```
chkconfig httpd off              #开机重启后，apache服务不再启动

```
***
####SQLyog 设置CURRENT_TIMESTAMP
```
在默认里填
CURRENT_TIMESTAMP

ALTER TABLE  `li_wx_user` ADD  `update_time` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

```
***
####随机数 （值得学习的思维）
```js
var generateRandomAlphaNum=function (len) {
        var rdmString = '';
        for (; rdmString.length < len; rdmString += Math.random().toString(36).substr(2));
        return rdmString.substr(0, len);
    };
```

***
####将增删改查cookie操作都用一个函数搞定
```js
var myCookie=function (cookieName, cookieValue, day) {
        var readCookie = function (name) {
            var arr,
                reg = new RegExp('(^| )' + name + '=([^;]*)(;|$)'),
                matched = document.cookie.match(reg);
            if(arr = matched) {
                return unescape(arr[2]);
            } else {
                return null;
            }
        };
        var setCookie = function (name, value, time) {
            var Days = time || 30;
            var exp = new Date();
            exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
            document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
        };
        if (cookieName && cookieValue) {
            //set cookie
            setCookie(cookieName, cookieValue, day);
        } else if (cookieName && $.isNull(cookieValue)) {
            //delete cookie
            setCookie(cookieName, '', -1);
        } else if (cookieName) {
            //read cookie
            return readCookie(cookieName);
        }
    };
```

***
####js timeUtil 时间格式化函数
```js
压缩版
var timeUtil={parseTime:function(format,timeStamp){var date=new Date(timeStamp||Date.now()),o={"M+":date.getMonth()+1,"D+":date.getDate(),"h+":date.getHours(),"m+":date.getMinutes(),"s+":date.getSeconds(),"S":date.getMilliseconds()},format=format||"YYYY-MM-DD hh:mm:ss";if(/(Y+)/.test(format)){format=format.replace(RegExp.$1,(date.getFullYear()+"").substr(4-RegExp.$1.length))}for(var k in o){if(new RegExp("("+k+")").test(format)){format=format.replace(RegExp.$1,RegExp.$1.length==1?o[k]:("00"+o[k]).substr((""+o[k]).length))}}return format},getTimeShow:function(time_str){var now=new Date();var date=new Date(time_str);var inter=parseInt((now.getTime()-date.getTime())/1000/60);if(inter==0){return"刚刚"}else{if(inter<60){return inter.toString()+"分钟前"}else{if(inter<60*24){return parseInt(inter/60).toString()+"小时前"}else{if(now.getFullYear()==date.getFullYear()){return this.parseTime("MM-DD hh:mm:ss",time_str)}else{return this.parseTime("YY-MM-DD hh:mm:ss",time_str)}}}}}};

    var timeUtil={
      parseTime:function (format,timeStamp) {//format可空，默认YYYY-MM-DD hh:mm:ss，timeStamp可空，默认当前时间
      //timeUtil.parseTime('YYYY-MM-DD hh:mm:ss',new Date().getTime()) ->"2016-08-03 16:14:12"
      if ((timeStamp+'').length==10) {
        timeStamp=timeStamp*1000
    }
        var date = new Date(timeStamp||Date.now()),
        o = {
            'M+' : date.getMonth() + 1, //month 
            'D+' : date.getDate(), //day 
            'h+' : date.getHours(), //hour 
            'm+' : date.getMinutes(), //minute 
            's+' : date.getSeconds(), //second 
            'S' : date.getMilliseconds() //millisecond 
        },
        format=format||'YYYY-MM-DD hh:mm:ss';

        if(/(Y+)/.test(format)) {
            format = format.replace(RegExp.$1, 
                (date.getFullYear() + '').substr(4 - RegExp.$1.length)); 
        } 

        for(var k in o) {
            if (new RegExp('('+ k +')').test(format)) {
                format = format.replace(RegExp.$1, 
                    RegExp.$1.length == 1 ? o[k] : ('00'+ o[k]).substr((''+ o[k]).length)); 
            }
        }
        return format; 
    },
    getTimeShow:function(time_str){
            var now = new Date();
            var date = new Date(time_str);
            //计算时间间隔，单位为分钟
            var inter = parseInt((now.getTime() - date.getTime())/1000/60);
            if(inter == 0){
                return "刚刚";
            }
            //多少分钟前
            else if(inter < 60){
                return inter.toString() + "分钟前";
            }
            //多少小时前
            else if(inter < 60*24){
                return parseInt(inter/60).toString() + "小时前";
            }
            //本年度内，日期不同，取日期+时间  格式如  06-13 22:11
            else if(now.getFullYear() == date.getFullYear()){
                return this.parseTime('MM-DD hh:mm:ss',time_str);
            }
            else{
                return this.parseTime('YY-MM-DD hh:mm:ss',time_str);
            }
        }
    };

    console.log(timeUtil.parseTime('YYYY-MM-DD hh:mm:ss',new Date().getTime()));
    console.log(timeUtil.parseTime());
    console.log(timeUtil.parseTime('YY-MM-DD hh:mm:ss',Date.now()));
    console.log(timeUtil.getTimeShow(new Date().getTime()));//刚刚
    console.log(timeUtil.getTimeShow(new Date().getTime()-60*1000));//1分钟前
    console.log(timeUtil.getTimeShow(new Date().getTime()-10*60*1000));//10分钟前
    console.log(timeUtil.getTimeShow(new Date().getTime()-100*60*1000));//1小时前
    console.log(timeUtil.getTimeShow(new Date().getTime()-1000*60*1000));//16小时前
    console.log(timeUtil.getTimeShow(new Date().getTime()-10000*60*1000));//08-02 11:54:29
    console.log(timeUtil.getTimeShow(new Date().getTime()-1000000*60*1000));//14-09-14 23:56:48
```

***
####gzip指令
```
http://www.kuqin.com/shuoit/20160805/352716.html

1、gzip压缩
gzip a.txt

2、解压
gunzip a.txt.gz
gzip -d a.txt.gz

3、bzip2压缩
bzip2 a

4、解压
bunzip2 a.bz2
bzip2 -d a.bz2

5、打包：将指定文件或文件夹
tar -cvf bak.tar  ./aaa
将/etc/password追加文件到bak.tar中(r)
tar -rvf bak.tar /etc/password

6、解压
tar -xvf bak.tar

7、打包并压缩
tar -zcvf a.tar.gz  aaa/

8、解包并解压缩(重要的事情说三遍!!!)
tar  -zxvf  a.tar.gz
解压到/usr/下
tar  -zxvf  a.tar.gz  -C  /usr

9、查看压缩包内容
tar -ztvf a.tar.gz
zip/unzip

10、打包并压缩成bz2
tar -jcvf a.tar.bz2

11、解压bz2
tar -jxvf a.tar.bz2

```

***
####js 模块开发规范
```
原文链接：http://caibaojian.com/toutiao/6194
模块
模块应该以 ! 开始。这样确保了当一个不好的模块忘记包含最后的分号时，在合并代码到生产环境后不会产生错误。详细说明
文件应该以驼峰式命名，并放在同名的文件夹里，且与导出的名字一致。
增加一个名为 noConflict() 的方法来设置导出的模块为前一个版本并返回它。
永远在模块顶部声明 'use strict';。
//code from http://caibaojian.com/toutiao/6194
// fancyInput/fancyInput.js

!function (global) {
  'use strict';

  var previousFancyInput = global.FancyInput;

  function FancyInput(options) {
    this.options = options || {};
  }

  FancyInput.noConflict = function noConflict() {
    global.FancyInput = previousFancyInput;
    return FancyInput;
  };

  global.FancyInput = FancyInput;
}(this);

```
***
####解决 PHPExcel 长数字串显示为科学计数  
```
    for ($i=0; $i < $count; $i++) {
      $index=strval($i+2);
      $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValueExplicit('A'.$index, $arr[$i]->student_id,'s')
      ->setCellValue('B'.$index, $arr[$i]->name)
      ->setCellValue('C'.$index, $arr[$i]->gender)
      ->setCellValue('D'.$index, $arr[$i]->className)
      ->setCellValueExplicit('E'.$index, $arr[$i]->device_id,'s');
    }
ref:http://blog.163.com/tfz_0611_go/blog/static/20849708420146172398214/
```
***
####PHPExcel 设置宽度  
```
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('12');
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('12');
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('15');

ref:http://blog.sina.com.cn/s/blog_92ca585801011lqs.html
```

####sublime插件推荐
```
Sublime Text3 插件：DocBlockr与javascript注释规范
http://www.ithao123.cn/content-719950.html

php snippets
Nodejs
PHP Code Sniffer
PHP Code Beautidfier
rem-unit
SublimeCodeIntel

```


***
####sublime 自定义代码片段
```
http://www.bluesdream.com/blog/sublime-text-snippets-function.html
例如：
<!-- 
<snippet>
     <content>
     <![CDATA[
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--ie渲染引擎-->
    <!--忽略电话号码和email识别-->
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="email=no" />
    <!--当网站添加到主屏幕快速启动方式，将网站添加到主屏幕快速启动方式-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!--隐藏ios上的浏览器地址栏-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!-- UC默认竖屏 ，UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <!-- QQ强制竖屏 QQ强制全屏 -->
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">

  <title>$1</title>
     <link rel="stylesheet" href="index.css"> 
  <style type="text/css">
  body{-webkit-text-size-adjust: 100%!important;}
  </style>
</head>

<body>

<script type="text/javascript">
                
</script>
</body>

</html>
     ]]>
     </content>
     <tabTrigger>html</tabTrigger>
     <description>templ</description>
     <scope>text.html</scope>
</snippet>  -->
<!-- 
<snippet>
     <content>
     <![CDATA[
     try{
     ${1}
     }catch(e){
     
     }
     ]]>
     </content>
     <tabTrigger>try</tabTrigger>
     <description>try/catch</description>
     <scope>source.js</scope>
</snippet> -->

方法注释（//+shift）
<!-- 
<snippet>
     <content>
     <![CDATA[
     /**
     * ${1}
     * @author bajian
     * @param  
     * @return 
     */]]>
     </content>
     <tabTrigger>//</tabTrigger>
     <description>/*@*/</description>
     <scope>source.js</scope>
</snippet>
 -->

switch
<!-- 
<snippet>
     <content>
     <![CDATA[
  switch (variable) {
    case 'value':
        
        break;
    
    default:
        
        break;
}]]>
     </content>
     <tabTrigger>swi</tabTrigger>
     <description>switch</description>
     <scope>source.js</scope>
</snippet>
 -->
```

***
####当运用了闭包后，全局作用域内的方法没法调用闭包内的函数时候，可以用观察者模式，在闭包内监听
```
闭包内：
$(document).on('refreshAttendance',function(e,search){
if (search) {
getAttendanceByDate(B_util.refreshDate(),function(){
$('#btn_name_first_search').trigger('click')
});
}else{
getAttendanceByDate(B_util.refreshDate());
}
})
全局：
        B_util.resign=function(studentId,search){
            if (!studentId) return;
            var ct=studentId=='all'?'请老师核实，所有学生是否已到校？':'请老师核实，该学生是否已到校？';
            A.confirm(ct,function(){
                A.showMask();
                myajax.post(B_url.resign_attendance,{studentID:studentId},function(data){
                    A.hideMask();
                    if (data.code==0) {
                        A.showToast('处理成功');
                        delete B_user.cacheAttendance[B_util.refreshDate()];
                        B_user.cacheSearch={};
                        $(document).trigger('refreshAttendance',search);//关键
                    }
                },'',function(){
                    A.hideMask();
                });
            });
        }

});

```

***
####js陷阱题
```
<script type="text/javascript"> 
var aColors = ["red", "green", "blue"]; 
alert(typeof aColors[0]); //output "string" 
alert(aColors[0] instanceof String); //output "false"; 
</script> 

你要区分string 与 String的区别 
aColors[0] 是 string值类型， 当然不是String的实例啦。参考下面代码 
var aColors = ["red", "green", "blue"]; 
aColors[0]= new String("1") 
alert(typeof aColors[0]); //output "Object" 
alert(aColors[0] instanceof String); //output "true";


var val = 'smtg';
console.log('Value is ' + (val === 'smtg') ? 'Something' : 'Nothing');
//Something


var name = 'World!';
(function () {
    if (typeof name === 'undefined') {
        var name = 'Jack';
        console.log('Goodbye ' + name);
    } else {
        console.log('Hello ' + name);
    }
})();
//Goodbye Jack（原因请看本read me中的另一个地方。。。有讲这个作用域问题）


function showCase(value) {
    switch(value) {
    case 'A':
        console.log('Case A');
        break;
    case 'B':
        console.log('Case B');
        break;
    case undefined:
        console.log('undefined');
        break;
    default:
        console.log('Do not know!');
    }
}
showCase(new String('A'));
//Do not know! 原因同第一题


function showCase2(value) {
    switch(value) {
    case 'A':
        console.log('Case A');
        break;
    case 'B':
        console.log('Case B');
        break;
    case undefined:
        console.log('undefined');
        break;
    default:
        console.log('Do not know!');
    }
}
showCase2(String('A'));
//Case A（String(x) does not create an object but does return a string, i.e. typeof String(1) === "string" ）//true   typeof new String(1) //"object"


function isOdd(num) {
    return num % 2 == 1;
}
function isEven(num) {
    return num % 2 == 0;
}
function isSane(num) {
    return isEven(num) || isOdd(num);
}
var values = [7, 4, '13', -9, Infinity];
values.map(isSane);
//[true, true, true, false, false] （Infinity % 2 gives NaN, -9 % 2 gives -1 (modulo operator keeps sign so it's result is only reliable compared to 0)）


parseInt(3, 8)//3
parseInt(3, 2)//NaN
parseInt(3, 0)//3

Array.isArray( Array.prototype )//true

[]==[]//false （两个object类型的，除非指针相同）


'5' + 3//'53'
'5' - 3//2

1 + - + + + - + 1//2
-+1和+-1等于-1，所以
1 + - + ( - + 1)等于2
1 + - + - - + 1等于 1-1等于0
1 + - + + + - + 1等于 1-（-1）等于2


var ary = Array(3);
ary[0]=2
ary.map(function(elem) { return '1'; });
//["1", undefined × 2]（The result is ["1", undefined × 2], as map is only invoked for elements of the Array which have been initialized. ）


var a = 111111111111111110000,
    b = 1111;
a + b;
//111111111111111110000（Lack of precision for numbers in JavaScript affects both small and big numbers. ）


Number.MIN_VALUE > 0//true（Number.MIN_VALUE is the smallest value bigger than zero, -Number.MAX_VALUE gets you a reference to something like the most negative number. ）


[1 < 2 < 3, 3 < 2 < 1]//[true, true] （This is parsed as (1 < 2) < 3 and (3 < 2) < 1. Than it's implicit conversions at work: true gets intified and is 1, while false gets intified and becomes 0. ）


2 == [[[2]]]//true（both objects get converted to strings and in both cases the resulting string is "2" ）


3.toString()
3..toString()
3...toString()
//error, "3", error（3.x is a valid syntax to define "3" with a mantissa（尾数） of x, toString is not a valid number, but the empty string is. ）
//收获: 3.5.toString() -> '3.5' 


(function(){
  var x = y = 1;
})();
console.log(y);//1（y没用var定义，被提升为全局变量，卧槽，定义的时候要注意了，不要贪图方便）
console.log(x);//Uncaught ReferenceError: x is not defined


var a = /123/,
    b = /123/;
a == b//false
a === b//false（regular expression objects）


var a = [1, 2, 3],
    b = [1, 2, 3],
    c = [1, 2, 4]
a ==  b
a === b
a >   c
a <   c//false, false, false, true（Arrays are compared lexicographically with > and <, but not with == and === ）


function foo() { }
var oldName = foo.name;
foo.name = "bar";
[oldName, foo.name]//["foo", "foo"]（收获; 函数的name是只读属性,赋值无效,但不抛出异常. ）


function f() {}
var parent = Object.getPrototypeOf(f);
f.name // ?
parent.name // ?
typeof eval(f.name) // ?
typeof eval(parent.name) //  ?
//"f", "Empty", "function", error（The function prototype object is defined somewhere, has a name, can be invoked, but it's not in the current scope. ）


var lowerCaseOnly =  /^[a-z]+$/;
[lowerCaseOnly.test(null), lowerCaseOnly.test()]
//[true, true] （要通过开发的角度去看问题。。。获取不到参数的参数就是undefined）
the argument is converted to a string with the abstract ToString operation, so it is "null" and "undefined". 


[,,,].join(", ")//", , " （JavaScript allows a trailing comma when defining arrays, so that turns out to be an array of three undefined. ）
[,,,].length//3
[0,0,0,].length//3
[0,0,0,''].length//4
[0,0,0,undefined].length//4


var a = {class: "Animal", name: 'Fido'};
a.class//error class是保留字


var a = new Date("epoch")//"Invalid Date", 


var min = Math.min(), max = Math.max()
min < max//false，反过来了


function captureOne(re, str) {
  var match = re.exec(str);
  return match && match[1];
}
var numRe  = /num=(\d+)/ig,
    wordRe = /word=(\w+)/i,
    a1 = captureOne(numRe,  "num=1"),
    a2 = captureOne(wordRe, "word=1"),
    a3 = captureOne(numRe,  "NUM=2"),
    a4 = captureOne(wordRe,  "WORD=2");
[a1 === a2, a3 === a4]//[true, false]
因为第一个正则有一个 g 选项 它会‘记忆’他所匹配的内容, 等匹配后他会从上次匹配的索引继续, 而第二个正则不会


if ('http://giftwrapped.com/picture.jpg'.match('.gif')) {
  'a gif file'
} else {
  'not a gif file'
}
//a gif file（String.prototype.match silently converts the string into a regular expression, without escaping it, thus the '.' becomes a metacharacter matching '/'. ）



function foo(a) {
    var a;//因为只有声明没有赋值，所以js不会重新初始化，就比如 var a=666;var a; console.log(a)//666
    return a;
}
function bar(a) {
    var a = 'bye';
    return a;
}
[foo('hello'), bar('hello')]//["hello", "bye"] 变量提升。。原因请看本read me中的另一个地方。。。http://www.cnblogs.com/damonlan/archive/2012/07/01/2553425.html
(function(){
    var a='One';
    var b='Two';
    var c='Three';
})()
实际上它是这样子的：
(function(){
    var a,b,c;
    a='One';
    b='Two';
    c='Three';
})()

摘自http://javascript-puzzlers.herokuapp.com/号称js8级。。。我第一次只对了19题QAQ
```

***
####php设置error_reporting(E_ALL) 还是无效的原因
```
ini文件配置问题。

ini_set('display_errors','On');
error_reporting(E_ALL);
```


***
####给项目添加POST参数的日志
```

if ($_SERVER['REQUEST_METHOD']=='POST')
    Log::debug($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$_POST);

GET可以直接交给nginx设置，但是post参数就不能了（按百度设置了啥query_...参数的也无效，奇怪，有成功的麻烦告诉我）
    server {
listen 80;
server_name test.wechat.hzsb365.com;
access_log /data/wwwlogs/test.wechat.hzsb365.com_nginx.log combined;
index index.html index.htm index.php;
include /usr/local/nginx/conf/laravel.conf;
root /home/hgx/hzsbTest/public;


location ~ [^/]\.php(/|$) {
    #fastcgi_pass remote_php_ip:9000;
    fastcgi_pass unix:/dev/shm/php-cgi.sock;
    fastcgi_index index.php;
    include fastcgi.conf;
    }
location ~ .*\.(gif|jpg|jpeg|png|bmp|swf|flv|ico)$ {
    expires 30d;
    access_log off;
    }
location ~ .*\.(js|css)?$ {
    expires 7d;
    access_log off;
    }
}

```


####webAPP中若要让软键盘弹出的时候某些按钮不跟着上浮，就必须保持它与表单的position都为relative，不能是absolute fixed之类的


***
####[算法]求出所有给出的数的排列组合
```
//求出所有给出的数的排列组合
//个人解法，仅供参考，无标准答案
$arr=[1,2,3,4,5,6,7,8,9,10];
$subArr=[];

collect($subArr,join(',',$arr));
foreach ($arr as $key => $value) {
    collect($subArr,$value);
}

$len=count($arr);
    for($i=0;$i<$len;$i++){
        for ($j=0; $j <$len ; $j++) { 
            toSpliceFromOffset($arr,$i,$subArr,$j);
        }
    }

print_r($subArr);

function toSpliceFromOffset($arr,$i,&$subArr,$offset){
        array_splice($arr,$i,1);
        collect($subArr,join(',',$arr));
        if (count($arr)>2) {
            toSpliceFromOffset($arr,$offset,$subArr,$offset-1);
        }
}

function collect(&$subArr,$pushArrString){
    foreach ($subArr as $key => $value) {
        if ($value===$pushArrString) {
            return;
        }
    }
    array_push($subArr,$pushArrString);
}

```

***
####https和http同步session
```
https域登录，获得sessionid，然后重定向到http,get请求里带上sessionid（加密），http域写入sessionid，重定向到http域登录成功页
http://www.gy0929.com/wz/1312.html
//可以参考B站的登录，原理大致相同
```

***
####visibility hidden
```

<a style="visibility: hidden;" href="">bajian2</a><!-- 占位hidden， 可应用于清楚浮动 -->
<!-- display none 是不占位的 -->
```

***
####setTimeout传参数
```
var timer = setTimeout(function (timerInstance, timeoutId) {
    timerInstance.clear(timeoutId);
    fn();
  }, delay, this, id);
```
***
####sql 高级查询汇总 
```
http://aoxueshou.blog.163.com/blog/static/1002357142013817515604/
http://www.cnblogs.com/yubinfeng/archive/2010/11/02/1867386.html

使用rand()抽样调查，随机抽取2个员工，查看其资料
mysql> select * from emp order by rand() limit 2;

查询结果的字段联合和重新命名
mysql> select concat(emp_id," ",emp_name) from emp;

统计男女职工数目：（GROUP BY语句分类）
mysql> select emp_sex,count(*) from emp group by emp_sex;

查询班级信息，统计班级学生人生 
SELECT *,(SELECT COUNT(*) FROM manager_student WHERE class_id=manager_class.`id`) AS studentnum FROM manager_class 

查询某学校的所有班级及每个班级的学生人数
SELECT *,(SELECT COUNT(*) FROM manager_student WHERE class_id=manager_class.`id`) AS studentnum FROM manager_class WHERE manager_class.`school_id`=30

查询某学校的所有班级及每个班级的学生人数及制定天数的出勤人数
SELECT *,(SELECT COUNT(DISTINCT b.`device_id`)num  FROM manager_student a  RIGHT JOIN xsk_attendance b ON a.`device_id`=b.device_id WHERE class_id=manager_class.`id` AND DATE_FORMAT(b.time,'%Y-%m-%d') ='2016-05-26')attandanceNum,(SELECT COUNT(*) FROM manager_student WHERE class_id=manager_class.`id`) AS studentnum FROM manager_class WHERE manager_class.`school_id`=30


1. 查找出符合条件的记录, 按user_id asc, create_time desc 排序;
select ord.user_id, ord.money, ord.create_time from orders ord where ord.user_id > 0 and create_time > 0 order by user_id asc , create_time desc
2. 将(1)中记录按user_id分组, group_concat(money);
select t.user_id, group_concat( t.money ) moneys from (select ord.user_id, ord.money, ord.create_time from orders ord where ord.user_id > 0 and create_time > 0 order by user_id asc , create_time desc) t group by user_id
user_id moneys
1 100,50
2 200,100
3. 这时, 如果用户有多个消费记录, 就会按照时间顺序排列好, 再利用 subString_index 函数进行切分即可
select t.user_id, substring_index(group_concat( t.money ),',',1) lastest_money from (select ord.user_id, ord.money, ord.create_time from orders ord where ord.user_id > 0 and create_time > 0 order by user_id asc , create_time desc) t group by user_id ;

5、限制返回的行数
使用TOP n [PERCENT]选项限制返回的数据行数，TOP n说明返回n行，而TOP n PERCENT时，说明n是
表示一百分数，指定返回的行数等于总行数的百分之几。
例如： 
代码:SELECT TOP 2 * FROM `testtable` 
代码:SELECT TOP 20 PERCENT * FROM `testtable`

mysql数据库replace、regexp的用法 http://www.jb51.net/article/27997.htm
特别注意中文的话：
SELECT * FROM table1 a WHERE a.`city` REGEXP '(呵){2}'

善用mysql的时间函数
UPDATE `xsk_command` SET `begin_time`=DATE_ADD(now(),INTERVAL 10 SECOND), send_times = 0 WHERE id=
```

***
####一些复杂的sql记录
```
每次查询limit个老师（一个老师含多个班级）
SELECT a.*,b.`name`,b.`password`,b.`nickname`,b.`note` AS subject,c.`name` AS class  FROM manager_class_teacher a INNER JOIN manager_admin b ON a.`admin_id`=b.`id` LEFT JOIN manager_class c ON a.class_id=c.`id` WHERE a.admin_id IN ( SELECT * FROM( SELECT DISTINCT admin_id FROM manager_class_teacher WHERE school_id=? LIMIT ?,?)AS t)
$re=$this->queryTeacherSql($_SESSION['admin_school_id'],$start,$limit);
      $listCount=count($re);
      $list=[];
      for ($i=0; $i <$listCount ; $i++) {
        $t=new TeacherBean();
        $t->name=$re[$i]->name;
        $t->id=$re[$i]->admin_id;
        $t->nickname=$re[$i]->nickname;
        $t->password=$re[$i]->password;
        $t->subject=$re[$i]->subject;
        $t->classes=[['id'=>$re[$i]->class_id,'name'=>$re[$i]->class]];
        for ($j=$i; $j <$listCount-1 ; $j++) { 
          if ($re[$j]->admin_id==$re[$j+1]->admin_id) {
            $i++;
            array_push($t->classes, ['id'=>$re[$j+1]->class_id,'name'=>$re[$j+1]->class]);
          }else{
            break;
          }
        }
        array_push($list, $t);
      }
按关键字查，还得拉取出其他班级的
SELECT a.*,b.`name`,b.`password`,b.`nickname`,b.`note` AS SUBJECT,c.`name` AS class FROM manager_class_teacher a INNER JOIN manager_admin b ON a.`admin_id`=b.`id` LEFT JOIN manager_class c ON a.class_id=c.`id` WHERE a.`admin_id` IN (SELECT * FROM (SELECT DISTINCT manager_class_teacher.`admin_id` FROM manager_class_teacher  INNER JOIN manager_admin  ON manager_class_teacher.`admin_id`=manager_admin.`id` LEFT JOIN manager_class  ON manager_class_teacher.class_id=manager_class.`id` WHERE manager_class_teacher.school_id=30 AND (manager_admin.`name` LIKE '%徐小航%' OR manager_class.`name` LIKE '%测试二班%' OR manager_admin.`note` LIKE '%徐小航%' OR manager_admin.`nickname` LIKE '%测试二班%') )AS tt)


```


***
####获取运行脚本的目录（也可用于require的模块中）
```
console.log(require('path').dirname(process.argv[1]));
```


***
####事件的委托处理（Event Delegation）
```
javascript的事件模型，采用"冒泡"模式，也就是说，子元素的事件会逐级向上"冒泡"，成为父元素的事件。
利用这一点，可以大大简化事件的绑定。比如，有一个表格（table元素），里面有100个格子（td元素），现在要求在每个格子上面绑定一个点击事件（click），请问是否需要将下面的命令执行100次？
　　$("td").on("click", function(){
　　　　$(this).toggleClass("click");
　　});
回答是不需要，我们只要把这个事件绑定在table元素上面就可以了，因为td元素发生点击事件之后，这个事件会"冒泡"到父元素table上面，从而被监听到。
因此，这个事件只需要在父元素绑定1次即可，而不需要在子元素上绑定100次，从而大大提高性能。这就叫事件的"委托处理"，也就是子元素"委托"父元素处理这个事件。
　　$("table").on("click", "td", function(){
　　　　$(this).toggleClass("click");
　　});
更好的写法，则是把事件绑定在document对象上面。
　　$(document).on("click", "td", function(){
　　　　$(this).toggleClass("click");
　　});
如果要取消事件的绑定，就使用off()方法。
　　$(document).off("click", "td");

```

***
####h:i格式可以直接比大小
```
"15:46">"23:00"
false
```

***
####语义版本号分为X.Y.Z三位
```
语义版本号分为X.Y.Z三位，分别代表主版本号、次版本号和补丁版本号。当代码变更时，版本号按以下原则更新。
+ 如果只是修复bug，需要更新Z位。
+ 如果是新增了功能，但是向下兼容，需要更新Y位。
+ 如果有大变动，向下不兼容，需要更新X位。
```
***
####mysql 字符串数字排序
```
return DB::connection('jxhd')->select('SELECT a.`student_id` AS studentID,a.`name` AS studentName,b.`type`,b.`time` AS datetime FROM manager_student a LEFT JOIN xsk_attendance b ON a.`device_id`=b.`device_id` AND DATE_FORMAT(b.time,\'%Y-%m-%d\') =? WHERE a.`class_id`=? GROUP BY a.`name` ORDER BY (studentID+0) ASC',[$date,$class_id]);
http://www.111cn.net/database/mysql/55179.htm

```

***
####Table的“min-height”属性
```
需要对table元素里的td设置min-height属性，设置都没有效果。

对于table元素，如th、td来说，

使用height属性就等效于min-height属性了，
```

***
####JavaScript中字符串与Unicode编码的互相转换
```
code = 'a'.charCodeAt(0); // 97
String.fromCharCode(97)//a
```

***
####mysql中having的用法
```
http://jingyan.baidu.com/article/425e69e6ddeebdbe14fc1678.html
mysql中，当我们用到聚合函数，如sum，count后，又需要筛选条件时，having就派上用场了，因为WHERE是在聚合前筛选记录的，having和group by是组合着用的，下面通过实例介绍下用法

http://www.jb51.net/article/32562.htm
二、 显示每个地区的总人口数和总面积．仅显示那些面积超过1000000的地区 
SELECT region, SUM(population), SUM(area)FROM bbcGROUP BY regionHAVING SUM(area)>1000000 
在这里，我们不能用where来筛选超过1000000的地区，因为表中不存在这样一条记录。相反，having子句可以让我们筛选成组后的各组数据 


```
***
####viewport模板——通用
```
<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<title>标题</title>
<link rel="stylesheet" href="index.css">
</head>

<body>
这里开始内容
</body>

</html> -->

```

***
####webkit表单元素的默认外观怎么重置
```
通用
.css{-webkit-appearance:none;}

```

***
####数组和对象都是引用传递
```
b=c=[];
[]
b.push(333); console.log(c)
[333]

typeof []

"object"
typeof {}

"object"
typeof 'A'
"string"
```

***
####欣赏别人的写法
```

    var createDots = function(){
      var _index = $scroller.index($slide.filter('.active'));_index = _index<0?0:_index;
      $el.children('.dots').remove();     
      var arr = [];
      arr.push('<div class="dots">');
      for(var i=0;i<slideNum;i++){
        arr.push('<div class="dotty"></div>');
      }
      arr.push('</div>');
      $dots = $(arr.join('')).appendTo($el).addClass(sliderOpts.dots).find('.dotty');
      $($dots.get(_index)).addClass('active');
    };
```


```
:nth-child(n) 选择器匹配属于其父元素的第 N 个子元素，不论元素的类型。
nth-of-type(n)可以筛选元素类型
nth-child快速实现table相间色 :nth-child(odd) 与 :nth-child(even) 


```

***
####去掉点击后控件的outline
```
outline-style: none;
```

***
####预加载资源
```
  <link rel="prefetch" href="/src/modules/composer/resize.js?v=6e953938-9cd1-4442-8be8-9e95d39203dd" />
```

***
####获取文件大小
```
//jQ版float ,kb
function getFileSize(id){
  return $('#'+id)[0].files[0].size/1000
}
//js版float ,kb
function getFileSize(id){
  return document.getElementById(id).files[0].size/1000
}
file对象
lastModified: 1463472739374
lastModifiedDate: Tue May 17 2016 16:12:19 GMT+0800 (中国标准时间)
name: "家校互动-教师微信端2.0.zip"
size: 7898422
type: ""
webkitRelativePath: ""
```

***
####text-align:center
```
 6、text-align:center 在块元素中用text-align来设置其中的文本对齐样式，这里设置为居中。其实text-align属性会影响到一个元素中所有内联内容的对齐样式，不仅仅是文本。还要记住，text-aligh属性只能用于块元素，如果直接用于内联元素（如<img>）就没有作用了。text-aligh属性值也可继承。例如<div>元素中的所有文本都在其他块元素中，如<h2>、<p>.但现在他们的对齐样式都改变了。这是因为这些块元素继承了<div>的text-align属性。区别是，不是<div>直接影响标题和段落（这些都是块元素）中的文本对齐样式，而是标题和段落继承了text-align属性值"center"，使它们自己的内容居中了。但是谨记并非所有的属性都是可以默认继承的，所以这并不会对所有的属性都起作用。


```

***
####修改输入框placeholder文字默认颜色-webkit-input-placeholder
```
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
    color: #f00;
}
```
***
####mysql查詢數據存儲位置
```
show global variables like "%datadir%";
```
***
####span文字居中可以调节line-height

***
####JS计算2个标准格式时间字符串的差 时间差
```
 
/*
 * 计算时间差 2个标准格式时间字符串的差(t1-t2)，如calStanderTimeDiff('2016-05-04 12:54:54','2016-05-04 12:54:14');
 * @return int 相差的秒数
 */
function calStanderTimeDiff(t1,t2){
  return (new Date(t1)-new Date(t2))/1000;
}
```
***
####JS 保留小数点后X位（四舍五入）
```
(4.5).toFixed(1)
"4.5"
(4.523).toFixed(1)
"4.5"
(4.553).toFixed(1)
"4.6"
(4.583).toFixed(1)
"4.6"
```

***
####微信下载app（任何附件）的方式（安卓唤起自带浏览器下载）
```
设置 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
适用于融云和自己的服务器
详见wxdownload.php
```


***
####自定义android版confirm依赖AL框架
```
myConfirm('退出当前账号后不会删除任何历史数据，下次登录依然可以使用本账号。','取消','退出','',function(){
    alert(1);
  });
    /*
    * 自定义android版confirm依赖AL框架
    * @params content 内容
    * @params conceltext 取消按钮文字
    * @params confirmtext 确认按钮文字
    * @params concelcb 取消callback 可空。不需要close
    * @params confirmcb 确认callback 可空。不需要close
    */
    function myConfirm(content,conceltext,confirmtext,concelcb,confirmcb){
      conceltext=conceltext||'取消';
      confirmtext=confirmtext||'确认';
      var $popup = A.popup({
            html: '<div style="padding:24px 21px;font-size: 18px;background:#fff">'+content+'<div style="color:#616161"></div><div style="margin:26px 5px 48px 0px;"><a style="position:absolute;right:115px;color:#4f6692" href="javascript:;" id="concel">'+conceltext+'</a><a style="position:absolute;right:48px;color:#4f6692;" href="javascript:;" id="confirm">'+confirmtext+'</a></div></div>',
              css : {width:'70%'},
              pos : 'center',
              isBlock : true
          });
          $popup.popup.find('#concel').on(A.options.clickEvent, function(){
            concelcb&&concelcb();
            $popup.close();
          });
          $popup.popup.find('#confirm').on(A.options.clickEvent, function(){
            confirmcb&&confirmcb();
            $popup.close();
          });
    }
```

***
####js 字符或字符串出现次数  
```
function countSubstr(str,substr){
           var count;
           var reg="/"+substr+"/gi";    //查找时忽略大小写
           reg=eval(reg);
           if(str.match(reg)==null){
                   count=0;
           }else{
                   count=str.match(reg).length;
           }
           return count;//返回找到的次数
}
```

***
####让php执行shell
```
system() 输出并返回最后一行shell结果。
exec() 不输出结果，返回最后一行shell结果，所有结果可以保存到一个返回的数组里面。
passthru() 只调用命令，把命令的运行结果原样地直接输出到标准输出设备上。
```

***
####grep多个关键字“与”和“或
```
或操作
grep -E '123|abc' filename

与操作
grep pattern1 files | grep pattern2

```

***
####解决apache下重定向不执行
```
public function auth_card_bxjtest()
  {
    $code=Input::get('code');
    if ($code) {
      header('Location:http://bxjtest.snewfly.com/auth_card?code='.Input::get('code')); 
    }else{
      header('Location:http://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2683432074892f86&redirect_uri=http://bxj.snewfly.com/auth_card_bxjtest&response_type=code&scope=snsapi_base&state=SUISHI');  
    }
    header('HTTP/1.1 301 Moved permanently');
      exit(); 
  }
```

```
<img name="yyy" id="i" src="">
不需要getElementById,直接yyy.src/i.src都不会报错的,但不建议这么使用
```

***
####Jquery获取和修改img的src值的方法
```
$("#imgId")[0].src;
$("#imgId").attr('src',path); 

```

***
####当用curl下载文件的时候不能带\/这样的转义字符
```
//正确
$url='http://bxj242.snewfly.com/upload/wechat/card/voice/16-04-26/0.07610300146164359034.amr';
// 错误
$url='http:\/\/10.169.117.7:9090\/upload\/wechat\/card\/voice\/16-04-26\/0.07610300146164359034.amr';

```


***
####Php函数前加@是什么意思  
```
@通常是用来抑制误输出的

```

***
####PHP 获取post和get的全部参数
```
echo $_SERVER["QUERY_STRING"];//get

$data=file_get_contents('php://input');//post
laravrl :
Input::all();或者：
$arr = $request->all();
```

***
####CAP理论
```
CAP：任何分布式系统在可用性、一致性、分区容错性方面，不能兼得，最多只能得其二，因此，任何分布式系统的设计只是在三者中的不同取舍而已。
C（一致性）：所有的节点上的数据时刻保持同步
A（可用性）：每个请求都能接受到一个响应，无论响应成功或失败
P（分区容错）：系统应该能持续提供服务，即使系统内部有消息丢失（分区）

```

***
####php获取毫秒级别的时间戳
```
    /**
     * 获取毫秒级别的时间戳
     */
      function getMillisecond()
    {
        //获取毫秒的时间戳
        $time = explode ( " ", microtime () );
        $time = $time[1] . ($time[0] * 1000);
        $time2 = explode( ".", $time );
        return $time2[0];
    }
```

***
####函数的作用域是在定义的时候创建的，而不是在执行的时候创建的
```
var aaa = "123";

(function(){alert(aaa); var aaa="456";})(1);



输出的结果是 ： undefined





var aaa = "123";

(function(){alert(aaa);})(1);


输出的结果是
123


这个简单的问题说明了

Jquery具有词法作用域
，函数的作用域是在定义的时候创建的，而不是在执行的时候创建的

如果运行上面的代码，返回的值会是`undefined`，而不是`’123’`。 就是说，在同一个变量作用域或者同一个函数内，只要有使用var声明变量jQuery的语句，就可以在函数中的任何位置访问它，包括在var语句之前。但是在这个例子中，没对这个变量进行初始化 ，所以返回的结果是 undefined
```

***
####object->post和get的全部参数
```
function obj2param(obj){
            var param='?';
            if (obj instanceof Object) {
                for(var key in obj){
                    param+=key+'='+obj[key]+'&';
                }
            }
            if (param!=='?') {
                console.log(param);
                param=param.substring(0,param.length-1);
                return param;
            }
            return '';
        }

//用trim更简单。。
  private function ToUrlParams($urlObj)
  {
    $buff = "";
    foreach ($urlObj as $k => $v)
    {
      if($k != "sign"){
        $buff .= $k . "=" . $v . "&";
      }
    }
    
    $buff = trim($buff, "&");
    return $buff;
  }

  private function arrayToString($arr){
        $str='';
        foreach ($arr as $key => $value) {
            $str.=$key.'='.$value.'&';
        }
        return trim($str, '&');
    }

```


***
####js 遍历object，array类似
```
a={"a":"b","c":"d"};for(var i in a){console.log(i+'='+a[i])}

```

***
####JS 取文本中间
```
  /**
   * 取文本中间
   * @param str 原文本
   * @param left 左边文本
   * @param right 右边文本
   * @param 是否返回匹配文本包含左右边（可省略）
   * @return string 返回匹配文本
   */
function getStringMiddle(str,left,right,returnWhole) {
    var $=left+"([\\d\\D]*?)"+right;
    var pattern=new RegExp($,'g');
    var matches=pattern.exec(str);
    if(!matches) return '';
    if(returnWhole) return matches[0];
    return matches[1];
  }

```


***
####jQuery 新增元素绑定方法
```

$(document).on('click', '.banner-img', function () {
  Bn.showFigure(this.src);
    });
或者逐个新增的绑定
```

***
####jQuery学习之prop和attr的区别示例介绍

```

http://www.jb51.net/article/43303.htm
总结：
.prop()方法应该被用来处理boolean attributes/properties以及在html(比如：window.location)中不存在的properties。其他所有的attributes(在html中你看到的那些)可以而且应该继续使用.attr()方法来进行操作。 

$('#lll').prop('disabled') //判断LLL元素是否含有disable


```

***
####JS 用正则替换【全部】
```
content.replace(/\r\n/g, '<br/>');
data=data.replace(/\d+-\d+-(\d\d) \d\d:\d\d:\d\d/g, "$1号");
```

***
####js 数组的key value添加
```
var a=[];a['111']=11; a['22']=22222; a['111']
a.push(1111)//顺序添加 shift移除末尾

遍历：
var x
var mycars = new Array()
mycars['1q1'] = "Saab"
mycars['q2'] = "Volvo"
mycars['q3'] = "BMW"

for (x in mycars)
{
document.write(mycars[x]+x + "<br />")
}
```

***
####AL 获取当前section和article的id
```

function getCurrentActiveSectionId() {
    return $('section.active').attr('id');
}

function getCurrentActionArticleId() {
    return $('#' + getCurrentActiveSectionId() + ' article.active').attr('id');
}

```

***
####post和get的参数最好加上urlencode
```
http://binma85.iteye.com/blog/850042
echo urlencode('&');

```
***
####mysql的ERROR 1129 (00000): is blocked because of many connection errors
```
whereis mysqladmin
/usr/bin/mysqladmin flush-hosts -uroot -psxxxxx
http://www.cnblogs.com/susuyu/archive/2013/05/28/3104249.html

```

[输入链接说明](http://)
[跨域访问的两种方式](http://blog.csdn.net/fdipzone/article/details/46390573/)
```
<?php
namespace App\Http\Controllers;

require('lib/ServerConfig.php');
use ServerConfig;
use Log;
use Input;
header('content-type:application:json;charset=utf8');  
header('Access-Control-Allow-Origin:*');  
header('Access-Control-Allow-Methods:POST');  
header('Access-Control-Allow-Headers:x-requested-with,content-type');  
class TestController extends BaseController{
  public function test()
  {
    // $callback=Input::get('callback');//jsonp
    // return $callback.'('.json_encode(['value']).')';
    return json_encode(['value'=>123]);
    // $cmd = Input::get('cmd');
    // if ($cmd == 'file') {
    //  Log::info($_FILES);
    // }
  }

}
```
[JS&JQ 获取节点的兄弟,父级,子级元素的方法](http://www.jb51.net/article/45372.htm)
[网页特效库](http://www.5iweb.com.cn/)
[百度地图圆形区域类](http://developer.baidu.com/map/reference/index.php?title=Class:%E8%A6%86%E7%9B%96%E7%89%A9%E7%B1%BB/Circle)

***
####StrokeDashArray/
```
StrokeDashArray 描述Shape类型轮廓的虚线和间隔的样式，写法为StrokeDashArray="str"。str是虚线和间隙的值的集合，奇数项为虚线长度；偶数项为间隙长度。例如：StrokeDashArray="2,1",则表示虚线长度为2，间隔为1. StrokeDashArray="2" 则表示虚线和间隔都是2

```
[纯CSS实现帅气的SVG路径描边动画效果](http://www.zhangxinxu.com/wordpress/2014/04/animateion-line-drawing-svg-path-%E5%8A%A8%E7%94%BB-%E8%B7%AF%E5%BE%84/)
[超级强大的SVG SMIL animation动画详解](http://www.zhangxinxu.com/wordpress/2014/08/so-powerful-svg-smil-animation/)


***
####属性变化的动画效果
[属性变化的动画效果](http://www.dglives.com/effect/9%E7%A7%8D%E7%AE%80%E5%8D%95%E6%98%93%E7%94%A8%E7%9A%84css3%E8%BF%87%E6%B8%A1%E5%8A%A8%E7%94%BB%E6%95%88%E6%9E%9C)
```
参考anime.html
.anime{transition: all 1s ease;}
```

***AL 动态添加的也可以绑定
####
```
//动态添加的也可以绑定
    $(document).on(A.options.clickEvent, '.control', function(){
      console.log('click');
    });
```

[酷炫的FAB](http://materialdesignblog.com/awesome-css-codepen-to-enhance-material-design-fab-button/)

[1秒破解 js packer 加密](http://www.cnblogs.com/52cik/p/js-unpacker.html)

[替换webview中js资源本地加载，提高速度](http://xunhou.me/webview-2/)
[jQuery.extend 函数详解](http://www.cnblogs.com/RascallySnake/archive/2010/05/07/1729563.html)

[js判断移动端是否安装某款app的多种方法](http://www.jb51.net/article/76585.htm)
但是，但是....还是有奇思淫巧滴，启动app需要的时间较长，js中断时间长，如果没安装，js瞬间就执行完毕。直接上代码吧！
***
####获取url参数
```
function getRequest() {
var url = location.search; //获取url中"?"符后的字串 
var theRequest = new Object();
if (url.indexOf("?") != -1) {
  var str = url.substr(1);
  strs = str.split("&");
  for(var i = 0; i < strs.length; i ++) {
    theRequest[strs[i].split("=")[0]]=decodeURIComponent(strs[i].split("=")[1]);
  }
}
return theRequest;
}

压缩后
function getRequest(){var c,d,a=location.search,b=new Object;if(-1!=a.indexOf("?"))for(c=a.substr(1),strs=c.split("&"),d=0;d<strs.length;d++)b[strs[d].split("=")[0]]=decodeURIComponent(strs[d].split("=")[1]);return b}

在js中可以使用escape(), encodeURL(), encodeURIComponent()，三种方法都有一些不会被编码的符号：
escape()：@ * / +
encodeURL()：! @ # $& * ( ) = : / ; ? + '
encodeURIComponent()：! * ( ) '
 通过对三个函数的分析，我们可以知道：escape()除了 ASCII 字母、数字和特定的符号外，对传进来的字符串全部进行转义编码，因此如果想对URL编码，最好不要使用此方法。而encodeURI() 用于编码整个URI,因为URI中的合法字符都不会被编码转换。encodeURIComponent方法在编码单个URIComponent（指请求参 数）应当是最常用的，它可以讲参数中的中文、特殊字符进行转义，而不会影响整个URL。


window.location.href：获取完整url的方法：,即scheme://host:port/path?query#fragment
window.location.protocol：获取rul协议scheme
window.location.host：获取host
window.location.port：获取端口号
window.location.pathname：获取url路径
window.location.search：获取参数query部分，注意此处返回的是?query
window.location.hash：获取锚点，#fragment

用法
otherDevice();
function otherDevice(){
  if (GetRequest()['otherDevice']=='1') {
    myAlert('您的账号已在其他设备登录,如果不是本人登录，请使用App修改密码');
  };
}
```

***
####float元素 toggle 平齐
```
<div style="vertical-align: baseline;height:30px;line-height: 30px;"> <strong style="float: left;">上课禁用</strong><span id="toggle_school_manage" style="float: right;" class="toggle classic" data-role="toggle" data-on="开" data-on-value="1" data-off="关" data-off-value="0"></span><br/>
      </div><hr style="height:1px;border:none;border-top:1px dashed #0066CC;margin-top: 3px;" />
```

[html中hr的各种样式使用](http://jingyan.baidu.com/article/af9f5a2d37342c43140a4500.html)

***
####jquery 获取元素id（任何属性）和AL获取当前section和article
```
$('section.active').attr("id")

$('#section_cardcenter article.active').attr("id")
```


* [高性能JavaScript：加载和运行](http://ilanever.com/article/detail.do?id=264#page-catalog-4)
* [JS中的prototype](http://www.cnblogs.com/yjf512/archive/2011/06/03/2071914.html)
* [JS 进阶 闭包，作用域链，垃圾回收，内存泄露](http://segmentfault.com/a/1190000002778015)
* [Javascript 面向对象编程（一）：封装](http://www.ruanyifeng.com/blog/2010/05/object-oriented_javascript_encapsulation.html)


***
####AL Toggle获取状态 和设置
```

//@return 1=true,0=false
function getIsToggleActive(toggleId){
  if ($('#'+toggleId).hasClass('active')) {
    return 1;
  }
  return 0;
}

setToggleState('toggle_school_manage',flag);

/*
* @param toggleId 元素id
* @param state 是否需要选中 0/1
* 设置toggle state
*/
function setToggleState(toggleId,state){
  var isToggleActive=getIsToggleActive(toggleId);
  if (state==0) {
    if (isToggleActive==1) {
      $('#'+toggleId).removeClass('active');
    }
  }else{
    if (!isToggleActive) {
      $('#'+toggleId).addClass('active');
    }
  }
}

```

***
####AL select选择问题
```
基本都是没法100%宽度导致点不到
select {width: 100%}

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

判断是否微信浏览器高效方法
B_util.is_weixin=(navigator.userAgent.toLowerCase()).match(/MicroMessenger/i) == "micromessenger";
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
####shell脚本参数
```
shell脚本参数可以任意多，但只有前9各可以被访问，使用shift命令可以改变这个限制。参数从第一个开始，在第九个结束。
$0 程序名字
$n 第n个参数值，n=1..9 
$* 所有命令行参数
$@        所有命令行参数,如果它被包含在引号里,形如”$@”,则每个参数也各自被引号包括
$# 命令行参数个数 
$$ 当前进程的进程ID(PID)
$!  最近后台进程的进程ID 
$?  最近使用命令的退出状态

```

***
####nginx负载均衡
```
http://www.cnblogs.com/liping13599168/archive/2011/04/15/2017369.html

远程地址带上密码
http://yourname:password@git.oschina.net/name/project.git

```
***
####setTimeout延时0毫秒的作用
```
http://www.cnblogs.com/winner/archive/2008/11/15/1334077.html
http://www.cnblogs.com/silin6/p/4333999.html
1、实现javascript的异步；


```

***
####git操作总结
```
安装git
sudo apt-get install git-core

初始化建库
git init /home/git/myRep.git

远端客户端拉取一份
git clone root@120.24.49.37:/home/hgx/node/mytest

git config --global  user.email "313066164@qq.com"
git config --global user.name "bajian"
config --global  receive.denyCurrentBranch "warn"

提交所有修改过的
git add .
Commit 并附加说明
git commit -m "changes to some-file"

查看提交版本
git log

如果提交后，服务器代码没变，说明分支不对！！
git checkout master

如果远程服务器代码没变，可以试着git log后git checkout 到别的版本再试试切回来

查看当前状态
git status 

err:
git: Your branch and 'origin/master' have diverged
git fetch origin
git reset --hard origin/master
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
####特殊字符过滤
```

  B_util.wordFilter=function(t){
    t=t.replace(/\&/g,'&amp;');
    t=t.replace(/\"/g,'&quot;');
    t=t.replace(/\</g,'&lt;');
    t=t.replace(/\>/g,'&gt;');
    return t.replace(/\'/g,'&#39;');
  }
//高级写法
<!--     escapeHtml(str){
    let htmlMaps = {
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#39;'
    }
    return (str + '').replace(/[<>'"]/g, function(a){
      return htmlMaps[a];
    });
  } -->
用途：
<!-- <div id="rrr"></div> -->

  <script type="text/javascript">
    var t="ceshi 特殊符号\n“\\\"\\'”‘’，。、！@￥%……&~（*&（*&~!@$%^&^%&*&(*bKJH\n啥啥啥\nceshi 特殊符号\n“\\\"\\'”‘’，。、！@￥%……&~（*&（*&~!@$%^&^%&*&(*bKJH\n啥啥啥\n“”\\\"\\\"\\\"\\\"\\\";;\\'\\'\\'\\'\\',..\/，。，。、‘；’";
    // t=encodeURIComponent(t);
    t=t.replace(/\&/g,'&amp;');
    t=t.replace(/\"/g,'&quot;');
    t=t.replace(/\</g,'&lt;');
    t=t.replace(/\>/g,'&gt;');
    t=t.replace(/\'/g,'&#39;');
    rrr.innerHTML='<span id="r" data-content="'+t+'">'+t+'</span>';
    console.log(r.dataset.content);
  </script>
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

function loadjs(jsurl){
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.src = jsurl;
      document.getElementsByTagName('head')[0].appendChild(s);
    }
    function loadimg(url){
      var s = document.createElement("img");
      s.height= 0;
      s.width= 0;
      s.src = url;
      document.getElementsByTagName('body')[0].appendChild(s);
    }

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

增强版：增加回调功能
function loadjs(script_filename,scriptId,callback) {
    var script = document.createElement('script');
    script.setAttribute('type', 'text/javascript');
    script.setAttribute('src', script_filename);
    script.setAttribute('id', scriptId);
 
    script_id = document.getElementById(scriptId);
    if(script_id){//删除重复id的
        document.getElementsByTagName('head')[0].removeChild(scriptId);
    }
    
    script.onload = function(){
        if (callback!=undefined) {
          callback();
        }
      
    };
    document.getElementsByTagName('head')[0].appendChild(script);
}

压缩后
function loadjs(a,b,c){var d=document.createElement("script");d.setAttribute("type","text/javascript"),d.setAttribute("src",a),d.setAttribute("id",b),script_id=document.getElementById(b),script_id&&document.getElementsByTagName("head")[0].removeChild(b),d.onload=function(){void 0!=c&&c()},document.getElementsByTagName("head")[0].appendChild(d)}



    function loadCss(url,id){
    var cssTag = document.getElementById(id);
    var head = document.getElementsByTagName('head').item(0);
    if(cssTag) head.removeChild(cssTag);
    css = document.createElement('link');
    css.href = url;
    css.rel = 'stylesheet';
    css.type = 'text/css';
    css.id = id;
    head.appendChild(css);
}
压缩后：
function loadCss(a,b){var c=document.getElementById(b),d=document.getElementsByTagName("head").item(0);c&&d.removeChild(c),css=document.createElement("link"),css.href=a,css.rel="stylesheet",css.type="text/css",css.id=b,d.appendChild(css)}

用法举例：

    var bajian=new B();
    function B() {
        this.toast = function(str){
          alert(str);
        };
    }

    bajian.toast('测试一下');
      loadCss('http://7xkaou.com2.z0.glb.qiniucdn.com/toast.min.css','toastcss');
  loadjs('http://7xkaou.com2.z0.glb.qiniucdn.com/toast.min.js','toastjs',function(){
      bajian.toast=function(str){
    var options = {
            title: str,
            type: 'success',
            position: 'bottom',
            duration: 5000,
            mobile: true
        };
    $toast.show(options);
  }

    bajian.toast('测试一下');
  });

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
见jsreflect.html
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


3、a.lua,AAAa.lua,B.lua,a.lua,c.lua,a.lua 我想匹配a.lua但不包含AAAa.lua之类的
(?:,|^)(a\.lua)


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
* ts="now" 为当前时间 10/13位时间戳（必须String类型）
*/
function curDateTime(ts) {
var d = new Date();
if (ts!='now') {
if(ts.length==10){
  var t=parseInt(ts);
  d.setTime(t*1000);
}else{
  d.setTime(t);
}
}
// var year = d.getFullYear();
var month = d.getMonth() + 1;
var date = d.getDate();
var day = d.getDay();
var Hours=d.getHours(); //获取当前小时数(0-23)
var Minutes=d.getMinutes(); //获取当前分钟数(0-59)
var Seconds=d.getSeconds(); //获取当前秒数(0-59)
var curDateTime = '';
if (month > 9)
curDateTime += month+'-';
else
curDateTime += "0" + month+'-';
if (date > 9)
curDateTime += date+' ';
else
curDateTime += "0" + date+' ';
if (Hours > 9)
curDateTime+= Hours+':';
else
curDateTime+="0" + Hours+':';
if (Minutes > 9)
curDateTime +=Minutes+':';
else
curDateTime+="0" + Minutes+':';
if (Seconds > 9)
curDateTime += Seconds;
else
curDateTime += "0" + Seconds;
return curDateTime;
}
```

***
####返回当前十位时间戳 string
```
function getCurTs(){return (Date.now()+'').substr(0,10);}
parseInt(Date.now()/1000)

```

***
####返回当天0点时间戳 十三位
```
function getZeroTs(){
var today = new Date();
today.setHours(0);
today.setMinutes(0);
today.setSeconds(0);
today.setMilliseconds(0);
return today.valueOf();
}
//压缩
function getZeroTs(){var a=new Date;return a.setHours(0),a.setMinutes(0),a.setSeconds(0),a.setMilliseconds(0),a.valueOf()}
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

$('#radio_group_sex input[name="sex"]:checked').val();//效率不高
var volume=$('#select_volume').find('input[name="volume"]:checked').val();//效率高

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
####jq设置radio选中，
```
$('#male').prop("checked",true);
不要用下面的，会出毛病的
$('#male').attr("checked",true);

```
***
####设置 获取元素自定义属性
```
  img.setAttribute('mId','bajianid');
  img.getAttribute('mId');
  //或者 img.attributes['mId'].nodeValue
```

***
####自定义一个select添加器
```
ace chosen update:
$('#select_province').trigger("chosen:updated")

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
