      /*
        * by hgxbajian 15-11-28 继续基于jq
        * 统一处理ajax get 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 完成get 请求url,可不带上host
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        * 使用方法ajax_get("/queryDevice",handleQueryDevice);
        */
        function ajax_get(url,succCallback,dataType,failCallback,middleware){

        	if (url=='') {return;}
        	dataType=(dataType==undefined||dataType=='')?'json':dataType;
        	failCallback=failCallback==undefined?defaultFailCallback:failCallback;
            middleware=middleware==undefined?defaultMiddleware:middleware;
        	$.ajax({
        		url:url,
        		type:'get',
        		dataType: dataType,
        		success: function (data) {
                    middleware(data);
        			if (succCallback!=undefined) {
                succCallback(data);//允许undefined
            }
        },
        error: function (msg) {
        	failCallback(msg);
        }
    });
        }

        /*
        * by hgxbajian 15-11-28(此方法写了暂未使用测试)继续基于jq
        * 统一处理ajax post 请求（返回json格式），成功分发回调函数处理,失败统一提示
        * @param url 请求url,可不带上host
        * @param data post data 如{Content: content,To:to}表示 Content=content&To=to
        * @param succCallback succ 回调
        * @param dataType 返回值类型 可空 默认json
        * @param failCallback fail 回调 可空 defaultFailCallback
        * 使用方法 ajax_post("/queryDevice","{Content: content,To:to}",handleQueryDevice);
        */
        function ajax_post(url,data,succCallback,dataType,failCallback,middleware){

        	if (url=='') {return;}
        	data=data==undefined?'':data;
        	dataType=(dataType==undefined||dataType=='')?'json':dataType;
        	failCallback=failCallback==undefined?defaultFailCallback:failCallback;
            middleware=middleware==undefined?defaultMiddleware:middleware;
        	$.ajax({
        		url: url,
        		type: 'POST',
        		dataType: dataType,
        		data: data,
        	})
        	.done(function(data) {
                middleware(data);
        		succCallback(data);
        	})
        	.fail(function() {
        		failCallback();
        	})

        }

function defaultMiddleware(){
          //默认中间件 可在外面重写这个方法
      }

        function defaultFailCallback(){
          A.showToast('网络错误');// AL框架中的方法，类似alert
      }

