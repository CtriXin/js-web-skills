<?php


/*function eh($errno, $errstr){
    switch ($errno) {
        case E_USER_WARNING:
            # code...
            break;
        
        case E_USER_ERROR:
            # code...
            break;
        
        default:
            # code...
            break;
    }
    echo $errno.$errstr;
}

set_error_handler(eh,E_ALL);
trigger_error('error_msg',E_USER_WARNING);
trigger_error('error_msg2',E_USER_ERROR);
// echo E_USER_WARNING;
*/

// echo 'bajian$id';
// echo fopen('admin.txt','a+');
/*
    //获取素材列表
$url='https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=XmgkPAXD4oRFNQERju7D94svgF5GRG4nY0yc6zvdIwl2wim3Ng_Kkzsg7CEyeq6uRdFLUR9Zg98k1KLPhFj4UqFkU66bIK0qMxSbjdoRB3PDO1PCqORE5DSGUtp61vtdDENgAHAUVE';
$data='{
    "type":"news",
    "offset":0,
    "count":100
}';
echo http_request($url,$data);*/
// var_dump(chr(23));
// echo ord(chr(0x05));
/*
class A 
{
    
    function __construct()
    {
        $this->name='a';
    }

    function show(){
        echo 'my name is '.$this->name;
    }
}

class B extends A
{
    
    function __construct()
    {
        $this->name='b';
    }
}

echo (new B())->name;
echo (new B())->show();
*/

/*
$obj=(object)[];
$obj=(object)null;
var_dump($obj);*/


/*$checkStr='3a';
if (preg_match('/^[0-9]+$/',$checkStr)){
    echo 1;
}
*/
// echo '02:12'<'02:22';

// $a=123; 
// function aa() 
// { 
// Global $a; //如果不把$a定义为global变量,函数体内是不能访问函数体外部的$a的,但是可以定义一个相同的名字$a,此时这个变量是局部变量，等同于C语言的局部变量，只能在函数体内部使用。 
// echo $a; 
// $a++;
// } 
// aa(); 

// echo $a;


/*
class Kirito
{
    
    function __construct()
    {
        $this->name='123';
    }
}

echo (new Kirito())->name;
*/

// $a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
// print_r(array_keys($a,"Highlander"));

// $a =  array(1, 2, 3);foreach ($a as $v){var_dump(current($a));}

// echo "\u{4f60}";//你echo "\u{4f60}";//你
/*
$a=1;
function setA(){
    $a=44;
}
setA();
echo $a;
*/

/*
$arr = array(
    array('num'=>5,'aaa'=>10,'bbb'=>1,'period'=>3),
    array('num'=>10,'aaa'=>10,'bbb'=>1,'period'=>3),
    array('num'=>10,'aaa'=>10,'bbb'=>1,'period'=>3),
    array('num'=>10,'aaa'=>10,'bbb'=>1,'period'=>3),
    array('num'=>15,'aaa'=>10,'bbb'=>1,'period'=>9),
    array('num'=>15,'aaa'=>10,'bbb'=>1,'period'=>9),
    array('num'=>15,'aaa'=>10,'bbb'=>1,'period'=>9),
    array('num'=>15,'aaa'=>10,'bbb'=>1,'period'=>6),
    array('num'=>15,'aaa'=>10,'bbb'=>1,'period'=>6),
    );


$temp =[];
foreach($arr as $item){
    $exist=0;
    $_index=0;
    foreach($temp as $index=>$tempItem){
        if ($tempItem['period']==$item['period']){
            $_index=$index;
            $exist=1;
        } 
    }
    if ($exist) {
        foreach($item as $k=> $v){
            if ($k!='period') $temp[$_index][$k]+=$v;
        }

    }else{
        array_push($temp,$item);
    }

}

print_r($temp);
*/

/*
foreach($arr as $item) {
    list($n, $p) = array_values($item); 
    echo array_values($item);
    $temp[$p] =  array_key_exists($p, $temp) ? $temp[$p]+$n : $n;
}

$arr = array();
foreach($temp as $p => $n)
    $arr[] = array('num'=>$n, 'period'=>$p);

echo "<pre>";
print_r($arr);
echo "</pre>";
*/

// echo 'a'+5;
/*    static $message1 = 'aaaaaa'; 
    echo $message1.'<br>';
    function static_1(&$message1){
        $message1 = 'bbbbb';
    }
    static_1($message1);
    echo $message1.'<br>';
*/
// echo substr('$index',0,1);

/*
switch (true) {
    case -1:
        echo 999;
        break;
    
    default:
        # code...
        break;
    }*/


// echo 0=='';
/*echo ttt();
function ttt(){
    switch ('variable') {
    case 'variable':
       return 123;
        break;
    
    default:
        # code...
        break;
}
return 000;
}
*/
// $arr=(array)'[3,6,8]';
// foreach ($arr as $value) {
//     echo $value.'value';
// }

// session_start();
// echo session_id();
// echo session_name();
/**
     * @param $status,$message,$data
     * getJson 可中文 数组格式化返回json数据，用于常与app通信
     * @return Json str
     */
function getJson($state='',$msg='',$data=''){
    $arr=['state'=>$state,'msg'=>$msg,'data'=>$data];
    return json_encode($arr,JSON_UNESCAPED_UNICODE);
}

// echo getJson(1,'',['list'=>[['id'=>'123','name'=>'八年级九班'],['id'=>'90','name'=>'8年级8班']],'total'=>'100']);

// echo getJson(1,'',['list'=>[['id'=>'123','name'=>'13714876874','password'=>'123456','nickname'=>'陈老师','subject'=>'語文','class'=>[['id'=>'123','name'=>'一年二班']]],['id'=>'99','name'=>'13714876875','password'=>'123456','nickname'=>'劉老師','subject'=>'語文','class'=>[['id'=>'123','name'=>'一年二班'],['id'=>'66','name'=>'一年3班']]]],'total'=>'100']);

// echo getJson(1,'',['list'=>[['id'=>'123','studentID'=>'20100046','name'=>'黄小霞','gender'=>'女','deviceID'=>'123456123456','devicePWD'=>'123456','class'=>['id'=>'123','name'=>'一年二班']],['id'=>'124','studentID'=>'20100047','name'=>'黄大哥','gender'=>'男','deviceID'=>'123456123457','devicePWD'=>'123456','class'=>['id'=>'123','name'=>'一年二班']]],'total'=>'100']);

// echo getJson(1,'',['list'=>[['name'=>'黄小霞','id'=>'20100046','confirm'=>null],['name'=>'黄小霞w','id'=>'20100047','confirm'=>0],['name'=>'黄小霞2','id'=>'20100048','confirm'=>1]]]);
// echo getJson(1,'',['list'=>[['id'=>'1','subject'=>'化学','name'=>'黃老師','phone'=>'13565858651','note'=>''],['id'=>'1','subject'=>'化学','name'=>'黃老師','phone'=>'13565858651','note'=>'']]]);

// echo getJson(1,'',['list'=>[['content'=>'內容','ctime'=>'2016-05-04','id'=>'40','type'=>'放假'],['content'=>'內容','ctime'=>'2016-05-05','id'=>'41','type'=>'家长会']],'total'=>40]);

// echo getJson(1,'',['list'=>[['studentID'=>'1234','studentID'=>'20100047','studentName'=>'黄小霞','absence'=>'0','datetime'=>'2016-05-09 17:41:53'],['studentID'=>'1234','studentID'=>'20100048','studentName'=>'黄da霞','absence'=>'1','datetime'=>null]]]);

// echo getJson(1,'',['list'=>[['action'=>'出','datetime'=>'2016-03-25 17:41:53'],['action'=>'出','datetime'=>'2016-03-25 17:41:53']],'total'=>'100','studentName'=>'黄小霞']);

// echo getJson(1,'',['list'=>[['action'=>'出','datetime'=>'2016-03-25 17:41:53'],['action'=>'出','datetime'=>'2016-03-25 17:41:53']],'total'=>'100','studentName'=>'黄小霞']);

// echo getJson(1,'',['list'=>[['count'=>'1','studentNum'=>'30','name'=>'五（2）班'],['count'=>'1','studentNum'=>'30','name'=>'五（2）班']],'total'=>'100']);

// echo getJson(1,'',['list'=>[['count'=>'1','date'=>'2016-05-09'],['count'=>'1','date'=>'2016-05-08']],'total'=>'100','studentNum'=>'30']);

// echo getJson(1,'',['list'=>[['id'=>'123','teacher'=>['id'=>'66','name'=>'劉老師','phone'=>'13714876874'],'class'=>['id'=>'123','name'=>'一年二班']],['id'=>'123','teacher'=>['id'=>'66','name'=>'劉老師','phone'=>'13714876874'],'class'=>['id'=>'123','name'=>'一年二班']]],'total'=>'100']);

// echo getJson(1,'',['id'=>'888','name'=>'原样返回']);

// echo microtime(true);
// echo PHP_SAPI;
// $cmd='tail -50000 laravel.log|grep 1581477656';
// passthru($cmd);

// echo isset($_GET['date'])&&$_GET['date']?$_GET['date']:date('Y-m-d',$_SERVER['REQUEST_TIME']);


// echo http_request('http://100.98.0.241:9090/test');
// $arr=['a'=>123];
// echo $arr['a1'];
// echo 'finish';

  // echo dirname(__FILE__);
// echo date('Y-m-d',$_SERVER['REQUEST_TIME']-86400*7);

/*
$str = '<img src="images/bottom.jpg" alt="hello" height="324" />sdfasdfasfsa<img src="images/bottom.jpg" alt="hello" height="324" />sadfasdfsafsa   <img src="images/bottom.jpg" alt="hello" height="324" /><img src="images/bottom.jpg" alt="hello" height="324" />';
$isMatched = preg_match_all('/<img(.*?)\/>/', $str, $matches);
var_dump($isMatched, $matches);
*/
// echo 1>2?:0;
//protected 使用
/*
$b=new BaseClass;
$b->get();//报错，不能再实例中引用
class BaseClass 
{


    protected function get(){
        echo 1;
    }
}*/
/*
BaseClass::get();//报错，不能引用
class BaseClass 
{


    protected static function get(){
        echo 1;
    }
}*/
/*
(new BaseClass)->echo1();//ok
class BaseClass 
{
    public function echo1(){
        self::get();
    }
    protected static function get(){
        echo 1;
    }
}*/
/*
test(1);

function test(array $a){
    echo 12;
}*/
// echo PHP_OS;
/*
$path='C:/Users/Administrator.SC-201602221624/Desktop/rand.jpg';
var_dump(getHec($path));
function getHec($path)
    {
        $res = imagecreatefromjpeg($path);
        $size = getimagesize($path);
        $data = array();
        for($i=0; $i < $size[1]; ++$i)
        {
            for($j=0; $j < $size[0]; ++$j)
            {
                $rgb = imagecolorat($res,$j,$i);
                $rgbarray = imagecolorsforindex($res, $rgb);
                if($rgbarray['red'] < 125 || $rgbarray['green']<125
                || $rgbarray['blue'] < 125)
                {
                    $data[$i][$j]=1;
                }else{
                    $data[$i][$j]=0;
                }
            }
        }
        return  $data;
    }*/
/*
echo formatsize(102499999999);
//单位转换
function formatsize($size) 
{
    $danwei=array(' B ',' K ',' M ',' G ',' T ');
    $allsize=array();
    $i=0;

    for($i = 0; $i <5; $i++) 
    {
        if(floor($size/pow(1024,$i))==0){break;}
    }

    for($l = $i-1; $l >=0; $l--) 
    {
        $allsize1[$l]=floor($size/pow(1024,$l));
        $allsize[$l]=$allsize1[$l]-$allsize1[$l+1]*1024;
    }

    $len=count($allsize);

    for($j = $len-1; $j >=0; $j--) 
    {
        $fsize=$fsize.$allsize[$j].$danwei[$j];
    }   
    return $fsize;
}*/

/*
echo memory_usage();//返回当前分配给你的 PHP 脚本的内存量，单位是字节（byte）。
function memory_usage() 
{
    $memory  = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
    return $memory;
}*/
/*echo microtime_float();
function microtime_float() 
{
    $mtime = microtime();
    $mtime = explode(' ', $mtime);
    return $mtime[1] + $mtime[0];
}*/
/*class BaseClass  
{
    
    public $a=1;
    public $age=10;
    function getA(){
        return $this->a;
    }
}
$obj=new BaseClass();
$json=json_encode($obj);
echo $json;
$jsonObj=json_decode($json);
var_dump($jsonObj);
*/

