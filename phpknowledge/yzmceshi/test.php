<?php

include ('Valite.php');
$name=time().".jpg";
$img=GrabImage("http://rkk.cdpf.org.cn/rand.jsp?tSessionId=1426303878194",$name); 
if($img){ 
	echo '<img src="'.$name.'">'; 
}else{ 
	echo "false"; 
} 

$valite = new Valite();
$valite->setImage($name);
$valite->getHec();
$ert = $valite->run();
//$ert = "1234";
// print_r($ert);
echo '</br>';
print_r($ert);
echo '</br>';
// echo '<br><img src="$name"><br>';
// echo '</br> count';
// var_dump($valite->getResult());
// echo $valite->getResult();
// count($valite->getResult());
// echo count($valite->getResult());
foreach ($valite->getResult() as $key => $value) {
	$line='';
	foreach ($value as $key2 => $value2) {
		$line.=$value2;
	}
	echo $line.'</br>';
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