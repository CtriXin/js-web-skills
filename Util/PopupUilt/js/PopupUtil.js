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


//POPUP
(function($){
	var _popMap= {index:0}
    ;
    
    var transitionMap = {
    	default : ['fadeIn','fadeOut'],
        top : ['slideDownIn','slideUpOut'],
        bottom : ['slideUpIn','slideDownOut'],
        center : ['bounceIn','bounceOut'],
        left : ['slideRightIn','slideLeftOut'],
        right : ['slideLeftIn','slideRightOut']           
	};
 
    var Popup = function(opts){
    	var _index = _popMap.index++;  
    	var options = {
    		id : '__popup__'+_index,//popup对象的id
    		html : '',//位于pop中的内容
    		pos : 'default',//pop显示的位置和样式,default|top|bottom|center|left|right|custom
    		css : {},//自定义的样式
    		isBlock : false//是否禁止关闭，false为不禁止，true为禁止
    	};
    	$.extend(options,opts);
    	if(_popMap[options.id]) return _popMap[options.id];
    	var _this = _popMap[options.id] = this;
    	$('<div data-refer="'+options.id+'" class="popup-mask"></div><div id="'+options.id+'" class="agile-popup"></div>').appendTo('body');
    	var $popup = $('#'+options.id), $mask = $('[data-refer="'+options.id+'"]');
    	$popup.data('block', options.isBlock);
    	$popup.css(options.css);
    	$popup.addClass(options.pos);
		$popup.html(options.html);
		$mask.on(A.options.clickEvent, function(){
        	if(options.isBlock) return false;
        	_this.close();
        	return false;
        });
        $popup.on(A.options.clickEvent,'[data-toggle="popup"]',function(){
        	_this.close();
			return false;
		});
		this.options = options;
		this.popup = $popup;
		this.mask = $mask;
		this._event = {};
    };    
	Popup.prototype.on = function(eType, callback){
    	if(this._event[eType]){
    		this._event[eType].push(callback);
    	}else{
    		this._event[eType] = [callback];
    	}
    	return this;
    };
    Popup.prototype.trigger = function(eType, callback){
    	var arr = this._event[eType];
    	for(var i=0;i<(arr||[]).length;i++){
    		arr[i].apply(this);
    	};
    	callback&&callback.apply(this);
    	return this;
    };
    
    Popup.prototype.open = function(callback){
    	var _this=this, $popup=this.popup, $mask=this.mask, options=this.options;
    	if($mask.hasClass('active')) return _popMap[options.id];
    	$('body').children('.popup-mask.active').removeClass('active');
    	$mask.addClass('active').show();
        $popup.show();
        var popHeight = $popup.height();
        if(options.pos == 'center') $popup.css('margin-top','-'+popHeight/2+'px');
        var transition = transitionMap[options.pos];
        if(transition) {
        	_this._status = 'opening';
        	animUtil.run($popup,transition[0], function(){
        		_this._status = 'opened';
        	});
        }else{
        	_this._status = 'opened';
        }
		this.trigger('popupopen');callback&&callback.call(this);
		A.pop.hasPop = $popup;
		return this;
    };
    
    var _finish = function(callback){
    	var $popup=this.popup, $mask=this.mask;
    	$popup.remove();$mask.remove();this.trigger('popupclose');setTimeout(function(){ callback&&callback(); }, 200);
    	$last = $('body').children('.popup-mask').last().addClass('active');
    	A.pop.hasPop = $last.length==0?false:$('body').children('.agile-popup').last();
    };
    
    Popup.prototype.close = function(callback){
    	var _this = this; setTimeout(function(){ _this._close(callback); }, 100);
    };
    
    Popup.prototype._close = function(callback){
    	if(this._status=='opening') return;
    	this.trigger('popupbeforeclose');
    	var _this=this,$popup=this.popup, $mask=this.mask, options=this.options;
        var transition = transitionMap[options.pos];
        if(transition){
            animUtil.run($popup,transition[1],function(){ _finish.call(_this, callback); });
        }else{
            _finish.call(_this, callback);
        }
        delete _popMap[options.id];
        //return this;
    };
    A.register('Popup' , Popup);
    
    var _ext = {};
    
    _ext.popup = function(opts){
    	if(_popMap[opts.id]) return _popMap[opts.id];
    	return new Popup(opts).open();
    };
    
    _ext.closePopup = function(callback){
    	var _id = A.pop.hasPop.attr('id');
    	if(_popMap[_id]) _popMap[_id].close(callback);
    };
    
    /**
     * alert组件
     * @param title 标题
     * @param content 内容
     * @param callback 点击确定按钮后的回调
     */
    _ext.alert = function(title,content,callback){
    	if(!content){
    		content = title;
    		title = '提示';
    	}else if(typeof content=='function'){
    		callback = content;
    		content = title;
    		title = '提示';
    	}
        return new Popup({
            html : A.util.provider('<div class="popup-title">${title}</div><div class="popup-content">${content}</div><div class="popup-handler"><a data-toggle="popup" class="popup-handler-ok">${ok}</a></div>', {title : title, content:content, ok:'确定'}),
            pos : 'center',
            isBlock : true
        }).on('popupclose', function(){
        	callback&&callback();
        }).open();
    };
    
    /**
     * confirm 组件
     * @param title 标题
     * @param content 内容
     * @param okCallback 确定按钮handler
     * @param cancelCallback 取消按钮handler
     */
    _ext.confirm = function(title,content,okCallback,cancelCallback){
    	if(typeof content=='function'){
    		cancelCallback = okCallback;
    		okCallback = content;
    		content = title;
    		title = '提示';
    	}
    	var clickBtn = okCallback;
        return new Popup({
            html : A.util.provider('<div class="popup-title">${title}</div><div class="popup-content">${content}</div><div class="popup-handler"><a data-toggle="popup" class="popup-handler-cancel">${cancel}</a><a data-toggle="popup" class="popup-handler-ok">${ok}</a></div>', {title : title, content:content, cancel:'取消', ok:'确定'}),
            pos : 'center',
            isBlock : true
        }).on('popupclose', function(){
        	clickBtn&&clickBtn.call(this);
        }).open(function(){
        	var $popup = $(this.popup), _this=this;
        	$popup.find('.popup-handler-ok').on(A.options.clickEvent, function(){
	            clickBtn = okCallback;
	        });
	        $popup.find('.popup-handler-cancel').on(A.options.clickEvent, function(){
	            clickBtn = cancelCallback;
	        });
        });        
    };

    /**
     * loading组件
     * @param text 文本，默认为“加载中...”
     * @param callback 函数，当loading被人为关闭的时候的触发事件
     */
    _ext.showMask = function(text,callback){
    	if(typeof text=='function'){
    		callback = text;
    		text = '加载中';
    	}
        return new Popup({
        	id : 'popup_loading',
            html : A.util.provider('<i class="popup-spinner"></i><p>${title}</p>', {title : text||'加载中'}),
            pos : 'loading',
            isBlock : true
        }).on('popupclose', function(){
        	callback&&callback();
        }).open();
    };
    
    _ext.hideMask = function(callback){
    	if(_popMap['popup_loading']) _popMap['popup_loading'].close();
    };

    /**
     * actionsheet组件
     * @param buttons 按钮集合
     * [{css:'red',text:'btn',handler:function(){}},{css:'red',text:'btn',handler:function(){}}]
     */
    _ext.actionsheet = function(buttons,showCancel){
        var markMap = ['<div class="actionsheet"><div class="actionsheet-group">'];
        var defaultCalssName = "popup-actionsheet-normal";
        var defaultCancelCalssName = "popup-actionsheet-cancel";
        var showCancel = showCancel==false?false:(showCancel||true);
        $.each(buttons,function(i,n){
            markMap.push('<button data-toggle="popup" class="'+(n.css||defaultCalssName)+'">'+ n.text +'</button>');
        });
        markMap.push('</div>');
        if(showCancel) markMap.push('<button data-toggle="popup" class="'+(typeof showCancel=='string'?showCancel:defaultCancelCalssName)+'">取消</button>');
        markMap.push('</div>');
        return new Popup({
            html : markMap.join(''),
            pos : 'bottom',
            css : {'background':'transparent'},
       	}).open(function(){
 			$(this.popup).find('button').each(function(i,button){
            	$(button).on(A.options.clickEvent,function(){
                	if(buttons[i] && buttons[i].handler){
                    	buttons[i].handler.call(button);
                    }
                });
            });
    	});
    };
    
    /**
     * 带箭头的弹出框
     * @param html 弹出的内容可以是html文本也可以输button数组
     * @param el 弹出位置相对的元素对象
     */
    _ext.popover = function(html,el){
    	var markMap = [];
    	markMap.push('<div class="popover-angle"></div>');
    	if(typeof html=='object'){
    		markMap.push('<ul class="popover-items">');
    		for(var i=0;i<html.length;i++){
    			markMap.push('<li data-toggle="popup" class="'+(html[i].css||'')+'">'+html[i].text+'</li>');
    		}
    		markMap.push('</ul>');
    	}else{
    		markMap.push(html);
    	}

        return new Popup({
            html : markMap.join('')
        }).on('popupopen', function(){
        	var $del = $(document);
			var dHeight = $del.height();
			var dWidth = $del.width();
			
			var $rel = $(el);
			var rHeight = $rel.height();
			var rWidth = $rel.width();
			var rTop = $rel.offset().top;
			var rLeft = $rel.offset().left;
			var rCenter = rLeft+(rWidth/2);
			
			var $el = $(this.popup).addClass('popover');
			var $angle = $($el.find('.popover-angle').get(0));
			var gapH = $angle.height()/2;
			var gapW = Math.ceil(($angle.width()-2)*Math.sqrt(2));			
			var height = $el.height();
			var width = $el.width();
			
			var posY = dHeight-height-rHeight<0&&rTop>height?'up':'down';			
			var elCss = {}, anCss = {};   		
    		if(posY=='up'){
    			elCss.top = rTop - (height + gapH);
    			anCss.bottom = -gapH+4;
    		}else{
    			elCss.top = rTop + (rHeight + gapH);
    			anCss.top = -gapH+4;
    		}
    		elCss.left = rCenter-width/2;
			if(elCss.left+width>=dWidth-4){
				elCss.left = dWidth - width - 4;
			}else if(elCss.left<4){
				elCss.left = 4;
			}			
			anCss.left = rCenter - elCss.left - gapW/2;
    		$el.css(elCss);
    		$angle.css(anCss);
            $el.find('.popover-items li').each(function(i,button){             	
                $(button).on(A.options.clickEvent,function(){
                    if(html[i] && html[i].handler){
                        html[i].handler.call(button);
                    }
                });
            });
        }).open();
    };
	
	for(var k in _ext){
		A.register(k, _ext[k]);
	}
    
})(A.$);