/*function getJson($state='',$msg='',$data=''){
        $arr=['state'=>$state,'msg'=>$msg,'data'=>$data];
        return json_encode($arr,JSON_UNESCAPED_UNICODE);
    }

    echo getJson('1','',['host'=>'123']);*/
// $newfunc = create_function('$a,$b', 'return "ln($a) + ln($b) = " . log($a * $b);');
// echo "New anonymous function: $newfunc\n";//ln(2) + ln(2.718281828459) = 1.6931471805599
// echo $newfunc(2, M_E) . "\n";
// 下面的闭包可读性高点
// $newfunc = function($a,$b){
//     return "ln($a) + ln($b) = " . log($a * $b);
// };
// echo $newfunc(2, M_E) . "\n";

/*
$arrs=null;
$arrs[]=1;
$arrs[]=12;
var_dump($arrs);
*/
// echo sha1('20100030124124103312411241123456Xsk@(R())@201!@6%@');
// echo 1/100;
// echo mt_rand(1000000000,9999999999);
// echo dirname(__FILE__);//F:\
// echo floor(1.9);//1

// echo strval(1100/100);
/*
$str='aandddrrrrrrrrooidddd';
$len=strlen($str);
for ($i=0,$strGet=''; $i <$len; $i++) {
    if ($str[$i]===$str[$i+1]) continue;
    $strGet.=$str[$i];
}
echo $strGet;
*/

/*

//测试回调函数和引用赋值
function callback($cb,&$msg){
    $msg='from callback function';
    call_user_func($cb,$msg);
    sleep(5);
    return;
}

$msg='';
$t=new TestCallback();
callback([$t,'log'],$msg);
echo "my msg=".$msg;

class TestCallback  
{
    
    function log($msg){
        sleep(5);
        echo $msg;
    }
}*/


//     /**
//      * 获取毫秒级别的时间戳
//      */
//       function getMillisecond()
//     {
//         //获取毫秒的时间戳
//         $time = explode ( " ", microtime () );
//         $time = $time[1] . ($time[0] * 1000);
//         $time2 = explode( ".", $time );
//         return $time2[0];
//     }

// echo getMillisecond();

/*
$hostArr=['111','222'];
for ($i=0; $i <count($hostArr) ; $i++) { 
  echo $hostArr[$i];
}*/

/*
for ($i=0; $i <10 ; $i++) { 
    echo "$i ";
    if ($i%2==0) {
        continue;
    }
    echo "\n";
}*/


/*
for ($i=1; $i <10 ; $i++) { 
    echo $i.'年 '. getDogsNum($i,1)."只 \n";
}
function getDogsNum($y,$ini){
    $sum=$ini;
    for ($i=1; $i <=$y ; $i++) {
        if ($i===3||$i===5) {
            $sum++;
            $sum+=getDogsNum($y-$i+1,0);
        }
        if ($i===6) {
            $sum--;
            break;
        }
    }
    return $sum;
}
*/

/*
$str='2134';
$str2='1234';
$str3='0';
if ($str && $str2 && $str3!='') {
    echo '参数完整';
}else{
    echo '参数确实';
}
*/
// echo date('Y-m-d', strtotime('-1 week'));
// echo strtotime('today');
// echo(strtotime("now"));
// echo strtotime('tomorrow');
/*
    $re=json_decode('{"userid":"8lfnep38kgla5kjYSnchsN","name":"999"}');
    echo 000;
    if ($re) {
        echo 1;
    }else{
       echo 9; 
    }
    if (isset($re->msg)) {
        echo 111;
    }else{
        echo 2222;
    }
  if ($re->msg) {
       echo 1000;
    }

    */


/*
$arr=[];
$obj=new stdClass();
$obj->a=122;
$obj->b=2;
$arr['bajian']=$obj;
$obj=new stdClass();;
$obj->a=333;
$obj->b=444;
$arr['bajian2']=$obj;


echo $arr['bajian']->a;
echo $arr['bajian2']->a;

*/
/*
$arr=[];
$arr['bajian']='hgx';
// echo $arr['bajian'];
// echo $arr['bajian1'];
 if (array_key_exists('key',$arr)) {
     # code...
 }*/

/*
$obj=json_decode('{"bajian":"123"}');
if ($obj->bajian) {
    echo $obj->bajian;
}else{
    echo 'undefined';
}
*/
/*
class Obj2 
{

 private $obj1;
 public function __construct()
 {
     $this->obj1= new Obj1();
 }


 public function getObj2()
 {
     return $this->obj1;
 }

 public function showObj2Val()
 {
     return $this->obj1->val;
 }
}

class Obj1 
{
 public $val=1;
}

$obj=new Obj2();
echo $obj->showObj2Val();
$objnew =$obj->getObj2();
$objnew->val=222;
echo $obj->showObj2Val();
if ($objnew===$obj->getObj2()) {
    echo '相等';
}
*/

// echo $_SERVER['HTTP_HOST'];
/*$arr=["type"=>"homework","create_time"=>1234567890,"msg_id"=>123456,"content"=>["subject"=>"语文","content"=>"背诵第一课","to"=>[["userid"=>"123","name"=>"小明"],["userid"=>"456","name"=>"小白菜"]]]];
echo json_encode($arr,JSON_UNESCAPED_UNICODE);*/
/*
$arr=["type"=>"score","create_time"=>1234567890,"msg_id"=>123456,"content"=>["common"=>["subject"=>"语文","noet"=>"aaaa"],"content"=>[["score"=>99,"student_id"=>"123","student_name"=>"小白","userid"=>"XXX"],["score"=>60,"student_id"=>"456","student_name"=>"xx","userid"=>"122"]]]];
echo json_encode($arr,JSON_UNESCAPED_UNICODE);*/

// fZkAIzgxk1hbJvqDWX3sYv

$url='http://bxj.snewfly.com/jxt/push';
// $data='content=%7B%22content%22%3A%2234234%22%2C%22subject%22%3A%22%E8%AF%AD%E6%96%87%22%2C%22to%22%3A%5B%7B%22userid%22%3A%228lfnep38kgla5kjYSnchsN%22%2C%22name%22%3A%22999%22%7D%2C%7B%22userid%22%3A%223GRGRgQ34jk8HbCQjf7kfe%22%2C%22name%22%3A%22999%22%7D%5D%7D&ctime=2%E6%9C%8826%E6%97%A5&msgid=1456475225327964227&type=homework  
// ';
/* $data='{"type":"notice","ctime":1234567890,"msgid":123456,"content":{"from":"语文老师","content":" 明天自习","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":"小明"},{"userid":"456","name":" 小白菜"}]}}';
*/
/*$data='{"content":{"content":"测试","from":"陈老师","to":[{"userid":"3GRGRgQ34jk8HbCQjf7kfe","name":"cly"}]},"ctime":"2月26日","msgid":"1456477836013944323","type":"notice"}';*/
// $data='{"type":"score","ctime":1234567890,"msgid":123456,"content":{"common":{"subject":" 语文","note":"期中考试"},"content":[{"score":99,"student_id":"123","student_name":" 小白","userid":"3GRGRgQ34jk8HbCQjf7kfe","note":"考的真好，继续努力"},{"score":60,"student_id":"456","student_name":"xx","userid":"122","note":"BBB"}]}}';
/*
$data='{"type":"term_begin","ctime":1234567890,"msgid":123456,"content":{"id":123,"from":"陈小明老师","content":"开学前，请家长监督孩子完成假期作业","time":"几月几号几点啊","school":" XXX小学，没有留空但字段要有","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":"小明"},{"userid":"456","name":"小白菜"}]}}';*/
/*$data='{"type":"meeting","ctime":1234567890,"msgid":123456,"content":{"id":123,"from":" 陈 小明 老师","content":"请各位家长带上孩子的成绩单、班会费到现场","time":" 几月几号 几点 啊","room":" 一年 二班","school":" XXX  小学，没有留空但字段要有","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":" 小明"},{"userid":"456","name":" 小白菜"}]}}';*/
/* $data='{"type":"exam","ctime":1234567890,"msgid":123456,"content":{"id":123,"from":" 陈 小明 老师","content":"我校期末考试将于以上时间举行，请各位家长监督孩子做好准备","subject":" 语文","time":" 几月几号 几点 啊","room":" 一年 二班","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":" 小明"},{"userid":"3GRGRgQ34jk8HbCQjf7kfe","name":" 小白菜"}]}}';*/

/*$data='{"type":"holiday","ctime":1234567890,"msgid":123456,"content":{"id":123,"from":"XX 1 老 师","content":" 由于受台风影响，于下周二、下周三期间放假","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":" 小明"},{"userid":"456","name":" 小白菜"}]}}';*/
/*$data='{"content":{"content":"333\r\n4444","subject":"数学","to":[{"userid":"fZkAIzgxk1hbJvqDWX3sYv","name":"999"}]},"ctime":"2月29日","msgid":"1456729025743696879","type":"homework"}';*/


$data='{"type":"score","ctime":1234567890,"msgid":123456,"content":{"common":{"subject":" 语文","note":"aaaa"},"content":[{"score":99,"student_id":"123","student_name":" 小白","userid":"fZkAIzgxk1hbJvqDWX3sYv","note":"BBB"},{"score":60,"student_id":"456","student_name":"xx","userid":"122","note":"BBB"}]}}';
// echo http_request($url,$data);


/*$endTs=;
$beginTs=$_SERVER['REQUEST_TIME']-86400*7;

$end_date=date('Y-m-d',$endTs);
$begin_date=date('Y-m-d',$beginTs);
echo $begin_date.$end_date;*/
/*
echo urldecode('fromUser=2016011901&fromUserNick=%E6%B5%8B%E8%AF%95&toUser=cDMWR5-ZQHja1nmPqgjT2f%2C5DPbNDfEk-N9QJEyi975v7%2Cah10Zbhnkod8rKOYcsSKCX%2C3GRGRgQ34jk8HbCQjf7kfe%2C3-1jsvenkW9bdrQV2PjxQs%2CfZkAIzgxk1hbJvqDWX3sYv%2C6T-xwIBYAIQai1NF4smvHS&timestamp=1456140971&nonce=8662303355&msgId=5560&msgName=%E4%BD%8E%E7%94%B5%E9%87%8F%E9%80%9A%E7%9F%A5&msgType=feedback&msgContent=2016011901%20%E5%89%A9%E4%BD%99%E7%94%B5%E9%87%8F%E4%BD%8E%E4%BA%8E%2033%25%20%EF%BC%81&signature=f5ba2d9e3a79552d4cfe9e2a7d5ee0f70559b470');*/
/*
// echo file_exists('admin.txt');
// echo filesize('adm1in.txt');
if (filesize('admin.txt')) {
   echo 1;
}
echo 0;*/
/*
$info='{"subscribe":1,"openid":"oPi91v8n9PZYDedIOfxlAXHFuPV8","nickname":"bajian","sex":0,"language":"zh_CN","city":"深圳","province":"广东","country":"中国","headimgurl":"http:\/\/wx.qlogo.cn\/mmopen\/VNDQtnw16icJ64ibTNq3bK4ibmV2XxicicZiadFyibxicbkfkEvHY1OnjdPHicRl2vkvvQlQqU27eTLZMPQVWTIjGjeibgE20JNvIojaz9\/0","subscribe_time":1453879318,"remark":"","groupid":0}';
    if (strpos($info,'subs')) {
    echo 1;
    }
*/
/*
$arr=[];
for ($i=0; $i <10 ; $i++) { 
    array_push($arr,$i);
}

print_r($arr);

foreach ($arr as $value) {
   echo $value;
}*/
// echo urlencode('&');

/*$str='{"code":200}';
if (strpos($str,'"code":200')) {
    echo 1;
}*/
// echo sqrt(1280*1280+720*720)/5.5;
// echo sqrt(1080*1080+1920*1920)/5/160;
/*$a=1;
$b=2;
echo $a.$b;
*/

/*
$userIdArr=explode(',','$userId');
print_r($userIdArr);
*/

// print_r([1]);

// $arr=['type'=>'bxj','msgId'=>'123','fNick'=>'小明','fromUser'=>'123','toUser'=>'123'];
// echo json_encode($arr);

/*$arr=[];
for ($i=0; $i <5 ; $i++) { 
    $arr[]=$i;
}
print_r($arr);
*/

