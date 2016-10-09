<?php 
$str = "<br><br><B><font color='red'>Latest exe</font></B> <br>DownLink: http://puu.sh/aRcF9/c08c42c5d0._exe<br>-------------------------------------------<br><br><br><B><font color='red'>Latest</font></B> <br>DownLink: http://puu.sh/fu3Xl/880824890f.dll<br>-------------------------------------------<br><B><font color='red'>5.2</font></B> <br>DownLink: http://puu.sh/fu3Xl/880824890f.dll<br>-------------------------------------------<br><B><font color='red'>5.2P</font></B> <br>DownLink: http://puu.sh/fqPzh/66d43e25ad.dll<br>-------------------------------------------<br><B><font color='red'>5.2NP</font></B> <br>DownLink: http://puu.sh/fr8LF/c73b6bc90a.dll<br>-------------------------------------------<br><B><font color='red'>5.2 Pre-HF</font></B> <br>DownLink: http://puu.sh/fhYMD/6c6717f050.dll<br>-------------------------------------------<br><B><font color='red'>5.1</font></B> <br>DownLink: http://puu.sh/f3udb/ffc6fd171b.dll<br>-------------------------------------------<br><B><font color='red'>4.21</font></B> <br>DownLink: http://puu.sh/ek30p/12a84b39a3.dll<br>-------------------------------------------<br><B><font color='red'>4.21 Pre-HF</font></B> <br>DownLink: http://puu.sh/dyHCF/57930d2761.dll<br>-------------------------------------------<br><B><font color='red'>4.20</font></B> <br>DownLink: http://puu.sh/cYYhi/88a9934046.dll<br>-------------------------------------------<br><B><font color='red'>CN LoL 5.2</font></B> <br>DownLink: http://puu.sh/fwQAt/e9a034a8e7.dll<br>-------------------------------------------<br><B><font color='red'>CN LoL 5.1</font></B> <br>DownLink: http://puu.sh/eYE6d/36df4d77c8.dll<br>-------------------------------------------<br><B><font color='red'>CN LoL 4.21</font></B> <br>DownLink: http://puu.sh/eDSKp/d6af731ceb.dll<br>-------------------------------------------<br><B><font color='red'>CN LoL 4.17</font></B> <br>DownLink: http://puu.sh/c9RlT/db2fa0b5e4.dll<br>-------------------------------------------<br><B><font color='red'>CN LoL 4.16</font></B> <br>DownLink: http://puu.sh/bKDcD/056388a3e1.dll<br>-------------------------------------------<br>OK,File has been Downloaded is Server!</br>Update Time: 2015-02-06 10:22:04 <br><br>";
$pattern="<B><font color='red'>(.*?)</font></B> <br>DownLink: (.*?)<br>";
// $pattern=addslashes($pattern);
$pattern="#$pattern#";
getPatternResult($pattern,$str);
// $new_arr=preg_split("/[\S]+/",$str);
	// print_r($new_arr);
function getPatternResult($pattern,$str) {
	$re='';

	if(preg_match_all($pattern,$str,$re)){
		echo print_r($re);
		return print_r($re[1]);
	}
	else{
		echo "error";
		return "error";
	}
}
?>