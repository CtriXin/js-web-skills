var x='11'
var le={
g:5,
l:alert(x),//赋值的时候执行了 11
msg:function(){
	alert(this.x)//指向对象本身 undefined
	
	function qg(){
		alert(this.x)//函数声明，指向全局
		
	}
	qg()
}
}

le.msg()