/*
class ClassName1
{
    
    function __construct()
    {
        # code...
    }

}

$c=new ClassName1();
testGetArgs('aaa',1,$c);

function testGetArgs($a,$b){
    print_r(func_get_args());
}
*/

// echo 1+1;
/*
for ($i=1; $i <10 ; $i++) { 
    for ($j=1; $j <= $i; $j++) { 
        echo " $j*$i=".$i*$j;
    }
    echo "\n";
}*/
// $string = '{"code":"S000000","msg":"操作成功","data":[{"deviceId":"5142521630344243c400003222840507","words":800,"pages":2,"timecost":120,"warning":2,"ts":"2015-12-19 14:40:52"},{"deviceId":"5142521630344243c400003222840507","words":1200,"pages":3,"timecost":120,"warning":3,"ts":"2015-12-20 10:32:01"}],"extra":""}';
// $pattern = '/(\d+-\d+)-\d\d( \d\d:\d\d:\d\d)/i';
// $replacement = '';
// echo preg_replace($pattern, ['',,''], $string);

// echo date('Y-m',$_SERVER['REQUEST_TIME']);
 // $re='{"code":"S000000","msg":"","data":{"userId":"8XJTiPTdk379h74dd1nGOc","userName":"13760270043","userPhone":"13760270043","tokenList":[{"token":"EI1BCEgOFhG56eW5R7Z/mGvQ1rJ4WHSM4MxvxDdc4mv6UBVUcIXWZmlHPBXYCTFfX+LSYUnpFjbBV0nVLNM7oNf+bgbeU6mkA9nnRL17AFadQ/LRPNxd9qs6Yuu3/jf/","id":"S003_8XJTiPTdk379h74dd1nGOc","type":"S003"},{"token":"7FMaTTE529p+UHzDyxeSPO5MD68FMa1I/PnFkhSeS844/I1aGqeuqHEvUEdtVVHT1OQGRnla0XDI6HoY3JM9TLx/HODORSzzDbUEsPjNxDUeXIRzdKFvig==","id":"S002_8XJTiPTdk379h74dd1nGOc","type":"S002"}],"timestamp":"2015-12-14 16:09:05.0","msg":null},"extra":""}';
//  $re='{"code":"S000000","msg":"","data":[{"deviceId": "5525afasdff","name":"小明","nick":"爸爸","btn":"F","version":"v1.0","model":"","admin":"Y"},{"deviceId": "5525afasdff2","name":"小明","nick":"妈妈","btn":"F","version":"v2.0","model":"","admin":"N"}]}';
// $obj=json_decode($re);
// foreach ($obj->data as $key => $value) {
//        echo $value->deviceId;
//    }   

// echo $_SERVER['REQUEST_TIME'];
// print_r(json_decode('{"code":"S000000","msg":"","data":[{"deviceId": "5525afasdff","name":"小明","nick":"爸爸","btn":"F","version":"v1.0","model":"","admin":"Y"},{"deviceId": "5525afasdff2","name":"小明","nick":"妈妈","btn":"F","version":"v2.0","model":"","admin":"N"}]}'));
/*
 $a=fgets(STDIN);//接收键盘数据
 echo $a;*/
// $arr=explode(',','A,B,C');
// print_r($arr);
// echo md5('123456');
// echo strlen('arPWQFSAxVeYeuwhCXIqJOFK7UDjt+sd/8o8S5o9u2LglQJ2v7tQ+SN5dGUfT/0+AvbeaPeIkrU235z1ewVb6coIx9WNBpAX6gIIvvAkTx7ZrjXPtfr90vX3uPU3cMGT');
// echo strtotime('2015-12-02 21:07:32');
// $obj=json_decode('{"code":"S000000","msg":"登陆成功", "data":{"timestamp":"","userName":"aa","token":{"token":"ss1232#%3322"},"userPhone":"123334355454","userId":"11111"}} ');
// print_r($obj);
// echo $obj->data->token->token;

/*$token='gLpP5PLrqKF43jLRiZL3z9y2ZAX23PsPTytpa0_Qc3VnFXv6sas09T0Z_w7YhB_GnZv1xzLgOu_XHhjfovdAMWWQNsZaLh1l-7xjSpB1NSQFLPbADAWCG';
$url="https://api.weixin.qq.com/merchant/order/getbyfilter?access_token=".$token;
$data='{
"aaa": 2
}
';*/
// {"status": 2, "begintime": 1397130460, "endtime": 1397130470}
/*        DB::insert("INSERT INTO  `in_lamp`.`order` (`order_id` ,`status` ,`total_price` ,`order_create_time` ,`express_price` ,
            `buyer_openid` ,`buyer_nick` ,`product_id` ,`product_name` ,`product_count` ,`trans_id` ,`product_price` ,
            `create_time` ) VALUES (
            '$arr->order_list[$i]->order_id',  '$arr->order_list[$i]->order_status',  '$arr->order_list[$i]->order_total_price'
            , '$arr->order_list[$i]->order_create_time' ,  '$arr->order_list[$i]->order_express_price',  '$arr->order_list[$i]->buyer_openid'
            ,  '$arr->order_list[$i]->buyer_nick',  '$arr->order_list[$i]->product_id',  '$arr->order_list[$i]->product_name'
            ,  '$arr->order_list[$i]->product_count',  '$arr->order_list[$i]->trans_id',  '$arr->order_list[$i]->product_price', 
            CURRENT_TIMESTAMP )");*/
// $re= http_request($url,$data);
// $arr=json_decode($re);
// echo $count=count($arr->order_list);
// echo $arr->order_list[0]->order_id;
// print_r($arr);
// echo strlen('p4ugXtwIUI8jnAZ2Um5FGIIUalZg');
// {"errcode":0,"errmsg":"ok","order_list":[{"order_id":"13193269691166843664","order_status":3,"order_total_price":19900,"order_create_time":1448778724,"order_express_price":0,"buyer_openid":"o4ugXt3_o0dmW5PYP6SE_YG0CLRM","buyer_nick":"沈沾俊","receiver_name":"沈沾俊","receiver_province":"广东省","receiver_city":"深圳市","receiver_address":"龙翔大道663号汇和大厦9A","receiver_mobile":"15999548201","receiver_phone":"15999548201","product_id":"p4ugXtwIUI8jnAZ2Um5FGIIUalZg","product_name":"小天使儿童智能手表","product_price":19900,"product_sku":"","product_count":1,"product_img":"http:\/\/mmbiz.qpic.cn\/mmbiz\/IIicKGknxDvnHxECxdzXJDMsCelf80hj6Qp3ka5ew3BbxMyQ4hBA3TSFrmARmZXQKPd0Be4BSib9FUJAEk6fIZfQ\/0?wx_fmt=jpeg","delivery_id":"","delivery_company":"","trans_id":"1003290319201511291821269269","receiver_zone":"龙岗区","receiver_zip":"518172"}]}


/*$nameArr=['刘挺','徐文慧','刘滨洲','柴有林','张福祥','何志兰','张莹','叶海媚','左宽','张兆缘','孙康','吴秉桦','骆聪'
                  ,'黄荣登','洪培昇','陈丽榆','王劼','姜川','余卓晋','摆东雪','陈曼曼','叶晓鹏','赖景少','陈家汤','赖伟宏','吴哲佳','胡健聪','郑超锴'];
                  echo count($nameArr);*/
// echo array_key_exists(0,['1234']);

// $peoples=array('xm'=>'name','xb'=>'sex','mz'=>'nation','cs'=>'birth'); 
// print_r(array_splice($peoples, 1)); 
// foreach ($peoples as $key => $value) {
//     echo $key .'->'.$value.';';
// }

// $arr=['aaa'=>'222','234'=>444];
// echo $arr[0];

// echo json_encode(['aaa'=>'bbb']);
/*
$arr=json_decode('{
    "IMEIs": "123456789101112,123456789101113",
    "fields": {
        "work_model": 0,
        " domain": "xxx.xxx.com,6680",
        "apn": "cnnet,cnnet,cnnet",
        "password": "123456",
        "interval": 2,
        "emergency_number": "12345678910,12345678911,12345678912",
        "quick_dial": "12345678910,12345678911,12345678912,12345678913",
        "monitor_phone": "12345678910,12345678911,12345678912",
        "language": "1,-8",
        " rail ": "1,1",
        "flag_heart_rate ": 1,
        "flag_step_calculation": 1,
        "flag_bluetooth": 1,
        "flag_fall_off ": 1,
        "ring": 3,
        "volume": 6,
        "flag_voice": 1,
        "limit ": "等待巨火协议确定"
    }
}');
print_r($arr);*/
// insert into users (name,group_id,nickname)values('o4ugXt10ri2fLCxRvFwztaIbcwGk',1,'豪豪妈'') 
  // echo addslashes("豪豪妈'");
  /**
  * session突然失效，测试原因中。ps查出事xml解析后的obj导致
  * @return json
  */
/*  public function Tsession(){
     if (array_key_exists('card_userId',$_SESSION)){
      Log::info('$_SESSION[card_userId]-'.$_SESSION['card_userId']);
      return 'has'.$_SESSION['card_userId'];
     }else{
      // Log::info('no $_SESSION[card_userId]-');
      $_SESSION['card_userId']=mt_rand(1,22222);
      return 'set session='.$_SESSION['card_userId'];
     }

 }*/


    /**
     * 测试mongodb基本操作
     * @return string
     * author hgx
     */
    // public function mg(){

      // $user=DB::table("test")->where('name', 'John')->first();
    // dd($user);
    /*查
      $user = DB::connection('mongodb')->collection('test')->where('test','>', 0)->first();
      echo $user['test'];*/
    // 增
/*      $re=DB::connection('mongodb')->collection('test')->insert(
        ['email' => 'john@example.com', 'votes' => 0]
        );
        echo $re;//1finish*/
    /*增多
        $re=DB::connection('mongodb')->collection('test')->insert([
            ['email' => 'taylor@example.com234', 'votes' => 0],
            ['email' => 'dayle@example.com222', 'votes' => 0]
        ]);
        echo $re;//还是//1finish*/
      /* update 改
        $re=DB::connection('mongodb')->collection('test')->where('test', 100)->update(['votes' => 1,'test'=>99]);
        echo $re;  //1finish */
         //简便的增加减少decrement
        /*$re=DB::connection('mongodb')->collection('test')->where('test', 99)->increment('votes' , 5);
        echo $re; */
        /*删除
        $re=DB::connection('mongodb')->collection('test')->where('test', 2)->delete();
        echo $re; //1finish*/
        // return 'finish';
      // }

  /**
  * test_timer,报错 'swoole_timer_after(): async-io must use in cli environment.'
  * @return json
  */
/*      public function test_timer()
      {
        //3000秒后执行此函数
      swoole_timer_after(30000, function () {
          echo "after 30000ms.\n";
        });
      Log::info("after message");
  }*/

/*
$arr=json_decode('{
    "errcode": 0,
    "errmsg": "ok",
    "data": {
        "123456789101112": {
            "status": 0,
            "work_model": 0,
            " domain": "xxx.xxx.com,6680",
            "apn": "cnnet,cnnet,cnnet",
            "password": "123456",
            "build_in_domain": "xxx.xxx.com,6680",
            "interval": 2,
            " quick_dial": "12345678910,12345678911,12345678912,12345678913",
            "monitor_phone": "12345678910,12345678911,12345678912",
            "language": "1,-8",
            "location_zh": "深圳市南山区南山大道2002 号",
            " rail ": "1,1",
            "flag_heart_rate ": 1,
            "last_heart_rate": "40,201411041637",
            "last_heart_calculation": "40,201411041637",
            "flag_fall_off ": 1,
            "ring": 3,
            "volume": 6,
            "flag_voice": 1
        },
        "123456789101113": {
            "status": 0,
            "work_model": 0,
            " domain": "xxx.xxx.com,6680"
        }
    }
}');*/
// print_r($arr->data->{'123456789101112'});
// $arr=json_decode('{
//     "IMEI": "123456789101112,123456789101113",
//     "fields": {
//         "ALL": {
//             " domain": "xxx.xxx.com,6680",
//             "apn": "cnnet,cnnet,cnnet",
//             "password": "123456",
//             "interval": 2,
//             "quick_dial": "12345678910,12345678911,12345678912,12345678913",
//             "monitor_phone": "12345678910,12345678911,12345678912",
//             "language": "1,-8",
//             " rail ": "1,1",
//             "flag_heart_rate ": 1,
//             "flag_step_calculation": 1,
//             "flag_bluetooth": 1,
//             "flag_fall_off ": 1,
//             "ring": 3,
//             "volume": 6,
//             "flag_voice": 1
//         }
//     }
// }');

