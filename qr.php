
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>专属二维码</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>

<style> 
body {font:normal 14px/1.5 "\5FAE\8F6F\96C5\9ED1", Helvetica,STHeiti, Droidsansfallback; color:#444;background-color:#fff;-webkit-user-select: none;-webkit-text-size-adjust: none; }
#contain
{
	position: absolute;
top:50px
	-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
	width: 100%;
	height: 100%;

}
.sProjectIntroImg{
	position: absolute;

	width: 100%;
	height: 100%;
}
label{
	font-size: 20px;
}
em{
	position: absolute;
	left:47px;
}
span{
	position: absolute;
	left:215px;
	font-size: 15px;
}


</style>
</head>
<body >
<img src="bg.jpg" class="sProjectIntroImg">

<div id="contain">

<div>
<br/>
	<label>&nbsp;你是否因为工作</label><br/>
	<label>&nbsp;很久没有了解过你的孩子？</label>
</div>
<div>
<br/>
	<label>&nbsp;你是否曾经留意</label><br/>
	<label>&nbsp;孩子渴望陪伴的眼神？</label>
</div>
<div>
<br/>
	<label>&nbsp;你是否知道</label><br/>
	<label>&nbsp;孩子最缺少的是父母的陪伴？</label>

</div>
<br/>
<div style="float: left">
	&nbsp;&nbsp;<?php
	echo '<img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$_GET['ticket'].'"';
	?> style="width: 200px;height: 200px">
	<em>您的专属二维码</em>
</div>
<div><br/><br/><span >扫描二维码</span><br/>
	<span >关注我们</span><br/>
	<span>一起为你的孩子</span><br/>
	<span>提供更多的陪伴</span><br/>
	</div>
	<br/>
	</div>
</body>

</html>






