<?php
$name=time();
$img=GrabImage("http://rkk.cdpf.org.cn/rand.jsp?tSessionId=1426303878194",$name.".jpg"); 
if($img){ 
echo '<img src="'.$img.'">'; 
}else{ 
echo "false"; 
} 


function GrabImage($url,$filename="") { 
if($url=="") return false; 

if($filename=="") { 
$ext=strrchr($url,"."); 
if($ext!=".gif" && $ext!=".jpg" && $ext!=".png") return false; 
$filename=date("YmdHis").$ext; 
} 

ob_start(); 
readfile($url); 
$img = ob_get_contents(); 
ob_end_clean(); 
$size = strlen($img); 

$fp2=@fopen($filename, "a"); 
fwrite($fp2,$img); 
fclose($fp2); 

return $filename; 
} 

?>