// print_r($arr);
// echo substr('158', 8);

// $ekey='158';
// $ekey-=100;
// echo $ekey;

// echo strlen('1234');
// echo strlen('9.5BTC单子，转我0.05BTC,立即给您点拒绝支付,重新匹配。今天不打我会点已付款并上传PS截图与您纠缠，最少耽误您10天以上赚钱时间。0.05不足您半天利息，理智选择。只限今天，打款1BTRTEJ8gPVeUbyRgue8XyjttJJLhD6yHa');
// echo strlen('13.53BTC单子，转我100块,我点拒绝支付,重新匹配.22点前不打我会上传PS截图与您纠缠，耽误您10天以上赚钱时间,还可能丢失本金.已有成功骗mmm获得本金例子.100块不足您半天利息,平台不安全,比特币动荡大,理智选择.支付 宝619089771@139.com,黄爱玉');
/*if ('3'=='1') {
    echo  '??';
}
echo '22';*/

// echo strlen('yougouwuliaode');
// echo strtr('HuAng', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz') ;
// $str = "kan ni men shuo ying wen hao ci ji a, fan zhengwokanbudong,woyebupaheiangengbupayazi";
// $new_arr=preg_split("/e/",$str);
//     print_r($new_arr);

// echo strtotime(-1);
/*$str='这是内容这是内容这是内容  ￥yunqiandai:1234567890￥  下载链接: http://www.bajinshe.com';
$re='';
preg_match('#￥([\s\S]*?)￥#',$str,$re);
print_r($re);*/
/*
for($i=1;$i<=9;$i++)
{
for($j=1;$j<=$i;$j++)
{
echo "$i*$j=".$i*$j.' ';
}
echo "\n";
}

echo trim('{"create_time":"1445933899","msg":"Qqq","name":"bajian","msg_type":0}');
*/// $people = array("Peter", "Joe", "Glenn", "Cleveland");
// foreach ($variable as $key => $value) {
//     # code...
// }
// http://lamp.snewfly.com/card_msgcenter


    // $url='http://lamp.snewfly.com/card_msgcenter';
    // $timestamp=time();
    // $nonce=mt_rand(888,9999999);
    // $signature=getSignature('12345','543211',$timestamp,$nonce);
    // $data=arrayToString(['fromUser'=>'12345','toUser'=>'543211','timestamp'=>$timestamp,'nonce'=>$nonce,'signature'=>$signature]);
    // echo http_request($url, $data);


    // $url='http://lamp.snewfly.com/card_sign';
    // $timestamp=time();
    // $nonce=mt_rand(888,9999999);
    // $signature=getSignature('12345',$timestamp,$nonce);
    // $data=arrayToString(['cardId'=>'12345','timestamp'=>$timestamp,'nonce'=>$nonce,'signature'=>$signature]);
    // echo http_request($url, $data);


function getSignature($cardId,$timestamp,$nonce)
{
        // 对字符串进行hash1加密 考勤
    $secret = 'we232*2amk%hgx';
    $str = sha1($cardId.$timestamp.$nonce.$secret);
    echo("fromUser: $fromUser| timestamp: $timestamp | nonce: $nonce |signature: $str");
    return $str;
}

    // function getSignature($fromUser,$toUser,$timestamp,$nonce)
    // {
    //     // 对字符串进行hash1加密
    //     $secret = 'snpafs*1n2oz';
    //     $str = sha1($fromUser.$toUser.$timestamp.$nonce.$secret);
    //     echo("fromUser: $fromUser | toUser: $toUser | timestamp: $timestamp | nonce: $nonce |signature: $str");
    //     return $str;
    // }

function arrayToString($arr){
    $str='';
    foreach ($arr as $key => $value) {
        $str.=$key.'='.$value.'&';
    }
    if ($str!='') {
        $str=substr($str,0,strlen($str)-1);
    }
    echo $str;
    return $str;
}

function http_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}


/*
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
*/

// echo md5('appkey=85eb6835b0a1034e&pagesize=50&tid=107&ts=1444872575&ver=22ad42749773c441109bdc0191257a664');
// echo date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);//
// $_SERVER['REQUEST_TIME']
/*
$str='{"code":0,"list":{"0":{"aid":"3025715","typeid":33,"title":"\u301010\u6708\u3011\u6a31\u5b50\u5c0f\u59d0\u7684\u811a\u4e0b\u57cb\u7740\u5c38\u4f53 01\u3010bilibili\u6b63\u7248\u3011","pic":"http:\/\/i1.hdslb.com\/video\/ca\/caaa11e260006a200acddd574187b8dd.jpg","play":"221886","video_review":"9006","author":"\u642c","copyright":"Copy","typename":"\u8fde\u8f7d\u52a8\u753b","subtitle":"","review":1443,"favorites":3477,"mid":928123,"description":"01 \u7231\u9aa8\u6210\u75f4\u7684\u5c0f\u59d0","create":"2015-10-07 19:03","credit":0,"coins":447,"duration":"23:34","online":4594},"1":{"aid":"3025695","typeid":33,"title":"\u301010\u6708\u3011\u6211\u88ab\u7ed1\u67b6\u5230\u8d35\u65cf\u5973\u6821\u5f53\u5eb6\u6c11\u6837\u672c 01\u3010bilibili\u6b63\u7248\u3011","pic":"http:\/\/i0.hdslb.com\/video\/5d\/5d2bf16a4f77b983c288919d60dd6c07.jpg","play":"280869","video_review":"20998","author":"\u642c","copyright":"Copy","typename":"\u8fde\u8f7d\u52a8\u753b","subtitle":"","review":2784,"favorites":3428,"mid":928123,"description":"01 \u6b22\u8fce\u4f60\u5eb6\u6c11","create":"2015-10-07 19:00","credit":0,"coins":443,"duration":"24:01","online":3275}}}';
$list=json_decode($str)->list;
echo $list->{0}->aid;
echo $list->{1}->aid;
*/
/*$str='"0":{"aid":"3025715","typeid":33,"title":"\u301010\u6708\u3011\u6a31\u5b50\u5c0f\u59d0\u7684\u811a\u4e0b\u57cb\u7740\u5c38\u4f53 01\u3010bilibili\u6b63\u7248\u3011","pic":"http:\/\/i1.hdslb.com\/video\/ca\/caaa11e260006a200acddd574187b8dd.jpg","play":"221886","video_review":"9006","author":"\u642c","copyright":"Copy","typename":"\u8fde\u8f7d\u52a8\u753b","subtitle":"","review":1443,"favorites":3477,"mid":928123,"description":"01 \u7231\u9aa8\u6210\u75f4\u7684\u5c0f\u59d0","create":"2015-10-07 19:03","credit":0,"coins":447,"duration":"23:34","online":4594},"1":{"aid":"3025695","typeid":33,"title":"\u301010\u6708\u3011\u6211\u88ab\u7ed1\u67b6\u5230\u8d35\u65cf\u5973\u6821\u5f53\u5eb6\u6c11\u6837\u672c 01\u3010bilibili\u6b63\u7248\u3011","pic":"http:\/\/i0.hdslb.com\/video\/5d\/5d2bf16a4f77b983c288919d60dd6c07.jpg","play":"280869","video_review":"20998","author":"\u642c","copyright":"Copy","typename":"\u8fde\u8f7d\u52a8\u753b","subtitle":"","review":2784,"favorites":3428,"mid":928123,"description":"01 \u6b22\u8fce\u4f60\u5eb6\u6c11","create":"2015-10-07 19:00","credit":0,"coins":443,"duration":"24:01","online":3275';
print_r($obj);*/
// print_r($list);

// $map=unserialize($list);
// print_r($map);
// echo $list;

/*$str='<?xml version="1.0" encoding="utf-8"?> <IBABY><Response><Status><Code>200</Code>
</Status><SessionId>e4f5be17ed9ab0906d533fbc5e0c33c0</SessionId><UserId>121541</UserId></Response></IBABY>';
*/
/*$str='<?xml version="1.0" encoding="utf-8"?> <IBABY><Response><Status><Code>200</Code>
</Status><UserTerminalList><UserTerminal><TerminalId>398339</TerminalId><NickName>398339</NickName><Gender>1</Gender><PhoneId>00030012161926005</PhoneId><Icon>icon1.jpg</Icon><Mobile></Mobile><IsOwner>1</IsOwner><SoftVersion>C88N-G-I-01</SoftVersion><PublicName><![CDATA[]]>
</PublicName></UserTerminal></UserTerminalList></Response></IBABY>';
$xmlObj = simplexml_load_string($str);
// echo $xmlObj;
print_r($xmlObj->Response->UserTerminalList->UserTerminal->TerminalId);*/
// echo $xmlObj->Response->Status->Code;
// echo $xmlObj->Response->UserTerminalList->UserTerminal->TerminalId;

// echo date('Y-m-d',time());
/*
echo strpos('../../../../../../../../windows/win.ini','../'); 
if (strpos('../../../../../../../../windows/win.ini','../')!==false) {
    echo 'qq11';
}*/


$data=createTemplate('ok7q-s8TymddxP1qnbSoqAa0xWMw','Xnp4rfmm-ZQcJ7Ed-TH1kq38sNDzPFYgNUfmwbSYv1I',
    '亲爱的用户，您的服务状态发生变更','帮我买包米','开始执行','请耐心等待');

// echo $data;


    /**
    *返回协议模式的模板消息
    *@param touser 欲发送给目标openid
    *@param template_id 模板id
    *@param url 可空，用户点击消息显示的url
    *@return json
    */
    function createTemplate($touser,$template_id,$first,$Good,$contentType,$remark,$url=''){
        $data=['touser'=>$touser,'template_id'=>$template_id,'url'=>$url,'topcolor'=>'#FF0000',
        'data'=>['first'=>$first,'Good'=>$Good,'contentType'=>$contentType,'remark'=>$remark]];
        return json_encode($data);
    }



// UID Timestamp  Nonce
// echo md5('290D3A2B-FE05-47CF-A382-C8CBC316CD2C14423004824259264611kcurimnfgmkfmfl');
// echo urldecode('%E6%B5%8B%E7%BB%982');
// echo urlencode('爱爱爱');
// echo createXML('1.0','UpdateUserTerminal','xxxxxxxxxx','xxxx',['terminalId'=>'1321','userName'=>'123']);
    /**
    * xml协议生成
    * @return $version 版本
    * @return $action 对应的请求action
    * @return $checkSum 校验 checkSum = MD5Util.MD5(version + action+ loginName + loginPwd);
    * @return $loginName 卡机用户登录名
    * @return $paramArr Param item数组 key=>value.如<Param name="userName">123</Param>就是'userName'=>'123'
    */
    function createXML($version,$action,$checkSum,$loginName,$paramArr){
        $header='<IBABY version="'.$version.'" action="'.$action.'" checkSum="'.$checkSum.'" loginName="'.$loginName.'"><Request>';
        $footer='</Request></IBABY>';
        $body='';
        foreach ($paramArr as $key => $value) {
         $body.='<Param name="'.$key.'">'.$value.'</Param>';
     }
     return $header.$body.$footer;
 }

/*
$data_array = array(
    array(
    'title' => 'title1',
    'content' => 'content1',
        'pubdate' => '2009-10-11',
    ),
    array(
    'title' => 'title2',
    'content' => 'content2',
    'pubdate' => '2009-11-11',
    )
);
$title_size = 1;
 
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
$xml .= "<article>\n";
 
foreach ($data_array as $data) {
$xml .= create_item($data['title'], $title_size, $data['content'], $data['pubdate']);
}
 
$xml .= "</article>\n";
 
echo $xml;

//  创建XML单项
function create_item($title_data, $title_size, $content_data, $pubdate_data)
{
    $item = "<Param>\n";
    $item .= "<title size=\"" . $title_size . "\">" . $title_data . "</title>\n";
    $item .= "<content>" . $content_data . "</content>\n";
    $item .= " <pubdate>" . $pubdate_data . "</pubdate>\n";
    $item .= "</item>\n";
 
    return $item;
}*/

