<?php 
/* 
*页面：makeJs.class.php 
*功能：封装常用的JS代码，直接调用，方便操作 
*/ 
class makeJs 
{ 
     private $jsStartChar = '<scrīpt type="text/javascrīpt">';//定义js起始标记  
     private $jsEndChar   = '</scrīpt>';//定义js结束标记 

/* 
*函数名称：jsAlert 
*函数功能：弹出JS提示框 
*参数：$message 要在弹出提示框中显示的文字 $url 点击后跳转的路径，为空则不跳转 
*使用方法： 
*$js = new makeJs();//以下介绍使用方法省略此句 
*$js->jsAlert(显示的文字,'跳转页面URL');//弹出对话框，点击确定后跳转到php.php页面 
*$js->jsAlert(显示的文字,'');//弹出对话框，点击确定后没有跳转 
*/ 
     public function jsAlert($message,$url){ 
        echo $this->jsStartChar; 
        if($url==''){ 
            echo 'alert' . '("' . $message . '");'; 
            echo $this->jsEndChar; 
        } 
        else{ 
            echo 'alert' . '("' . $message . '");'; 
            echo $this->jsEndChar; 
            echo '<meta http-equiv="refresh" c>'; 
        } 
    } 

/* 
*函数名称：jsConfirm 
*函数功能：弹出JS提示框，带确定/取消 
*参数：$message 要在弹出提示框中显示的文字 
*使用方法：$js->jsConfirm('显示的文字'); 
*/ 
     public function jsConfirm($message){ 
        echo $this->jsStartChar; 
        if($url==''){ 
            echo 'confirm' . '("' . $message . '");'; 
            echo $this->jsEndChar; 
        } 
     } 

/* 
*函数名称：jsOpenWin 
*函数功能：弹出新窗口 
*参数：$url 路径 $name 窗口名 $height 窗口高度 $width 窗口宽度 
*使用方法： 
*$url = '页面的URL'; 
*$js->jsOpenWin($url,窗口名,窗口高度,窗口宽度); 
*/ 
     public function jsOpenWin($url,$name,$height,$width){ 
        echo $this->jsStartChar; 
        echo 'window.open'.'("'.$url.'","'.$name.'","'.$height.'","'.$width.'");'; 
        echo $this->jsEndChar; 
     } 

/* 
*函数名称：jsAddscrīpt 
*函数功能：自定义JS 
*参数：$scrīpt 
*使用方法： 
*$scrīpt = '定义的js语句'; 
*例如：$scrīpt = 'window.location=(\'php.php\')'; 
*$js->jsAddscrīpt($scrīpt); 
*/ 
     public function jsAddscrīpt($scrīpt){ 
        echo $this->jsStartChar; 
        echo $scrīpt; 
        echo $this->jsEndChar; 
     } 
} 
?>