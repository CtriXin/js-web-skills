var x='11'
var le={
g:5,
l:alert(x),//��ֵ��ʱ��ִ���� 11
msg:function(){
	alert(this.x)//ָ������� undefined
	
	function qg(){
		alert(this.x)//����������ָ��ȫ��
		
	}
	qg()
}
}

le.msg()