/*$str=urldecode('__VIEWSTATE=%2FwEPDwUJODQwMTkwMDI0D2QWAgIDD2QWAgIJDw8WAh4EVGV4dAX%2BAuW8gOWxleWbveWutuWNjuWNl%2BWMuuWfn%2Bi%2BheWFt%2Bi%2BheWFt%2Ba3seWcs%2BS4reW%2Fg%2BWIm%2BW7uuOAgeW4guWMuui%2BheWKqeWZqOWFt%2BacjeWKoeacuuaehOi%2Bvuagh%2BW7uuiuvuOAgeaui%2BeWvuS6uui%2BheWKqeWZqOWFt%2BWumueCueacjeWKoeacuuaehOinhOiMg%2BOAgeiQveWunuOAiua3seWcs%2BW4guaui%2BeWvuS6uui%2BheWKqeWZqOWFt%2BacjeWKoeeuoeeQhuWKnuazleOAiyjmnI3liqHmnLrmnoTjgIHovoXlhbfkuJPlrrbmjIflr7zljY%2FosIPvvIzlu7rnq4vmnI3liqHmoIflh4bjgIHmrovnlr7kurrmioDog73nm5HnnaPjgIHovoXlhbfmnI3liqHnu5%2ForqHliIbmnpDjgIHmnI3liqHot5%2FouKrjgIHmrovnlr7kurrmnLrliqjova7mpIXovablkI7nu63mnI3liqHnrYnjgIJkZGQtk4nmQcxtnRK%2BKBGbwK1Kb0FOLg%3D%3D&__EVENTVALIDATION=%2FwEWCwLskKn8CwKv7ZLjAQLl%2BMHYDwKMyKKyDALJ2KOJCQKyitGMBwKcq8jDAwLp7Pf3AQKQz6LTDALyuZ%2F%2BAgLJ0sbNDREVXwnTJwfSU9LIjKxX8utIJnCX&nRID=6992893&%E5%AD%90%E9%A1%B9%E7%9B%AEID=6988576&%E6%89%BF%E6%8B%85%E4%BA%BA%E5%91%98ID=6903266%2C6903265%2C6959029%2C6903262%2C6903261%2C6903258%2C6903242%2C6903241%2C6903252%2C6903251%2C6903253%2C6912594%2C6903245%2C6903238%2C6983296%2C6903259%2C6988383%2C6903237%2C6905105%2C6903233&save=%E4%BF%9D%E5%AD%98&%E5%AD%90%E9%A1%B9%E7%9B%AE%E5%86%85%E5%AE%B9=%E5%BC%80%E5%B1%95%E5%9B%BD%E5%AE%B6%E5%8D%8E%E5%8D%97%E5%8C%BA%E5%9F%9F%E8%BE%85%E5%85%B7%E8%BE%85%E5%85%B7%E6%B7%B1%E5%9C%B3%E4%B8%AD%E5%BF%83%E5%88%9B%E5%BB%BA%E3%80%81%E5%B8%82%E5%8C%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E8%BE%BE%E6%A0%87%E5%BB%BA%E8%AE%BE%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E5%AE%9A%E7%82%B9%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E8%A7%84%E8%8C%83%E3%80%81%E8%90%BD%E5%AE%9E%E3%80%8A%E6%B7%B1%E5%9C%B3%E5%B8%82%E6%AE%8B%E7%96%BE%E4%BA%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E6%9C%8D%E5%8A%A1%E7%AE%A1%E7%90%86%E5%8A%9E%E6%B3%95%E3%80%8B%28%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E3%80%81%E8%BE%85%E5%85%B7%E4%B8%93%E5%AE%B6%E6%8C%87%E5%AF%BC%E5%8D%8F%E8%B0%83%EF%BC%8C%E5%BB%BA%E7%AB%8B%E6%9C%8D%E5%8A%A1%E6%A0%87%E5%87%86%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E6%8A%80%E8%83%BD%E7%9B%91%E7%9D%A3%E3%80%81%E8%BE%85%E5%85%B7%E6%9C%8D%E5%8A%A1%E7%BB%9F%E8%AE%A1%E5%88%86%E6%9E%90%E3%80%81%E6%9C%8D%E5%8A%A1%E8%B7%9F%E8%B8%AA%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E6%9C%BA%E5%8A%A8%E8%BD%AE%E6%A4%85%E8%BD%A6%E5%90%8E%E7%BB%AD%E6%9C%8D%E5%8A%A1%E7%AD%89%E3%80%82&%E5%BC%80%E5%A7%8B%E6%97%B6%E9%97%B4=2015-01-01&%E7%BB%93%E6%9D%9F%E6%97%B6%E9%97%B4=2015-12-31&%E9%A1%B9%E7%9B%AE%E5%AE%9E%E6%96%BD%E5%86%85%E5%AE%B9=%E5%BC%80%E5%B1%95%E5%9B%BD%E5%AE%B6%E5%8D%8E%E5%8D%97%E5%8C%BA%E5%9F%9F%E8%BE%85%E5%85%B7%E8%BE%85%E5%85%B7%E6%B7%B1%E5%9C%B3%E4%B8%AD%E5%BF%83%E5%88%9B%E5%BB%BA%E3%80%81%E5%B8%82%E5%8C%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E8%BE%BE%E6%A0%87%E5%BB%BA%E8%AE%BE%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E5%AE%9A%E7%82%B9%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E8%A7%84%E8%8C%83%E3%80%81%E8%90%BD%E5%AE%9E%E3%80%8A%E6%B7%B1%E5%9C%B3%E5%B8%82%E6%AE%8B%E7%96%BE%E4%BA%BA%E8%BE%85%E5%8A%A9%E5%99%A8%E5%85%B7%E6%9C%8D%E5%8A%A1%E7%AE%A1%E7%90%86%E5%8A%9E%E6%B3%95%E3%80%8B%28%E6%9C%8D%E5%8A%A1%E6%9C%BA%E6%9E%84%E3%80%81%E8%BE%85%E5%85%B7%E4%B8%93%E5%AE%B6%E6%8C%87%E5%AF%BC%E5%8D%8F%E8%B0%83%EF%BC%8C%E5%BB%BA%E7%AB%8B%E6%9C%8D%E5%8A%A1%E6%A0%87%E5%87%86%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E6%8A%80%E8%83%BD%E7%9B%91%E7%9D%A3%E3%80%81%E8%BE%85%E5%85%B7%E6%9C%8D%E5%8A%A1%E7%BB%9F%E8%AE%A1%E5%88%86%E6%9E%90%E3%80%81%E6%9C%8D%E5%8A%A1%E8%B7%9F%E8%B8%AA%E3%80%81%E6%AE%8B%E7%96%BE%E4%BA%BA%E6%9C%BA%E5%8A%A8%E8%BD%AE%E6%A4%85%E8%BD%A6%E5%90%8E%E7%BB%AD%E6%9C%8D%E5%8A%A1%E7%AD%89%E3%80%82&%E9%85%8D%E5%A5%97%E7%BB%8F%E8%B4%B9=3%2C450%2C000.00&%E6%89%BF%E6%8B%85%E4%BA%BA%E5%91%98=%E9%BB%84%E8%B7%83%E7%BA%A2%2C%E5%A4%8F%E9%B9%A4%E9%A3%9E%2C%E9%AB%98%E6%B5%B7%E9%9C%9E%2C%E8%B5%B5%E6%9C%88%E9%98%B3%2C%E9%92%9F%E6%B0%B8%E8%83%9C%2C%E5%AD%99%E5%8D%AB%2C%E5%88%98%E8%8E%89%2C%E5%90%95%E5%BB%B6%E5%8F%AF%2C%E8%B5%96%E5%86%AC%E9%9C%9E%2C%E9%AB%98%E4%BC%9A%E6%9D%B0%2C%E7%A8%8B%E5%86%9B%E7%A6%8F%2C%E9%BB%84%E6%B2%B3%2C%E9%99%88%E6%99%93%E5%B8%86%2C%E5%88%98%E7%92%90%E7%92%90%2C%E9%BB%8E%E5%87%AF%E9%B8%BF%2C%E7%8E%8B%E5%AD%A6%E8%BF%9B%2C%E9%99%88%E5%8D%93%2C%E6%9B%BE%E7%A7%80%E6%99%93%2C%E9%87%91%E8%8A%B1%2C%E9%BE%9A%E8%83%BD%E5%BF%A0');
$str=mb_convert_encoding($str,'GB2312','UTF-8');
echo urlencode($str);*/
// $arr=[];
// if ($arr) {
//     echo '?';
// }

/*
$str='44252619480715021234';
echo substr($str,12,6);
if (substr($str,12,6)=='150212') {
   echo 'yes';
}*/
/*// echo count('');
$str=file_get_contents('text.txt');
$pattern='#path=(.*?)\'\'>
(.*?)<span class="listurl" style="vertical-align:middle">(.*?)</span>#';
$re=getPatternResult($pattern,$str);
print_r($re);
// $len=count($re[0]);
// echo $len;

function getPatternResult($pattern,$str) {
    $re='';
    if(preg_match_all($pattern,$str,$re)){
        return $re;
    }
    else{
        return '';
    }
}
*/
/*
Array
(
    [0] => Array
        (
            [0] => <a  target='_self'  href='../compent/Down.aspx?path=D:/server
File/Words/2015/7/b0df6d2c-66d2-4cd9-9256-13fe5ec92c95.doc&SaveName=关于开展“互
联网+政府改革"工作书面调研的函（报告单）.doc''>
                                <span class="listurl" style="vertical-align:midd
le">关于开展“互联网+政府改革"工作书面调研的函（报告单）.doc</span>
            [1] => <a  target='_self'  href='../compent/Down.aspx?path=D:/server
File/Words/2015/7/e0a6b7ab-8cb2-47d2-a640-aa50222d0a22.ceb&SaveName=关于开展“互
联网+政府改革"工作书面调研的函.ceb''>
                                <span class="listurl" style="vertical-align:midd
le">关于开展“互联网+政府改革"工作书面调研的函.ceb</span>
            [2] => <a  target='_self'  href='../compent/Down.aspx?path=D:/server
File/Words/2015/7/663e85e2-18e4-4b1f-8df5-b29fd3fab643.doc&SaveName=关于开展“互
联网+政府改革"工作书面调研的函.doc''>
                                <span class="listurl" style="vertical-align:midd
le">关于开展“互联网+政府改革"工作书面调研的函.doc</span>
        )

    [1] => Array
        (
            [0] => D:/serverFile/Words/2015/7/b0df6d2c-66d2-4cd9-9256-13fe5ec92c
95.doc&SaveName=关于开展“互联网+政府改革"工作书面调研的函（报告单）.doc
            [1] => D:/serverFile/Words/2015/7/e0a6b7ab-8cb2-47d2-a640-aa50222d0a
22.ceb&SaveName=关于开展“互联网+政府改革"工作书面调研的函.ceb
            [2] => D:/serverFile/Words/2015/7/663e85e2-18e4-4b1f-8df5-b29fd3fab6
43.doc&SaveName=关于开展“互联网+政府改革"工作书面调研的函.doc
        )

    [2] => Array
        (
            [0] =>
            [1] =>
            [2] =>
        )

    [3] => Array
        (
            [0] => 关于开展“互联网+政府改革"工作书面调研的函（报告单）.doc
            [1] => 关于开展“互联网+政府改革"工作书面调研的函.ceb
            [2] => 关于开展“互联网+政府改革"工作书面调研的函.doc
        )

)

C:\Users\Administrator\Desktop\个人测试>
*/

