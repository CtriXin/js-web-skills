<?php 
/* 
*ҳ�棺makeJs.class.php 
*���ܣ���װ���õ�JS���룬ֱ�ӵ��ã�������� 
*/ 
class makeJs 
{ 
     private $jsStartChar = '<scr��pt type="text/javascr��pt">';//����js��ʼ���  
     private $jsEndChar   = '</scr��pt>';//����js������� 

/* 
*�������ƣ�jsAlert 
*�������ܣ�����JS��ʾ�� 
*������$message Ҫ�ڵ�����ʾ������ʾ������ $url �������ת��·����Ϊ������ת 
*ʹ�÷����� 
*$js = new makeJs();//���½���ʹ�÷���ʡ�Դ˾� 
*$js->jsAlert(��ʾ������,'��תҳ��URL');//�����Ի��򣬵��ȷ������ת��php.phpҳ�� 
*$js->jsAlert(��ʾ������,'');//�����Ի��򣬵��ȷ����û����ת 
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
*�������ƣ�jsConfirm 
*�������ܣ�����JS��ʾ�򣬴�ȷ��/ȡ�� 
*������$message Ҫ�ڵ�����ʾ������ʾ������ 
*ʹ�÷�����$js->jsConfirm('��ʾ������'); 
*/ 
     public function jsConfirm($message){ 
        echo $this->jsStartChar; 
        if($url==''){ 
            echo 'confirm' . '("' . $message . '");'; 
            echo $this->jsEndChar; 
        } 
     } 

/* 
*�������ƣ�jsOpenWin 
*�������ܣ������´��� 
*������$url ·�� $name ������ $height ���ڸ߶� $width ���ڿ�� 
*ʹ�÷����� 
*$url = 'ҳ���URL'; 
*$js->jsOpenWin($url,������,���ڸ߶�,���ڿ��); 
*/ 
     public function jsOpenWin($url,$name,$height,$width){ 
        echo $this->jsStartChar; 
        echo 'window.open'.'("'.$url.'","'.$name.'","'.$height.'","'.$width.'");'; 
        echo $this->jsEndChar; 
     } 

/* 
*�������ƣ�jsAddscr��pt 
*�������ܣ��Զ���JS 
*������$scr��pt 
*ʹ�÷����� 
*$scr��pt = '�����js���'; 
*���磺$scr��pt = 'window.location=(\'php.php\')'; 
*$js->jsAddscr��pt($scr��pt); 
*/ 
     public function jsAddscr��pt($scr��pt){ 
        echo $this->jsStartChar; 
        echo $scr��pt; 
        echo $this->jsEndChar; 
     } 
} 
?>