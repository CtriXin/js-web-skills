// animUtil.run($toast,'scaleIn', function(){});
animUtil=(function($){
	
	var anim = {};
	
	anim.classes = {//形如：[[currentOut,targetIn],[currentOut,targetIn]]
		empty : [['empty','empty'],['empty','empty']],
		slide : [['slideLeftOut','slideLeftIn'],['slideRightOut','slideRightIn']],
		cover : [['','slideLeftIn'],['slideRightOut','']],
		slideUp : [['','slideUpIn'],['slideDownOut','']],
		slideDown : [['','slideDownIn'],['slideUpOut','']],
		popup : [['','scaleIn'],['scaleOut','']],
		flip : [['slideLeftOut','flipOut'],['slideRightOut','flipIn']]
	};
	
	anim.addClass = function(cssObj){
		$.extend(anim.classes, cssObj||{});
	};
	
	/**
     * 添加控制器
     * @param {Object} 要切换动画的jQuery对象
     * @param {String} 动画样式，兼容jq的obj参数
     * @param {Function} 动画结束的回调函数
     */
	anim.run = function($el, cls, cb){
		var $el = $($el);
		var _eName = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		if($el.length==0){
			cb&&cb();
			return;
		}
		if(typeof cls=='object'){
			$el.animate(cls,250,'linear',function(){ cb&&cb();});
			return;
		}
		cls = (cls||'empty')+' anim';
		$el.addClass(cls).one(_eName,function(){
			$el.removeClass(cls);
			cb&&cb();
			$el.unbind(_eName);
		});
	};
	
	anim.css3 = function($el, cssObj, cb){
		$el = $($el);
		var _eName = 'webkitTransitionEnd otransitionend transitionend';
		$el.addClass('comm_anim').css(cssObj).one(_eName, function(){
			$el.removeClass('comm_anim');
			cb&&cb();
			$el.unbind(_eName);
		});
	};
	
	/**
     * 添加控制器
     * @param {String} 要切换的当前对象selector
     * @param {String} 要切换的目标对象selector
     * @param {Boolean} 是否返回方向
     * @param {Function} 动画结束的回调函数
     */
	anim.change = function(current, target, isBack ,callback){
		
		var $current = $(current);
		var $target = $(target);
		
		if($current.length+$target.length==0){
			callback&&callback();
			return;
		}
		
		var targetTransition = $target.data('transition');
		if(!anim.classes[targetTransition]){
			callback&&callback();
			return;
		}
		var transitionType = anim.classes[targetTransition][isBack?1:0];
		anim.run($current, transitionType[0]);
		anim.run($target, transitionType[1], function(){
			callback&&callback();
		});
	};
	return anim;
})(window.Zepto||jQuery);