// http://61.144.226.89:88/fjoa/System/Web/WorkFlow/compent/Down.aspx?path=D:/serverFile/Words/2015/7/e0a6b7ab-8cb2-47d2-a640-aa50222d0a22.ceb&SaveName=%B9%D8%D3%DA%BF%AA%D5%B9%A1%B0%BB%A5%C1%AA%CD%F8+%D5%FE%B8%AE%B8%C4%B8%EF%A1%B1%B9%A4%D7%F7%CA%E9%C3%E6%B5%F7%D1%D0%B5%C4%BA%AF.ceb
// $str='http://61.144.226.89:88/fjoa/System/Web/WorkFlow/comment/Comment.aspx?Info_nRID=6993961&Control_nRID=1543758&PointID=5&ActiID=3&ActiName=�칫�����&Flow_Inst_nRID=6993960&isEdit=True'
/*
// echo urlencode('测试员');
echo mb_convert_encoding('测试员','GB2312','UTF-8');
$prefix='http://61.144.226.89:88/fjoa/System/Web/WorkFlow/comment/AddComment.aspx?';
$arrData='__EVENTTARGET=dropdownlist2&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=%2FwEPDwULLTEzNDE4Nzk2NTMPZBYCAgMPZBYGAgcPEA8WAh4LXyFEYXRhQm91bmRnZBAVBQnlkIzmhI%2FjgIIM5LiN5ZCM5oSP44CCG%2Bivt%2Bi9rOebuOWFs%2BS6uuWRmOWkhOeQhuOAghLor7flv6vpgJ%2Flip7nkIbjgIIAFQUJ5ZCM5oSP44CCDOS4jeWQjOaEj%2BOAghvor7fovaznm7jlhbPkurrlkZjlpITnkIbjgIIS6K%2B35b%2Br6YCf5Yqe55CG44CCABQrAwVnZ2dnZxYBAgRkAgkPEA8WAh8AZ2QQFQEAFQEAFCsDAWcWAWZkAgoPD2QPEBYBZhYBFgIeDlBhcmFtZXRlclZhbHVlKClZU3lzdGVtLkludDY0LCBtc2NvcmxpYiwgVmVyc2lvbj0yLjAuMC4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPWI3N2E1YzU2MTkzNGUwODkHNjk4NTc4ORYBAgVkZGQanZrrjI8XSEbAvNW7UtLLDvliBA%3D%3D&__EVENTVALIDATION=%2FwEWEAL7lozeCQKHg6DaDwKv7ZLjAQLJ2KOJCQKipfzEAQKgnsXODgL58tcjAr7Uy%2BQKAvqx79wPAszni6YGAty0nOwJAt3fvsQLAr7Uy%2BQKAr3Uy%2BQKAr3Uy%2BQKArbpt%2F8El3JrBzyJn5tO8gqYqlSYX2RE4vw%3D&Leader_nRID=6985789&nRID=-1&Leader_Name=%B2%E2%CA%D4%D4%B1&dropdownlist2=%C7%EB%D7%AA%CF%E0%B9%D8%C8%CB%D4%B1%B4%A6%C0%ED%A1%A3&dropdownlist1=&Content=';

    // $content=post($prefix,$arrData,'ASP.NET_SessionId=zq2z5g2fnc2mnw3i50fun1bl; UserEName=admin; userEName=admin');
    $content='';
    $content=mb_convert_encoding($content,'UTF-8','GB2312');
    // echo $content;
function post($url, $data = '', $cookie = null, $cookiefile = null,$cookiesavepath = null)
    {
        //初始化请求句柄
        $ch = curl_init();
        //参数设置
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36');
        //cookie设置
        if (isset($cookie)) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        //请求cookie设置
        if (isset($cookiefile)){
            if(!is_file($cookiefile))  fopen($cookiefile,'w');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        }
        //设置cookie保存路径
        if(isset($cookiesavepath)) curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiesavepath);
        $resp=curl_exec($ch);
        curl_close($ch);
        return $resp;
    }
*/
/*$content='addUrl="AddComment.aspx?isEdit=True&Info_nRID=6994783&Acti_nRID=14&Flow_Inst_nRID=6994782&Point_nRID=7&Control_nRID=6916859&Acti_Name';
echo str_replace('AddComment.aspx','AddComment',$content);
*/
/*$str="bajian";
echo str_replace('i','b',$str);*/
// select * from messages where create_time>=1440950400 and users_id=32
// echo date('Y-m-d H:i:s',1440950400);
/*$salt='abcdefghijklmnopqrstuvwxyz';
$pwd='snewfly';
// echo md5($pwd.$salt);
echo md5(md5($pwd.$salt).$salt);*/

// $str='WP#111#QJ18';


// echo  substr("ASDFGH",2);
// $str='DGQ';

// if (strtoupper($str)==="DG15") {
//     echo 'in';
// }
// if(strpos(strtoupper($str),'DG')===0 ||strpos(strtoupper($str),'LF')===0 ){
//     echo 'in';
// }

/*if (isset($str[2])) {
    echo '1';
}
echo $str[1];
if ($str[2]>=0&&$str[2]<=5) {
                    echo '99';
                }*/
/*$str="DG1111";
echo substr($str,2,strlen($str));*/

/*$str="INSERT INTO `insert_table` (`datetime`, `uid`, `content`, `type`),";
echo substr($str,0,strlen($str)-1);*/
// echo date('Y-m-d H:i:s',time());
// echo strpos("残疾证号10000","残疾证号");//===0才是
// echo strlen('残疾证号');
// echo substr("残疾证号10000",0,2);

// echo substr("残疾证号10000",strlen('残疾证号'));
/*if (strpos("残疾证号10000","残疾证号")===0) {
    echo substr("残疾证号10000",strlen('残疾证号'));
    echo '找到了';
}else{
    echo '没';
}*/
// echo intval('残疾证号00000');


// echo md5('test');
// echo mt_rand(1,100);
/*
$arr=explode('.', 'abc.txt'); 
echo $arr[0];
echo $arr[1];*/
// 去掉月份前面的0
// echo date('m',time())+0;

/*var obj=eval('{"url":"","userId":"发送人ID","username":"发送人昵称","ts":"1234567890","recordTime":0}');
alert(obj.url);*/
// echo time();
// echo strlen('qS6le6FfSE9j0hCdEr1aq7ctNv12oMHgQXu25FQUTKHnQDWcWpTXf80YxiNAvpkVIW77JNdL1SjRgXViiEBhDUnrXh1kBebBk6Bz7wVaeZZV++mpOXjHqmKm5fc37Dx6');
// echo strlen('T06j+wA57ZE1KDiJ2Wy3ZogyuiHhKWNiGWKYug9BvbMyb+/lVgtnd0i6JTWMtEv0d5Z4bF7bCLJHHhV5LKTtNQ==');
// echo strlen('uKNqP893eCHnyc0aQmHCNU/+GgXfSeNymlUzptUhcYTyqZbj7USxTn7G7jlZP2eOdSP3GPbOmnT6tZnbkRcgfRvnvXlsh7oP7BIE8akBehCIUdPMsl865QgsiURe8jU7');
/*
$re='{"data":[{"rtonken":"ltJzE9Y1f5ElMnfeJNXrK3j9nsG5sY6Y4/9MzEU1maKfnKsQKCiz/tOw0PcEexq/DIQLhL6/5OtX0S8H68aFCA=="}],"extra":"","message":"","status":"000000"}';
                try {
                    $jsonObj=json_decode($re,true);
                    // var_dump(json_decode($jsonObj['data'])) ;
                    $status=$jsonObj['status'];
                    var_dump($jsonObj['data'][0]['rtonken']) ;
                } catch (Exception $e) {
                    
                }*/

/*
$url='http://10.0.0.26:8080/hzsbServer/wechat/login.action';
$data='userPhone=13715375637&password=123456&openId=o4ugXtwanykZPmdiyN4iTA0L6u08';

echo http_request($url, $data);



function http_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
*/
// trait特性
/*trait Hello {
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
$o->sayExclamationMark();
*/
// echo json_encode(['a'=>[]],true);
// echo 2?5:0;

// echo mb_strlen('fgdd1231￥#@F43543543a1e253(112-h', '8bit');
//测试时文件的编码方式要是UTF8  
/*$str='中文a字1符';  
echo strlen($str).'<br>';//14  
echo mb_strlen($str,'utf8').'<br>';//6  
echo mb_strlen($str,'gbk').'<br>';//8  
echo mb_strlen($str,'gb2312').'<br>';//10  
结果分析：在strlen计算时，对待一个UTF8的中文字符是3个长度，所以“中文a字1符"长度是3*4+2=14,在mb_strlen计算时，选定内码为UTF8，则会将一个中文字符当作长度1来计算，所以“中文a字1符"长度是6 .

利用这两个函数则可以联合计算出一个中英文混排的串的占位是多少（一个中文字符的占位是2，英文字符是1）

echo (strlen($str) + mb_strlen($str,'UTF8')) / 2; 
例如 “中文a字1符" 的strlen($str)值是14，mb_strlen($str)值是6，则可以计算出“中文a字1符"的占位是10.

echo mb_internal_encoding(); 
PHP内置的字符串长度函数strlen无法正确处理中文字符串，它得 到的只是字符串所占的字节数。对于GB2312的中文编码，strlen得到的值是汉字个数的2倍，而对于UTF-8编码的中文，就是3倍的差异了（在 UTF-8编码下，一个汉字占3个字节）。
*/
// echo strtotime('today');//10位
// echo time();
/*
error_reporting(E_ALL);  
//example 1  
function increment($var)  
{  
    $var ++;  
}  
$a=1;  
call_user_func('increment', $a);  
echo $a . "\n";  
call_user_func('increment', $a);  
echo $a . "\n";  */
/*//example 2  
class myclass  
{     
    public function getName($name,$sex)  
    {  
        echo "this is myname" . $name."<br>";  
        echo $sex;  
    }  
}  
$classname = "myclass";  
$myname = 'tom';  
$mysex='男';  
call_user_func(array($classname,'getName'), $myname,$mysex);  

*/
/*$decode=json_decode("{'s1':'08:30-09:30','s1Flag':'1','s2':'08:30-09:30','s2Flag':'1','s3':'08:30-09:30','s3Flag':'1','s4':'08:30-09:30','s4Flag':'1','s5':'08:30-09:30','s5Flag':'1','s6':'08:30-09:30','s6Flag':'1','s7':'08:30-09:30','s7Flag':'1','s8':'08:30-09:30','s8Flag':'1','s9':'08:30-09:30','s9Flag':'1','s10':'08:30-09:30','s10Flag':'1'}");
var_dump($decode);*/
// $un=serialize(['1','1','2','3']);
// $arrayName = array('11' => '2' );
// $un=serialize($arrayName);
// echo '$un'.$un;
/*$un=json_decode("{'c':'gCellAddr','imei':'867572010782589','psw':'0000','mcc':'460','mnc':'1','lac':'37120','cid':'42191'}");
var_dump($un);
*/
// echo base64_encode('a');
/*
$a=1;
$b=2;
list($a,$b)=array($b,$a);
echo 'a='.$a.' b='.$b;*/
/*$a='1';
$b=&$a;
echo 'a='.$a.' b='.$b;
$b='2';
echo "\n".'a='.$a.' b='.$b;
*/
/*echo base64_encode('aaaa');
echo base64_decode('aaaa');*/
// echo strlen('gQH47joAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL2taZ2Z3TVRtNzJXV1Brb3ZhYmJJAAIEZ23sUwMEmm3sUw==');
// echo str_replace('aa','bb','stringaaccddwwaajjaajjii');

// echo 'SELECT * FROM users WHERE rong_token!=\'\'';


/*


$array=['1','2','123','1','2','123','1','2','123','1','2','123','1','2','123','1','2','123'];
$arr=array_chunk($array,5);
print_r($arr);
echo count($arr);*/
/*
$i=0;
$i++;
echo $i;*/
// get_json('1000.10'，'','','账号严重违规，已被永久封号')
// echo json_encode(['100010','','','账号严重违规，已被永久封号']);

