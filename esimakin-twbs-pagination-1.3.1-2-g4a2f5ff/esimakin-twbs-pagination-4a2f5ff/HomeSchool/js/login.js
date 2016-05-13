		$(function(){				
			$("#submit_btn").click(function(){
				var user=$("#username").val();
				var pswd=$("#password").val();
					if(user == ""){
						alert('请输入账号！');	
						$('#username').focus();
					return false;
				}
					else if(pswd == ""){
						alert('请输入密码！');
						$('#password').focus();
						return false;
					}
					else{
						alert("提交成功")
					}
					})
			
		})	
				
