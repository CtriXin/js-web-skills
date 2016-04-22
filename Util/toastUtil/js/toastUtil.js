var A=(function(){
    var Bajain=function(){
        this.pop = {
            hasAside : false,
            hasPop : false
        };
        this.$ = $;

        this.options = {
            clickEvent : ('ontouchstart' in window)?'tap':'click'
        };
    }
    /**
     * 注册A的各个部分，可扩充
     * @param {String} 控制器的唯一标识
     * @param {Object} 任意可操作的对象，建议面向对象方式返回的对象
     */
    Bajain.prototype.register = function(key, obj){
        this[key] = obj;
    };


    return new Bajain();
}
)(window.Zepto||jQuery);

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

//util
(function($){
    var util = {};
    //类似于java的printf 替换变量
    util.provider = function(str, data){
        str = (str||'').trim();
        return str.replace(/\$\{([^\}]*)\}/g, function(s, s1){
            return data[s1.trim()]||'';
        });
    };

    A.register('util', util);

})(A.$);


/*
 * Toast提示框
 * */
(function($){
    var _toastMap = {index:0, process: [], map: {}};
    var Toast = function(opts){
    	var _index = _toastMap.index++;
    	var options = {
    		id : '__toast__'+_index,//popup对象的id
    		isBlock : false,
    		duration : 2000,
    		css : '',
    		text : ''
    	};
    	$.extend(options, opts);
    	if(_toastMap[options.id]) return this;
    	var _this = _toastMap.map[options.id] = this;
    	var $toast = this.toast = $('<div id="'+options.id+'" class="agile-toast"><a>'+options.text+'</a></div>').appendTo('body');
    	$toast.addClass('class', options.css);
    	this.options = options;
    	_toastMap.process.push(this);
    };
    Toast.prototype.show = function(){
        if(_toastMap.process.length>0&&_toastMap.process[0]!=this){
        	return this;
        }
        var $toast = this.toast, options = this.options;        
        var _this = this;
        $toast.show();
        animUtil.run($toast,'scaleIn', function(){
        	if(options.isBlock==false) setTimeout(function(){ _this.hide();}, options.duration);
        });
        return this;
    };
    Toast.prototype.hide = function(){
    	var $toast = this.toast, options = this.options;
    	animUtil.run($toast,'scaleOut',function(){
        	$toast.remove();
        	delete _toastMap.map[options.id];
        	_toastMap.process.shift();
        	if(_toastMap.process.length>0) _toastMap.process[0].show();
        });
        return this;
    };
    
    A.register('Toast', Toast);

    var _ext = {};
    /**
     *  显示消息
     * @param text
     * @param duration 持续时间
     */
    _ext.showToast = function(text,duration){
        new Toast({
        	text : text,
        	duration : duration
        }).show();
    };   
    _ext.alarmToast = function(text,duration){
        new Toast({
        	text : text,
        	duration : duration,
        	css : 'alarm'
        }).show();
    };
    _ext.clearToast = function(){
        $('.agile-toast').remove();
        _toastMap.map = {};
        _toastMap.process = [];
    };
    _ext.getAllToasts = function(){
        return _toastMap.process;
    };
    
    for(var k in _ext){
    	A.register(k, _ext[k]);
    }
    
})(A.$);