/*
$str='
<!DOCTYPE html>
<html id="doc" class=" " >
<head >
            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="zh-cn" />
    
    <title> 正则中需要转义的特殊字符小结 百度云 文章 </title>
    
        <meta content="百度云·收藏,书签,笔记" name="keywords"/>
        <meta content="作者： 字体：[增加 减小] 类型：转载 正则表达式中的特殊字符，就是一些有特殊含义的字符，如“*.txt"中的*，简单的说就是表示任何字符串的意思 如果要查找文件名中有＊的文件，则需要对＊进行转义，即在其前加一个\。ls \*.txt。正则表达式有以下特殊字符。需要转义 特别字符 说明 匹配输入字符串的结尾位置。如果设置了 RegExp 对象的 Multiline 属性，则 $ 也匹配 ‘\n&#039; 或 ‘\r&#039;。要匹配 $ 字符本身，请使用 \$。 标记一个子表达式的开始和结束位置。子表达式可以获取供以后使用。要匹配这些字符，请使用 \( 和 \)。 匹配前面的子表达式零次或多次。要匹配 * " name="description"/>
    
    
        <link href="http://s.wenzhang.baidu.com/img/favicon.ico" rel="shortcut icon"  type="image/x-icon" />
        <link href="http://s.wenzhang.baidu.com/img/favicon.ico" rel="icon"  />
    
    
        <link href="http://s.wenzhang.baidu.com/css/pjt/site/page/global.css?v=4461" type="text/css" rel="stylesheet" media="all" />    
    
    <link href="http://s.wenzhang.baidu.com/css/pjt/site/page/detailArticle.css?v=4494" type="text/css" rel="stylesheet" media="all" />
    <script>var __CONF__ = {bdstoken :;</script>
    
        <script src="http://s.wenzhang.baidu.com/js/lib/requirejs/2_1_5.js?v=7940"></script>    
    
</head>
<body id="" class=" " >
    <!--[if IE ]>
        <!--[if lt IE 7]><div class="page is-ie lt-ie9 lt-ie8 lt-ie7"><![endif]-->
        <!--[if IE 7]><div class="page is-ie lt-ie9 lt-ie8"><![endif]-->
        <!--[if IE 8]><div class="page is-ie lt-ie9"><![endif]-->
        <!--[if gt IE 8]><div class="page is-ie"><!--<![endif]-->
    <!--<![endif]-->
    <!--[if ! IE ]><!--><div class="page"><!--<![endif]-->
    

    

    
    

    <div class="article-header">
        <div class="logo" style="height:30px;overflow:hidden;float:left;"><a class="title" href="/"><span>百度云·收藏</span></a></div>
        <div class="qr-code"></div>
        <div class="tools-area __tools clearfix"
            data-key="6955b1a53b05a4d5-1433068183"
            data-is-owner="1"
            data-link=""
            data-title="正则中需要转义的特殊字符小结"
            data-res-src=""
        >
                    <a class="_editBtn edit-btn tools-btn" title="编辑" href="#"><span>编辑</span></a>
                </div>
    </div>


    <iframe src="http://cang.duapp.com/article/content/?uid=85167859&amp;key=6955b1a53b05a4d5-1433068183&amp;is_share=0&amp;expire=1433123771&amp;sign=6b47f6fad6d9f394e84127c37710d0bf" scrolling="auto" frameborder="0" class="pcs-article-iframe __pcsArticleIframe"></iframe>
                    <div class="next-article"><a href="/article/view?key=64790ce9e68c3e3a-1432824840"><span class="label">下一篇: </span><span class="title">Linux下调用so库</span></a></div>
                    <script src="http://s.wenzhang.baidu.com/js/pjt/site/page/detailArticle.js?v=4505"></script>
    

    
    

    

    
';
$re=getStringMiddle($str,'百度云·收藏,书签,笔记" name="keywords"','data-titl');
if ($re) {
    // print_r($re);
    echo $re[0][0];
}

function getStringMiddle($str,$left,$right) {
    $re='';
    $pattern='#'.$left.'([\d\D]*?)'.$right.'#';
    if(preg_match_all($pattern,$str,$re)){
      return $re;
    }
    else{
      return '';
    }
  }
*/
// fopen('深直工通〔2015〕18号 中共深圳市直属机关工作委员会关于对市直机关工委出席市第六次党代表大会代表候选人新增预备人选名单进行公示的通知.ceb','a');
/*$path='D:/serverFile/uploads/6989149/fbd48db2-3ec0-48d8-b6a1-829562d5ef75.ceb&saveName=深直工通〔2015〕18号+中共深圳市直属机关工作委员会关于对市直机关工委出席市第六次党代表大会代表候选人新增预备人选名单进行公示的通知.ceb';
$begin='saveName=';
echo strripos($path,$begin);
echo 'len='.strlen('D:/serverFile/uploads/6989149/fbd48db2-3ec0-48d8-b6a1-829562d5ef75.ceb&');
$benginCut=$begin+strlen($begin);
echo substr($path,$benginCut);*/
/*Object moved to <a href="%2ffjoa%2fDefault.aspx%3fBackURL
* 没登录
*http://61.144.226.89:88/fjoa/System/Web/Index/OAIndex.aspx公告页面
*/
// echo urlencode('/wEPDwUKMTg3NjU0MTkwOWQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFDEltYWdlQnV0dG9uMSg6qpT+lnnRiNHLzQZI1MWZ7Pc9');
/*session_start();

include_once('C:\Users\Administrator\Desktop\szrcatc\app\controllers\Auth.php');
include_once('C:\Users\Administrator\Desktop\szrcatc\app\controllers\Log.php');
Log::setFileName('login.txt');
$name='admin';
$pwd='1';
$ckPath=$name.'.txt';
$re=Auth::OAlogin($name,$pwd,$ckPath);
echo $re;
Log::info($re);
$_SESSION['name']=$name;
echo '<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />        <p4>正在跳转...</p4>';
echo "<script type='text/javascript'>location.href='notice.php';</script>";*/
/*$url='http://61.144.226.89:88/fjoa/default.aspx';
$data='__VIEWSTATE=%2FwEPDwUKMTg3NjU0MTkwOWQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFDEltYWdlQnV0dG9uMSg6qpT%2BlnnRiNHLzQZI1MWZ7Pc9&__EVENTVALIDATION=%2FwEWBAL44NzuDwKvruq2CALmmdGVDALSwpnTCBSYKvxTaxFr7VyW2ihLiODKrvOG&UserName=admin&Pwd=1&ImageButton1.x=0&ImageButton1.y=0';
echo post($url, $data,'','cookie.txt','cookie.txt');
*/

    /**
     * HTTP POST 请求
     * @param string $url 请求地址
     * @param array $data 请求数据
     * @param null $cookie 请求COOKIE
     * @param null $cookiefile 请求时cookie文件位置
     * @param null $cookiesavepath 请求完成的COOKIE保存位置
     * @return string
     * @throws Exception
     */
/* function post($url, $data = array(), $cookie = null, $cookiefile = null,$cookiesavepath = null)
    {
        //初始化请求句柄
        $ch = curl_init();
        //参数设置
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36');
        //cookie设置
        if (isset($cookie)) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        //请求cookie设置
        if (isset($cookiefile)){
            if(!is_file($cookiefile)) throw new Exception('Cookie文件不存在');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        }
        //设置cookie保存路径
        if(isset($cookiesavepath)) curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiesavepath);
        $resp=curl_exec($ch);
        curl_close($ch);
        return $resp;
    }*/
// echo get('http://61.144.226.89:88/fjoa/System/Web/See/List.aspx?Info_nRID=6990039',array(),'','cookie.txt','cookie.txt');

    /**
     * HTTP GET 请求
     * @param string $url 请求地址
     * @param array $data 请求数据
     * @param null $cookie COOKIE
     * @param null $cookiefile COOKIE 请求所用的COOKIE文件位置
     * @param null $cookiesavepath 请求完成的COOKIE保存位置
     * @param bool $encode 是否对请求参数进行 urlencode 处理
     * @return mixed
     * @throws Exception
     */
/*function get($url, $data = array(), $cookie = null, $cookiefile = null,$cookiesavepath = null, $encode = true)
    {
        //初始化句柄
        $ch = curl_init();
        //处理GET参数
        if(count($data)>0){
            $query = $encode?http_build_query($data):urldecode(http_build_query($data));
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $query);
        }else{
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36');
        //设置cookie
        if (isset($cookie)) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        //设置cookie请求文件
        if (isset($cookiefile)){
            if(!is_file($cookiefile)) throw new Exception('Cookie文件不存在');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        }
        //设置cookie保存路径
        if(isset($cookiesavepath)) curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiesavepath);
        //执行请求
        $resp = curl_exec($ch);
        //关闭句柄，释放资源
        curl_close($ch);
        return $resp;
    }*/
// print_r([1]);
// $f=fopen('announce.txt', 'w');
// echo fwrite($f,'这是一个公告');
// fclose($f);
    /**读取一体机公告*/
/*function getAnnounce($fileName){
    if (file_exists($fileName)) {
        $f=fopen($fileName, 'r');
        if ($f) {
            return  fread($f, 1024);
        }

        fclose($f);
    }else{
        echo false;
    }
}*/



// echo json_encode(['aaa'=>time().'']);

/*
$value=['pic'=>'123.jpeg','audio'=>'000.mp3','audio_text'=>'这是什么','id'=>'456'];
$userId='11111';
$content = array('imgURL' => '/'.$value['pic'],
                    'voiURL' => '/'.$value['audio'], 'text' => $value['audio_text'], 'replyId' => $value['id']);

                    $arr = array('content' => $content, 'extra' => 'slfy2014.4');*/

                    // 调用融云接口向相关用户发送消息
               /* $ret = Rongyun::messagePublish($userId, array($value['users_id']),
               'RC:TxtMsg',json_encode($arr));*/
                    // echo json_encode($arr);
/*
// test('1');
// test('2');
// test('3');
test('3222');
function test($num){
    switch ($num) {
        case '1':
        case '2':
           echo '1||2';
            break;
            case '3':
           echo '3';
            break;
        
        default:
            echo 'default';
            break;
    }
}
*/

/*echo date('Y-m-d H:i:s',strtotime('+1 day'))."/n";
echo date('Y-m-d H:i:s',strtotime('tomorrow'))."/n";
echo date('Y-m-d H:i:s',strtotime('today'));*/

/*        $media_id='1123';
        $fromUsername='0000';
        $type='image';
        $typeCon = array('media_id' => $media_id);
        $arr = array('touser' => $fromUsername, 'msgtype' => 'text',$type => $typeCon);
        $postData=json_encode($arr,JSON_UNESCAPED_UNICODE);
        echo $postData;*/

// echo sha1('1255214322796474050839491kcurimnfgmkfmfl');

/*
$string =  
"Lorem ipsum dolor sit amet, consectetur  
adipiscing elit. Nunc ut elit id mi ultricies  
adipiscing. Nulla facilisi. Praesent pulvinar,  
sapien vel feugiat vestibulum, nulla dui pretium orci,  
non ultricies elit lacus quis ante. Lorem ipsum dolor  
sit amet, consectetur adipiscing elit. Aliquam  
pretium ullamcorper urna quis iaculis. Etiam ac massa  
sed turpis tempor luctus. Curabitur sed nibh eu elit  
mollis congue. Praesent ipsum diam, consectetur vitae  
ornare a, aliquam a nunc. In id magna pellentesque  
tellus posuere adipiscing. Sed non mi metus, at lacinia  
augue. Sed magna nisi, ornare in mollis in, mollis  
sed nunc. Etiam at justo in leo congue mollis.  
Nullam in neque eget metus hendrerit scelerisque  
eu non enim. Ut malesuada lacus eu nulla bibendum  
id euismod urna sodales. ";  
$compressed = gzcompress($string);  
echo $compressed;
echo strlen($compressed);
echo strlen($string);*/

//echo serialize(['1',1,2,'3']);  


// 取得所有的后缀为PHP的文件  
//$files = glob('*.php');  
// 取PHP文件和TXT文件  
/*$files = glob('*.{php,txt}', GLOB_BRACE);  
print_r($files);  */

/*
echo get_client_ip();
//取客户端 ip
function get_client_ip()
{
    if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
    } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            }
        }
    return $realip;
}*/

/*
function randomkeys($length)
{
$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ'; //字符池
for($i=0;$i<$length;$i++)
{
$key .= $pattern{mt_rand(1,62)}; //生成php随机数
}
return $key;
}*/

/**文件下载
* @param 
*/
/*function fileDownload($file_path,){
    header("Content-type:text/html;charset=utf-8"); 
// $file_name="cookie.jpg"; 
    // $file_name="圣诞狂欢.jpg"; 
//用以解决中文不能显示出来的问题 

    $file_path=iconv("utf-8","gb2312",$file_path); 
//首先要判断给定的文件存在与否 
    if(!file_exists($file_path)){ 
        echo "没有该文件文件"; 
        return ; 
    } 
    $fp=fopen($file_path,"r"); 
    $file_size=filesize($file_path); 
//下载文件需要用到的头 
    Header("Content-type: application/octet-stream"); 
    Header("Accept-Ranges: bytes"); 
    Header("Accept-Length:".$file_size); 
    Header("Content-Disposition: attachment; filename=".$file_name); 
    $buffer=1024; 
    $file_count=0; 
//向浏览器返回数据 
    while(!feof($fp) && $file_count<$file_size){ 
        $file_con=fread($fp,$buffer); 
        $file_count+=$buffer; 
        echo $file_con; 
    } 
    fclose($fp); 
}*/
// echo date('Y-m-d');


// echo md5('240610708')."\n";
// echo md5('QNKCDZO');
// var_dump(md5('240610708')===md5('QNKCDZO'));


// echo strtotime('-4days');

// echo intval('2015-04-28 21:45:03');
// echo json_encode(['1','2']);//输出["1","2"]


