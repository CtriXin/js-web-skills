
/*
* 封装一个toast
* 支持webkit浏览器
* 使用方式 Toast('话题征集内容不能为空');
*/
function $S(s){return document.getElementById(s);}
		function $html(s,html){$S(s).innerHTML=html;}
		function checkIsElecmentExist(){
			if($S('toast_id')==null){
				var createDiv=document.createElement("div");  
				createDiv.innerHTML='<div id="toast_id" class="toasttj" style="display: none; opacity: 0;z-index:1003;font-size: 1.15em;position: fixed;bottom:20%;width: 100%;opacity:0;height: 18px;display: none;-webkit-transition: opacity .5s ease-out .5s;text-align: center;"><a id="toast_value" style="color:#fff;background-color:#28333E;border-radius: 20px;padding: 10px;text-align: center;margin: 0 auto;display: inline-block;box-shadow: 3px 3px 3px #888888;"></a></div>';  
				document.body.appendChild(createDiv);  
			}
		}
		var toastTimeout=null;
		var displayTimeout=null;
		function Toast(html){
			if(toastTimeout!=null ||displayTimeout!=null){
				clearTimeout(toastTimeout);
				clearTimeout(displayTimeout);
			}
			checkIsElecmentExist();

			$S('toast_id').style.display='block';
			$S('toast_id').style.opacity=0.8;
			$S('toast_value').innerHTML=html;
			toastTimeout=setTimeout(function(){
				$S('toast_id').style.opacity=0;
				displayTimeout=setTimeout(function(){$S('toast_id').style.display='none';},1500);
			},1500);
		}