/*$uploadTime = strtotime('today');
echo $uploadTime."\n";*/
// $uploadTime = $uploadTime-86400*7;
// echo $uploadTime."\n";



/*
$a=123; 
function aa() 
{ 
Global $a; //如果不把$a定义为global变量,函数体内是不能访问函数体外部的$a的,但是可以定义一个相同的名字$a,此时这个变量是局部变量，等同于C语言的局部变量，只能在函数体内部使用。 
echo $a; 
} 
aa(); 

总结:在函数体内定义的global变量,函数体外可以使用,在函数体外定义的global变量不能在函数体内使用, 
复制代码 代码如下:

$global $a; 
$a=123; 
function f() 
{ 
echo $a; //错误, 
} 
//再看看下面一例 
function f() 
{ 
global $a; 
$a=123; 
} 
f(); 
echo $a; //正确,可以使用 
*/



// PHP 的引用允许你用两个变量来指向同一个内容
	// $a="ABC";
	// $b =&$a;
 //    echo $a;//这里输出:ABC
 //    echo $b;//这里输出:ABC
 //    $b="EFG";
 //    echo $a;//这里$a的值变为EFG 所以输出EFG
 //    echo $b;//这里输出EFG

/*
function test(&$a)
    {
        $a=$a+100;
    }
    $b=1;
    echo $b;//输出１
    test($b);   //这里$b传递给函数的其实是$b的变量内容所处的内存地址，通过在函数里改变$a的值　就可以改变$b的值了
    echo "<br>";
    echo $b;//输出101*/



// $str='qrscene_10000011';
// echo substr($str, 8);


// echo intval('qrscene_1');

// $arr=[];
// for ($i=0; $i <5 ; $i++) { 
// 	$arr1=['timestamp' => $i, 'type' => '2222', 'score' => '3333'];
// 	array_push($arr, $arr1);
// }
// print_r($arr);



// for ($i=0; $i <$count ; $i++) { 
// 				$arr1= array();
// 				$arr1=['timestamp' => $re[$i]->create_time, 'type' => $re[$i]->operation, 'score' => $re[$i]->score];
// 				array_push($arr, $arr1);
// 			}


// echo date("H",time());
// // 退出登录
// session_start();
// include_once(‘includes/header.php’);
// if (isset($_SESSION[‘user_id’]))
// {
// unset($_SESSION[‘user_id’]);
// session_destroy();

// echo ‘<div align="center">';
// echo ‘<span class="STYLE1″>成功退出！</span><br />';
// echo ‘<p><span class="STYLE1″>正在跳转，请稍等……</span></p>';
// echo ‘<script language="javascript">';
// echo ‘function Jump()';
// echo ‘{ ‘;
// echo ‘ parent.location.href="index.php" ‘;
// echo ‘} ‘ ;
// echo ‘document.onload = setTimeout(“Jump()" , 2 * 1000)';
// echo ‘</script>';
// echo ‘<span class="STYLE1″><a href="index.php">直接返回</a></span><br /><br />';
// echo ‘</div>';
// exit(0);
// }
// else
// {
// echo ‘<span class="STYLE1″>您还没有登录呢！</span>';
// }

// 3.php重定向网页
// // 例如重定向到www.cgsir.com (注意重定向之前不要有html内容)
// header(“location:http://www.phpido.com");
// 或
// echo “<meta http-equiv=’refresh’ content=’0;url=http://www.phpido.com’>";

// strrchr() 函数查找字符在指定字符串中从后面开始的第一次出现的位置，如果成功，则返回从该位置到字符串结尾的所有字符，如果失败，则返回 false。与之相对应的是strchr()函数，它查找字符串中首次出现指定字符的位置。
// 1. 返回文件扩展名
// function getformat($file)
// {
// $ext=strrchr($file,".");
// $format=strtolower($ext);
// return $format;
// }



// 格式化
// $num = 1;
// printf('%04d', $num);





// //不要再循环里计算
// $a=[1,3,4,5,9,45,111,1,1,1,1,1,1,1,1];
// for ($i=0; $i < count($a); $i++) { 
// 	echo $i.' ';
// 	array_shift($a);
// }

// function playVideo($type, $src)
// {
//     echo 'I will watch '.$src;
// }

// function playAudio($type, $src, $artist)
// {
//     echo 'I will listen to '.$artist.'\'s'.$src;
// }

// function play()
// {
//     $args = func_get_args();

//      call_user_func_array( 'play'.$args[0], $args  );
// }

// play('Video','kongfu.rmvb');

// echo " and ";

// play('Audio','love.mp3', 'Jay');



// //奇葩优先级
// $a=$b=$c=0;
// $i=1;
// $a=$i*5 - (--$i);
// $i=1;
// $b=$i+$i - (--$i);
// $i=1;
// $c=$i - (--$i);
// $i=1;
// $d=$i-$i - (--$i);
// echo ' $a='.$a;
// echo ' $b='.$b;
// echo ' $c='.$c;
// echo ' $d='.$d;

// $a=$b=$c=0;
// $i=1;
// $a=$i - (--$i);
// // $b=($i--) - $i;
// // $c=$i---$i;



// //这个固定位数数组比普通的快10-30%
// $array = new SplFixedArray(3); 
// $array[0] = 'dog'; 
// $array[1] = 'cat'; 
// $array[2] = 'bird'; 
// $array->setSize(4); // increase the size on the fly 
// $array[3] = 'mouse'; 
// foreach ( $array as $value ) 
//     echo "[$value],";


 // $sockets  = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
 // var_dump($sockets ) ;//如果成功将返回一个数组包括了两个socket资源，错误时返回FALSE.这个函数在windows平台不可用




// SignalIgnore();//linux 进程中运行，无视关闭命令窗口
// ignore_user_abort(true);
// $pid=pcntl_fork();
// if($pid==-1) {
// 	die('cannot fork');
// }elseif ($pid) {
// 	//parent

// 	// pcntl_wait($status);//父进程没用可以关闭
// 	echo 'parent_id'.getmygid();
// 	echo 'parent_id'.$pid;
// }else{
// 	//child
// 	echo 'child_id'.$pid.'mypid '.getmygid();
// 	echo 'begin';
// 	for ($i=0; $i < 5; $i++) { 

// 		// $f=fopen('fork.txt', 'w+');//这个不好，会清空原有数据
// 		$f=fopen('fork.txt', 'a+');

// 		fwrite($f, $i.time()."\n");
// 		sleep(10);
// 	}
// 	echo 'end';
// }


// function SignalIgnore()
// 	{
// 		pcntl_signal(SIGPIPE, SIG_IGN);
// 		pcntl_signal(SIGTTIN, SIG_IGN);
// 		pcntl_signal(SIGTTOU, SIG_IGN);
// 		pcntl_signal(SIGQUIT, SIG_IGN);
// 		pcntl_signal(SIGALRM, SIG_IGN);
// 		pcntl_signal(SIGINT, SIG_IGN);
// 		pcntl_signal(SIGUSR1, SIG_IGN);
// 		pcntl_signal(SIGUSR2, SIG_IGN);
// 		pcntl_signal(SIGHUP, SIG_IGN);
// 		pcntl_signal_dispatch();
// 	}





// echo "\033[1A\n\033[K-----------------------\033[47;30m WORKERMAN \033[0m-----------------------------\n\033[0m";
// echo Test();
// echo Test();
// echo Test();
// echo Test();
// function Test()
//    {
//    static $w3sky = 0;
//    echo $w3sky;
//    $w3sky++;
//    return $w3sky;
//    }


// if ($a=0) {
// 	echo $a;
// 	echo 'aaa';
// }



// function foobar($arg, $arg2) {
//     echo __FUNCTION__, " got $arg and $arg2\n";
// }
// class foo {
//     function bar($arg, $arg2) {
//         echo __METHOD__, " got $arg and $arg2\n";
//     }
// }


// // Call the foobar() function with 2 arguments
// call_user_func_array('foobar', array('one', 'two'));

// // Call the $foo->bar() method with 2 arguments
// $foo = new foo;
// call_user_func_array(array($foo, 'bar'), array("three", "four"));




// function one($str1, $str2)
//  {
//  two("Glenn", "Quagmire");
//  }
// function two($str1, $str2)
//  {
//  three("Cleveland", "Brown");
//  }
// function three($str1, $str2)
//  {
//  print_r(debug_backtrace());
//  }

// one("Peter", "Griffin");





// echo addslashes('str aa');

// $arr=json_decode('{"errcode":40003,"errmsg":"invalid openid"}',true);
// echo $arr['errcode'];

// imei: 10731 | timestamp: 1428644482 | nonce: 0000000000 | signature: 0ea49d34b81011970e7bf50667679fd4ed7d3e05 [] []
// echo sha1('1073114286450745550000000000kcurimnfgmkfmfl');
//   num_to_avenue('1001');
//     //数据库查询的街道号转换成文字
//    function num_to_avenue($num){
//     $str='1001:翠竹街道\n1002:东湖街道\n1003:东门街道\n1004:东晓街道\n1005:桂园街道\n1006:黄贝街道\n1007:莲塘街道\n1008:南湖街道\n1009:清水河街道\n1010:笋岗街道\n2001:福田保税区\n2002:福田街道\n2003:华富街道\n2004:莲花街道\n2005:梅林街道\n2006:南园街道\n2007:沙头街道\n2008:香蜜湖街道\n2009:园岭街道\n2010:华强北街道\n3001:南山街道\n3002:南头街道\n3003:沙河街道\n3004:蛇口街道\n3005:桃源街道\n3006:西丽街道\n3007:粤海街道\n3008:招商街道\n4001:新安街道\n4002:福永街道\n4003:西乡街道\n4004:沙井街道\n4005:松岗街道\n4006:石岩街道\n5001:坂田街道\n5002:布吉街道\n5003:平湖街道\n5004:横岗街道\n5005:南湾街道\n5006:坪地街道\n5007:龙城街道\n5008:龙岗街道\n6001:海山街道\n6002:梅沙街道\n6003:沙头角街道\n6004:盐田街道\n7001:观澜街道\n7002:大浪街道\n7003:龙华街道\n7004:民治街道\n8001:光明街道\n8002:公明街道\n9001:坪山街道\n9002:坑梓街道\n10001:大鹏街道\n10002:葵涌街道\n10003:南澳街道';
// // var_dump(explode('\n', $str));
// $arr=explode('\n', $str);
// foreach ($arr as $key => $value) {
//   // echo $value.' ';
//   if (strpos($value,$num)===0) {
//     $arr1=explode(':', $value);
//     // echo $value;
//     var_dump($arr1);
//     break;
//   }
// }
//     echo $arr1[1];
//     return $arr1[1];
//   }



// if ((1100/10)==floor('11001'/100)) {
//   echo 'equal';
// }

// echo floor('5014'/100);


// echo '111',"\n";

// file_get_contents() 函数把整个文件读入一个字符串中。file() 函数把整个文件读入一个数组中。


// $path = "/testweb/home.php";
// //显示带有文件扩展名的文件名
// echo basename($path);
// //显示不带有文件扩展名的文件名
// echo basename($path,".php");


// if(!isset($argv[1]))
// {
//    exit("use php test.php \$file_path\n");
// }
// var_dump($argv);


// echo pi();

// echo strlen('<?xml version="1.0" encoding="ISO-8859-1"?
//   <request>
//   <module>user</module>
//   <action>getInfo</action>
//   </request>');

// echo 222&127;

// if ([]) {
// 	echo 'has';
// }

// echo 0+'';

// if (0!=='0') {
// 	echo '!';
// }
// if (0!=='') {
// 	echo '!';
// }


// echo ceil('50'/120);
// echo intval('2015-04-01 09:33:50');
// echo date('Y-m-d',time());
// echo strtotime("today");
// echo time();
// echo time()-strtotime("today");//获取0点到现在的秒数
// $arr=array();
// if ($arr) {
// 	echo '11';
// }else{
// 	echo '2';
// 
// $an=['这是什么验证码','验证码','验证码。','验证码，谢谢','验证码是多少','验证码是什么','这什么验证码','码','我想知道验证码','帮我读验证码','啥验证码','验证码呢','瞧下验证码','验证码帮我看看，谢谢','验证码多少呀','看下什么文字','谢谢','这什么','谢谢~~','帮我看下哈','验证码，多少？','验证马多少','验证码？？','什么字','什么东西','帮俺看下','这是多少呢'];
// echo $an[mt_rand(0,count($an)-1)];

// if (!'') {
// 	echo '!';
// }

